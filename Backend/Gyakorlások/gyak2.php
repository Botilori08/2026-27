<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title></title>
</head>
<body>
    <div>
        <form action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]);?>" method="post" enctype="multipart/form-data">
            <input type="file" name="kep">
            <input type="number" name="szelesseg">
            <input type="number" name="magassag">
            <input type="submit" name="bekuldes">

        </form>
    </div>

    <?php
        phpinfo(32);
        

    ?>

</body>
</html>