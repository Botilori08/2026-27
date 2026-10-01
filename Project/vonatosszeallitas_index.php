
<?php
include("include/functions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vonatösszeállítás tervező</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>    

    <style>
        .logo
        {
            height: 50px;
        }
        #vonat
        {
            margin-left:20px;
        }
        #adatokUrlap
        {
            margin-left: 10px;
        }

        .forgatott
        {
            transform: scaleX(-1);
        }
        .nemForgatott
        {
            transform: scaleX(1);
        }

    </style>

<body onload="betolt()">
    <div id="container-fluid">
        <header><h1 class="text-center">MÁV/GYSEV/ÖBB Vonatösszeállítás tervező</h1></header>
                <?php 
                    if(!isset($_GET["menu"]))
                    {
                        $_GET["menu"] = 1;
                    }
                ?>
                <nav class="navbar navbar-expand-lg bg-body-tertiary">
                    <div class="container-fluid">
                        <a class="nav-link <?php linkallapotVizsgal(1);?>" href="<?php echo uri(1);?>">Járműösszeállítás</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                            <a class="nav-link <?php linkallapotVizsgal(2);?>" aria-current="page" href="<?php echo uri(2);?>">Mentett vonatok</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link <?php linkallapotVizsgal(3);?>" href="<?php echo uri(3);?>">Jármű hozzáadása</a>
                            </li>
                        </ul>
                        </div>
                    </div>
                </nav>
                <main class="mt-3">
                    <?php require("include/vizsgal.php");
                    
                    ?>
                </main>



                <!--<img src="./MÁV.png" alt="" class="logo">
                <img src="./GYSEV_logo.svg.webp" alt="" class="logo">
                <img src="./Logo_ÖBB.svg.webp" alt="" class="logo">
                <img src="./ČD_logo.svg" alt="" class="logo">-->

            </div>

    
</body>
</html>