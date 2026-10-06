<?php

function form()
{
    $content = "";
    $content .= '<form action="'.utvonal(3).'" method="post">';
    $content .= '<h2>Űrlap</h2>';
    $content .= '<div class="row">';
    
    $content .= '<div class="col-6">';
    $content .= '<label>Név</label>';
    $content .= '<input type="text" name="nev" class="form-control">';
    $content .= '<label>Email</label>';
    $content .= '<input type="email" name="email" class="form-control">';
    $content .= '<button type="submit" name="kuldes" class="btn btn-success mt-3">Küldés</button>';
    $content .= '</div>';
    $content .= '<div class="col-6">';
    $content .= '<textarea type="text" name="szoveg" class="form-control"></textarea>';
    $content .= '</div>';
    $content .= '</form>';
    $content .= '</div>';
    return $content;
}

function feldolgozas()
{
    
    if(isset($_POST["kuldes"]))
    {
        $nev = "";
        $email = "";
        $szoveg = "";

        if(isset($_POST["nev"]) && htmlspecialchars($_POST["nev"]))
        {
            $nev = $_POST["nev"];
        }    
        if(isset($_POST["email"]) && htmlspecialchars($_POST["email"]))
        {
            $email = $_POST["email"];
        }
        if(isset($_POST["szoveg"]) && htmlspecialchars($_POST["szoveg"]))
        {
            $szoveg = $_POST["szoveg"];
        }

        
        $file = fopen("include/adatok.txt","a");

        $sor = "$nev\t$email\t$szoveg\n";

        fwrite($file,$sor);
        fclose($file);
    }

}

?>