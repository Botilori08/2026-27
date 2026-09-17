<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>


</head>
<body>
    <div class="container">
        <div class="col-12">
			<h1>Háromszög oldalszámláló</h1>
            <form action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]);?>" method="post" enctype="multipart/form-data">
                <label for="">a oldal</label>
                <input type="number" name="aOldal" class="input-group"><br>
                <label for="">b oldal</label>
                <input type="number" name="bOldal" class="input-group"><br>
                <label for="">c oldal</label>
                <input type="number" name="cOldal" class="input-group"><br>
                <input type="submit" name="bekuld">
            </form>
        </div>
    </div>

    <?php

        $aOldal = 0;
        $bOldal = 0;
        $cOldal = 0;

        //echo gettype($_POST["aOldal"]);

        if(htmlspecialchars($_POST["aOldal"]) && isset($_POST["aOldal"]) && is_numeric((int)$_POST["aOldal"]))
        {
            $aOldal = (int)$_POST["aOldal"];
        }
        else
        {
            echo "Nem megfelelő adatok" . "<br>";
        }
        if(htmlspecialchars($_POST["bOldal"]) && isset($_POST["bOldal"]) && is_numeric((int)$_POST["bOldal"]))
        {
            $bOldal = (int)$_POST["bOldal"];
        }
        else
        {
            echo "Nem megfelelő adatok" . "<br>";
        }

        if(htmlspecialchars($_POST["cOldal"]) && isset($_POST["cOldal"]) && is_numeric((int)$_POST["cOldal"]))
        {
            $cOldal = (int)$_POST["cOldal"];
        }
        else
        {
            echo "Nem megfelelő adatok" . "<br>";
        }

        //echo $aOldal . " " . $bOldal . " " . $cOldal;

        $lehetHaromszog = false;

        if(($aOldal + $bOldal > $cOldal) && ($bOldal + $cOldal > $aOldal) && ($aOldal + $cOldal > $bOldal))
        {
            $lehetHaromszog = true;
        }

        $file = fopen("haromszogek.txt","a+");

        $sor = "";
        if($lehetHaromszog)
        {
            $sor = "A megadott odalak: a= ".$aOldal." b= ".$bOldal." c= ".$cOldal.", A háromszög megszerkeszthető!\n";
        }
        else
        {
            $sor = "A megadott odalak: a= ".$aOldal." b= ".$bOldal." c= ".$cOldal.", A háromszög nem szerkeszthető meg!\n";
        }

        fwrite($file,$sor);

        fclose($file);


        phpinfo(32);

    ?>
    
    
</body>
</html>