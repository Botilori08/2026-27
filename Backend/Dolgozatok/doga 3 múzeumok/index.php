<?php

$adatok = betolt();
array_pop($adatok);

$arak = betolt();
$arak = explode(" ",array_pop($arak));

$nevek = nevekBetolt();

echo router();

function layout($cim,$leiras,$megoldas)
{
    return '<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Múzeumok</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container-fluid">
        <header class="row bg-dark text-white"><h1 class="col-12">Múzeumok érettségi feladat 2026.10.20.</h1></header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary row">
            <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="?menu=2">2.feladat</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?menu=3">3.feladat</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?menu=4">4.feladat</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?menu=5">5.feladat</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?menu=6">6.feladat</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?menu=7">7.feladat</a>
        </li>
        
        </ul>
        </div>
        </div>
        </nav>
        <main class="row">
            <h2>'.$cim.'</h2>
            <pre>'.$leiras.'</pre>
            <article>'.$megoldas.'</article>
        </main>
        <footer class="row bg-dark text-white"><div class="col-12">Boti Lóránt &copy; 2026.11.09.</div></footer>
    </div>
</body>
</html>';
}

function router()
{
    switch(intval($_GET["menu"])?? 0)
    {
        case 2:
        default:
            $cim = "2.feladat";
            $leiras = "Fontos adat, hogy hány látogató volt a városi múzeumokban az adott napon összesen. Írassa
ki az eredményt a mintához hasonlóan a képernyÖre! Ha valaki napijegyet vett, akkor Őt
annyiszor vegye figyelembe, ahány múzeumba ténylegesen be is lépett!";
            $megoldas = feladat2();
            break;
        case 3:
            $cim = "3.feladat";
            $leiras = "Határozza meg, hogy mikor és melyik kiállításra lépett be az elsö és az utolsó látogató!
Jelenítse meg a képernyőn a két időpontot és múzeumnevet a mintához hasonlóan!";
            $megoldas = feladat3();
            break;
        case 4:
            $cim = "4.feladat";
            $leiras = "Kérje be egy jegy sorszámát, majd írassa ki a képernyőre, hogy az illető a nap folyamán
mikor, melyik múzeumba lépett be! Ha nincs ilyen sorszámú jegy, ne jelenjen meg semmi !";
            $megoldas = feladat4();
            break;
		case 5:
			$cim = "5.feladat";
			$leiras = "Az igazgatóság szeretné zárás előtt 30 perccel megszüntetni a jegyek eladását. Jogos-e ez
a döntés? Határozza meg, hogy mennyi idő telt el az utolsó jegy megvásárlása és a zárás
között! A választ óra:perc formátumban Írassa ki a képernyőre! A vezető nullákat nem kell
megjelenítenie. Tudjuk, hogy valamennyi múzeum pontosan 18:00-kor zár.";
			$megoldas = feladat5();
			break;
        case 6:
            $cim = "6.feladat";
            $leiras = "Mennyi volt a múzeum teljes bevétele az adott napon? A bevételt a mintának megfelelően
Írassa ki a képernyőre!";
            $megoldas = feladat6(); 
            break;
        case 7:
            $cim = "7.feladat";
            $leiras = "Igaz-e, hogy a napijegyet váltók általában a Kastélyban kezdenek? Adjon teljes mondatban
pozitív választ, ha aznap a napijegyet váltók több mint a fele a Kastélyban kezdett,
egyébként adjon negatív választ! Például „A napijegyet váltók általában nem a Kastélyban
kezdtek.";
            $megoldas = feladat7();
    }

    return layout($cim,$leiras,$megoldas);
}

class Adat
{
    public $idopont;
    public $jegyId;
    public $helyszinId;
    public $jegyTipus;

    function __construct($sor)
    {
        $vagas = explode(" ",$sor);
        $this->idopont = $vagas[0];
        $this->jegyId = $vagas[1];
        $this->helyszinId = intval($vagas[2]);
        $this->jegyTipus = trim($vagas[3]);
    }
}


function betolt()
{
    $sorok = file("muzdat.txt");
    
    $adatok = [];
    

    $arak = array_shift($sorok);

    foreach($sorok as $sor)
    {
        $adatok[] = new Adat($sor);
    }

    $adatok[] = $arak;

    return $adatok;

}

function nevekBetolt()
{
    $sorok = file("muznev.txt");

    $nevek = explode('", "',$sorok[0]);

    $nevek[0] = substr($nevek[0],1);
    $nevek[sizeof($nevek)-1] = substr($nevek[sizeof($nevek)-1],0,-3);

    return $nevek;
}

function feladat2()
{
    global $adatok;

    return "<p>Az adott napon összesen <b>".sizeof($adatok)."</b> látogató volt</p>";
}

