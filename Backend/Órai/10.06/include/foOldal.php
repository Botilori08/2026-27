<?php

    function foOldal()
    {
        $content = "";

        $content .= '<div class="row">';
        $content .= '<div class="col-12">';
        $content .= '<form action="'.utvonal(1).'" method="post">';
        $content .= '<label>Név</label>';
        $content .= '<input type="text" name="nev" class="form-control">';
        $content .= '<label>Születési dátum</label>';
        $content .= '<input type="date" name="datum" class="form-control">';
        $content .= '<label>Becenév</label>';
        $content .= '<input type="text" name="becenev" class="form-control">';
        $content .= '<button type="submit" name="kuldes" class="btn btn-dark mt-4">Küldés</button>';
        $content .= '</form>';
        $content .= '</div>';
        $content .= '</div>';

        kuldesSessionbe();

        return $content;
    }


    function kuldesSessionbe()
    {

        $content = "";
        $nev = "";
        $datum = "";
        $becenev = "";

        if(isset($_POST['kuldes']))
        {
            if(isset($_POST['nev']) && htmlspecialchars($_POST['nev']))
            {
                $nev = $_POST["nev"];
            }
            if(isset($_POST['datum']) && htmlspecialchars($_POST['datum']))
            {
                $datum = $_POST["datum"];
            }
            if(isset($_POST['becenev']) && htmlspecialchars($_POST['becenev']))
            {
                $becenev = $_POST["becenev"];
            }

            $adat = "$nev;$datum;$becenev";
         //   $_SESSION['adatok'] = [];
            $_SESSION['adatok'][] = $adat;

            var_dump($_SESSION);


        }

    }
?>