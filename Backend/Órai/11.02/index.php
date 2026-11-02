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
	$content = '<form action="" method="post">
        <label for="ora">Adjon meg egy óra értéket:</label>
        <input type="number" name="ora" class="form-control" id="ora">
        <label for="perc">Adjon meg egy perc értéket:</label>
        <input type="number" name="perc" class="form-control">
		<button type="submit" class="btn btn-dark mt-2">Küldés</button>
    </form>';

	return $content;

	
}


?>