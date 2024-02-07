<?php
include_once '../ClassiGenerali/Database.php';
include_once '../ClassiGenerali/Data.php';
include_once '../ClassiGenerali/Ora.php';
include_once '../SingoloCampionatoMVC/SingoloCampionatoModel.php';
include_once '../SingolaEdizioneMVC/SingolaEdizioneModel.php';
include_once '../SingoloIncontroMVC/SingoloIncontroModel.php';
//include_once './PartecipazioniSquadraEdizioneMVC/PartecipazioniSquadraEdizioneModel';

class IncontriModel {
    private Database $database;
    private const DATABASE_NAME = "mondo_calcio";
    private PartecipazioniSquadraEdizioneModel $partecipazioniModel;



    public function __construct() {
        $this->database = new Database(self::DATABASE_NAME);
        $this->partecipazioniModel = new PartecipazioniSquadraEdizioneModel();
    }

    public function getIncontri(PartecipazioniSquadraEdizioneModel $partecipazioniModel) : array {
        $query = "SELECT id_campionato, nome_campionato, nome_abbreviato, nome_ufficiale,
                  federazione, paese, organizzatore, titolo, cadenza, fondazione,
        
                  id_edizione, numero_edizione, nome_edizione, stagione_calcistica,
                  mese_apertura, mese_chiusura, numero_partecipanti, formula,
                  punti_a_vittoria, punti_a_pareggio, punti_a_sconfitta,
                  
                  S1.id_squadra AS id_squadra1, S1.nome_squadra_con_acronimo AS nome_squadra1_con_acronimo,
                  S1.nome_squadra_per_intero AS nome_squadra1_per_intero, S1.nome_squadra AS nome_squadra1, DAY(S1.data_fondazione) AS Squadra1_giorno_fondazione,
                  MONTH(S1.data_fondazione) AS Squadra1_mese_fondazione, YEAR(S1.data_fondazione) AS Squadra1_anno_fondazione,
                  S1.anno_fondazione AS anno_fondazione_squadra1, S1.citta AS citta_squadra1, S1.stemma_squadra AS stemma_squadra_squadra1, S1.stadio AS stadio_squadra1,
                  P1.punti_classifica AS punti_classifica_squadra1, P1.punteggio_elo AS punteggio_elo_squadra1,

                  S2.id_squadra AS id_squadra2, S2.nome_squadra_con_acronimo AS nome_squadra2_con_acronimo,
                  S2.nome_squadra_per_intero AS nome_squadra2_per_intero, S2.nome_squadra AS nome_squadra2, DAY(S2.data_fondazione) AS Squadra2_giorno_fondazione,
                  MONTH(S2.data_fondazione) AS Squadra2_mese_fondazione, YEAR(S2.data_fondazione) AS Squadra2_anno_fondazione,
                  S2.anno_fondazione AS anno_fondazione_squadra2, S2.citta AS citta_squadra2, S2.stemma_squadra AS stemma_squadra_squadra2, S2.stadio AS stadio_squadra2,
                  P2.punti_classifica AS punti_classifica_squadra2, P2.punteggio_elo AS punteggio_elo_squadra2,

                  I.id_incontro, I.numero_giornata, 
                  DAY(I.data_incontro) AS giorno_incontro, MONTH(I.data_incontro) AS mese_incontro, YEAR(I.data_incontro) AS anno_incontro, 
                  HOUR(I.ora_incontro) AS ore_incontro, MINUTE(I.ora_incontro) AS minuti_incontro, SECOND(I.ora_incontro) AS secondi_incontro, 
                  I.goal_casa, I.goal_trasferta
                  FROM CAMPIONATO C, EDIZIONE E, 
                  PARTECIPAZIONE P1, PARTECIPAZIONE P2, 
                  SQUADRA S1, SQUADRA S2, 
                  INCONTRO I
                  WHERE C.id_campionato = E.cod_campionato 
                  AND E.id_edizione = P1.cod_edizione AND E.id_edizione = P2.cod_edizione
                  AND P1.cod_squadra = S1.id_squadra AND P2.cod_squadra = S2.id_squadra 
                  AND I.squadra_casa = P1.cod_squadra AND I.cod_edizione_incontro = P1.cod_edizione
                  AND I.squadra_trasferta = P2.cod_squadra AND I.cod_edizione_incontro = P2.cod_edizione
                  ORDER BY numero_giornata ASC, data_incontro ASC, ora_incontro ASC, id_incontro ASC";
        $result = $this->database->executeQuery($query);

        $incontri = [];
        foreach ($result as $row) {
            $campionato = new SingoloCampionatoModel($row['id_campionato'],$row['nome_campionato'],$row['nome_abbreviato'],$row['nome_ufficiale'],$row['federazione'],$row['paese'],$row['organizzatore'],$row['titolo'],$row['cadenza'],$row['fondazione']);
            $edizione_campionato = new SingolaEdizioneModel($row['id_edizione'],$campionato,$row['numero_edizione'],$row['nome_edizione'],$row['stagione_calcistica'],$row['mese_apertura'],$row['mese_chiusura'],$row['numero_partecipanti'],$row['formula'],$row['punti_a_vittoria']);
            $data_fondazione_squadra_casa = new Data($row['Squadra1_giorno_fondazione'],$row['Squadra1_mese_fondazione'],$row['Squadra1_anno_fondazione']);
            
            $squadra_casa = new SingolaSquadraModel($row['id_squadra1'],$row['nome_squadra1_con_acronimo'],$row['nome_squadra1_per_intero'],$row['nome_squadra1'],$data_fondazione_squadra_casa,$row['anno_fondazione_squadra1'],$row['citta_squadra1'],$row['stemma_squadra_squadra1'],$row['stadio_squadra1']);
            
            $data_fondazione_squadra_trasferta = new Data($row['Squadra2_giorno_fondazione'],$row['Squadra2_mese_fondazione'],$row['Squadra2_anno_fondazione']);
            
            $squadra_trasferta = new SingolaSquadraModel($row['id_squadra2'],$row['nome_squadra2_con_acronimo'],$row['nome_squadra2_per_intero'],$row['nome_squadra2'],$data_fondazione_squadra_trasferta,$row['anno_fondazione_squadra2'],$row['citta_squadra2'],$row['stemma_squadra_squadra2'],$row['stadio_squadra2']);
            
            $partecipazione_squadra_casa = new SingolaPartecipazioneSquadraEdizioneModel($edizione_campionato, $squadra_casa);
            $partecipazione_squadra_trasferta = new SingolaPartecipazioneSquadraEdizioneModel($edizione_campionato, $squadra_trasferta);            
            $data_incontro = new Data($row['giorno_incontro'],$row['mese_incontro'],$row['anno_incontro']);
            $ora_incontro = new Ora($row['ore_incontro'],$row['minuti_incontro'],$row['secondi_incontro']);
            
            $incontro = new SingoloIncontroModel($row['id_incontro'],$row['numero_giornata'],$data_incontro,$ora_incontro,$partecipazione_squadra_casa,$partecipazione_squadra_trasferta,$row['goal_casa'],$row['goal_trasferta']);

                //CALCOLO ELO INCONTRO DOPO INCONTRO
                //----------------------------------
                $squadraCasa = $partecipazioniModel->getSingolaSquadraIndice($incontro->getSquadraCasa()->getSquadra()->getId_Squadra());
                $squadraTrasferta = $partecipazioniModel->getSingolaSquadraIndice($incontro->getSquadraTrasferta()->getSquadra()->getId_Squadra());
                $incontro->getSquadraCasa()->setElo($squadraCasa->getElo());
                $incontro->getSquadraTrasferta()->setElo($squadraTrasferta->getElo());
                $incontro->calcola_punteggioElo();
                $incontro->calcola_punteggioClassifica();

                $partecipazioniModel->aggiornaEloSingolaSquadra($incontro->getSquadraCasa()->getSquadra()->getId_Squadra(), $incontro->getSquadraCasa()->getElo());
                $partecipazioniModel->aggiornaEloSingolaSquadra($incontro->getSquadraTrasferta()->getSquadra()->getId_Squadra(), $incontro->getSquadraTrasferta()->getElo());

                $partecipazioniModel->aggiornaExpectedEloSingolaSquadra($incontro->getSquadraCasa()->getSquadra()->getId_Squadra(), $incontro->getSquadraCasa()->getEloExpectedScore());
                $partecipazioniModel->aggiornaExpectedEloSingolaSquadra($incontro->getSquadraTrasferta()->getSquadra()->getId_Squadra(), $incontro->getSquadraTrasferta()->getEloExpectedScore());
                
                $partecipazioniModel->aggiornaPuntiClassificaSingolaSquadra($incontro->getSquadraCasa()->getSquadra()->getId_Squadra(), $incontro->getSquadraCasa()->getPuntiClassifica());
                $partecipazioniModel->aggiornaPuntiClassificaSingolaSquadra($incontro->getSquadraTrasferta()->getSquadra()->getId_Squadra(), $incontro->getSquadraTrasferta()->getPuntiClassifica());



                $squadraCasa = $partecipazioniModel->getSingolaSquadraIndice($incontro->getSquadraCasa()->getSquadra()->getId_Squadra());
                $squadraTrasferta = $partecipazioniModel->getSingolaSquadraIndice($incontro->getSquadraTrasferta()->getSquadra()->getId_Squadra());
                //----------------------------------

                $incontro->getSquadraCasa()->setEloExpectedScore($squadraCasa->getEloExpectedScore());
                $incontro->getSquadraTrasferta()->setEloExpectedScore($squadraTrasferta->getEloExpectedScore());

                $incontro->getSquadraCasa()->setElo($squadraCasa->getElo());
                $incontro->getSquadraTrasferta()->setElo($squadraTrasferta->getElo());

                $incontro->getSquadraCasa()->setPuntiClassifica($squadraCasa->getPuntiClassifica());
                $incontro->getSquadraTrasferta()->setPuntiClassifica($squadraTrasferta->getPuntiClassifica());

            $incontri[] = $incontro;
        }

        return $incontri;
    }

