<?php
class Data{
    private int $giorno;
    private int $mese;
    private int $anno;

    private function giorni_mese() : int{
        // Verifica il valore del mese
        $giornimax = 0;
        switch($this->mese){
            //-------------------------------------------------
            //CASI MESI DI 31 GIORNI
            case 1: //Gennaio
            case 3: //Marzo
            case 5: //Maggio
            case 7: //Luglio
            case 8: //Agosto
            case 10: //Ottobre
            case 12: //Dicembre
                $giornimax = 31;
                break;
            //-------------------------------------------------
            //CASI MESI DI 30 GIORNI
            case 4: //Aprile
            case 6: //Giugno
            case 9: //Settembre
            case 11: //Novembre
                $giornimax = 30;
                break;
            //-------------------------------------------------
            //CASO MESE DI FEBBRAIO, VALUTO ANNO BISESTILE
            case 2: //Febbraio
                //Controllo se l'anno è bisestile
                if($this->bisestile() == true){
                    $giornimax = 29;
                }else{
                    $giornimax = 28;
                }
                break;
            // default: // Mese non valido
            //     $giornimax = 0;
            //     break;
        }
    
        return $giornimax;
    }


    private function controlla_data() : bool{
        $gm = $this->giorni_mese();
        if($this->anno >= 0 && $this->mese >= 1 && $this->mese <= 12 && $this->giorno > 0 && $this->giorno <= $gm){
        //if($this->giorno>0 && $this->giorno <= $gm){
            return true;
        }else{
            return false;
        }
    }

    private function avanza_di_un_giorno() : void{
        $gm = $this->giorni_mese();
        if($this->controlla_data() == true){
            ++$this->giorno;
            if($this->giorno > $gm){
                $this->giorno = 1;
                ++$this->mese;
            }

            if($this->mese > 12){
                $this->mese = 1;
                ++$this->anno;
            }
        }
        return;
    }

    public function __construct(){//Costruttore per simulare overloading
        $numArgs = func_num_args() ;
        $args = func_get_args() ;
        call_user_func_array( array(&$this, '__construct'.$numArgs), $args ) ;
    }

    public function __construct0(){//Costruttore senza parametri
        $dataAttuale = new DateTime();

        $this->giorno = $dataAttuale->format('d');
        $this->mese = $dataAttuale->format('m');
        $this->anno = $dataAttuale->format('Y');
    }

    // public function __construct3(int $g, int $m, int $a){//Costruttore con parametri
    //     $this->giorno = $g;
    //     $this->mese = $m;
    //     $this->anno = $a;

    //     if($this->controlla_data() == false){
    //         throw new InvalidArgumentException("Data non valida: ".$this->giorno."/".$this->mese."/".$this->anno."");
    //         $this->giorno = 0;
    //         $this->mese = 0;
    //         $this->anno = 0;
    //     }
        
    // }

    public function __construct3(int $g = null, int $m = null, int $a = null){ //Costruttore con parametri
        $this->giorno = $g ?? 0;
        $this->mese = $m ?? 0;
        $this->anno = $a ?? 0;

        if($this->giorno == 0 || $this->mese == 0 || $this->anno == 0){
            return;
        }
    
        if ($this->controlla_data() === false) {
            throw new InvalidArgumentException("Data non valida: {$this->giorno}/{$this->mese}/{$this->anno}");
        }
    }

    public function getGiorno() : int{
        return $this->giorno;
    }
    public function getMese() : int{
        return $this->mese;
    }
    public function getAnno() : int{
        return $this->anno;
    }

    public function bisestile() : bool{
        if(($this->anno%4 == 0) && ($this->anno%100 != 0) || ($this->anno%400 == 0)){
            return true;
        }else{
            return false;
        }
    }

    public function avanzaData(int $sommagiorni) : void{
        for($i=0; $i < $sommagiorni; ++$i){
            $this->avanza_di_un_giorno();
        }
    }


    public function sottrazione_date(Data $data2) : int {
        $contatore = 0;
        
        while ($this->anno !== $data2->getAnno() || $this->mese !== $data2->getMese() || $this->giorno !== $data2->getGiorno()) {
            $this->avanza_di_un_giorno();
            ++$contatore;
        }
        
        return $contatore;
    }
    
    public function minoreDi(Data $data2) : bool {
        if ($this->anno < $data2->getAnno()) {
            return true;
        } elseif ($this->anno === $data2->getAnno() && $this->mese < $data2->getMese()) {
            return true;
        } elseif ($this->anno === $data2->getAnno() && $this->mese === $data2->getMese() && $this->giorno < $data2->getGiorno()) {
            return true;
        }
        
        return false;
    }
    
    public function maggioreDi(Data $data2) : bool {
        if ($this->anno > $data2->getAnno()) {
            return true;
        } elseif ($this->anno === $data2->getAnno() && $this->mese > $data2->getMese()) {
            return true;
        } elseif ($this->anno === $data2->getAnno() && $this->mese === $data2->getMese() && $this->giorno > $data2->getGiorno()) {
            return true;
        }
    
        return false;
    }

    public function ugualeA(Data $data2) : bool {
        return $this->anno === $data2->getAnno() && $this->mese === $data2->getMese() && $this->giorno === $data2->getGiorno();
    }

    public function __toString() : string{
        return $this->giorno . "/" . $this->mese . "/" . $this->anno;
    }

    public function printISO8601_Date() : string{
        return $this->anno . "/" . $this->mese . "/" . $this->giorno;
    }
    public function print_DD_MM_AAAA_Date() : string{
        return $this->giorno . "/" . $this->mese . "/" . $this->anno;
    }
    public function print_MM_DD_AAAA_Date() : string{
        return $this->mese . "/" . $this->giorno . "/" . $this->anno;
    }
}
?>