<?php

$adatok = betolt();

echo router();

function layout($cim,$leiras,$feladatMegoldas)
{
    $content = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Társalgó</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container-fluid">
        <header class="row bg-dark text-white">
            <h1>Társalgó érettségi feladat</h1>
        </header>
<div class="row">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
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
        <li class="nav-item">
          <a class="nav-link" href="?menu=8">8.feladat</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
        <main class="row">
            <h2 class="col-12 mb-2">'.$cim.'</h2>
            <pre class="col-12">'.$leiras.'</pre>
            <article class="col-12">'.$feladatMegoldas.'</article>
        </main>
        <footer class="row bg-dark text-white">
            Boti Lóránt &copy; 2026.11.04.
        </footer>
    </div>
</body>
</html>';
    return $content;
}

function router()
{
    switch($_GET["menu"] ?? 0)
    {
        case 2:
        default:
            $cim = "2.feladat";
            $leiras = "Írja a képernyőre annak a személynek az azonosítóját, aki a vizsgált időszakon belül először lépett be az ajtón, és azét, aki utoljára távozott a megfigyelési időszakban!";
            $feladatMegoldas = feladat2();
            break;
        case 3:
            $cim = "3.feladat";
            $leiras = "Határozza meg a fájlban szereplő személyek közül, ki hányszor haladt át a társalgó ajtaján!
A meghatározott értékeket azonosító szerint növekvő sorrendben írja az athaladas.txt
fájlba! Soronként egy személy azonosítója, és tőle egy szóközzel elválasztva az áthaladások
száma szerepeljen!";
            $feladatMegoldas = f3();
            break;
        case 4:
            $cim = "4.feladat";
            $leiras = "Írja a képernyőre azon személyek azonosítóját, akik a vizsgált időszak végén a társalgóban tartózkodtak!";
            $feladatMegoldas = feladat4();
            break;
        case 5:
            $cim = "5.feladat";
            $leiras = "Hányan voltak legtöbben egyszerre a társalgóban? Írjon a képernyőre egy olyan időpontot (óra:perc), amikor a legtöbben voltak bent!";
            $feladatMegoldas = feladat5();
            break;
        case 6:
            $cim = "6.feladat";
            $leiras = "Kérje be a felhasználótól egy személy azonosítóját! A további feladatok megoldásánál ezt használja fel!
Feltételezheti, hogy a megadott azonosítóhoz tartozik adat a forrásfájlban.";
            $feladatMegoldas = feladat6();
            break;
        case 7:
            $cim = "7.feladat";
            $leiras = "Írja a képernyőre, hogy a beolvasott azonosítóhoz tartozó személy mettől meddig tartózkodott a társalgóban!";
            $feladatMegoldas = feladat7();
            break;
        case 8:
            $cim = "8.feladat";
            $leiras = "Határozza meg, hogy a megfigyelt időszakban a beolvasott azonosítójú személy összesen
hány percet töltött a társalgóban! Az előző feladatban példaként szereplő 22-es személy
5 alkalommal járt bent, a megfigyelés végén még bent volt. Róla azt tudjuk, hogy 18 percet
töltött bent a megfigyelés végéig. A 39-es személy 6 alkalommal járt bent, a vizsgált időszak
végén nem tartózkodott a helyiségben. Róla azt tudjuk, hogy 39 percet töltött ott. Írja ki,
hogy a beolvasott azonosítójú személy mennyi időt volt a társalgóban, és a megfigyelési
időszak végén bent volt-e még! 
";
            $feladatMegoldas = feladat8();
            break;
            

    }

    return layout($cim,$leiras,$feladatMegoldas);
}

class Athaladas
{
    public $ora;
    public $perc;
    public $id;
    public $irany;
    public $idoString;

    public function __construct($sor)
    {
        $vagas = explode(" ",$sor);
        $this->ora = intval($vagas[0]);
        $this->perc = intval($vagas[1]);
        $this->id = intval($vagas[2]);
        $this->irany = trim($vagas[3]);
        $this->idoString = $this->ora .":". $this->perc;
    }

}

function betolt()
{
    $sorok = file("ajto.txt");

	$adatok = [];

	foreach($sorok as $sor)
	{
		$adatok[] = new Athaladas($sor);
	}

	return $adatok;
	

}


function feladat2()
{
	global $adatok;


	$belepesek = [];

	$kilepesek = [];

	foreach($adatok as $adat)
	{
		if($adat->irany === "be")
		{
			$belepesek[] = $adat;
		}
		if($adat->irany === "ki")
		{
			$kilepesek[] = $adat;
		}
	}

	return '<p>Először lépett be: <b>'.$belepesek[0]->id.'</b></p><br><p>Utolsóként lépett ki: <b>'.end($kilepesek)->id.'</b></p>';

}

