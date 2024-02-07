<?php
include_once '../ClassiGenerali/Data.php';
include_once '../ClassiGenerali/Ora.php';
include_once '../SingolaPartecipazioneSquadraEdizioneMVC/SingolaPartecipazioneSquadraEdizioneModel.php';

class SingoloIncontroModel {
    private const elo_coefficient = 32; //coefficiente elo costante

    private int $id_incontro;
    private int $numero_giornata;
    private Data $data_incontro;
    private Ora $ora_incontro;
    //private int $cod_edizione_incontro; incluso sia in squadra_casa che squadra_trasferta
    private SingolaPartecipazioneSquadraEdizioneModel $squadra_casa;
    private SingolaPartecipazioneSquadraEdizioneModel $squadra_trasferta;
    private int $goal_casa;
    private int $goal_trasferta;
    //private string $luogo;

    //FUNZIONI PER CALCOLO PUNTEGGIO ELO
    private function expected_elo_score(float $ra, float $rb) : float { //funzione calcolo punteggio ELO atteso
        //I parametri ra e rb rappresentano i punteggi dei due giocatori A e B
        //Nel nostro caso A e B sono le due squadre (casa e trasferta)
        //Math.pow(2, 3); //2 elevato alla 3
        

        $ea = 1 / (1 + pow(10, ($rb - $ra) / 400));
        //ea significa Expected A, il punteggio atteso di A
        
        //Usiamo a per convenzione,
        //tanto la funzione verra applicata al giocatore b scambiando i parametri quando invocata

        //ritorniamo il punteggio atteso del giocatore
        return $ea;
    }

    private function elo_win_score($score, $expected, $k) : float { //funzione calcolo punteggio ELO per vittoria
        //il parametro score rappresenta il punteggio elo attuale del giocatore che andremo ad aggiornare
        //in caso di vittoria il punteggio ottenuto vale 1
        $achieved_score = 1;

        //il parametro expected rappresenta il punteggio atteso
        //lo calcoliamo con la funzione "expected_elo_score(ra,rb)"

        //il parametro k rappresenta il coefficiente di variazione ELO
        //lo rappresentiamo con una variabile const settata a 32 (come su wikipedia)

        $win_score = $score + ($k * (1 - $expected));

        return $win_score;
    }

    private function elo_draw_score($score, $expected, $k) : float { //funzione calcolo punteggio ELO per pareggio
        //il parametro score rappresenta il punteggio elo attuale del giocatore che andremo ad aggiornare
        //in caso di pareggio il punteggio ottenuto vale 0.5
        $achieved_score = 0.5;

        //il parametro expected rappresenta il punteggio atteso
        //lo calcoliamo con la funzione "expected_elo_score(ra,rb)"

        //il parametro k rappresenta il coefficiente di variazione ELO
        //lo rappresentiamo con una variabile const settata a 32 (come su wikipedia)

        $draw_score = $score + ($k * (0.5 - $expected));

        return $draw_score;
    }

    private function elo_loss_score($score, $expected, $k) : float { //funzione calcolo punteggio ELO per sconfitta
        //il parametro score rappresenta il punteggio elo attuale del giocatore che andremo ad aggiornare
        //in caso di sconfitta il punteggio ottenuto vale 0
        $achieved_score = 0;

        //il parametro expected rappresenta il punteggio atteso
        //lo calcoliamo con la funzione "expected_elo_score(ra,rb)"

        //il parametro k rappresenta il coefficiente di variazione ELO
        //lo rappresentiamo con una variabile const settata a 32 (come su wikipedia)

        $loss_score = $score + ($k * (0 - $expected));

        return $loss_score;
    }

    private function elo_sqcasa_vince__sqfuoricasa_perde() : void {
        $expected_score_sq_casa = $this->expected_elo_score($this->squadra_casa->getElo(), $this->squadra_trasferta->getElo());
        $expected_score_sq_trasferta = $this->expected_elo_score($this->squadra_trasferta->getElo(), $this->squadra_casa->getElo());

        $updated_score_sq_casa = $this->elo_win_score($this->squadra_casa->getElo(), $expected_score_sq_casa, self::elo_coefficient);
        $updated_score_sq_trasferta = $this->elo_loss_score($this->squadra_trasferta->getElo(), $expected_score_sq_trasferta, self::elo_coefficient);
        
        $this->squadra_casa->setElo($updated_score_sq_casa);
        $this->squadra_trasferta->setElo($updated_score_sq_trasferta);

        $this->squadra_casa->setEloExpectedScore($expected_score_sq_casa);
        $this->squadra_trasferta->setEloExpectedScore($expected_score_sq_trasferta);
    }

    private function elo_sqcasa_perde__sqfuoricasa_vince() : void {
        $expected_score_sq_casa = $this->expected_elo_score($this->squadra_casa->getElo(), $this->squadra_trasferta->getElo());
        $expected_score_sq_trasferta = $this->expected_elo_score($this->squadra_trasferta->getElo(), $this->squadra_casa->getElo());

        $updated_score_sq_casa = $this->elo_loss_score($this->squadra_casa->getElo(), $expected_score_sq_casa, self::elo_coefficient);
        $updated_score_sq_trasferta = $this->elo_win_score($this->squadra_trasferta->getElo(), $expected_score_sq_trasferta, self::elo_coefficient);

        $this->squadra_casa->setElo($updated_score_sq_casa);
        $this->squadra_trasferta->setElo($updated_score_sq_trasferta);

        $this->squadra_casa->setEloExpectedScore($expected_score_sq_casa);
        $this->squadra_trasferta->setEloExpectedScore($expected_score_sq_trasferta);
    }

