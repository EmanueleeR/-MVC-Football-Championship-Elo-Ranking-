<?php
include_once '../ClassiGenerali/Database.php';
include_once '../SingoloCampionatoMVC/SingoloCampionatoModel.php';

class CampionatiModel {
    private Database $database;
    private const DATABASE_NAME = "mondo_calcio";

    public function __construct() {
        $this->database = new Database(self::DATABASE_NAME);
    }

    public function getCampionati() : array {
        $query = "SELECT id_campionato, nome_campionato, nome_abbreviato, nome_ufficiale,
                  federazione, paese, organizzatore, titolo, cadenza, fondazione
                  FROM CAMPIONATO
                  ORDER BY id_campionato ASC";
        $result = $this->database->executeQuery($query);

        $campionati = [];
        foreach ($result as $row) {
            $campionato = new SingoloCampionatoModel($row['id_campionato'],$row['nome_campionato'],$row['nome_abbreviato'],$row['nome_ufficiale'],$row['federazione'],$row['paese'],$row['organizzatore'],$row['titolo'],$row['cadenza'],$row['fondazione']);
            $campionati[] = $campionato;
        }

        return $campionati;
    }

    public function getCampionatiArrayAssociativo() : array {
        $query = "SELECT id_campionato, nome_campionato, nome_abbreviato, nome_ufficiale,
        federazione, paese, organizzatore, titolo, cadenza, fondazione
        FROM CAMPIONATO
        ORDER BY id_campionato ASC";
        $result = $this->database->executeQuery($query);

        foreach ($result as $row) {
            $campionatoAssociativo = array(
                'id_campionato' => $row['id_campionato'], 'nome_campionato' => $row['nome_campionato']/*,
                'nome_abbreviato' => $row['nome_abbreviato'], 'nome_ufficiale' => $row['nome_ufficiale'],
                'federazione' => $row['federazione'], 'paese' => $row['paese'],
                'organizzatore' => $row['organizzatore'], 'titolo' => $row['titolo'],
                'cadenza' => $row['cadenza'], 'fondazione' => $row['fondazione']*/
            );

            $campionatiAssociativo[] = $campionatoAssociativo;
        }

        return $campionatiAssociativo;
    }

    public function getCampionatoSingoloParam(string $attributo, string $operatore_paragone, mixed $param) : array {
        $colonne_valide = array("id_campionato", "nome_campionato", "nome_abbreviato", "nome_ufficiale",
        "federazione", "paese", "organizzatore", "titolo", "cadenza", "fondazione");
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
                  federazione, paese, organizzatore, titolo, cadenza, fondazione
                  FROM CAMPIONATO WHERE " . $attributo . " " . $operatore_paragone . " :" . $attributo . "
                  ORDER BY id_campionato ASC";

        $key = ":" . $attributo;
        $parametri = [$key => $param];

        $result = $this->database->executeQuery($query, $parametri);
        
        $campionati = [];
        foreach ($result as $row) {
            $campionato = new SingoloCampionatoModel($row['id_campionato'],$row['nome_campionato'],$row['nome_abbreviato'],$row['nome_ufficiale'],$row['federazione'],$row['paese'],$row['organizzatore'],$row['titolo'],$row['cadenza'],$row['fondazione']);
            $campionati[] = $campionato;
        }

        return $campionati;
    }
}
?>