<?php
function urlap()
{
    $szoveg = "";
    $szoveg .= "<h2>Űrlap</h2>";
    $szoveg .= '<form action="'.utvonal(3).'" method="post">';
    $szoveg .= '<div class="row">';
    $szoveg .= '<div class="col-6">';
    $szoveg .= '<input type="text" name="nev" class="form-control">';
    $szoveg .= '<input type="email" name="email" class="form-control mt-2">';
    $szoveg .= '<button type="submit" name="kuldes" class="btn btn-success">Küldés</button>';
    $szoveg .= '</div>';
    $szoveg .= '<div class="col-6">';
    $szoveg .= '<textarea name="szoveg" class="form-control"></textarea>';
    $szoveg .= '</div>';
    $szoveg .= "</form>";
    $szoveg .= '</div>';


    return $szoveg;
}


function feldolgoz()
{

    
    $file = fopen("include/adatok.txt","a");

    $sor = $_POST["nev"]."\t".$_POST["email"]."\t".$_POST["szoveg"]."\n";

    fwrite($file,$sor);

    fclose($file);


}

?>
