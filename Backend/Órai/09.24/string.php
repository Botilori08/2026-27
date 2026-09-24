<?php

    //string hossza
    var_dump(strlen("Ember, most jövök ki a templomból!!"));

    $szoveg1 = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent feugiat interdum dui, sit amet pretium arcu ultrices a.";

    //Hány szóból áll egy string
    var_dump(str_word_count($szoveg1));

    //string tartalmaz-e egy megadott másik stringet
    var_dump(str_contains($szoveg1,"dolor"));
    //megadott string első előfordulásának pozíciója
    var_dump(strpos($szoveg1,"elit"));
    //Ha nincs benne => bool(false)
    var_dump(strpos($szoveg1,"Géza"));

    //Egy megadott string kezdetét tudjuk vizsgálni vele true/false
    var_dump(str_starts_with($szoveg1,"Lorem"));

    //Egy megadott string végét tudjuk vizsgálni vele true/false
    var_dump(str_ends_with($szoveg1,"Lorem"));

    



?>


