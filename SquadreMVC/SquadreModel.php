<?php
include_once '../ClassiGenerali/Database.php';
include_once '../ClassiGenerali/Data.php';
include_once '../SingolaSquadraMVC/SingolaSquadraModel.php';

class SquadreModel {
    private Database $database;

    public function __construct($database_name) {
        $this->database = new Database($database_name);
    }

    public function getSquadre() : array {
        $query = "SELECT id_squadra, nome_squadra_con_acronimo,
                  nome_squadra_per_intero, nome_squadra, DAY(data_fondazione) AS giorno,
                  MONTH(data_fondazione) AS mese, YEAR(data_fondazione) AS anno,
                  anno_fondazione, citta, stemma_squadra, stadio
                  FROM SQUADRA
                  ORDER BY id_squadra ASC";
        $result = $this->database->executeQuery($query);

        $squadre = [];
        foreach ($result as $row) {
            $data_fondazione = new Data($row['giorno'],$row['mese'],$row['anno']);
            $squadra = new SingolaSquadraModel($row['id_squadra'],$row['nome_squadra_con_acronimo'],$row['nome_squadra_per_intero'],$row['nome_squadra'],$data_fondazione,$row['anno_fondazione'],$row['citta'],$row['stemma_squadra'],$row['stadio']);
            $squadre[] = $squadra;
        }

        return $squadre;
    }

    public function getSquadraSingoloParam(string $attributo, mixed $param) : array {
        $colonne_valide = array("id_squadra", "nome_squadra_con_acronimo", "nome_squadra_per_intero", 
        "nome_squadra", "data_fondazione", "anno_fondazione", "citta", "stemma_squadra", "stadio");

        if (!in_array($attributo, $colonne_valide)) {
            throw new InvalidArgumentException("Attributo non valido per la query.");
        }

        $query = "SELECT id_squadra, nome_squadra_con_acronimo,
        nome_squadra_per_intero, nome_squadra, DAY(data_fondazione) AS giorno,
        MONTH(data_fondazione) AS mese, YEAR(data_fondazione) AS anno,
        anno_fondazione, citta, stemma_squadra, stadio
        FROM SQUADRA WHERE " . $attributo . " = :" . $attributo . "
        ORDER BY id_squadra";

        $key = ":" . $attributo;
        $parametri = [$key => $param];

        $result = $this->database->executeQuery($query, $parametri);
        
        $squadre = [];
        foreach ($result as $row) {
            $data_fondazione = new Data($row['giorno'],$row['mese'],$row['anno']);
            $squadra = new SingolaSquadraModel($row['id_squadra'],$row['nome_squadra_con_acronimo'],$row['nome_squadra_per_intero'],$row['nome_squadra'],$data_fondazione,$row['anno_fondazione'],$row['citta'],$row['stemma_squadra'],$row['stadio']);
            $squadre[] = $squadra;
        }

        return $squadre;
    }
}

?>