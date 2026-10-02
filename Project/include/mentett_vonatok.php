<?php

    $file = []; 
    $vonatok = [];
    if(file_exists("include/osszeallitasok.txt"))
    {
       $file = file("include/osszeallitasok.txt");

        for($i =0;$i < sizeof($file);$i++)
        {
            $egyVonat = [];

            $egyVonat = explode("\t",$file[$i]);

            $vonatok[] = $egyVonat;
        }
    }
    else
    {
        echo "Még nincs hozzáadott vonatod!";
    }

    //var_dump($vonatok);

?>
    <div class="col-12">
        
                <?php

                    for($i = 0;$i < sizeof($vonatok);$i++)
                    {
                        echo '<div class="col-12 egyVonat">';
                        echo '<div class="flex-nowrap d-flex overflow-auto align-items-end mb-5 p-4 vonatHelye">';
                        echo $vonatok[$i][4];
                        echo "</div>";
                        echo "<div class='kartya'>".$vonatok[$i][2]."\t".$vonatok[$i][0] ."\t".$vonatok[$i][1]."</div>";
                        echo "</div>";

                    }
                    

                ?>

            
        </div>

    </div>
