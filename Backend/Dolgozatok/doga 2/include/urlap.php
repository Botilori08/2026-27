<?php

function urlap()
{
    return '<div class="col-12">
            <h1>Űrlap</h1>
            <form action="'.utvonal(3).'" method="post" enctype="multipart/form-data">
                <input type="text" name="nev" class="form-control mt-2">
                <textarea name="uzenet" class="form-control mt-2"></textarea>
                <button type="submit" class="btn btn-secondary mt-2" name="kuldes">Küldés</button>
            </form>

        </div>';
}

function feldolgozas()
{

    if(isset($_POST["kuldes"]))
    {
        $nev = $_POST["nev"];
        $uzenet = $_POST['uzenet'];

        $uzenet = nl2br($uzenet,false);
        $uzenet = str_replace(PHP_EOL,"",$uzenet);

        $file = fopen("uzenetek.txt","a");
        $sor = $nev . ";" . $uzenet . PHP_EOL;
        $kitoltoSor = "#######################". PHP_EOL;

        fwrite($file,$sor);
        fwrite($file,$kitoltoSor);

        fclose($file);

        header("Location: ". utvonal(3));
        exit;

    }

}

?>