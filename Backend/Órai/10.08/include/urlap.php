

<?php

    //nev (input) és üzenet (textarea)
    //bekert adatok fileba menteni
    //Beküldés dátuma, ideje
    function urlap()
    {
        return '
            <h1>Űrlap</h1>
            <form action="'.utvonal(3).'" method="post">
            <label>Név</label>
            <input type="text" class="form-control" name="nev">
            <label>Üzenet</label>
            <textarea name="uzenet" class="form-control mt-2"></textarea>
            <button type="submit" class="btn btn-primary mt-2" name="kuldes">Beküldés</button>
        </form>';
    }


    function feldolgozas()
    {

        if(isset($_POST["kuldes"]))
        {
            $szoveg = str_replace(["\r\n","\n","\r"],"<br>",$_POST["uzenet"]);
            file_put_contents("save.txt", $_POST["nev"]. "," . $_POST["uzenet"] . PHP_EOL, FILE_APPEND);
            header("Location: ".utvonal(3));
            exit;
        }


    }

    

?>