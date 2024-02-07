<?php
include_once 'SingoloIncontroModel.php';

class SingoloIncontroView {
    public function visualizzaDettagliIncontro(SingoloIncontroModel $incontro) : void {
        // Utilizza i metodi dell'oggetto SingoloCampionato per accedere ai dati
        // echo "ID Incontro: ". $incontro->getIdIncontro();
        // echo ", Numero Giornata: ". $incontro->getNumeroGiornata();
        // echo ", Data Incontro: ". $incontro->getDataIncontro();
        // echo ", Orario Incontro: ". $incontro->getOraIncontro();
        echo ", Squadra Casa: ". $incontro->getSquadraCasa()->getSquadra()->getNome_squadra();
        echo ", Squadra Trasferta: ". $incontro->getSquadraTrasferta()->getSquadra()->getNome_squadra();
        echo ", Goal Squadra Casa: ". $incontro->getGoalCasa();
        echo ", Goal Squadra Trasferta: ". $incontro->getGoalTrasferta();
        echo "<br>";
        echo "Starting Home Elo = ". $incontro->getSquadraCasa()->getElo();
        echo " --- ";
        echo "Starting Away Elo = ". $incontro->getSquadraTrasferta()->getElo();
        echo "<br>";
        $incontro->calcola_punteggioElo();
        echo "Final Home Elo". $incontro->getSquadraCasa()->getElo();
        echo " --- ";
        echo "Final Away Elo". $incontro->getSquadraTrasferta()->getElo();
        $incontro->calcola_punteggioElo();
        echo "Final Home Elo". $incontro->getSquadraCasa()->getElo();
        echo " --- ";
        echo "Final Away Elo". $incontro->getSquadraTrasferta()->getElo();
        $incontro->calcola_punteggioElo();
        echo "Final Home Elo". $incontro->getSquadraCasa()->getElo();
        echo " --- ";
        echo "Final Away Elo". $incontro->getSquadraTrasferta()->getElo();

        echo "<br>";

        return;
    }
}
?>