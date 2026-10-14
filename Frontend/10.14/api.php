<?php

    $file = file("forgalom.txt");

    $jarmuSzam = $file[0];
    array_shift($file);

    $jsonTomb = [];
    
    for($i = 0;$i < sizeof($file);$i++)
    {
        $vagas = explode(" ",$file[$i]);
        $jsonTomb[] = ["ora"=>intval($vagas[0]),"perc"=>intval($vagas[1]),"masodperc"=>intval($vagas[2]),"elteltIdo"=>intval($vagas[3]),"varos"=>trim($vagas[4])];
    }

    $json = json_encode($jsonTomb);

    echo $json;
    //var_dump($file);

?>