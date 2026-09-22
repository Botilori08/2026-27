<?php
//include: file-okra bontás
    session_start();
    $login = false;

    $url = "index.php";
    
    include("include/check.php");
    /*
    include() => Betölt egy php állományt lefuttat
    párja: include_once() => egyszer tölti be

    Amit egyszer kell csak betöltenia arra való az include once
    pl: function
    */


    

    if(!isset($_SESSION["belepve"]) || !$_SESSION["belepve"])
    {

        include("./include/loginform.php");

    }
    else
    {
        include("./include/content.php");
    }
?>
