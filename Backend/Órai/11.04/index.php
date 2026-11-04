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
            $feladatMegoldas = "";
            break;
        case 4:
            $cim = "4.feladat";
            $leiras = "Írja a képernyőre azon személyek azonosítóját, akik a vizsgált időszak végén a társalgóban tartózkodtak!";
            $feladatMegoldas = "";
            break;
        case 5:
            $cim = "5.feladat";
            $leiras = "Hányan voltak legtöbben egyszerre a társalgóban? Írjon a képernyőre egy olyan időpontot (óra:perc), amikor a legtöbben voltak bent!";
            $feladatMegoldas = "";
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

    public function __construct($sor)
    {
        $vagas = explode(" ",$sor);
        $this->ora = intval($vagas[0]);
        $this->perc = intval($vagas[1]);
        $this->id = intval($vagas[2]);
        $this->irany = trim($vagas[3]);
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

function feladat3()
{

	global $adatok;

	$csoportositott = [];

	for($i = 0;$i < sizeof($adatok);$i++)
	{
		
	}

}









?>