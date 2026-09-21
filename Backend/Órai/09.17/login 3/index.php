<?php
    //include: függvényekre bontás
    session_start();
    $login = false;

    $url = "index.php";
    
    include_once("include/check.php");
    include_once("./include/loginform.php");
    include_once("./include/content.php");

	

    /*
    include() => Betölt egy php állományt lefuttat
    párja: include_once() => egyszer tölti be

    Amit egyszer kell csak betöltenia arra való az include once
    pl: function
    */

    check();

    if(!isset($_SESSION["belepve"]) || !$_SESSION["belepve"])
    {

        loginForm();

    }
    else
    {   
        content();
    }
?>
