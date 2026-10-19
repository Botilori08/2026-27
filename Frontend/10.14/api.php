<?php

    class EgyAdat{

        public $ora;
        public $perc;
        public $masodperc;
        public $elteltIdo;
        public $varos;

        /*public function __construct($ora,$perc,$masodperc,$sebesseg,$varos)
        {
            $this->ora = $ora;
            $this->perc = $perc;
            $this->masodperc = $masodperc;
            $this->elteltIdo = $elteltIdo;
            $this->varos = $varos;
        }*/

        public function __construct($sor)
        {
            $adatok = explode(" ",$sor);

            $this->ora = intval(trim($adatok[0]));
            $this->perc = intval(trim($adatok[1]));
            $this->masodperc = intval(trim($adatok[2]));
            $this->elteltIdo = intval(trim($adatok[3]));
            $this->varos = trim($adatok[4]);
        }

    }


    $file = file("forgalom.txt");

    $jarmuSzam = $file[0];
    array_shift($file);

    $jsonTomb = [];

    for($i = 0;$i < sizeof($file);$i++)
    {
        $egyAdat = new EgyAdat($file[$i]);
        $jsonTomb[] = $egyAdat;
    }


    $jsonTomb = [];
    $jsonTomb[] = ["autokSzama"=>intval(trim($jarmuSzam))];
    
    for($i = 0;$i < sizeof($file);$i++)
    {
        $vagas = explode(" ",$file[$i]);
        
        $jsonTomb[] = ["ora"=>intval($vagas[0]),"perc"=>intval($vagas[1]),"masodperc"=>intval($vagas[2]),"elteltIdo"=>intval($vagas[3]),"varos"=>trim($vagas[4])];
    }

    $json = json_encode($jsonTomb);

    //header("Content-Type: application/json; charset='utf-8'");

    echo $json;
    //var_dump($file);

?>