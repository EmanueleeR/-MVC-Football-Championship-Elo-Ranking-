<?php
class Database{
    private $PDOconnection;
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbname = "";
    //private $dbname = "mondo_freestyle";

    public function __construct($databasename){
    //parametro al costruttore per scegliere il database al quale connettersi
        $this->dbname = $databasename;
        $dsn = "mysql:host=".$this->host.";dbname=".$databasename;

        try {
            $this->PDOconnection = new PDO($dsn,$this->user,$this->password);
            $this->PDOconnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->PDOconnection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }
        catch(PDOException $e) {
            die("Errore di connessione al database: " . $e->getMessage());
        }
    }

    public function executeQuery($sql, $params = []) { //params array associativo
        //$q = "SELECT * FROM FREESTYLER";
        try {
            $statement = $this->PDOconnection->prepare($sql);
            $statement->execute($params);

            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Errore nell'esecuzione della query: " . $e->getMessage());
        }
    }

    // Altri metodi per eseguire query, inserire dati, aggiornare dati, ecc.
}

//PROVA CLASSE
/*

while($row = $freestylers->fetch()){
    echo $row['nome']."<br>";
}

foreach($freestylers as $freestyler){
    echo $freestyler['nome']."<br>";
}*/

?>