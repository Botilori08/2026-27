<?php

    switch($_GET["menu"] ?? 0)
    {
        case 1:
        default:
            include("include/main.php");
            $mainContent = foOldal();
            break;
        case 2:
            include("include/masodikLap.php");
            $mainContent = masodikLap();
            break;
        case 3:
            include("include/form.php");
            $mainContent = form();
            feldolgozas();
            break;

    }

?>