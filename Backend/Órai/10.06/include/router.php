<?php

switch($_GET['menu'] ?? 0)
{
    case 1:
    default:
    include("include/foOldal.php");
    $mainContent = foOldal();
    break;
    
    case 2:
        include("include/tablazat.php");
        $mainContent = tablazat();
        break;

}

?>