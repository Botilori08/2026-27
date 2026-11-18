<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teszt</title>
</head>
<body>
    <form action="teszt.php" method="post">
        <label for="adat">Adj meg egy szöveget:</label>
        <input type="text" name="adat" id="adat">
        <button type="submit">Küldés</button>
    </form>

    <?php

        $conn = new mysqli("localhost","root","","proba2026");

        if(isset($_POST["adat"]))
        {

            $sql = "INSERT INTO probaadat (szoveg) VALUES ('".$_POST['adat']."')";

            $conn->query($sql) or die($conn->error);
            
        }

        //adatok kigyűjtése táblázatba

        $adatok = [];

        

        $conn->close();

    ?>

</body>
</html>

