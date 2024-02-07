<?php
include_once 'SquadreModel.php';

class SquadreView {
    //qui rispetto alla singola squadra passiamo l'array
    //SquadreView mostra molteplici squadre, quindi è meglio passare solo l'array di squadre
    //diversamente da SingolaSquadraView
    public function visualizzaSquadre(array $squadre) : void {
        //$array_squadre = $squadre->getSquadre();
        foreach ($squadre as $squadra) {
            echo "Nome Squadra: " . $squadra->getNome_squadra();
            echo ", Anno di fondazione: " . $squadra->getAnno_fondazione();
            echo ", Città: " . $squadra->getCitta();
            echo ", Stemma Squadra: " . $squadra->getStemma_squadra();
            echo ", Stadio: " . $squadra->getStadio();
            echo "<br>";
        }

        return;
    }
}

?>