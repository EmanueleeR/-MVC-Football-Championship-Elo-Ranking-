<?php
include_once '../ClassiGenerali/Database.php';

class PartecipazioniSquadraEdizioneModel {
    private Database $database;
    private const DATABASE_NAME = "mondo_calcio";
    private $partecipazioni = [];
    public function __construct() {
        $this->database = new Database(self::DATABASE_NAME);
    }

    public function getArrayPartecipazioni() : array {
        return $this->partecipazioni;
    }

    public function getPartecipazioni() : array {
        $query = "SELECT id_campionato, nome_campionato, nome_abbreviato, nome_ufficiale,
                  federazione, paese, organizzatore, titolo, cadenza, fondazione,
        
                  id_edizione, numero_edizione, nome_edizione, stagione_calcistica,
                  mese_apertura, mese_chiusura, numero_partecipanti, formula,
                  punti_a_vittoria, punti_a_pareggio, punti_a_sconfitta,
                  
                  id_squadra, nome_squadra_con_acronimo,
                  nome_squadra_per_intero, nome_squadra, DAY(data_fondazione) AS giorno,
                  MONTH(data_fondazione) AS mese, YEAR(data_fondazione) AS anno,
                  anno_fondazione, citta, stemma_squadra, stadio,

                  punti_classifica, punteggio_elo
                  FROM CAMPIONATO C, EDIZIONE E, PARTECIPAZIONE P, SQUADRA S
                  WHERE C.id_campionato = E.cod_campionato AND E.id_edizione = P.cod_edizione
                  AND P.cod_squadra = S.id_squadra
                  ORDER BY id_campionato ASC, numero_edizione ASC, nome_squadra ASC";
        $result = $this->database->executeQuery($query);

        $this->partecipazioni = [];
        foreach ($result as $row) {
            $campionato = new SingoloCampionatoModel($row['id_campionato'],$row['nome_campionato'],$row['nome_abbreviato'],$row['nome_ufficiale'],$row['federazione'],$row['paese'],$row['organizzatore'],$row['titolo'],$row['cadenza'],$row['fondazione']);
            $edizione_campionato = new SingolaEdizioneModel($row['id_edizione'],$campionato,$row['numero_edizione'],$row['nome_edizione'],$row['stagione_calcistica'],$row['mese_apertura'],$row['mese_chiusura'],$row['numero_partecipanti'],$row['formula'],$row['punti_a_vittoria']);
            $data_fondazione = new Data($row['giorno'],$row['mese'],$row['anno']);
            $squadra = new SingolaSquadraModel($row['id_squadra'],$row['nome_squadra_con_acronimo'],$row['nome_squadra_per_intero'],$row['nome_squadra'],$data_fondazione,$row['anno_fondazione'],$row['citta'],$row['stemma_squadra'],$row['stadio']);
            //$partecipazione = new SingolaPartecipazioneSquadra();
            $partecipazione = new SingolaPartecipazioneSquadraEdizioneModel($edizione_campionato, $squadra);

            
            //$partecipazioni[] = $partecipazione;
            $this->partecipazioni[$squadra->getId_Squadra()] = $partecipazione;
        }

        return $this->partecipazioni;
    }

