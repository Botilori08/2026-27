<?php
    //Ellenőrzés
    if(isset($_POST['kilepes']))
    {
        session_destroy();
        //Az oldal frissítése
        /*
        1.mód:
        $oldal = $_SERVER['PHP_SELF'];
        header("REFRESH:0",$oldal);
        2.mód
        header("REFRESH:0");*/

        header("Location: " . $_SERVER['PHP_SELF']);
        die();

    }

    if(isset($_POST['user']) && isset($_POST['jelszo']))
    {
        $login = $_POST['user'] === "admin" && $_POST['jelszo'] === "admin";

        if($login)
        {
            $_SESSION["user"] = htmlspecialchars($_POST['user']);
            $_SESSION["belepve"]  = true;
            header("Location: " . $_SERVER['PHP_SELF']);
            die();
            
        }

    }
?>