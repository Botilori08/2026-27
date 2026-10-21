<?php

include_once("include/functions.php");

$adatok = adatBetolt();

//var_dump($adatok);

function feladat2()
{
    $adatok = adatBetolt();

    //var_dump($adatok);
    return urlap();
}

function urlap()
{
    return '<form action="index.php?menu=2" method="post">
        <div class="row">
        <div class="col-4"><label for="sorszam" class="label">Adja meg a jármű sorszámát!</label></div>
        <div class="col-4"><input type="number" name="sorszam" id="sorszam" class="form-control"></div>
        <div class="col-4"><button type="submit" name="sorszamBekuld" class="btn btn-secondary">Lekérés</button></div>
        </div>
    </form>';
}

?>