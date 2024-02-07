<?php
include_once 'PartecipazioniSquadraEdizioneModel.php';

class PartecipazioniSquadraEdizioneView {
    public function visualizzaPartecipazioni(array $partecipazioni) : void {
        foreach ($partecipazioni as $partecipazione) {
            echo "Campionato: " . $partecipazione->getEdizione()->getModelCampionato()->getNomeAbbreviato();
            // $this->view_campionato->visualizzaDettagliCampionato($edizione_campionato->getModelCampionato());
            echo ", Stagione Edizione: " . $partecipazione->getEdizione()->getStagioneCalcistica();
            echo ", Nome Squadra: " . $partecipazione->getSquadra()->getNome_squadra();

            // echo ", Numero Edizione: " . $partecipazione->getNumeroEdizione();
            // echo ", Nome Edizione: " . $partecipazione->getNomeEdizione();
            // echo ", Stagione Calcistica: " . $partecipazione->getStagioneCalcistica();
            // echo ", Mese Apertura: " . $partecipazione->getMeseApertura();
            // echo ", Mese Chiusura: " . $partecipazione->getMeseChiusura();
            // echo ", Numero Squadre Partecipanti: " . $partecipazione->getNumeroPartecipanti();
            // echo ", Formula: " . $partecipazione->getFormula();
            // echo ", Punti A Vittoria: " . $partecipazione->getPuntiVittoria();
            // echo ", Punti A Pareggio: " . $partecipazione->getPuntiPareggio();
            // echo ", Punti A Sconfitta: " . $partecipazione->getPuntiSconfitta();
            echo "<br>";
        }

        return; 
    }
}
?>