<?php

    function tablazat()
    {

        $content = "";

        $content .= '<table class="table table-striped">';
        $content .= '<thead><tr><th></th><th></th></tr></thead>';
        if(file_exists("save.txt"))
        {
            $fileSorok = file("save.txt");
            
            


        }
        
        $content .= '</table>';

    }

?>