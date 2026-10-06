<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weboldal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <header class="bg-dark text-white p-2"><h2>Nevek</h2></header>
    <?php include("include/navbar.php");?>
    <div class="container"><?php echo $mainContent;?></div>
    <footer class="bg-dark text-white mt-5">Ez az alja</footer>
</body>
</html>