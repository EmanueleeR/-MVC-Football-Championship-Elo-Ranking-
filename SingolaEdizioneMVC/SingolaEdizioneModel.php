<?php
include_once '../SingoloCampionatoMVC/SingoloCampionatoModel.php';

class SingolaEdizioneModel {
    private int $id_edizione;
    private SingoloCampionatoModel $model_campionato;
    private int $numero_edizione;
    private string $nome_edizione;
    private string $stagione_calcistica;
    private string $mese_apertura;
    private string $mese_chiusura;
    private int $numero_partecipanti;
    private string $formula;
    private int $punti_a_vittoria;
    private int $punti_a_pareggio = 1;
    private int $punti_a_sconfitta = 0;

    public function __construct(int $id_e, SingoloCampionatoModel $model_camp, int $num_e, string $nom_e, string $s_c, string $m_a, string $m_c, int $n_p, string $formula, int $p_a_v = NULL){//}, int $p_a_p = 1, int $p_a_s = 0){
        $this->id_edizione = $id_e;
        $this->model_campionato = $model_camp;
        $this->numero_edizione = $num_e;
        $this->nome_edizione = $nom_e;
        $this->stagione_calcistica = $s_c;
        $this->mese_apertura = $m_a;
        $this->mese_chiusura = $m_c;
        $this->numero_partecipanti = $n_p;
        $this->formula = $formula;
        $this->punti_a_vittoria = $p_a_v ?? 0;
        // $this->punti_a_pareggio = $p_a_p;
        // $this->punti_a_sconfitta = $p_a_s;
    }


    public function getIdEdizione() : int {
        return $this->id_edizione;
    }
    public function getModelCampionato() : SingoloCampionatoModel {
        return $this->model_campionato;
    }
    public function getNumeroEdizione() : int {
        return $this->numero_edizione;
    }
    public function getNomeEdizione() : string {
        return $this->nome_edizione;
    }
    public function getStagioneCalcistica() : string {
        return $this->stagione_calcistica;
    }
    public function getMeseApertura() : string {
        return $this->mese_apertura;
    }
    public function getMeseChiusura() : string {
        return $this->mese_chiusura;
    }
    public function getNumeroPartecipanti() : int {
        return $this->numero_partecipanti;
    }
    public function getFormula() : string {
        return $this->formula;
    }
    public function getPuntiVittoria() : int {
        return $this->punti_a_vittoria;
    }
    public function getPuntiPareggio() : int {
        return $this->punti_a_pareggio;
    }
    public function getPuntiSconfitta() : int {
        return $this->punti_a_sconfitta;
    }


}
?>