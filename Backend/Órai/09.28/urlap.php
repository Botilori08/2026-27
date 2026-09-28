<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Szavazat leadása</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>    


</head>
<body>
    <div class="container">
        <div class="col-12">
            <h1>Szavazz!</h1>
            <form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']);?>" method="post" enctype="multipart/form-data">
                <label for="">Együttes neve, akire szavazol:</label>
                <input type="text" name="egyuttesNeve" class="input-group">
                <button type="submit" class="btn btn-success">Küldés</button>
            </form>


        </div>
    </div>

    <?php

        //phpinfo(32);

        $egyuttes = $_POST["egyuttesNeve"];

        

        $file = fopen("szavazatok.txt","a");

        $sor = date("Y-m-d H:i:s") . ";" . $egyuttes . "\n";

        fwrite($file,$sor);
        fclose($file);


        

    ?>
</body>
</html>