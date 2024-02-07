<?php
include_once 'EdizioniModel.php';
class EdizioniView {
    public function visualizzaEdizioni(array $edizioni) : void {
        foreach ($edizioni as $edizione_campionato) {
            echo "Campionato: " . $edizione_campionato->getModelCampionato()->getNomeAbbreviato();
            // $this->view_campionato->visualizzaDettagliCampionato($edizione_campionato->getModelCampionato());
            echo ", ID Edizione: " . $edizione_campionato->getIdEdizione();
            echo ", Numero Edizione: " . $edizione_campionato->getNumeroEdizione();
            echo ", Nome Edizione: " . $edizione_campionato->getNomeEdizione();
            echo ", Stagione Calcistica: " . $edizione_campionato->getStagioneCalcistica();
            echo ", Mese Apertura: " . $edizione_campionato->getMeseApertura();
            echo ", Mese Chiusura: " . $edizione_campionato->getMeseChiusura();
            echo ", Numero Squadre Partecipanti: " . $edizione_campionato->getNumeroPartecipanti();
            echo ", Formula: " . $edizione_campionato->getFormula();
            echo ", Punti A Vittoria: " . $edizione_campionato->getPuntiVittoria();
            echo ", Punti A Pareggio: " . $edizione_campionato->getPuntiPareggio();
            echo ", Punti A Sconfitta: " . $edizione_campionato->getPuntiSconfitta();

            echo "<br>";
        }

        return; 
    }

}
?>