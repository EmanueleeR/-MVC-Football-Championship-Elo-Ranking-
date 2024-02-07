<?php

class SingoloCampionatoModel {
    private int $id_campionato;
    private string $nome_campionato;
    private string $nome_abbreviato;
    private string $nome_ufficiale;
    private string $federazione;
    private string $paese;
    private string $organizzatore;
    private string $titolo;
    private string $cadenza;
    private int $fondazione;

    public function __construct(int $id_c, string $n_c, string $n_a, string $n_u, string $feder, string $p, string $o, string $t, string $c, string $fond) {
        $this->id_campionato = $id_c;
        $this->nome_campionato = $n_c;
        $this->nome_abbreviato = $n_a;
        $this->nome_ufficiale = $n_u;
        $this->federazione = $feder;
        $this->paese = $p;
        $this->organizzatore = $o;
        $this->titolo = $t;
        $this->cadenza = $c;
        $this->fondazione = $fond;
    }

    public function getIdCampionato() : int {
        return $this->id_campionato;
    }
    public function getNomeCampionato() : string {
        return $this->nome_campionato;
    }
    public function getNomeAbbreviato() : string {
        return $this->nome_abbreviato;
    }
    public function getNomeUfficiale() : string {
        return $this->nome_ufficiale;
    }
    public function getFederazione() : string {
        return $this->federazione;
    }
    public function getPaese() : string {
        return $this->paese;
    }
    public function getOrganizzatore() : string {
        return $this->organizzatore;
    }
    public function getTitolo() : string {
        return $this->titolo;
    }
    public function getCadenza() : string {
        return $this->cadenza;
    }
    public function getFondazione() : int {
        return $this->fondazione;
    }
}
?>