<?php
include_once '../ClassiGenerali/Data.php';

class SingolaSquadraModel {
    private int $id_squadra;
    private string $nome_squadra_con_acronimo; //DEFAULT NULL
    private string $nome_squadra_per_intero; //DEFAULT NULL
    private string $nome_squadra;
    private Data $data_fondazione; //DEFAULT NULL
    private int $anno_fondazione;
    private string $citta;
    private string $stemma_squadra;
    private string $stadio;

    public function __construct(){//Costruttore per simulare overloading
        $numArgs = func_num_args() ;
        $args = func_get_args() ;
        call_user_func_array( array(&$this, '__construct'.$numArgs), $args ) ;
    }

    public function __construct0(){//Costruttore senza parametri
        //ctor
        $this->id_squadra = 0;
        $this->nome_squadra_con_acronimo = ' ';
        $this->nome_squadra_per_intero = ' ';
        $this->nome_squadra = ' ';
        $this->data_fondazione = new Data(null, null, null); // Crea un oggetto Data nullo
        $this->anno_fondazione = 0;
        $this->citta = ' ';
        $this->stemma_squadra = ' ';
        $this->stadio = ' ';
    }

    public function __construct9(int $id_s, string $n_s_a = NULL, string $n_s_i = NULL, string $n_s, Data $d_f, int $a_f, string $c, string $s_s, string $s){
        $this->id_squadra = $id_s;
        $this->nome_squadra_con_acronimo = $n_s_a ?? "";
        $this->nome_squadra_per_intero = $n_s_i ?? "";
        $this->nome_squadra = $n_s;
        $this->data_fondazione = $d_f;
        $this->anno_fondazione = $a_f;
        $this->citta = $c;
        $this->stemma_squadra = $s_s;
        $this->stadio = $s;
    }    

    public function getId_Squadra() : int {
        return $this->id_squadra;
    }
    public function getNome_squadra_con_acronimo() : string {
        return $this->nome_squadra_con_acronimo;
    }
    public function getNome_squadra_per_intero() : string {
        return $this->nome_squadra_per_intero;
    }
    public function getNome_squadra() : string {
        return $this->nome_squadra;
    }
    public function getData_fondazione() : Data {
        return $this->data_fondazione;
    }
    public function getAnno_fondazione() : int {
        return $this->anno_fondazione;
    }
    public function getCitta() : string {
        return $this->citta;
    }
    public function getStemma_squadra() : string {
        return $this->stemma_squadra;
    }
    public function getStadio() : string {
        return $this->stadio;
    }
}


?>