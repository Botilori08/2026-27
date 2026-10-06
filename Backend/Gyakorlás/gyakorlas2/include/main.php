<?php
//header("Location: " . $_SERVER['PHP_SELF']);
    function foOldal()
    {
        $szoveg = "";

        $szoveg .= '<div class="row">';
            $szoveg .= '<div class="col-6">';
            $szoveg .= '<h2>Cím</h2>';
            $szoveg.='<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam et mauris ac nisl suscipit egestas quis quis nulla. Aliquam sit amet dui mi. Cras et mi diam. Suspendisse potenti. Ut ut eros id ligula suscipit suscipit aliquet at ex. Vivamus lectus urna, pharetra eget tincidunt ultrices, volutpat sed libero. Pellentesque a quam turpis. Mauris porta facilisis eros sed rhoncus. Praesent blandit lorem in orci ornare, sit amet imperdiet magna convallis. Duis feugiat tortor non est interdum porttitor. Nullam vitae iaculis elit. Ut placerat massa eu magna vestibulum, sed feugiat lorem accumsan. Nunc quis ultricies enim, in feugiat quam. Maecenas id purus quis libero auctor cursus sed eget velit. </p>';
            $szoveg .= '<p>Ut sit amet libero ante. Fusce risus lacus, porttitor ac ipsum vitae, lacinia sagittis neque. Vivamus semper ac lacus fermentum dignissim. Etiam nec quam orci. Nunc sed varius diam. Sed eu iaculis nibh. Vivamus at urna massa. Vivamus ornare ipsum ac dui congue, sit amet aliquam arcu interdum. Aenean ut justo tempus, faucibus sem nec, ullamcorper mauris. Duis consectetur mollis libero, sed volutpat erat pharetra eget. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. </p>';
            $szoveg .= '</div>';
            $szoveg .= '<div class="col-6">';
                $szoveg .= '<img src="./Mick-TuskPressKit-1.webp" class="w-50">';
            $szoveg .= '</div>';
        $szoveg .= '</div>';


        return $szoveg;
    }
?>