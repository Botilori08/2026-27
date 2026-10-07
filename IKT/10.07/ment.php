<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telefonszám kezelés</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
                <h1>Telefonszám tároló weblap</h1>
                <label>Név</label>
                <input type="text" name="nev" class="form-control">
                <label>Telefonszám</label>
                <input type="tel" name="telefonszam" class="form-control mt-2">
                <button type="submit" class="btn btn-secondary mt-2" name="kuldes">Beküldés</button>
            </form>
        </div>
    </div>


    <?php

        if(isset($_POST['kuldes']))
        {
            $nev = "";
            $telefonszam = "";

            if(isset($_POST["nev"]) && htmlspecialchars($_POST["nev"]))
            {
                $nev = $_POST["nev"];
            }
            if(isset($_POST["telefonszam"]) && htmlspecialchars($_POST["telefonszam"]))
            {
                $telefonszam = $_POST["telefonszam"];
            }
            

            $adatok = json_decode(file_get_contents("telefonszamok.json"),true);

            //$json = json_decode($file);

            $adatok[] = ["nev" => $nev,"telefonszam" => $telefonszam];
            //echo $adat;
            file_put_contents("telefonszamok.json",json_encode($adatok));

            echo "Mentve!";

            //fclose($file);
        }


    
    ?>
</body>
</html>