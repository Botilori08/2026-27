<?php

include_once("include/functions.php");

//var_dump($adatok);


function feladat2()
{
    

    $content = urlap();
    if(isset($_POST["sorszamBekuld"]))
    {
        $adatok = adatBetolt();
        $content .= autoKeres($adatok);
    }

    //var_dump($adatok);
    return $content;
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

function autoKeres($adatok)
{
    
    $sorszam = intval($_POST["sorszam"] ?? 1);
    if($sorszam < 0 || $sorszam > sizeof($adatok))
    {
        return '<div class="row">
        <div>Nincs ilyen számú jármű!</div>
        </div>';
    }

    $keresettAuto = $adatok[$sorszam-1];

    
    return '<div class="row">
        <div>A <b>'.$sorszam.'.</b> számú autó <b>'.$keresettAuto->varos.'</b> felé haladt</div>
    </div>';

}





?>