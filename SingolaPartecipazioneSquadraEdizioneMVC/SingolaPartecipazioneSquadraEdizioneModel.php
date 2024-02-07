<?php
include_once '../SingolaEdizioneMVC/SingolaEdizioneModel.php';
include_once '../SingolaSquadraMVC/SingolaSquadraModel.php';

class SingolaPartecipazioneSquadraEdizioneModel {
    private SingolaEdizioneModel $edizione;
    private SingolaSquadraModel $squadra;
    private int $punti_classifica = 0;
    private float $punteggio_elo;
    private float $expected_score_elo;

    public function __construct(SingolaEdizioneModel $e, SingolaSquadraModel $s, float $elo = 1400) {
        $this->edizione = $e;
        $this->squadra = $s;
        $this->punteggio_elo = $elo;
        $this->expected_score_elo = 0;
    }

    public function getEdizione() : SingolaEdizioneModel {
        return $this->edizione;
    }
    public function getSquadra() : SingolaSquadraModel {
        return $this->squadra;
    }
    public function getPuntiClassifica() : int {
        return $this->punti_classifica;
    }
    public function setPuntiClassifica(int $p) : void {
        $this->punti_classifica = $p;
    }
    public function getElo() : float {
        return $this->punteggio_elo;
    }
    public function setElo(float $elo) : void {
        $this->punteggio_elo = $elo;
    }

    public function getEloExpectedScore() : float {
        return $this->expected_score_elo;
    }

    public function setEloExpectedScore(float $expected_score) : void {
        $this->expected_score_elo = $expected_score;
    }

    public function aggiornaPuntiClassifica($nuoviPunti) : void {
        $this->punti_classifica += $nuoviPunti;
    }
}
?>