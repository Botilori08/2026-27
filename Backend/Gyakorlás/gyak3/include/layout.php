<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webodlal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container">
        <header class="row bg-dark text-white p-2"><h1>Doga gyak 3</h1></header>
        <div class="row">
            <div class="col-3">
                <!--Itt lesz a navbar-->
                <?php include("include/navbar.php");?>
            </div>
            <div class="col-9">
                <?php echo $mainContent;?>
            </div>
        </div>
        <footer class="row p-2 bg-dark text-white">Boti Lóránt 2026.10.08.</footer>
    </div>
</body>
</html>