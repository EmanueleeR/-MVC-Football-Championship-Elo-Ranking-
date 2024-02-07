<?php
include_once 'CampionatiModel.php';

class CampionatiView {
    public function visualizzaCampionati(array $campionati) : void {
        foreach ($campionati as $campionato) {
            echo "ID Campionato: " . $campionato->getIdCampionato();
            echo ", Nome Campionato: " . $campionato->getNomeCampionato();
            echo ", Nome Abbreviato: " . $campionato->getNomeAbbreviato();
            echo ", Nome Ufficiale: " . $campionato->getNomeUfficiale();
            echo ", Federazione: " . $campionato->getFederazione();
            echo ", Paese: " . $campionato->getPaese();
            echo ", Organizzatore Campionato: " . $campionato->getOrganizzatore();
            echo ", Titolo: " . $campionato->getTitolo();
            echo ", Cadenza: " . $campionato->getCadenza();
            echo ", Fondazione: " . $campionato->getFondazione();
            echo "<br>";
        }

        return; 
    }
}
?>