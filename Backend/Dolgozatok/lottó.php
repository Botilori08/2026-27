<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lottó</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]);?>" method="post" enctype="multipart/form-data">
            <h1 class="text-black">Lottószám tároló űrlap</h1>
            <label for="">A hét száma</label>
            <input type="number" class="input-group" name="hetSzama" min="1" max="52">
            <label for="">Lottószámok</label>
            <input type="number" class="input-group" name="elsoSzam" min="1" max="90">
            <input type="number" class="input-group" name="masodikSzam" min="1" max="90">
            <input type="number" class="input-group" name="harmadikSzam" min="1" max="90">
            <input type="number" class="input-group" name="negyedikSzam" min="1" max="90">
            <input type="number" class="input-group" name="otodikSzam" min="1" max="90">
            <input type="submit" name="kuldes" class="mt-3">


        </form>
        


    </div>


    <?php
        $hetSzama = $_POST["hetSzama"];

        $elsoSzam = $_POST["elsoSzam"];
        $masodikSzam = $_POST["masodikSzam"];
        $harmadikSzam = $_POST["harmadikSzam"];
        $negyedikSzam = $_POST["negyedikSzam"];
        $otodikSzam = $_POST["otodikSzam"];

        

        /*if(htmlspecialchars($_POST["hetSzama"]) && isset($_POST["hetSzama"]) && is_numeric((int)$_POST["hetSzama"]))
        {
            $hetSzama = (int)$_POST["hetSzama"];
        }
        if(htmlspecialchars($_POST["elsoSzam"]) && isset($_POST["elsoSzam"]) && is_numeric((int)$_POST["elsoSzam"]))
        {
            $elsoSzam = (int)$_POST["elsoSzam"];
        }
        if(htmlspecialchars($_POST["masodikSzam"]) && isset($_POST["masodikSzam"]) && is_numeric((int)$_POST["masodikSzam"]))
        {
            $masodikSzam = (int)$_POST["masodikSzam"];
        }
        if(htmlspecialchars($_POST["harmadikSzam"]) && isset($_POST["harmadikSzam"]) && is_numeric((int)$_POST["harmadikSzam"]))
        {
            $harmadikSzam = (int)$_POST["harmadikSzam"];
        }
        if(htmlspecialchars($_POST["negyedikSzam"]) && isset($_POST["negyedikSzam"]) && is_numeric((int)$_POST["negyedikSzam"]))
        {
            $negyedikSzam = (int)$_POST["negyedikSzam"];
        }
        if(htmlspecialchars($_POST["negyedikSzam"]) && isset($_POST["negyedikSzam"]) && is_numeric((int)$_POST["negyedikSzam"]))
        {
            $negyedikSzam = (int)$_POST["negyedikSzam"];
        }*/


        echo $hetSzama . " " . $elsoSzam . " " . $masodikSzam . " " . $harmadikSzam . " " . $negyedikSzam . " " . $otodikSzam;

        $file = fopen("lottoszamok.txt","a+");

        $sor = "<tr><td>".$hetSzama."</td><td>".$elsoSzam."</td><td>" . $masodikSzam . "</td><td>" . $masodikSzam . "</td><td>" . $harmadikSzam . "</td><td>" . $negyedikSzam . "</td><td>" . $otodikSzam . "</td></tr>\n";
        fwrite($file,$sor);

        fclose($file);
        


        phpinfo(32);

    ?>
</body>
</html>