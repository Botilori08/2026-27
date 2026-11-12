<?php

function betoltes()
{

}


function tablazat()
{
    $adatok = [];
    $tartalom = '';

    if(file_exists("uzenetek.txt"))
    {
        
        $fileSorok = file("uzenetek.txt");

        for($i = 0;$i < sizeof($fileSorok);$i++)
        {
            if(!str_contains($fileSorok[$i],"#############"))
            {
                $adatok[] = $fileSorok[$i];
            }
        }

            

        $tartalom .= '<div class="col-12">
            <h2>Táblázat</h2>
            <table class="table table">
                <thead><tr><th>Név</th><th>Üzenet</th></tr></thead>';
    
                
        $tartalom .= '<tbody>';
        for($i = 0;$i < sizeof($adatok);$i++)    
        {
            $vag = explode(";",$adatok[$i]);
            //var_dump($vag);
            $tartalom .= '<tr>
            <td>'. $vag[0] . '</td>
            <td>'. $vag[1] . '</td></tr>';
        }

            $tartalom .= '</tbody>';
        $tartalom .= '</table>';
        $tartalom .= '</div>';
        return $tartalom;
        
    }
    else
    {
        $tartalom .= "Még nincs adat!";
    }

}



?>