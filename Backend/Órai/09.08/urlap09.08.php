<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

    </style>
</head>
<body>
    
    <div class="container">
        
        <div class="row col-12">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <div class="row">
                    <h1 class="text-center">Űrlap</h1>
                </div>   

                <form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']);?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-3"><label for="nev">Név:</label></div>
                        <div class="col-lg-9"><input type="text" id="nev" class="bg-success text-white" name="nev"></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3"><label for="email">Email:</label></div>
                        <div class="col-lg-9"><input type="text" id="email" class="bg-success text-white" name="email"></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="submit" onclick="bekuld()" class="btn btn-success text-center">Beküld</button>
                        </div>
                    </div>
					<div class="row">
                        <div class="col-lg-3"><label for="email">Email:</label></div>
                        <div class="col-lg-9"><input type="file" class="bg-success text-white" name="file"></div>
                    </div>

                </form>
                <div class="row">
                        <div class="col-lg-12 border border-warning mt-3">
                            <span class="text-warning">Név: </span><span id="nevMegjelenit" class="text-danger"></span><br>
                            <span class="text-warning">Email: </span><span id="emailMegjelenit" class="text-danger"></span>
                        </div>

                </div>

                <?php
                    if(isset($_GET["nev"]))
                    {
                        echo htmlspecialchars($_GET["nev"]) . "<br>"; 
                    }

                    if(isset($_GET["nev"]))
                    {
                        echo htmlspecialchars($_GET["email"]) . "<br>";
                    }


                    if(isset($_POST["nev"]))
                    {
                        echo htmlspecialchars($_POST["nev"]) . "<br>"; 
                    }

                    if(isset($_POST["nev"]))
                    {
                        echo htmlspecialchars($_POST["email"]) . "<br>";
                    }


                    echo "<pre>";
                    var_dump($_GET);
                    var_dump($_POST);
                    echo "</pre>";
                    
                    $celKonyvtar = "feltolt/";
                    $celFile = $celKonyvtar . basename($_FILES["file"]["name"]);
                    $feltoltesOk = 1;
                    $kepTipus = strtolower(pathinfo($celFile,PATHINFO_EXTENSION));
                    // Check if image file is a actual image or fake image
                    if(isset($_FILES["file"])) 
                    {
                        $check = getimagesize($_FILES["file"]["tmp_name"]);
                        var_dump($check);
                        if($check !== false)
                        {
                            echo "File is an image - " . $check["mime"] . ".";

                            $feltoltesOk = 1;
                        } 
                        else 
                        {
                            echo "File is not an image.";
                            $feltoltesOk = 0;
                        }

                        // Check file size
                        if ($_FILES["file"]["size"] > 500000) 
                        {
                            echo "Sorry, your file is too large.";
                            $feltoltesOk = 0;
                        }

                        if($kepTipus != "jpg" && $kepTipus != "png" && $kepTipus != "jpeg" && $kepTipus != "gif" ) 
                        {

                            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                            $feltoltesOk = 0;

                        }

                        // Check if $uploadOk is set to 0 by an error
                        if ($feltoltesOk == 0) 
                        {
                            echo "Sorry, your file was not uploaded.";
                        // if everything is ok, try to upload file
                        } 
                        else 
                        {
                            if (move_uploaded_file($_FILES["file"]["tmp_name"], $celFile)) 
                            {
                                echo "The file ". htmlspecialchars(basename( $_FILES["file"]["name"])). " has been uploaded.";
                                kepMeretez($celFile,"kepek/kicsi/" . basename($_FILES["file"]["name"]),50,50);
                                kepMeretez($celFile,"kepek/nagy/" . basename($_FILES["file"]["name"]),500,500);
                            }
                            else 
                            {
                                echo "Sorry, there was an error uploading your file.";
                            }
                        }
                    }


                    function kepMeretez($forras,$cel,$szelesseg,$magassag)
                    {

                        //https://www.php.net/manual/en/function.imagecopyresampled.php
                        // The file

                        $filename = $forras;

                        // Set a maximum height and width
                        $width = $szelesseg;
                        $height = $magassag;

                        // Content type
                        //header('Content-Type: image/jpeg');

                        // Get new dimensions
                        list($width_orig, $height_orig) = getimagesize($filename);

                        $ratio_orig = $width_orig/$height_orig;

                        if ($width/$height > $ratio_orig) 
                        {
                            $width = $height*$ratio_orig;
                        } 
                        else 
                        {
                            $height = $width/$ratio_orig;
                        }

                        // Resample
                        $image_p = imagecreatetruecolor($width, $height);
                        $image = imagecreatefromjpeg($filename);
                        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

                        // Output
                        imagejpeg($image_p,$cel, 100);    
                                            
                    }

                    phpinfo(32);



                    
                    
                ?>
            </div>

            <div class="col-lg-4"></div>
        </div>



    </div>

    <script>

        function bekuld()
        {
            
            document.getElementById("nevMegjelenit").innerHTML = "";
            document.getElementById("emailMegjelenit").innerHTML = "";

            let nev = document.getElementById("nev").value;
            let email = document.getElementById("email").value;

            document.getElementById("nevMegjelenit").innerHTML = nev;
            document.getElementById("emailMegjelenit").innerHTML = email;
            

        }

    </script>
</body>
</html>