<?php

    function utvonal($menupontSzama)
    {
        return htmlspecialchars($_SERVER['PHP_SELF']) . "?menu=" . $menupontSzama;
    }

?>