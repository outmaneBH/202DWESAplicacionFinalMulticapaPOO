var input = document.getElementById("searchTxt");
var table = document.getElementsByTagName("tbody");


function loadDoc() {

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {

        let json = JSON.parse(this.responseText);
        table[0].innerHTML = "";

        for (let usuario of json) {
            var newTr = document.createElement("tr");
            for (let campo in usuario) {
                var newTd = document.createElement("td");
                if (campo == "T01_ImagenUsuario")
                {
                    let imagen = document.createElement("img");
                    imagen.setAttribute("class", "imagenUsuario");
                    if (usuario[campo] !== null) {
                        imagen.setAttribute("src", "data:image/jpg;base64,"+ Base64.decode(busuario[campo]));
                    }
                    newTd.appendChild(imagen);
                }

                var textoTd = document.createTextNode(usuario[campo]);
                newTd.appendChild(textoTd);
                newTr.appendChild(newTd);
            }
            table[0].appendChild(newTr);
        }


    }
    xhttp.open("GET", "http://daw202.sauces.local/202DWESAplicacionFinalMulticapaPOO/API/BuscarUsuarioPorDesc.php?descUsuario=" + input.value, true);
    xhttp.send();
}


