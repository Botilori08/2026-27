<?php

function utvonal($oldalSzam)
{

    return htmlspecialchars($_SERVER['PHP_SELF']) . "?menu=" . $oldalSzam;

}

?>