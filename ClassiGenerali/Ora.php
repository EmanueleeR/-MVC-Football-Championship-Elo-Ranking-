<?php
class Ora {
    private int $ore;
    private int $minuti;
    private int $secondi;

    private function conversione_ora_in_minuti(int $o, int $m, int $s) : int {
        return $o * 60 + $m;
    }

    private function conversione_ora_in_secondi(int $o, int $m, int $s) : int {
        return ($o * 3600) + ($m * 60) + $s;
    }

    private function controlla_orario() : bool {
        // Verifica che l'orario sia valido (24 ore)
        if($this->ore >= 0 && $this->ore < 24 && $this->minuti >= 0
        && $this->minuti < 60 && $this->secondi >= 0 && $this->secondi < 60){
            return true;
        }

        return false;
        
    }

    
    public function __construct(int $o = null, int $m = null, int $s = null) {
        $this->ore = $o ?? 0;
        $this->minuti = $m ?? 0;
        $this->secondi = $s ?? 0;

        if($this->ore == 0 || $this->minuti == 0 || $this->secondi == 0){
            return;
        }
    
        if ($this->controlla_orario() === false) {
            throw new InvalidArgumentException("Orario non valido: {$this->ore}/{$this->minuti}/{$this->secondi}");
        }
    }

    public function getOre() : int {
        return $this->ore;
    }
    public function getMinuti() : int {
        return $this->minuti;
    }
    public function getSecondi() : int {
        return $this->secondi;
    }

    public function getOraConVirgola() : float {
        $oraConVirgola = $this->ore + ($this->minuti / 60) + ($this->secondi / 3600);
        return round($oraConVirgola, 2); //Arrotondo a 2 decimali
    }

    public function differenza_orari(Ora $ora2) : Ora {
        //Converto entrambi gli orari in secondi
        $secondi1 = $this->conversione_ora_in_secondi($this->getOre(), $this->getMinuti(), $this->getSecondi());
        $secondi2 = $ora2->conversione_ora_in_secondi($ora2->getOre(), $ora2->getMinuti(), $ora2->getSecondi());
    
        //Calcola la differenza in secondi
        $differenza_secondi = abs($secondi1 - $secondi2);
    
        // Calcola le ore, i minuti e i secondi dalla differenza in secondi
        $ore = floor($differenza_secondi / 3600);
        $minuti = floor(($differenza_secondi % 3600) / 60);
        $secondi = $differenza_secondi % 60;
    
        // Crea un nuovo oggetto Ora con la differenza calcolata
        $differenza_ora = new Ora($ore, $minuti, $secondi);
        //$stringa = $differenza_ora->getOre()." ore, ".$differenza_ora->getMinuti(). "minuti, ".$differenza_ora->getSecondi()." secondi"; 
    
        //return $stringa;
        return $differenza_ora;
    }

    public function differenza_orari_ore_decimale(Ora $ora2) : float {
        // Converti entrambi gli orari in secondi
        $secondi1 = $this->conversione_ora_in_secondi($this->getOre(), $this->getMinuti(), $this->getSecondi());
        $secondi2 = $ora2->conversione_ora_in_secondi($ora2->getOre(), $ora2->getMinuti(), $ora2->getSecondi());
    
        // Calcola la differenza in secondi
        $differenza_secondi = abs($secondi1 - $secondi2);
    
        // Calcola la differenza in ore, includendo le frazioni di ora
        $ore_con_virgola = $differenza_secondi / 3600.0;
    
        return $ore_con_virgola;
    }

    public function differenza_orari_minuti_decimale(Ora $ora2) : float {
        // Converti entrambi gli orari in secondi
        $secondi1 = $this->conversione_ora_in_secondi($this->getOre(), $this->getMinuti(), $this->getSecondi());
        $secondi2 = $ora2->conversione_ora_in_secondi($ora2->getOre(), $ora2->getMinuti(), $ora2->getSecondi());
    
        // Calcola la differenza in secondi
        $differenza_secondi = abs($secondi1 - $secondi2);
    
        // Calcola la differenza in ore, includendo le frazioni di minuti
        $minuti_con_virgola = $differenza_secondi / 60.0;
        
        return $minuti_con_virgola;
    }

    public function differenza_orari_secondi(Ora $ora2) : float {
        // Converti entrambi gli orari in secondi
        $secondi1 = $this->conversione_ora_in_secondi($this->getOre(), $this->getMinuti(), $this->getSecondi());
        $secondi2 = $ora2->conversione_ora_in_secondi($ora2->getOre(), $ora2->getMinuti(), $ora2->getSecondi());
    
        // Calcola la differenza in secondi
        $differenza_secondi = abs($secondi1 - $secondi2);
            
        return $differenza_secondi;
    }



    public function __toString() : string {
        return $this->ore . ":" . $this->minuti . ":" . $this->secondi;
    }

    public function differenza_tra_orari(Ora $o2) : int {
        $tot_differenza = 0;
        $differenza_ore = 0;
        $differenza_minuti = 0;
        //roba da calcolare
        if($o2->getOre() < $this->ore){
            $differenza_ore = $o2->getOre() - $this->ore+24;
        }else{
            $differenza_ore = $o2->getOre() - $this->ore;
        }
        if($o2->getMinuti() < $this->minuti){
            --$differenza_ore;
            $differenza_minuti = 60-($this->minuti-$o2->getMinuti());
        }else{
            $differenza_minuti = $o2->getMinuti() - $this->minuti;
        }
        $tot_differenza = $this->conversione_ora_in_secondi($differenza_ore, $differenza_minuti,0);
        return $tot_differenza;
    }
}
?>