function f3()
{
    global $adatok;


    $stat = [];


    for ($i = 0; $i < sizeof($adatok); $i++) {
        if (!isset($stat[$adatok[$i]->id])) {
            $stat[$adatok[$i]->id] = [$adatok[$i]->id, 0];
        }
        $stat[$adatok[$i]->id][1] ++;
    }
    //var_dump($stat);


    usort($stat,function($a,$b){return $a[1]-$b[1];});


    //var_dump($stat);
    $myfile = fopen("athaladas.txt", "w");
    foreach($stat as $elem){
        $txt = "$elem[0] $elem[1]\n";
        fwrite($myfile, $txt);
    };
    fclose($myfile);
    //file_put_contents("athaladas.txt",$stat);
    return "A fájl létrehozása megtörtént";


}


function feladat4()
{
    global $adatok;

    $content = "<h3>A végén a társalgóban maradtak</h3>";


    $bentMaradtak = [];

    for($i=0;$i < sizeof($adatok);$i++)
    {
        if($adatok[$i]->irany === "be")
        {
            $bentMaradtak[$adatok[$i]->id] = [$adatok[$i]->id,0];
        }
        else
        {
            unset($bentMaradtak[$adatok[$i]->id]);
        }
    }


    $azonositok = [];

    foreach($bentMaradtak as $adat)
    {   
        $azonositok[] = $adat[0];
    }


    $content .= "<ul>";

    foreach($azonositok as $egyAzon)
    {
        $content .= "<li>".$egyAzon."</li>";
    }

    $content .= "</ul>";

    //Vagy implode("</li><li>",$adatok)
        
    return $content;
}

function feladat5()
{
    global $adatok;

    $stat = [];
    $darab = 0;

    $ido = "";
    for($i = 0;$i < sizeof($adatok);$i++)
    {
        if($adatok[$i]->irany === "be")
        {
            $darab++;
        }
        else
        {
            $darab--;
        }
        $stat[] = $darab;

    }

    $maxIndex = 0;

    for($i = 0;$i < sizeof($stat);$i++)
    {
        if($stat[$i] > $stat[$maxIndex])
        {
            $maxIndex = $i;
        }
    }


    return "A legtöbben a társalgóban ".$adatok[$maxIndex]->idoString."-kor voltak";

}

function feladat6()
{
    global $adatok;

    $content = '
    <form method="post" action="?menu=6">
    <label for="azonosito">Adj meg egy azonosítót</label>
    <input type="number" name="azonosito" id="azonosito" class="form-control">
    <button type="submit" name="idBekuldes" class="btn btn-secondary mt-2 mb-2">Küldés</button>
    </form>';


    if(isset($_POST["idBekuldes"]))
    {
        $id = intval($_POST["azonosito"]);

        $file = fopen("azonosito.txt","w");
        fwrite($file,$id);
        fclose($file);
        
    }

        
    return $content;

}

function feladat7()
{
    global $adatok;

    $azonosito = intval(file("azonosito.txt")[0]);

    //echo($azonosito);
    $content = "";

    $tartozkodasok = [];

    for($i = 0;$i < sizeof($adatok);$i++)
    {
        if($adatok[$i]->id === $azonosito)
        {
            if($adatok[$i]->irany === "be")
            {
                $tartozkodasok[] = [$adatok[$i]->idoString,"be"];
            }
            else
            {
                $tartozkodasok[] = [$adatok[$i]->idoString,"ki"];
            }
        }
    }

    for($i = 0;$i < sizeof($tartozkodasok);$i++)
    {
        $tartozkodasSzoveg = "";
        if($tartozkodasok[$i][1] == "be")
        {
            $tartozkodasSzoveg .= $tartozkodasok[$i][0]."-";
        }
        else
        {
            $tartozkodasSzoveg .= $tartozkodasok[$i][0]."<br>";
        }

        $content .= $tartozkodasSzoveg;

    }


    return $content;
    //var_dump($tartozkodasok);
}

function feladat8()
{
    global $adatok;

    $azonosito = intval(file("azonosito.txt")[0]);

    $content = "";

    $tartozkodasok = [];

    for($i = 0;$i < sizeof($adatok);$i++)
    {
        if($adatok[$i]->id === $azonosito)
        {
            if($adatok[$i]->irany === "be")
            {
                $tartozkodasok[] = [$adatok[$i]->idoString,"be"];
            }
            else
            {
                $tartozkodasok[] = [$adatok[$i]->idoString,"ki"];
            }
        }
    }

    var_dump($tartozkodasok);

    $ido = 0;

    for($i = 0;$i < sizeof($tartozkodasok);$i++)
    {
        $beOra = 0;
        $bePerc = 0;
        $kiOra = 0;
        $kiPerc = 0;

        if($tartozkodasok[$i][1] === "be")
        {
            $beOra = intval(explode(":",$tartozkodasok[$i][0])[0]);
            $bePerc = intval(explode(":",$tartozkodasok[$i][0])[1]);
        }
        else
        {
            $kiOra = intval(explode(":",$tartozkodasok[$i][0])[0]);
            $kiPerc = intval(explode(":",$tartozkodasok[$i][0])[1]);
        }

        $ido += ($kiOra*60+$kiPerc) - ($beOra*60+$bePerc);

    }

    return $ido;

}










?>