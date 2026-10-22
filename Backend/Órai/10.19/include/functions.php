<?php

        class EgyAdat{

        public $ora;
        public $perc;
        public $masodperc;
        public $elteltIdo;
        public $varos;
        public $sebesseg;

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
            $this->sebesseg = 1000/$this->elteltIdo;
        }
        }


    function utvonal($oldalSzam)
    {
        return htmlspecialchars($_SERVER["PHP_SELF"]) . "?menu=" . $oldalSzam;
    }

    function adatBetolt()
    {
        $file = file("forgalom.txt");

        $adatok = [];

        for($i = 1;$i < sizeof($file);$i++)
        {
            $adatok[] = new EgyAdat($file[$i]);
        }

        return $adatok;

    }

?>