<?php

$adatok = betolt();
echo router();


function layout($cim,$leiras,$content)
{
	return '<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <header class="row bg-dark text-white">
            <h1>2024 ősz érettségi</h1>
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
        </div>

        <main class="row pb-5">
            <h2>'.$cim.'</h2>
            <p>'.$leiras.'</p>
            <article>
                '.$content.'
            </article>
        </main>
        <footer class="row bg-dark text-white">
            Boti Lóránt &copy; 2026.11.02
        </footer>
    </div>
</body>
</html>';
}


function router()
{
	switch($_GET["menu"] ?? 0) 
	{
		case 2:
		default:
			$cim = "2. feladat";
			$leiras = "Állapítsa meg, hogy milyen időpontban történt a legutolsó jeladás, és írja a képernyőre az időpontot, valamint az utoljára jelet adó autó rendszámát! ";
			$content = feladat2();
			break;
		case 3:
			$cim = "3. feladat";
			$leiras = "Írja ki a bemeneti állományban elsőként szereplő jármű rendszámát, valamint azt, hogy milyen időpontokban adott jelzést! Az időpontokat óra:perc formátumban, szóközzel elválasztva, egy sorban jelenítse meg! ";
			$content = feladat3();
			break;
		case 4:
			$cim = "4. feladat";
			$leiras = "Kérje be a felhasználótól egy időpont óra és perc értékét, és adja meg, hogy hány jeladás történt az adott időpontban! Ha nem történt jeladás, akkor 0-t írjon ki! ";
			$content = feladat4();
			break;
		case 5:
			$cim = "5.feladat";
			$leiras = " Állapítsa meg, hogy mennyi az adatok szerint a legnagyobb sebesség, amellyel egy jármű a jeladáskor haladt, illetve adja meg az összes autó rendszámát, ami haladt ilyen sebességgel! Amennyiben egy jármű többször is haladt a legnagyobb sebességgel, akkor a rendszámát többször is megjelenítheti. A rendszámokat egy sorban, szóközzel elválasztva jelenítse meg a minta szerint! ";
			$content = feladat5();
			break;
		case 6:
			$cim = "6.feladat";
			$leiras = "Kérje be a felhasználótól egy jármű rendszámát, és jelenítse meg a jármű jeladásainak 
időpontját és az adott rendszámú autó távolságát az útszakasz kezdetétől! A bevezető 
példában az első jármű esetén a 6:04-kor a jármű távolsága az útszakasz kezdetétől 0,0 km, 
míg 6:14-kor 15,8 km, mivel a jármű az eltelt 10 perc (10/60 óra) alatt 95 km/h-val haladt. 
A kimenetet a mintának megfelelőn alakítsa ki, a távolságot minden esetben egy 
tizedesjegyre kerekítve írja ki km mértékegységben! Ha nem szerepel a bekért rendszámmal jármű, akkor azt egy rövid mondatban jelezze a felhasználónak! ";
			$content = feladat6();
			break;
	}

	return layout($cim,$leiras,$content);
}


	class Auto
	{
		public $rendszam;
		public $ora;
		public $perc;
		public $sebesseg;
		public $idoString;

		function __construct($sor)
		{
			$vagas = explode("\t",$sor);

			$this->rendszam = $vagas[0];
			$this->ora = intval($vagas[1]);
			$this->perc = intval($vagas[2]);
			$this->sebesseg = intval($vagas[3]);
			$this->idoString = $this->ora .":".$this->perc;

		}

	}


function betolt()
{
	$sorok = file("jeladas.txt");

	$adatok = [];

	foreach($sorok as $sor)
	{
		$adatok[] = new Auto($sor);
	}

	return $adatok;


}

function feladat2()
{
	global $adatok;
	$content = "Az utolsó jeladás időpontja <b>". $adatok[sizeof($adatok)-1]->idoString . "</b> a jármű rendszáma <b>" . $adatok[sizeof($adatok)-1]->rendszam . "</b>";

	return $content;
}

function feladat3()
{
	global $adatok;

	$elsoRendszam = $adatok[0]->rendszam;

	$content = '<p>Az első jármű: <b>'.$elsoRendszam.'</b></p><br><h3>Jeladásainak időpontjai:</h3>';

	$jeladasok = [];

	for($i=0;$i < sizeof($adatok);$i++)
	{
		if($adatok[$i]->rendszam === $elsoRendszam)
		{
			$jeladasok[] = $adatok[$i]->idoString;
		}
	}

	$content .= "<ul><li>";

	$content .= implode("</li><li>",$jeladasok) . "</li>";

	/*foreach($jeladasok as $egyIdo)
	{
		$content .= "<li>".$egyIdo."</li>"; 
	}*/

	$content .= "</ul>";

	return $content;


}

function feladat4()
{

	global $adatok;

	$content = '<form action="?menu=4" method="post">
        <label for="ora" class="label">Adjon meg egy óra értéket:</label>
        <input type="number" name="ora" class="form-control" id="ora">
        <label for="perc" class="label">Adjon meg egy perc értéket:</label>
        <input type="number" name="perc" class="form-control">
		<button type="submit" class="btn btn-dark mt-2" name="kuldes">Küldés</button>
    </form>';

	

	

	$ora = 0;
	$perc = 0;

	if(isset($_POST["kuldes"]))
	{
		if(isset($_POST["ora"]))
		{
			$db = 0;
			$ora = intval($_POST["ora"]) ?? -1;
			$perc = intval($_POST["perc"]) ?? -1;

			foreach($adatok as $egyAdat)
			{
				if($ora == $egyAdat->ora && $perc == $egyAdat->perc)
				{
					$db++;
				}
			}
			$content .= '<br><p>A jeladások száma: <b>'.$db.'</b></p>';
		}
	}

	



	return $content;

	
}

function feladat5()
{

	global $adatok;

	$content = "<h3>A leggyorsabban haladók</h3>";

	

	$vMax = -1;

	foreach($adatok as $adat)
	{
		if($adat->sebesseg > $vMax)
		{
			$vMax = $adat->sebesseg;
		}
	}

	$content .= "<p>A legnagyobb sebesség: <b>" . $vMax . "km/h</b></p><br>";
	$content .= "<h4>A járművek:</h4>";
	$content .= "<ul>";

	foreach($adatok as $adat)
	{
		if($adat->sebesseg == $vMax)
		{
			$content .= "<li>".$adat->rendszam."\t".$adat->sebesseg." km/h</li>";
		}
	}

	$content .= "</ul>";

	return $content;
}

function feladat6()
{
	$content = '    <form action="?menu=6" method="post">
        <label for="rendszam" class="label">Adja meg az autó rendszámát</label>
        <input type="text" name="rendszam" id="rendszam" class="form-control">
        <button type="submit" name="rendszamBekuldes" class="btn btn-dark mt-2">Küldés</button>
    </form>';

	return $content;
}


?>