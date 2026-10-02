<?php

    function tablazat($szamok,$rendezett = false)
    {
        if(!$szamok)
        {
            $szoveg = "<h2>Nincsenek számok!</h2>"; 
            return $szoveg;
        }
        $cim = "Számok megjelenítése";

        
        $gombsor = "";

        if($rendezett)
        {
            $cim = "A Számok rendezett megjelenítése";
            sort($szamok);
            $gombsor .= "<tr>";
            $gombsor .= "<th></th>";
            for($i = 0;$i < 10;$i++)
            {
                $gombsor .= "<th><button type='submit' class='btn btn-secondary' name='oszlopRendez_".$i."'>Rendez</button></th>";
            }
            $gombsor .= "</tr>";

        }


        $szoveg = "";
        $szoveg .= '<table class="table table-striped table-dark">';
        $szoveg .= '<thead><th colspan="11">'.$cim.'</th>'.$gombsor.'</thead>';

        $szoveg .= '<tbody>';
        for($i = 0;$i < 10;$i++)
        {
            
            $szoveg .= '<tr>';

            if($rendezett)
            {
                $szoveg .= '<td><button type="submit" class="btn btn-secondary" name="sorRendez_'.$i.'">Rendez</button></td>';
            }
            for($j = 0;$j < 10;$j++)
            {
                $szoveg .= '<td>';
                $szoveg .= $szamok[$i*10 + $j];
                $szoveg .= '</td>';
            }

            $szoveg .= '</tr>';
            
        }
        $szoveg .= '</tbody>';
        $szoveg .= '</table>';

        return $szoveg;
    }



?>