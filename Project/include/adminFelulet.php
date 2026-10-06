<h1>Admin felület</h1>
<div class="container">
    <div class="row">
        <div class="col-12"> 
            <label>Vasúttársaság</label>
            <select name="kivalaszt" id="tarsasagKivalaszt" class="form-control">
                <option value="MAV">MÁV</option>
                <option value="GYSEV">GYSEV</option>
                <option value="OEBB">ÖBB</option>
            </select>
        </div>
        <div class="row">
        <div class="col-12">
            <label>Járműtípus</label>
            <select name="jarmuTipuskivalaszt" id="jarmuTipuskivalaszt" class="form-control">

            </select>  
        </div>
        </div>

    </div>
    <div class="row">
        <div class="col-12">
            <label>Jármű képe:</label>
            <input type="file" name="kep" class="form-control">
    </div>
    <div class="row">
        <div class="col-12 mt-2">
            <button type="submit" class="btn btn-dark">Jármű hozzáadása</button>
    </div>
    
</div>

<script>

    let tarsasagKivalaszt = document.getElementById("tarsasagKivalaszt");

    tarsasagKivalaszt.addEventListener("change",function() {jsonMegszerez(this)});

    let jsonNeve = "";
    let optionNevek = []
    function jsonMegszerez(obj)
    {
        jsonNeve = obj.value+"forras.json";

        let forras = []

        let jarmuTipuskivalaszt = document.getElementById("jarmuTipuskivalaszt");


        fetch(jsonNeve)
        .then(x => x.json())
        .then(y => 
            {
                forras = y;

                console.log(forras);

                forras.forEach(e => {
                    optionNevek.push(e.nev);
                });

                console.log(optionNevek);

                optionNevek.forEach(e =>
                {
                let option = document.createElement("option");
                option.value = e;
                option.innerHTML = e;
                jarmuTipuskivalaszt.appendChild(option);

                })
                        
            }
        )
    
    }

</script>

