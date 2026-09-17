<?php
    $login = false;

    if(isset($_POST['user']) && isset($_POST['jelszo']))
    {
        $login = $_POST['user'] === "admin" && $_POST['jelszo'] === "admin";
    }    

    if(!$login)
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
        echo '<a href="login1.php">Katt ide!</a>';
    }
?>
