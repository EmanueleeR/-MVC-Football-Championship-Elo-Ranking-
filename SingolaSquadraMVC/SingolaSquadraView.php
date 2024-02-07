<?php
include_once 'SingolaSquadraModel.php';

class SingolaSquadraView {
    public function visualizzaDettagliSquadra(SingolaSquadraModel $squadra) : void{
        // Utilizza i metodi dell'oggetto SingolaSquadra per accedere ai dati
        echo "Nome Squadra: " . $squadra->getNome_squadra();
        echo ", Anno di fondazione: " . $squadra->getAnno_fondazione();
        echo ", Città: " . $squadra->getCitta();
        echo ", Stemma Squadra: " . $squadra->getStemma_squadra();
        echo ", Stadio: " . $squadra->getStadio();

        echo "<br>";

        return;
    }
}


?>