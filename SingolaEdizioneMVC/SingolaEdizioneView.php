<?php
include_once 'SingolaEdizioneModel.php';

include_once '../SingoloCampionatoMVC/SingoloCampionatoView.php';


class SingolaEdizioneView {
    // private SingoloCampionatoView $view_campionato;

    public function visualizzaDettagliEdizione(SingolaEdizioneModel $edizione) : void {
        // $this->view_campionato = new SingoloCampionatoView();

        echo "Campionato: " . $edizione->getModelCampionato()->getNomeAbbreviato();
        // $this->view_campionato->visualizzaDettagliCampionato($edizione->getModelCampionato());
        echo ", ID Edizione: " . $edizione->getIdEdizione();
        echo ", Numero Edizione: " . $edizione->getNumeroEdizione();
        echo ", Nome Edizione: " . $edizione->getNomeEdizione();
        echo ", Stagione Calcistica: " . $edizione->getStagioneCalcistica();
        echo ", Mese Apertura: " . $edizione->getMeseApertura();
        echo ", Mese Chiusura: " . $edizione->getMeseChiusura();
        echo ", Numero Squadre Partecipanti: " . $edizione->getNumeroPartecipanti();
        echo ", Formula: " . $edizione->getFormula();
        echo ", Punti A Vittoria: " . $edizione->getPuntiVittoria();
        echo ", Punti A Pareggio: " . $edizione->getPuntiPareggio();
        echo ", Punti A Sconfitta: " . $edizione->getPuntiSconfitta();

        echo "<br>";
        return;
    }
}
?>