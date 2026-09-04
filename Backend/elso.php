<?php
    echo "<h1>Hello world!</h1>";
    echo "valami \n"; echo "valami
    " . " más" . "<br>" . "
    ";


    echo 'Kukk';

    $alma = "Jonatán";
    $Alma = "Idared";
    $korte = "Vilmos";


    echo $korte . " " . $alma . "<br>
    ";
    
    $korte = 3;
    $alma = false;

    echo $korte . " " . $alma . "<br>";

    var_dump($korte);
    var_dump($Alma);

    $tomb = [];

    $tomb[] = 12;
    $tomb[] = 12;


    $tomb[1] = 120;
    $tomb[100] = 100;
    $tomb[] = "12";
    $tomb["szoveg"] = "almafa";


    //asszociatív tömb

    $tomb["Géza"] = "Kresz";
    
    $tomb["Géza"] = ["Kresz","Mézga","BK" => "Kertész"];

    echo "<pre>";
    var_dump($tomb);
    echo "</pre>";
   
    echo $tomb[0] . "<br>";
    echo $tomb["Géza"][0] . "<br>";
    echo $tomb["Géza"]["BK"] . "<br>";

    echo "Kedvenc Gézánk: " . $tomb["Géza"][1] . "<br>";

    //Formázott kiiratás
    echo "Kedvenc gyümölcs: $Alma" . "<br>";
    
    echo 'Kedvenc gyümölcs: $Alma';

    for($i = 0;$i < 10;$i++)
    {
        echo "$i <br>";
    };

    $i = 0;
    while($i < 5)
    {
        $i++;
        echo "$i <br>";
    };

    foreach($tomb as $value)
    {
        if(gettype($value) != "array")
        {
            echo "$value <br>";
        }
    }


    /*
    do
    {
        echo "$i <br>";
    }
    while($i > 0);*/
    
    
?>