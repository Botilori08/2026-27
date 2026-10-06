<?php

function tablazat()
{

    $adatok = $_SESSION['adatok'];
    $content = "";

    $content .= "<table>";
    
    $content .= "<tr><th>Név</th><th>Dátum</th><th>Becenév</th></tr>"

    

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
}

function tablaKeszit()
{   
    
}

?>