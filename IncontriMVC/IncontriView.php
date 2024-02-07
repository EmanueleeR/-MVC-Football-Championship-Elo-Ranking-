<?php
include_once 'IncontriModel.php';
class IncontriView {
    public function visualizzaIncontriInsertIntoSQL(array $incontri) : void {
        $decimal_rounding = 2;
        $i = 0;
        $output = "";
        
        //Verifica se l'array $incontri è vuoto
        if (empty($incontri)) {
            //Se è vuoto, esce dalla funzione
            echo "Campionato ed edizione non ancora implementati";
            return;
        }
        $output = $output . "INSERT INTO INCONTRO (
            numero_giornata, data_incontro, ora_incontro,
            cod_edizione_incontro,
            squadra_casa, squadra_trasferta,
            goal_casa, goal_trasferta)";
        $output = $output . "<br>";
        $singolo_incontro = $incontri[0];
        $numero_edizione = $singolo_incontro->getSquadraCasa()->getEdizione()->getNumeroEdizione();
        foreach ($incontri as $singolo_incontro) {
            $output = $output . "(" .
            $singolo_incontro->getIdIncontro() . ", " .
            $singolo_incontro->getNumeroGiornata() . ", " .
            $singolo_incontro->getDataIncontro()->print_DD_MM_AAAA_Date() . ", " .
            $singolo_incontro->getOraIncontro() . ", " .
            $numero_edizione . ", " .

            $singolo_incontro->getSquadraCasa()->getSquadra()->getId_Squadra() . ", " .
            $singolo_incontro->getSquadraTrasferta()->getSquadra()->getId_Squadra() . ", " .
            
            // $singolo_incontro->getSquadraCasa()->getSquadra()->getNome_squadra() . ", " .
            // $singolo_incontro->getSquadraTrasferta()->getSquadra()->getNome_squadra() . ", " .
            $singolo_incontro->getGoalCasa() . ", " .
            $singolo_incontro->getGoalTrasferta() . "),<br>";

            //VECCHIO MODO SENZA TABELLA
            //--------------------------------------------------------------------------------------
            // echo "" . $singolo_incontro->getIdIncontro();
            // echo "" . $singolo_incontro->getNumeroGiornata();
            // echo ", Data Incontro" . $singolo_incontro->getDataIncontro()->print_DD_MM_AAAA_Date();
            // //echo ", Data Incontro" . $singolo_incontro->getDataIncontro();
            // echo ", Ora Incontro" . $singolo_incontro->getOraIncontro();
            // echo ", Squadra Casa: " . $singolo_incontro->getSquadraCasa()->getSquadra()->getNome_squadra();
            // echo ", Squadra Trasferta; " . $singolo_incontro->getSquadraTrasferta()->getSquadra()->getNome_squadra();
            // echo ", Goal Casa: " . $singolo_incontro->getGoalCasa();
            // echo ", Goal Trasferta: " . $singolo_incontro->getGoalTrasferta();
            // // echo "Campionato: " . $singolo_incontro->getModelCampionato()->getNomeAbbreviato();
            // // // $this->view_campionato->visualizzaDettagliCampionato($singolo_incontro->getModelCampionato());
            // // echo ", ID Edizione: " . $singolo_incontro->getIdEdizione();
            // // echo ", Numero Edizione: " . $singolo_incontro->getNumeroEdizione();
            // // echo ", Nome Edizione: " . $singolo_incontro->getNomeEdizione();
            // // echo ", Stagione Calcistica: " . $singolo_incontro->getStagioneCalcistica();
            // // echo ", Mese Apertura: " . $singolo_incontro->getMeseApertura();
            // // echo ", Mese Chiusura: " . $singolo_incontro->getMeseChiusura();
            // // echo ", Numero Squadre Partecipanti: " . $singolo_incontro->getNumeroPartecipanti();
            // // echo ", Formula: " . $singolo_incontro->getFormula();
            // // echo ", Punti A Vittoria: " . $singolo_incontro->getPuntiVittoria();
            // // echo ", Punti A Pareggio: " . $singolo_incontro->getPuntiPareggio();
            // // echo ", Punti A Sconfitta: " . $singolo_incontro->getPuntiSconfitta();

            // echo "<br>";
            //--------------------------------------------------------------------------------------

            ++$i;
        }

        //$output = $output . "</tbody></table>";

        echo $output;

