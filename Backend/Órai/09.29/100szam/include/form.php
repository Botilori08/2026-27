<?php
    


    function form($szamok)
    {
        //var_dump($szamok);
        $szoveg = "";
        $szoveg .= "<form action=\"". uri(1)."\" method=\"post\">";
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
                    <input type="number" value="'.$szamok[$i].'" min="0" max="1000" name="szam'.$i.'" id="szam'.$i.'" class="form-control">
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

        $szoveg .= '<div class="row mt-4">';
        $szoveg .= '<button type="submit" class="btn btn-secondary p-3 mt-2" name="elkuld">Küldés</button>';
        $szoveg .= '</div>';

        $szoveg .= "</form>";



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


    /*
    file-ba menti az érkező adatokat
    */

    function feldolgozas()
    {
        if(isset($_POST['elkuld']))
        {
            $f = fopen("save.txt","w");

            for($i = 0;$i < 100;$i++)
            {
                fwrite($f,$_POST["szam$i"]."\n");
            }

            fclose($f);


            header("location:" . uri(1));
            die();

        }
        
    }

    function szamokBetolt()
    {
        if(file_exists("save.txt"))
        {
            $f = fopen("save.txt","r");

            $vissza = [];

            while(!feof($f))
            {
                $vissza[] = trim(fgets($f));
            }

            fclose($f);
            array_pop($vissza);
            return $vissza;

            //retrun file("save.txt");
        }
        else
        {
            return szamGeneral();
        }
    }




?>