<?php

    function tablazat($szamok)
    {
        $szoveg = "";
        $szoveg .= '<table class="table table-striped table-dark">';
        $szoveg .= '<thead><th colspan="10">Számok megjelenítése</th></thead>';
        $szoveg .= '<tbody>';
        for($i = 0;$i < 10;$i++)
        {
            
            $szoveg .= '<tr>';
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