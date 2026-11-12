<?php

function utvonal($oldalSzam)
{
    return htmlspecialchars($_SERVER["PHP_SELF"]) . "?menu=" . $oldalSzam;
}

function menuValaszt($oldalSzam)
{
    if(($_GET["menu"]?? 1) || $_GET["menu"] == $oldalSzam)
    {
        return "link-body-emphasis";
    }
    else
    {
        return "active";
    }
}
?>