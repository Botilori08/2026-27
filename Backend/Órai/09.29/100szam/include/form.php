<?php
    


    function form($szamok)
    {
        $szoveg = "";
        $szoveg .= '<div class="row">';
        for($i=0;$i < sizeof($szamok);$i++)
        {
            if($i === 0)
            {
                $szoveg .= '<div class="col-1"></div>';
            }

                $szoveg .= '
                <div class="col-1">
                    <label for="szam'. $i .'">'.($i+1).'</label>
                    <input type="number" value="'.$szamok[$i].'" min="0" max="1000" name="szam'.$i.'" id="szam'.$i.'" class="from-control">
                </div>';
            
            if($i%10===9)
            {
                $szoveg .= '<div class="col-1"></div>';
                if($i > 0 || $i < 99 )
                {
                    $szoveg .= '<div class="col-1"></div>';
                }
                
            };


            
        }

        $szoveg .= '</div>';

        return $szoveg;
    }

    function szamGeneral()
    {
        $generaltSzamok = [];
        $mennyi = 100;
        for($i = 0;$i< $mennyi;$i++)
        {
            $generaltSzamok[] = rand(0,1000);
        }

        return $generaltSzamok;
    }

?>