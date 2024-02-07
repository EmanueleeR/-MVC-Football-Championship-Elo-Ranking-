<?php
include_once 'SingoloCampionatoModel.php';

class SingoloCampionatoView {
    public function visualizzaDettagliCampionato(SingoloCampionatoModel $campionato) : void {
        // Utilizza i metodi dell'oggetto SingoloCampionato per accedere ai dati
        echo "ID Campionato:". $campionato->getIdCampionato();
        echo ", Nome Campionato:". $campionato->getNomeCampionato();
        echo ", Nome Abbreviato Campionato:". $campionato->getNomeAbbreviato();
        echo ", Nome Ufficiale Campionato:". $campionato->getNomeUfficiale();
        echo ", Nome Federazione:". $campionato->getFederazione();
        echo ", Nome Paese:". $campionato->getPaese();
        echo ", Nome Organizzatore:". $campionato->getOrganizzatore();
        echo ", Nome Titolo:". $campionato->getTitolo();
        echo ", Nome Cadenza:". $campionato->getCadenza();
        echo ", Nome Fondazione:". $campionato->getFondazione();

        echo "<br>";

        return;
    }
}
?>