    // public function getIncontriSingoloParam(string $attributo, string $operatore_paragone, mixed $param) : array {
    public function getIncontriSingolaEdizione(int $edizione, PartecipazioniSquadraEdizioneModel $partecipazioniModel) : array {
        //$this->partecipazioniModel->getPartecipazioniSingoloParam("id_edizione", "=", $edizione);
        $partecipazioniModel->getPartecipazioniSingoloParam("id_edizione", "=", $edizione);

        $query = "SELECT id_campionato, nome_campionato, nome_abbreviato, nome_ufficiale,
                    federazione, paese, organizzatore, titolo, cadenza, fondazione,
        
                    id_edizione, numero_edizione, nome_edizione, stagione_calcistica,
                    mese_apertura, mese_chiusura, numero_partecipanti, formula,
                    punti_a_vittoria, punti_a_pareggio, punti_a_sconfitta,
                    
                    S1.id_squadra AS id_squadra1, S1.nome_squadra_con_acronimo AS nome_squadra1_con_acronimo,
                    S1.nome_squadra_per_intero AS nome_squadra1_per_intero, S1.nome_squadra AS nome_squadra1, DAY(S1.data_fondazione) AS Squadra1_giorno_fondazione,
                    MONTH(S1.data_fondazione) AS Squadra1_mese_fondazione, YEAR(S1.data_fondazione) AS Squadra1_anno_fondazione,
                    S1.anno_fondazione AS anno_fondazione_squadra1, S1.citta AS citta_squadra1, S1.stemma_squadra AS stemma_squadra_squadra1, S1.stadio AS stadio_squadra1,
                    P1.punti_classifica AS punti_classifica_squadra1, P1.punteggio_elo AS punteggio_elo_squadra1,

                    S2.id_squadra AS id_squadra2, S2.nome_squadra_con_acronimo AS nome_squadra2_con_acronimo,
                    S2.nome_squadra_per_intero AS nome_squadra2_per_intero, S2.nome_squadra AS nome_squadra2, DAY(S2.data_fondazione) AS Squadra2_giorno_fondazione,
                    MONTH(S2.data_fondazione) AS Squadra2_mese_fondazione, YEAR(S2.data_fondazione) AS Squadra2_anno_fondazione,
                    S2.anno_fondazione AS anno_fondazione_squadra2, S2.citta AS citta_squadra2, S2.stemma_squadra AS stemma_squadra_squadra2, S2.stadio AS stadio_squadra2,
                    P2.punti_classifica AS punti_classifica_squadra2, P2.punteggio_elo AS punteggio_elo_squadra2,

                    I.id_incontro, I.numero_giornata, 
                    DAY(I.data_incontro) AS giorno_incontro, MONTH(I.data_incontro) AS mese_incontro, YEAR(I.data_incontro) AS anno_incontro, 
                    HOUR(I.ora_incontro) AS ore_incontro, MINUTE(I.ora_incontro) AS minuti_incontro, SECOND(I.ora_incontro) AS secondi_incontro, 
                    I.goal_casa, I.goal_trasferta
                    FROM CAMPIONATO C, EDIZIONE E, 
                    PARTECIPAZIONE P1, PARTECIPAZIONE P2, 
                    SQUADRA S1, SQUADRA S2, 
                    INCONTRO I
                    WHERE C.id_campionato = E.cod_campionato 
                    AND E.id_edizione = P1.cod_edizione AND E.id_edizione = P2.cod_edizione
                    AND P1.cod_squadra = S1.id_squadra AND P2.cod_squadra = S2.id_squadra 
                    AND I.squadra_casa = P1.cod_squadra AND I.cod_edizione_incontro = P1.cod_edizione
                    AND I.squadra_trasferta = P2.cod_squadra AND I.cod_edizione_incontro = P2.cod_edizione
                    AND id_edizione = :valore
                    ORDER BY numero_giornata ASC, data_incontro ASC, ora_incontro ASC, id_incontro ASC";
        $params = [':valore' => $edizione];
        $result = $this->database->executeQuery($query, $params);

        $incontri = [];
        foreach ($result as $row) {
            $campionato = new SingoloCampionatoModel($row['id_campionato'],$row['nome_campionato'],$row['nome_abbreviato'],$row['nome_ufficiale'],$row['federazione'],$row['paese'],$row['organizzatore'],$row['titolo'],$row['cadenza'],$row['fondazione']);
            $edizione_campionato = new SingolaEdizioneModel($row['id_edizione'],$campionato,$row['numero_edizione'],$row['nome_edizione'],$row['stagione_calcistica'],$row['mese_apertura'],$row['mese_chiusura'],$row['numero_partecipanti'],$row['formula'],$row['punti_a_vittoria']);
            $data_fondazione_squadra_casa = new Data($row['Squadra1_giorno_fondazione'],$row['Squadra1_mese_fondazione'],$row['Squadra1_anno_fondazione']);
            
            $squadra_casa = new SingolaSquadraModel($row['id_squadra1'],$row['nome_squadra1_con_acronimo'],$row['nome_squadra1_per_intero'],$row['nome_squadra1'],$data_fondazione_squadra_casa,$row['anno_fondazione_squadra1'],$row['citta_squadra1'],$row['stemma_squadra_squadra1'],$row['stadio_squadra1']);
            
            $data_fondazione_squadra_trasferta = new Data($row['Squadra2_giorno_fondazione'],$row['Squadra2_mese_fondazione'],$row['Squadra2_anno_fondazione']);
            
            $squadra_trasferta = new SingolaSquadraModel($row['id_squadra2'],$row['nome_squadra2_con_acronimo'],$row['nome_squadra2_per_intero'],$row['nome_squadra2'],$data_fondazione_squadra_trasferta,$row['anno_fondazione_squadra2'],$row['citta_squadra2'],$row['stemma_squadra_squadra2'],$row['stadio_squadra2']);
            
            $partecipazione_squadra_casa = new SingolaPartecipazioneSquadraEdizioneModel($edizione_campionato, $squadra_casa);
            $partecipazione_squadra_trasferta = new SingolaPartecipazioneSquadraEdizioneModel($edizione_campionato, $squadra_trasferta);            
            $data_incontro = new Data($row['giorno_incontro'],$row['mese_incontro'],$row['anno_incontro']);
            $ora_incontro = new Ora($row['ore_incontro'],$row['minuti_incontro'],$row['secondi_incontro']);
            
            $incontro = new SingoloIncontroModel($row['id_incontro'],$row['numero_giornata'],$data_incontro,$ora_incontro,$partecipazione_squadra_casa,$partecipazione_squadra_trasferta,$row['goal_casa'],$row['goal_trasferta']);
                
                //CALCOLO ELO INCONTRO DOPO INCONTRO
                //----------------------------------
                $squadraCasa = $partecipazioniModel->getSingolaSquadraIndice($incontro->getSquadraCasa()->getSquadra()->getId_Squadra());
                $squadraTrasferta = $partecipazioniModel->getSingolaSquadraIndice($incontro->getSquadraTrasferta()->getSquadra()->getId_Squadra());
                $incontro->getSquadraCasa()->setElo($squadraCasa->getElo());
                $incontro->getSquadraTrasferta()->setElo($squadraTrasferta->getElo());
                $incontro->calcola_punteggioElo();
                $incontro->calcola_punteggioClassifica();

                $partecipazioniModel->aggiornaEloSingolaSquadra($incontro->getSquadraCasa()->getSquadra()->getId_Squadra(), $incontro->getSquadraCasa()->getElo());
                $partecipazioniModel->aggiornaEloSingolaSquadra($incontro->getSquadraTrasferta()->getSquadra()->getId_Squadra(), $incontro->getSquadraTrasferta()->getElo());

                $partecipazioniModel->aggiornaExpectedEloSingolaSquadra($incontro->getSquadraCasa()->getSquadra()->getId_Squadra(), $incontro->getSquadraCasa()->getEloExpectedScore());
                $partecipazioniModel->aggiornaExpectedEloSingolaSquadra($incontro->getSquadraTrasferta()->getSquadra()->getId_Squadra(), $incontro->getSquadraTrasferta()->getEloExpectedScore());
                
                $partecipazioniModel->aggiornaPuntiClassificaSingolaSquadra($incontro->getSquadraCasa()->getSquadra()->getId_Squadra(), $incontro->getSquadraCasa()->getPuntiClassifica());
                $partecipazioniModel->aggiornaPuntiClassificaSingolaSquadra($incontro->getSquadraTrasferta()->getSquadra()->getId_Squadra(), $incontro->getSquadraTrasferta()->getPuntiClassifica());



                $squadraCasa = $partecipazioniModel->getSingolaSquadraIndice($incontro->getSquadraCasa()->getSquadra()->getId_Squadra());
                $squadraTrasferta = $partecipazioniModel->getSingolaSquadraIndice($incontro->getSquadraTrasferta()->getSquadra()->getId_Squadra());

                $incontro->getSquadraCasa()->setEloExpectedScore($squadraCasa->getEloExpectedScore());
                $incontro->getSquadraTrasferta()->setEloExpectedScore($squadraTrasferta->getEloExpectedScore());

                $incontro->getSquadraCasa()->setElo($squadraCasa->getElo());
                $incontro->getSquadraTrasferta()->setElo($squadraTrasferta->getElo());

                $incontro->getSquadraCasa()->setPuntiClassifica($squadraCasa->getPuntiClassifica());
                $incontro->getSquadraTrasferta()->setPuntiClassifica($squadraTrasferta->getPuntiClassifica());
                
            $incontri[] = $incontro;
        }

        return $incontri;
    }

    public function getSquadrePartecipantiSingolaEdizione($edizione) : array {
        $array_partecipazioni = $this->partecipazioniModel->getPartecipazioniSingoloParam("id_edizione", "=", $edizione);

        return $array_partecipazioni;
    }

    public function getOggettoSquadrePartecipantiSingolaEdizione($edizione) : PartecipazioniSquadraEdizioneModel {
        $this->partecipazioniModel->getPartecipazioniSingoloParam("id_edizione", "=", $edizione);
        return $this->partecipazioniModel;
    }
}
?>