<?php

switch($_GET["menu"] ?? 0)
{
    case 1:
    default:
        include("include/foOldal.php");
        $mainContent = foOldal();
        break;
    case 2:
        include("include/mellekOldal.php");
        $mainContent = mellekOldal();
        break;
    case 3:
        include("include/urlap.php");
        $mainContent = urlap();
        feldolgoz();
        break;

}

?>