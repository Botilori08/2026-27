<?php

    function utvonal($oldalSzam)
    {
        return htmlspecialchars($_SERVER['PHP_SELF']) . "?menu=" . $oldalSzam;
    }

    function aktualis($oldalSzam)
    {
            if(($_GET["menu"] ?? 1) == $oldalSzam)
            {
                return "active";
            }
            else 
            {
                return "link-body-emphasis";
            }
        


    }

?>