        return;
    }

    public function visualizzaIncontri(array $incontri) : void {
        $decimal_rounding = 2;
        $i = 0;
        $tabella = "";
    
        // Verifica se l'array $incontri è vuoto
        if (empty($incontri)) {
            // Se è vuoto, esce dalla funzione
            echo "Campionato ed edizione non ancora implementati";
            return;
        }

        $singolo_incontro = $incontri[0];
        
        $numero_edizione = $singolo_incontro->getSquadraCasa()->getEdizione()->getNumeroEdizione();
        foreach ($incontri as $singolo_incontro) {
            if( ($i % ($singolo_incontro->getSquadraCasa()->getEdizione()->getNumeroPartecipanti() / 2) == 0) && ($singolo_incontro->getNumeroGiornata() > 0) ){
                $tabella = $tabella . "<table><thead><tr><td>Numero Giornata</td><td>Data Incontro</td>
                <td>Squadra in Casa</td><td>Squadra in Trasferta</td><td>Goal Casa</td><td>Goal Trasferta</td>
                <td>Probabilità vittoria Squadra Casa</td><td>Probabilità vittoria Squadra Trasferta</td>
                <td>Punteggio ELO Squadra Casa</td><td>Punteggio ELO Squadra Trasferta</td>
                <td>Punti Classifica Squadra Casa</td><td>Punti Classifica Squadra Trasferta</td>".
                "</tr></thead><tbody>";
            }

            //STAMPO OGNI INCONTRO
            //if($singolo_incontro->getNumeroGiornata() < 10){
                $tabella = $tabella . "<tr>" . "<td>" . $singolo_incontro->getNumeroGiornata()
                . "</td>" . "<td>" . $singolo_incontro->getDataIncontro()->print_DD_MM_AAAA_Date() . "</td>" . "<td>"
                . $singolo_incontro->getSquadraCasa()->getSquadra()->getNome_squadra()
                . "</td>" . "<td>" . $singolo_incontro->getSquadraTrasferta()->getSquadra()->getNome_squadra()
                ."</td>" . "<td>" . $singolo_incontro->getGoalCasa() . "</td>" . "<td>"
                . $singolo_incontro->getGoalTrasferta() . "</td>";

                $tabella = $tabella . "<td>" .  round(($singolo_incontro->getSquadraCasa()->getEloExpectedScore() * 100), $decimal_rounding) . "%</td>" . "<td>" . round(($singolo_incontro->getSquadraTrasferta()->getEloExpectedScore() * 100), $decimal_rounding) . "%</td>";
                $tabella = $tabella . "<td>" .  round(($singolo_incontro->getSquadraCasa()->getElo()), $decimal_rounding) . "</td>" . "<td>" . round(($singolo_incontro->getSquadraTrasferta()->getElo()), $decimal_rounding) . "</td>";
                $tabella = $tabella . "<td>" .  $singolo_incontro->getSquadraCasa()->getPuntiClassifica() . "</td>" . "<td>" . $singolo_incontro->getSquadraTrasferta()->getPuntiClassifica() . "</td>";
            //}


            //VECCHIO MODO SENZA TABELLA
            //--------------------------------------------------------------------------------------
            // echo "" . $singolo_incontro->getIdIncontro();
            // echo "" . $singolo_incontro->getNumeroGiornata();
            // echo ", Data Incontro" . $singolo_incontro->getDataIncontro()->print_DD_MM_AAAA_Date();
            // //echo ", Data Incontro" . $singolo_incontro->getDataIncontro();
            // echo ", Ora Incontro" . $singolo_incontro->getOraIncontro();
            // echo ", Squadra Casa: " . $singolo_incontro->getSquadraCasa()->getSquadra()->getNome_squadra();
            // echo ", Squadra Trasferta; " . $singolo_incontro->getSquadraTrasferta()->getSquadra()->getNome_squadra();
            // echo ", Goal Casa: " . $singolo_incontro->getGoalCasa();
            // echo ", Goal Trasferta: " . $singolo_incontro->getGoalTrasferta();
            // // echo "Campionato: " . $singolo_incontro->getModelCampionato()->getNomeAbbreviato();
            // // // $this->view_campionato->visualizzaDettagliCampionato($singolo_incontro->getModelCampionato());
            // // echo ", ID Edizione: " . $singolo_incontro->getIdEdizione();
            // // echo ", Numero Edizione: " . $singolo_incontro->getNumeroEdizione();
            // // echo ", Nome Edizione: " . $singolo_incontro->getNomeEdizione();
            // // echo ", Stagione Calcistica: " . $singolo_incontro->getStagioneCalcistica();
            // // echo ", Mese Apertura: " . $singolo_incontro->getMeseApertura();
            // // echo ", Mese Chiusura: " . $singolo_incontro->getMeseChiusura();
            // // echo ", Numero Squadre Partecipanti: " . $singolo_incontro->getNumeroPartecipanti();
            // // echo ", Formula: " . $singolo_incontro->getFormula();
            // // echo ", Punti A Vittoria: " . $singolo_incontro->getPuntiVittoria();
            // // echo ", Punti A Pareggio: " . $singolo_incontro->getPuntiPareggio();
            // // echo ", Punti A Sconfitta: " . $singolo_incontro->getPuntiSconfitta();

            // echo "<br>";
            //--------------------------------------------------------------------------------------

            ++$i;
        }

        $tabella = $tabella . "</tbody></table>";

        echo $tabella;

        return;
    }

    public function visualizzaClassifica(array $partecipazioniModel){
        $decimal_rounding = 2;
        $tabella = "";
        $i = 0;

        // Verifica se l'array $incontri è vuoto
        if (empty($partecipazioniModel)) {
            // Se è vuoto, esce dalla funzione
            echo "Campionato ed edizione non ancora implementati";
            return;
        }
        
        $partecipazioniModel[0]->getEdizione()->getStagioneCalcistica();

        $tabella = $tabella . "<caption>" .
        $partecipazioniModel[0]->getEdizione()->getNomeEdizione() . " " .
        $partecipazioniModel[0]->getEdizione()->getStagioneCalcistica() .
        "</caption>";
        $tabella = $tabella . "<table><thead><tr><td>Squadra</td>
        <td>Punti classifica</td>
        <td>Punteggio ELO</td>
        </thead><tbody>";

        foreach ($partecipazioniModel as $singola_squadra) {
            $tabella = $tabella . "<tr>" . "<td>" . $singola_squadra->getSquadra()->getNome_squadra()
            . "</td>" . "<td>" . $singola_squadra->getPuntiClassifica() . "</td>"
            . "<td>" . round(($singola_squadra->getElo()), $decimal_rounding) . "</td>" . "</tr>";
        }
        
        $tabella = $tabella . "</tbody></table>";

        echo $tabella;

        return;
    }

}
?>