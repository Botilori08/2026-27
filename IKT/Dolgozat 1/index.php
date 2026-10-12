<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hibajegy kezelő weblap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header"><h2>User adatok</h2></div>
            <div class="card-body">
                <?php echo "<h2>IP cím: ".$_SERVER['REMOTE_ADDR']."</h2><br><h2>A kérés ideje: ".date("F j, Y, g:i",$_SERVER["REQUEST_TIME"])."</h2>";?>
            </div>

        </div>
        <div class="card mt-5">
            <div class="card-header"><h2>Hibajegy létrehozása</h2></div>
            <div class="card-body">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <label>Bejelentő neve</label>
                    <input type="text" name="nev" class="form-control">
                    <label>Hiba leírása, üzenet</label>
                    <input type="text" name="uzenet" class="form-control">
                    <button type="submit" name="kuldes" class="btn btn-primary mt-2">Beküldés</button>
                </form>
            </div>

        </div>
        
        <div class="card mt-5">
            <div class="card-header"><h2>Eddig rögzített hibajegyek</h2></div>
            <div class="card-body">
            </div>

        </div>
    </div>

    <?php 

        $nev = $_POST["nev"];
        $uzenet = $_POST["uzenet"];

        $file = fopen("hibak.txt","r");
        fclose($file);
        

    ?>

</body>
</html>