<?php

switch($_GET["menu"] ?? 0)
{
    case 1:
    default:
    $oldalCim = "Feladat 2";
    include("include/feladat2.php");
    $mainContent = "l";
    break;
    case 2:
    $oldalCim = "Feladat 3";
    break;
    case 3:
    $oldalCim = "Feladat 4";
    break;
}


?>