function feladat3()
{
    global $adatok;
    global $nevek;

    $elsoBelepett = $adatok[0];

    $utolsoBelepett = $adatok[sizeof($adatok)-1];

    return 'Az első látogató <b>'.$elsoBelepett->idopont.'</b>-kor lépett a (z) <b>'.$nevek[$elsoBelepett->helyszinId].'</b> helyszínre.<br>
    Az utolsó látogató <b>'.$utolsoBelepett->idopont.'</b>-kor lépett a (z) <b>'.$nevek[$utolsoBelepett->helyszinId].'</b> helyszínre.';
}

function feladat4()
{
    global $adatok;
    global $nevek;

	$content = "";

    $content .= '<form action="?menu=4" method="post">
                    <label for="jegyId" class="label">Add meg egy jegy azonosítóját!</label>
                    <input type="text" name="jegyId" class="form-control">
                    <button type="submit" class="btn btn-dark mt-2 mb-3" name="kuldes">Küldés</button>
                </form>';

	if(isset($_POST["kuldes"]))
	{
		$megadottJegyId = $_POST["jegyId"];
		$megfeleloJegy = [];

		foreach($adatok as $adat)
		{
			if($adat->jegyId === $megadottJegyId)
			{
				$megfeleloJegy[] = $adat;
			}
			
		}

		//var_dump($megfeleloJegy);

		if(sizeof($megfeleloJegy) == 0)
		{
			$content .= "Nem volt ilyen sorszám";
		}
		else
		{
			$content .= "<ol>";
			foreach($megfeleloJegy as $adat)
			{
				$content .= '<li>'.$adat->idopont.' '.$nevek[$adat->helyszinId].'</li>';
			}
			$content .= "</ol>";
		}
	}

	return $content;
	
}

function feladat5()
{
	global $nevek;
	global $adatok;

    $szurt = [];

    foreach($adatok as $adat)
    {
        if($adat->jegyTipus != "-")
        {
            $szurt[] = $adat;
        }
    }

    //var_dump($szurt);
	$zarasIdoPercben = 18*60;

	$utolsoBelepettIdo = explode(":",$szurt[sizeof($szurt)-1]->idopont);

	$utolsoPercben = (intval($utolsoBelepettIdo[0])*60) + intval($utolsoBelepettIdo[1]);

	$kulonbseg = $zarasIdoPercben - $utolsoPercben;
	$idoString = "";

	if($zarasIdoPercben - $utolsoPercben > 60)
	{
		$maradek = $kulonbseg%60;
		$maradt = $kulonbseg - $maradek;
		$orak = $maradt/60;
		$idoString = $orak . ':' . $maradek;
	}
	else
	{
		$idoString = '0:'.$kulonbseg;
	}
	

	return 'Az utolsó jegyvásárló '.$idoString.' perccel a zárás előtt vett jegyet.';


}

function feladat6()
{
    global $adatok;
    global $nevek;
    global $arak;

    //var_dump($arak);

    $osszeg = 0;



    foreach($adatok as $adat)
    {
        /*Kastély teljes ár: 6000, kastély kedvezményes 3000 Ft
            Többi hely teljes ár: 1000 Ft, kedvezményes 500 Ft
            Napijegy 8000 Ft, kedvezményes 4000 Ft;
        */
        if($adat->helyszinId == 0 && $adat->jegyTipus == "K")
        {
            $osszeg += intval($arak[0])/2;
        }
        if($adat->helyszinId == 0 && $adat->jegyTipus == "T")
        {
            $osszeg += intval($arak[0]);
        }
        if($adat->helyszinId != 0 && $adat->jegyTipus == "T")
        {
            $osszeg += intval($arak[1]);
        }
        if($adat->helyszinId != 0 && $adat->jegyTipus == "K")
        {
            $osszeg += intval($arak[1])/2;
        }
        if($adat->jegyTipus == "KN")
        {
            $osszeg += intval($arak[2])/2;
        }
        if($adat->jegyTipus == "TN")
        {
            $osszeg += intval($arak[2]);
        }
    }

    return "<h3>A teljes bevétel:</h3><br><h1 class='text-center'>".$osszeg." Ft</h1>";

}

function feladat7()
{
    global $adatok;

    $szurt = [];

    $egyAzonosito = $adatok[0]->jegyId;
    for($i = 0;$i < sizeof($adatok);$i++)
    {
        if($adatok[$i]->jegyId == $egyAzonosito)
        {
            $szurt[$i] = [$adatok[$i]];
        }
        else
        {
            $szurt[$i] = [];
        }
    }

    var_dump($szurt);


}

?>