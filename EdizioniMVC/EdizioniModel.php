<?php
include_once '../ClassiGenerali/Database.php';
include_once '../SingoloCampionatoMVC/SingoloCampionatoModel.php';
include_once '../SingolaEdizioneMVC/SingolaEdizioneModel.php';
class EdizioniModel {
    private Database $database;
    private const DATABASE_NAME = "mondo_calcio";

    public function __construct() {
        $this->database = new Database(self::DATABASE_NAME);
    }

    public function getEdizioni() : array {
        $query = "SELECT id_campionato, nome_campionato, nome_abbreviato, nome_ufficiale,
                  federazione, paese, organizzatore, titolo, cadenza, fondazione,
                  
                  id_edizione, numero_edizione, nome_edizione, stagione_calcistica,
                  mese_apertura, mese_chiusura, numero_partecipanti, formula,
                  punti_a_vittoria, punti_a_pareggio, punti_a_sconfitta
                  FROM CAMPIONATO C, EDIZIONE E
                  WHERE C.id_campionato = E.cod_campionato
                  ORDER BY id_campionato ASC, numero_edizione ASC";
        $result = $this->database->executeQuery($query);

        $edizioni_campionati = [];
        foreach ($result as $row) {
            $campionato = new SingoloCampionatoModel($row['id_campionato'],$row['nome_campionato'],$row['nome_abbreviato'],$row['nome_ufficiale'],$row['federazione'],$row['paese'],$row['organizzatore'],$row['titolo'],$row['cadenza'],$row['fondazione']);
            $edizione_campionato = new SingolaEdizioneModel($row['id_edizione'],$campionato,$row['numero_edizione'],$row['nome_edizione'],$row['stagione_calcistica'],$row['mese_apertura'],$row['mese_chiusura'],$row['numero_partecipanti'],$row['formula'],$row['punti_a_vittoria']);
            $edizioni_campionati[] = $edizione_campionato;
        }

        return $edizioni_campionati;
    }

    public function getEdizioniArrayAssociativo() : array {
        $query = "SELECT id_campionato, nome_campionato, nome_abbreviato, nome_ufficiale,
                  federazione, paese, organizzatore, titolo, cadenza, fondazione,
                  
                  id_edizione, numero_edizione, nome_edizione, stagione_calcistica,
                  mese_apertura, mese_chiusura, numero_partecipanti, formula,
                  punti_a_vittoria, punti_a_pareggio, punti_a_sconfitta
                  FROM CAMPIONATO C, EDIZIONE E
                  WHERE C.id_campionato = E.cod_campionato
                  ORDER BY id_campionato ASC, numero_edizione ASC";
        $result = $this->database->executeQuery($query);


        foreach ($result as $row) {
            $edizioneAssociativo = array(
                'id_edizione' => $row['id_edizione'], 'nome_edizione' => $row['nome_edizione'],
                'stagione_calcistica' => $row['stagione_calcistica']
            );

            $edizioniAssociativo[] = $edizioneAssociativo;
        }

        return $edizioniAssociativo;
    }

    public function getEdizioneSingoloParam(string $attributo, string $operatore_paragone, mixed $param) : array {
        $colonne_valide = array("id_campionato", "nome_campionato", "nome_abbreviato", "nome_ufficiale",
        "federazione", "paese", "organizzatore", "titolo", "cadenza", "fondazione",
        "id_edizione", "numero_edizione", "nome_edizione", "stagione_calcistica",
        "mese_apertura", "mese_chiusura", "numero_partecipanti", "formula",
        "punti_a_vittoria", "punti_a_pareggio", "punti_a_sconfitta");
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
                  punti_a_vittoria, punti_a_pareggio, punti_a_sconfitta
                  FROM CAMPIONATO C, EDIZIONE E
                  WHERE C.id_campionato = E.cod_campionato"
                  . $attributo . " " . $operatore_paragone . " :" . $attributo . "
                  ORDER BY id_campionato ASC, numero_edizione ASC";

        $key = ":" . $attributo;
        $parametri = [$key => $param];

        $result = $this->database->executeQuery($query, $parametri);
        
        $edizioni_campionati = [];
        foreach ($result as $row) {
            $campionato = new SingoloCampionatoModel($row['id_campionato'],$row['nome_campionato'],$row['nome_abbreviato'],$row['nome_ufficiale'],$row['federazione'],$row['paese'],$row['organizzatore'],$row['titolo'],$row['cadenza'],$row['fondazione']);
            $edizione_campionato = new SingolaEdizioneModel($row['id_edizione'],$campionato,$row['numero_edizione'],$row['nome_edizione'],$row['stagione_calcistica'],$row['mese_apertura'],$row['mese_chiusura'],$row['numero_partecipanti'],$row['formula'],$row['punti_a_vittoria']);
            $edizioni_campionati[] = $edizione_campionato;
        }

        return $edizioni_campionati;
    }

    public function getEdizioneArrayAssociativoSingoloParam(string $attributo, string $operatore_paragone, mixed $param) : array {
        $colonne_valide = array("id_campionato", "nome_campionato", "nome_abbreviato", "nome_ufficiale",
        "federazione", "paese", "organizzatore", "titolo", "cadenza", "fondazione",
        "id_edizione", "numero_edizione", "nome_edizione", "stagione_calcistica",
        "mese_apertura", "mese_chiusura", "numero_partecipanti", "formula",
        "punti_a_vittoria", "punti_a_pareggio", "punti_a_sconfitta");
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
                  punti_a_vittoria, punti_a_pareggio, punti_a_sconfitta
                  FROM CAMPIONATO C, EDIZIONE E
                  WHERE C.id_campionato = E.cod_campionato AND "
                  . $attributo . " " . $operatore_paragone . " :" . $attributo . "
                  ORDER BY id_campionato ASC, numero_edizione ASC";

        $key = ":" . $attributo;
        $parametri = [$key => $param];

        $result = $this->database->executeQuery($query, $parametri);
        
        $edizioniAssociativo = [];
        foreach ($result as $row) {
            $edizioneAssociativo = array(
                'id_edizione' => $row['id_edizione'], 'nome_edizione' => $row['nome_edizione'],
                'stagione_calcistica' => $row['stagione_calcistica']
            );

            $edizioniAssociativo[] = $edizioneAssociativo;
        }

        return $edizioniAssociativo;
    }
}
?>