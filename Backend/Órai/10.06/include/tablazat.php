<?php

function tablazat()
{
    $content = "";

    if(isset($_SESSION['adatok']))
    {
    //var_dump($_SESSION['adatok']);
    $adatok = $_SESSION['adatok'];
    //var_dump($adatok);
    

    $content .= "<table class='table'>";
    
    $content .= "<tr><th scope='col'>Név</th><th scope='col'>Dátum</th><th scope='col'>Becenév</th></tr>";
    

    for($i = 0;$i < sizeof($adatok);$i++)
    {
        $content .= "<tr>";
        $vag = explode(";",$adatok[$i]); 
        $content .= "<td>$vag[0]</td>"; 
        $content .= "<td>$vag[1]</td>"; 
        $content .= "<td>$vag[2]</td>";
        $content .= "</tr>";
    }

    $content .= "</table>";
    return $content;
    }
    else
    {
        return "Még nincs beküldött adat!";
    }

}


?>