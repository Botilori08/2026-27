<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Burger Király Tasty Grill</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>

        header
        { 
            background-color: brown;
            color: blanchedalmond;
        }
        div main
        {
            background-color: blanchedalmond;
        }
        div footer
        {
            background-color: blanchedalmond;
        }
        li,p
        {
            color: rgb(75, 31, 17);
        }
        hr
        {
            color:orange
            display: block;
            height: 10px;
        }

    </style>
</head>
<body>
    <div class="container-fluid">
        <header class="row"><?php include("header.php");?></header>
        <main class="row"><?php
            $oldal = $_GET['oldal'] ?? 'rolunk';
            switch ($oldal) {
                case 'etlap':
                    include('etlap.php');
                    break;
                case 'rolunk':
                default:
                    include("rolunk.php");
                break;
            }?>
        </main>
        <footer class="row"><?php include("footer.php");?></footer>

    </div>
</body>
</html>