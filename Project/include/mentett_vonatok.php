<?php

    $file = []; 
    $vonatok = [];
    if(file_exists("include/osszeallitasok.txt"))
    {
       $file = file("include/osszeallitasok.txt");

        for($i =0;$i < sizeof($file);$i++)
        {
            $egyVonat = [];

            $egyVonat = explode(";",$file[$i]);

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
                        echo '<div class="flex-nowrap d-flex overflow-scroll align-items-end mb-5 p-2 vonatHelye">';
                        echo $vonatok[$i][4];
                        echo "</div>";
                        echo '<div class="kartya">Itt lesz a kártya</div>';
                        echo "</div>";

                    }
                    

                ?>

            
        </div>

    </div>
