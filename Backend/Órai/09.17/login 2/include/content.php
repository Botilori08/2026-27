<?php   
    echo "<h1>Üdv kishaver!</h1>";
    echo "<h2>Belépve: " . $_SESSION["user"] . "</h2>";
    echo '<form method="post" action="'. $url . '">';
    echo '<button type="submit" name="kilepes">Kilépés</button><br>';
    echo '</form>';
    echo '<a href="'. $url . '">Katt ide!</a>';

?>