<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-head">
                <h1>Admin felület</h1>
                <hr>
            </div> 
            <div class="card-body">
                <form action="<?php echo uri(3);?>" method="post" enctype="multipart/form-data">
                <label>Vasúttársaság</label>
                <select name="kivalaszt" id="tarsasagKivalaszt" class="form-control">
                    <option value="MAV" default>MÁV</option>
                    <option value="GYSEV">GYSEV</option>
                    <option value="OEBB">ÖBB</option>
                    <option value="CD">CD</option>
                </select>
                <label>Járműtípus</label>
                <select name="jarmuTipuskivalaszt" id="jarmuTipuskivalaszt" class="form-control">

                </select> 
                <label>Jármű képe:</label>
                <input type="file" name="kep" class="form-control">
                <button type="submit" class="btn btn-dark mt-2" name="hozzaadas">Jármű hozzáadása</button>
                </form>
            </div>
    </div>
    <div class="row">
    <div class="card mt-4">
            <div class="card-head">
                <h1>Vasúttársaság hozzáadása</h1>
                <hr>
            </div> 
            <div class="card-body">
                <form action="<?php echo uri(3);?>" method="post" enctype="multipart/form-data">
                <label>Társaság neve</label>
                <input type="text" name="tarsasagNev" class="form-control">
                <label>Kategóriák</label>
                <textarea name="kategoriak" placeholder="Add meg a kívánt kategóriákat! Minden kategóriát új sorba írj!" class="form-control" ></textarea>
                <label>A társaság logója</label>
                <input type="file" name="logoMegadott" class="form-control">
                <button type="submit" class="btn btn-dark mt-2" name="tarsasagHozzaad">Társaság hozzáadása</button>
                </form>
            </div>
    </div>
</div>
</div>
</div>

<script>

    let tarsasagKivalaszt = document.getElementById("tarsasagKivalaszt");

    tarsasagKivalaszt.addEventListener("change",function() {jsonMegszerez(this)});

    let jsonNeve = "";
    let optionNevek = [];
    
    function jsonMegszerez(obj)
    {
        jsonNeve = obj.value+"forras.json";

        let forras = []

        let jarmuTipuskivalaszt = document.getElementById("jarmuTipuskivalaszt");
        

        fetch(jsonNeve)
        .then(x => x.json())
        .then(y => 
            {
                forras = y;

                console.log(forras);
                optionNevek = [];
                forras.forEach(e => {
                    optionNevek.push(e.nev);
                });

                console.log(optionNevek);

                jarmuTipuskivalaszt.innerHTML = "";

                optionNevek.forEach(e =>
                {
                let option = document.createElement("option");
                option.value = e;
                option.innerHTML = e;
                jarmuTipuskivalaszt.appendChild(option);

                })
                        
            }
        )
    
    }

</script>

<?php
    //phpinfo(32);

    if(isset($_POST["hozzaadas"]))
    {
        $vasuttarsasag = "";
        $jarmutipus = "";
        $kepFajlnev = "";



        if(isset($_POST["kivalaszt"]) && htmlspecialchars($_POST["kivalaszt"]))
        {
            $vasuttarsasag = $_POST["kivalaszt"];
        }
        if(isset($_POST["jarmuTipuskivalaszt"]) && htmlspecialchars($_POST["jarmuTipuskivalaszt"]))
        {
            $jarmutipus = $_POST["jarmuTipuskivalaszt"];
        }
        if(isset($_POST["jarmuTipuskivalaszt"]) && htmlspecialchars($_POST["jarmuTipuskivalaszt"]))
        {
            $kepFajlnev = $_FILES["kep"];
        }

        if (isset($_FILES["kep"]) && $_FILES["kep"]["error"] === UPLOAD_ERR_OK) 
        {

            $celMappa = "kepek/" . $vasuttarsasag . "/";

            if (!is_dir($celMappa)) {
                mkdir($celMappa, 0777, true);
            }

            $fajlNev = basename($_FILES["kep"]["name"]);
            $celUtvonal = $celMappa . $fajlNev;

            $check = getimagesize($_FILES["kep"]["tmp_name"]);
            if ($check !== false) 
            {

                if (move_uploaded_file($_FILES["kep"]["tmp_name"], $celUtvonal)) 
                {
                    echo "A(z) " . htmlspecialchars($fajlNev) . " nevű fájl feltöltése megtörtént!";
 
                } 
                else 
                {
                    echo "Nem sikerült a feltöltés!";
                }

            } 
            else
            {
                echo "A fájl nem kép.";
            }
        }


        $jsonAdatok = json_decode(file_get_contents($vasuttarsasag."forras.json"));

        //var_dump($jsonAdatok[0]->kepek);

        foreach($jsonAdatok as $elem)
        {
            if($elem -> nev == $jarmutipus)
            {
                $elem -> kepek[] = $fajlNev;
            }
        }

        file_put_contents($vasuttarsasag."forras.json",json_encode($jsonAdatok));


    }

    if(isset($_POST["tarsasagHozzaad"]))
    {
        $nev = "";
        $kategoriak = [];
        $logo = "";

        if(isset($_POST["tarsasagNev"]) && htmlspecialchars($_POST["tarsasagNev"]))
        {
            $nev = $_POST["tarsasagNev"];
        }
        if(isset($_POST["kategoriak"]) && htmlspecialchars($_POST["kategoriak"]))
        {
            $vagas = explode(PHP_EOL,$_POST["kategoriak"]);
            $kategoriak = $vagas;
        }

		
		class Jarmutipus
		{
			public $nev;
			public $kepek;

			function __construct($nev,$kepek)
			{
				$this->$nev = $nev;
				$this->$kepek = $kepek;
			}

		}

		$teljesForras = [];

		for($i = 0;$i < sizeof($kategoriak);$i++)
		{
			$teljesForras[] = Jarmutipus($kategoriak[$i],[]);
		}

		






        

    }

?>

