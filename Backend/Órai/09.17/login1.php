<?php

    session_start();

    $login = false;



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
            $_SESSION["use"] = htmlspecialchars($_POST['user']);
            $_SESSION["belepve"]  = true;
            header("Location: " . $_SERVER['PHP_SELF']);
            die();
            
        }

    }    

    if(!isset($_SESSION["belepve"]) || !$_SESSION["belepve"])
    {
?>
<h1>Belépés</h1>
<form action="login1.php" method="post">
<label for="">Username <input type="text" name="user"></label>
<label for="">Password <input type="password" name="jelszo"></label>
<button type="submit">Belépés</button>
</form>

<?php

    }
    else
    {
        echo "<h1>Üdv kishaver!</h1>";
        echo '<form method="post" action="login1.php">';
        echo '<button type="submit" name="kilepes">Kilépés</button><br>';
        echo '</form>';
        echo '<a href="login1.php">Katt ide!</a>';
    }
?>