    public function getPartecipazioniSingoloParam(string $attributo, string $operatore_paragone, mixed $param) : array {
    //public function getPartecipazioniSingoloParam(string $attributo, string $operatore_paragone, mixed $param) : void {
        $colonne_valide = array("id_campionato", "nome_campionato", "nome_abbreviato", "nome_ufficiale",
        "federazione", "paese", "organizzatore", "titolo", "cadenza", "fondazione",
        "id_edizione", "numero_edizione", "nome_edizione", "stagione_calcistica",
        "mese_apertura", "mese_chiusura", "numero_partecipanti", "formula",
        "punti_a_vittoria", "punti_a_pareggio", "punti_a_sconfitta",
        "id_squadra", "nome_squadra_con_acronimo",
        "nome_squadra_per_intero", "nome_squadra", "data_fondazione",
        "anno_fondazione", "citta", "stemma_squadra", "stadio",
        "punti_classifica", "punteggio_elo");

        $operatori_validi = array("=", ">", "<", ">=", "<=", "<>");

        //Verifica se l'operatore è valido
        if (!in_array($attributo, $colonne_valide)) {
            throw new InvalidArgumentException("Attributo non valido per la query.");
        }

        //Verifica se l'operatore è valido
        if (!in_array($operatore_paragone, $operatori_validi)) {
            throw new InvalidArgumentException("Operatore non valido per la query.");
        }

        $query = "SELECT id_campionato, nome_campionato, nome_abbreviato, nome_ufficiale,
                  federazione, paese, organizzatore, titolo, cadenza, fondazione,

                  id_edizione, numero_edizione, nome_edizione, stagione_calcistica,
                  mese_apertura, mese_chiusura, numero_partecipanti, formula,
                  punti_a_vittoria, punti_a_pareggio, punti_a_sconfitta,
                
                  id_squadra, nome_squadra_con_acronimo,
                  nome_squadra_per_intero, nome_squadra, DAY(data_fondazione) AS giorno,
                  MONTH(data_fondazione) AS mese, YEAR(data_fondazione) AS anno,
                  anno_fondazione, citta, stemma_squadra, stadio,

                  punti_classifica, punteggio_elo
                  FROM CAMPIONATO C, EDIZIONE E, PARTECIPAZIONE P, SQUADRA S
                  WHERE C.id_campionato = E.cod_campionato AND E.id_edizione = P.cod_edizione
                  AND P.cod_squadra = S.id_squadra AND "
                  . $attributo . " " . $operatore_paragone . " :" . $attributo . "
                  ORDER BY id_campionato ASC, numero_edizione ASC, nome_squadra ASC";

        $key = ":" . $attributo;
        $parametri = [$key => $param];

        $result = $this->database->executeQuery($query, $parametri);
        
        $this->partecipazioni = [];
        foreach ($result as $row) {
            $campionato = new SingoloCampionatoModel($row['id_campionato'],$row['nome_campionato'],$row['nome_abbreviato'],$row['nome_ufficiale'],$row['federazione'],$row['paese'],$row['organizzatore'],$row['titolo'],$row['cadenza'],$row['fondazione']);
            $edizione_campionato = new SingolaEdizioneModel($row['id_edizione'],$campionato,$row['numero_edizione'],$row['nome_edizione'],$row['stagione_calcistica'],$row['mese_apertura'],$row['mese_chiusura'],$row['numero_partecipanti'],$row['formula'],$row['punti_a_vittoria']);
            $data_fondazione = new Data($row['giorno'],$row['mese'],$row['anno']);
            $squadra = new SingolaSquadraModel($row['id_squadra'],$row['nome_squadra_con_acronimo'],$row['nome_squadra_per_intero'],$row['nome_squadra'],$data_fondazione,$row['anno_fondazione'],$row['citta'],$row['stemma_squadra'],$row['stadio']);
            //$partecipazione = new SingolaPartecipazioneSquadra();
            $partecipazione = new SingolaPartecipazioneSquadraEdizioneModel($edizione_campionato, $squadra);

            
            //$partecipazioni[] = $partecipazione;
            $this->partecipazioni[$squadra->getId_Squadra()] = $partecipazione;
        }

        return $this->partecipazioni;
        //return;
    }

    public function aggiornaEloSingolaSquadra(int $id_squadra, float $elo) : void {
        $this->partecipazioni[$id_squadra]->setElo($elo);
        return;
    }

    public function aggiornaExpectedEloSingolaSquadra(int $id_squadra, float $expected_elo) : void {
        $this->partecipazioni[$id_squadra]->setEloExpectedScore($expected_elo);
        return;
    }

    public function aggiornaPuntiClassificaSingolaSquadra(int $id_squadra, float $punti_classifica) : void {
        //$this->partecipazioni[$id_squadra]->setPuntiClassifica($this->partecipazioni[$id_squadra]->getEloExpectedScore() + $punti_classifica);
        $this->partecipazioni[$id_squadra]->aggiornaPuntiClassifica($punti_classifica);
        return;
    }
    
    public function getSingolaSquadraIndice(int $id_squadra) : SingolaPartecipazioneSquadraEdizioneModel {
        return $this->partecipazioni[$id_squadra];
    }


    //public function getSingolaSquadra(SingolaPartecipazioneSquadraEdizioneModel $squadra_partecipazione, array $partecipazioni) : SingolaPartecipazioneSquadraEdizioneModel {
    public function getSingolaSquadra(SingolaPartecipazioneSquadraEdizioneModel $squadra_partecipazione, array $partecipazioni) : int {
        $left = 0;
        $right = count($partecipazioni) - 1;
    
        while ($left <= $right) {
            $mid = $left + floor(($right - $left) / 2);
    
            if ($partecipazioni[$mid]->getSquadra() == $squadra_partecipazione) {
                //return $partecipazioni[$mid]->getSquadra();
                return $mid;
            }
    
            if ($squadra_partecipazione < $partecipazioni[$mid]->getSquadra()->getId()) {
                $right = $mid - 1;
            } else {
                $left = $mid + 1;
            }
        }
    
        return -1; // Squadra non trovata
    }    
}
?>