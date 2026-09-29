<?php
    switch($_GET["menu"])
    {
        case 1:
            include("include/jarmuosszeallitas.php");
            break;
        case 2:
            include("include/mentett_vonatok.php");
            break;
        case 3:
            include("include/adminFelulet.php");
            break;
    }

?>