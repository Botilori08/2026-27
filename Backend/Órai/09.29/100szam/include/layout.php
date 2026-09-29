<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Űrlap</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>    

        </head>
    <body>

    <div class="container">
        <div class="row">
            <header class="col-12"><h1>100 szám</h1></header>
            <?php include_once("include/navbar.php");?>

            <div class="col-12">
                <?php echo $mainContent;?>
            </div>
        </div>
            <!--
                1. oldal: űrlap
                    Ha nincs még bevitt adat 100 szám random
                    Ha volt bevitt adat azok legyenek benne
                2. oldal: táblázat 10*10
                3.oldal: táblázat
            -->
    </div>
    </body>
</html>