    private function elo_sqcasa_pareggia__sqfuoricasa_pareggia() : void {
        $expected_score_sq_casa = $this->expected_elo_score($this->squadra_casa->getElo(), $this->squadra_trasferta->getElo());
        $expected_score_sq_trasferta = $this->expected_elo_score($this->squadra_trasferta->getElo(), $this->squadra_casa->getElo());

        $updated_score_sq_casa = $this->elo_draw_score($this->squadra_casa->getElo(), $expected_score_sq_casa, self::elo_coefficient);
        $updated_score_sq_trasferta = $this->elo_draw_score($this->squadra_trasferta->getElo(), $expected_score_sq_trasferta, self::elo_coefficient);

        $this->squadra_casa->setElo($updated_score_sq_casa);
        $this->squadra_trasferta->setElo($updated_score_sq_trasferta);

        $this->squadra_casa->setEloExpectedScore($expected_score_sq_casa);
        $this->squadra_trasferta->setEloExpectedScore($expected_score_sq_trasferta);
    }



    
    public function __construct(int $id_i, int $n_g, Data $d_i, Ora $o_i, SingolaPartecipazioneSquadraEdizioneModel $s_c, SingolaPartecipazioneSquadraEdizioneModel $s_t, int $g_c, int $g_t) {
        $this->id_incontro = $id_i;
        $this->numero_giornata = $n_g;
        $this->data_incontro = $d_i;
        $this->ora_incontro = $o_i;
        $this->squadra_casa = $s_c;
        $this->squadra_trasferta = $s_t;
        $this->goal_casa = $g_c;
        $this->goal_trasferta = $g_t;
    }

    public function getIdIncontro() : int {
        return $this->id_incontro;
    }
    public function getNumeroGiornata() : int {
        return $this->numero_giornata;
    }
    public function getDataIncontro() : Data {
        return $this->data_incontro;
    }
    public function getOraIncontro() : Ora {
        return $this->ora_incontro;
    }
    public function getSquadraCasa() : SingolaPartecipazioneSquadraEdizioneModel {
        return $this->squadra_casa;
    }
    public function getSquadraTrasferta() : SingolaPartecipazioneSquadraEdizioneModel {
        return $this->squadra_trasferta;
    }
    public function getGoalCasa() : int {
        return $this->goal_casa;
    }
    public function getGoalTrasferta() : int {
        return $this->goal_trasferta;
    }

    public function calcola_punteggioElo() : void {
        if($this->goal_casa > $this->goal_trasferta){
            $this->elo_sqcasa_vince__sqfuoricasa_perde();
        }else if($this->goal_casa < $this->goal_trasferta){
            $this->elo_sqcasa_perde__sqfuoricasa_vince();
        }else if($this->goal_casa === $this->goal_trasferta){
            $this->elo_sqcasa_pareggia__sqfuoricasa_pareggia();
        }
    }

    public function calcola_punteggioClassifica() : void {
        if($this->goal_casa > $this->goal_trasferta){
            //$this->squadra_casa->setPuntiClassifica($this->squadra_casa->getPuntiClassifica() + $this->squadra_casa->getEdizione()->getPuntiVittoria());
            //$this->squadra_trasferta->setPuntiClassifica($this->squadra_trasferta->getPuntiClassifica() + $this->squadra_trasferta->getEdizione()->getPuntiSconfitta());
            $this->squadra_casa->aggiornaPuntiClassifica($this->squadra_casa->getEdizione()->getPuntiVittoria());
            $this->squadra_trasferta->aggiornaPuntiClassifica($this->squadra_trasferta->getEdizione()->getPuntiSconfitta());
        }else if($this->goal_casa < $this->goal_trasferta){
            //$this->squadra_casa->setPuntiClassifica($this->squadra_casa->getPuntiClassifica() + $this->squadra_casa->getEdizione()->getPuntiSconfitta());
            //$this->squadra_trasferta->setPuntiClassifica($this->squadra_trasferta->getPuntiClassifica() + $this->squadra_trasferta->getEdizione()->getPuntiVittoria());
            $this->squadra_casa->aggiornaPuntiClassifica($this->squadra_casa->getEdizione()->getPuntiSconfitta());
            $this->squadra_trasferta->aggiornaPuntiClassifica($this->squadra_trasferta->getEdizione()->getPuntiVittoria());
        }else if($this->goal_casa === $this->goal_trasferta){
            //$this->squadra_casa->setPuntiClassifica($this->squadra_casa->getPuntiClassifica() + $this->squadra_casa->getEdizione()->getPuntiPareggio());
            //$this->squadra_trasferta->setPuntiClassifica($this->squadra_trasferta->getPuntiClassifica() + $this->squadra_trasferta->getEdizione()->getPuntiPareggio());
            $this->squadra_casa->aggiornaPuntiClassifica($this->squadra_casa->getEdizione()->getPuntiPareggio());
            $this->squadra_trasferta->aggiornaPuntiClassifica($this->squadra_trasferta->getEdizione()->getPuntiPareggio());
        }

        //$this->squadra_casa->aggiornaPuntiClassifica($nuoviPuntiClassifica_Casa);
        //$this->squadra_trasferta->aggiornaPuntiClassifica($nuoviPuntiClassifica_Trasferta);
    }
    
    // public function calcola_punteggioClassifica() : void {
    //     if($this->goal_casa > $this->goal_trasferta){
    //         $this->elo_sqcasa_vince__sqfuoricasa_perde();
    //     }else if($this->goal_casa < $this->goal_trasferta){
    //         $this->elo_sqcasa_perde__sqfuoricasa_vince();
    //     }else if($this->goal_casa === $this->goal_trasferta){
    //         $this->elo_sqcasa_pareggia__sqfuoricasa_pareggia();
    //     }
    // } 
}
?>