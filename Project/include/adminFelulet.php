<h1>Admin felület</h1>
<div class="container">
    <div class="row">
        <div class="col-12"> 
            <form action="<?php echo uri(3);?>" method="post" enctype="multipart/form-data">
            <label>Vasúttársaság</label>
            <select name="kivalaszt" id="tarsasagKivalaszt" class="form-control">
                <option value="MAV">MÁV</option>
                <option value="GYSEV">GYSEV</option>
                <option value="OEBB">ÖBB</option>
            </select>
        </div>
        <div class="row">
        <div class="col-12">
            <label>Járműtípus</label>
            <select name="jarmuTipuskivalaszt" id="jarmuTipuskivalaszt" class="form-control">

            </select>  
        </div>
        </div>

    </div>
    <div class="row">
        <div class="col-12">
            <label>Jármű képe:</label>
            <input type="file" name="kep" class="form-control">
    </div>
    <div class="row">
        <div class="col-12 mt-2">
            <button type="submit" class="btn btn-dark" name="hozzaadas">Jármű hozzáadása</button>
    </div>
    </form>
    
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

        // Mappa létrehozása, ha még nem létezik
        if (!is_dir($celMappa)) {
            mkdir($celMappa, 0777, true);
        }

        $fajlNev = basename($_FILES["kep"]["name"]);
        $celUtvonal = $celMappa . $fajlNev;

        $check = getimagesize($_FILES["kep"]["tmp_name"]);
        if ($check !== false) 
        {

        if (move_uploaded_file($_FILES["kep"]["tmp_name"], $celUtvonal)) {
            echo "A(z) " . htmlspecialchars($fajlNev) . " nevű fájl feltöltése megtörtént!";
            
            //$kepFajlnev = $fajlNev; 
        } else {
            echo "Nem sikerült a feltöltés!";
        }

        } 
        else {
         echo "A fájl nem kép.";
        }
    }
    }

?>

