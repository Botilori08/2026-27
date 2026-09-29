<?php
function uri($menuSzam)
{       
    return htmlspecialchars($_SERVER['PHP_SELF']) . "?menu=" . $menuSzam;
}

function linkallapotVizsgal($menuSzam)
{
    if($_GET['menu'] == $menuSzam)
    {
        echo "navbar-brand";
    }
}

?>