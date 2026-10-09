<?php

switch($_GET["menu"] ?? 0)
{
    case 1:
    default:
    include("include/fooldal.php");
    $mainContent = fooldal();
    break;
    case 2:
    include("include/aloldal.php");
    $mainContent = aloldal();
    break;
    case 3:
    include("include/urlap.php");
    $mainContent = urlap();
    feldolgozas();
    break;
    case 4:
    include("include/tablazat.php");
    $mainContent = tablazat();
    break;

}

?>