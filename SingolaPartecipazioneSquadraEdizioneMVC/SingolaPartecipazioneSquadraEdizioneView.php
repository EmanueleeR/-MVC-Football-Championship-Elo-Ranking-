<?php
include_once 'SingolaPartecipazioneSquadraEdizioneModel.php';

class SingolaPartecipazioneSquadraEdizioneView {
    public function visualizzaDettagliPartecipazioneSquadraEdizione(SingolaPartecipazioneSquadraEdizioneModel $partecipazione_squadra_edizione) : void {
        echo "Campionato: " . $partecipazione_squadra_edizione->getEdizione()->getModelCampionato()->getNomeAbbreviato();
        // $this->view_campionato->visualizzaDettagliCampionato($edizione->getModelCampionato());
        echo ", ID Edizione: " . $partecipazione_squadra_edizione->getEdizione()->getIdEdizione();
        echo ", Numero Edizione: " . $partecipazione_squadra_edizione->getEdizione()->getNumeroEdizione();
        echo ", Nome Edizione: " . $partecipazione_squadra_edizione->getEdizione()->getNomeEdizione();
        echo ", Stagione Calcistica: " . $partecipazione_squadra_edizione->getEdizione()->getStagioneCalcistica();
        echo ", Mese Apertura: " . $partecipazione_squadra_edizione->getEdizione()->getMeseApertura();
        echo ", Mese Chiusura: " . $partecipazione_squadra_edizione->getEdizione()->getMeseChiusura();
        echo ", Numero Squadre Partecipanti: " . $partecipazione_squadra_edizione->getEdizione()->getNumeroPartecipanti();
        echo ", Formula: " . $partecipazione_squadra_edizione->getEdizione()->getFormula();
        echo ", Punti A Vittoria: " . $partecipazione_squadra_edizione->getEdizione()->getPuntiVittoria();
        echo ", Punti A Pareggio: " . $partecipazione_squadra_edizione->getEdizione()->getPuntiPareggio();
        echo ", Punti A Sconfitta: " . $partecipazione_squadra_edizione->getEdizione()->getPuntiSconfitta();

        echo ", Nome Squadra: " . $partecipazione_squadra_edizione->getSquadra()->getNome_squadra();
        echo ", Anno di fondazione: " . $partecipazione_squadra_edizione->getSquadra()->getAnno_fondazione();
        echo ", Città: " . $partecipazione_squadra_edizione->getSquadra()->getCitta();
        echo ", Stemma Squadra: " . $partecipazione_squadra_edizione->getSquadra()->getStemma_squadra();
        echo ", Stadio: " . $partecipazione_squadra_edizione->getSquadra()->getStadio();

        echo "<br>";
        return;
    }
}
?>