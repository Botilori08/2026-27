<div class="col-12">
        <div class="row mb-4">
                <div class="col-2" id="kivalasztoLista">

                </div>





            </div>
            <div class="row ml-2 mr-2" id="adatokUrlap">

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" encrypt="multipart/form-data" id="vonatAdatok">
                <div class="col-6 ml-2" id="urlap">
                    
                    
                        <h1>Vonat létrehozása</h1>
                        <label for="vonatSzam">Vonatszám</label>
                        <input type="number" name="vonatSzam" id="vonatSzam" class="input-group">
                        <label for="vonatTipus">Vonattípus</label>
                        <input type="text" name="vonatTipus" id="vonatTipus" class="input-group"> 
                        <label for="vonatNev">Vonatnév</label>
                        <input type="text" name="vonatNev" id="vonatNev" class="input-group"><br>

                    


                    </div>
                    <div class="col-6 mr-2 mb-5" id="utvonalMezo">
                        <label for="utvonal">Útvonal</label>
                        <textarea name="utvonal" id="utvonal" class="input-group"></textarea>
                        <button type="submit" class="btn btn-success mt-3">Beküldés</button>
                        
                    </div>
                    <input type="hidden" id="rejtettInput" name="szerelveny">
                
                </div>
                <div class="row ml-3">
                    <div id="vonat" class="col-12 flex-nowrap d-flex overflow-scroll align-items-end mb-5 p-4" name="vonat">
                        

                    </div>
                </div>
                </form> 
                <button class="btn btn-danger mt-3" name="torles" onclick="torles()">Törlés</button>  
            </div>

            </div>


        </div>
    </div>

    <script>

        let divekHelye = document.getElementById("kivalasztoLista")
        let betoltott;
        let jarmuvek = [];
        function betolt()
        {
            fetch("forras.json")
            .then(x => x.json())
            .then(y => 
                {
                    console.log(y)

                    jarmuvek = y;

                    //console.log(jarmuvek)

                    jarmuvek.forEach((e,i) => {
                        console.log(e);
                        let nagyDoboz = document.createElement("div");
                        nagyDoboz.classList.add("col-12");
                        nagyDoboz.classList.add("border");
                        nagyDoboz.classList.add("border-black")
                        nagyDoboz.innerHTML = e.nev;

                        e.kepek.forEach(kep => 
                            {
                                let kepDoboz = document.createElement("div")
                                kepDoboz.addEventListener("click",function() {kivalaszt(this)})
                                kepDoboz.classList.add("col-12")
                                kepDoboz.classList.add("kepesDoboz")
                                kepDoboz.classList.add("border");
                                kepDoboz.classList.add("border-black")
                                //kepDoboz.classList.add("overflow-x-auto")
                                kepDoboz.classList.add("d-flex")
                                kepDoboz.classList.add("flex-nowrap")
                                kepDoboz.classList.add("align-items-end")
                                let img = document.createElement("img")
                                img.classList.add("img-fluid")
                                if(e.nev.includes("mozdony") || e.nev == "Motorkocsik/motorvonatok" || e.nev == "Vezérlőkocsik")
                                {
                                    img.dataset["vontatojarmu"] = true;
                                }
                                img.src = "kepek/"+kep;
                                //img.classList.add("img-fluid");
                                kepDoboz.appendChild(img);
                                nagyDoboz.appendChild(kepDoboz);
                                
                            }
                        )
                        
                        divekHelye.appendChild(nagyDoboz);

                    });


                }
            )
        }

        let jarmuSzam = 0;

        function kivalaszt(obj)
        {

            console.log(obj.children[0])
            let kep = document.createElement("img")
            kep.src = obj.children[0].src
            kep.classList = obj.children[0].classList;
            kep.addEventListener("contextmenu", (e) => {e.preventDefault()});
            kep.addEventListener("contextmenu", function() {torolEgyjarmuvet(this)})
            kep.addEventListener("dblclick",function(){forgatas(kep)})
            if(jarmuSzam == 0)
            {
                if(obj.children[0].dataset["vontatojarmu"] == "true")
                {
                    document.getElementById("vonat").appendChild(kep);
                    jarmuSzam++;
                }
                else
                {
                    alert("Az első jármű csak mozdony vagy vezérlőkocsi lehet!")
                } 
            }
            else
            {
                document.getElementById("vonat").appendChild(kep);
                jarmuSzam++;
            }

            


            
        }

        function forgatas(elem)
        {
            if(elem.dataset.forgatott == "true")
            {
                elem.classList.add("nemForgatott");
                elem.style.transform = "scaleX(1)";
                elem.dataset.forgatott = false;
            }
            else
            {
                elem.style = "transform: scaleX(-1);";
                elem.dataset.forgatott = true;
            }



        }        

        function torles()
        {
            document.getElementById("vonat").innerHTML = "";
            document.getElementById("vonatSzam").value = "";
            document.getElementById("vonatTipus").value = ""
            document.getElementById("vonatNev").value = "";
            document.getElementById("utvonal").value = "";
        }


        function torolEgyjarmuvet(obj)
        {
            obj.parentElement.removeChild(obj);
        }

        
            let form = document.getElementById("vonatAdatok")

            form.addEventListener("submit",function(){
                let vonat = document.getElementById("vonat");

                let rejtettInput = document.getElementById("rejtettInput");

                rejtettInput.value = vonat.innerHTML.trim();

            })
            //console.log(vonat);


    </script>

    <?php

        if ($_SERVER["REQUEST_METHOD"] === "POST")
        {
            
            $file = fopen("include/osszeallitasok.txt","a+");

            $vonatNev = "";
            $vonatTipus = "";
            $vonatSzam = 0;
            $utvonal = "";
            $szerelveny = "";


                if(isset($_POST["vonatNev"]) && htmlspecialchars($_POST["vonatNev"]))
                {
                    $vonatNev = $_POST["vonatNev"];
                }
                if(isset($_POST["vonatTipus"]) && htmlspecialchars($_POST["vonatTipus"]))
                {
                    $vonatTipus = $_POST["vonatTipus"];
                }
                if(isset($_POST["vonatSzam"]) && htmlspecialchars($_POST["vonatSzam"]))
                {
                    $vonatSzam = (int)$_POST["vonatSzam"];
                }
                if(isset($_POST["utvonal"]) && htmlspecialchars($_POST["utvonal"]))
                {
                    $utvonal = $_POST["utvonal"];
                }
                if(isset($_POST["szerelveny"]) && htmlspecialchars($_POST["szerelveny"]))
                {
                    $szerelveny = $_POST["szerelveny"];
                }
            
            $sor = "$vonatSzam\t$vonatNev\t$vonatTipus\t$utvonal\t$szerelveny\n";
        
            fwrite($file,$sor);
            fclose($file);

            header("Location: " . $_SERVER['PHP_SELF']);
        }

    ?>