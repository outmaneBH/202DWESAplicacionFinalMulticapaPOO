var input = document.getElementById("searchTxt");
var table = document.getElementsByTagName("table");

function loadDoc() {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        let json = JSON.parse(this.responseText);
        console.log(json);

        for (var i = 0; i < json.length; i++) {
            var newTr = document.createElement("tr");
            for (var j = 0; j < 7; j++) {
                var newTd = document.createElement("td");
                var textoTd = document.createTextNode(json[i].codUsuario);
                newTd.appendChild(textoTd);
                newTr.appendChild(newTd);
            }
            table[0].appendChild(newTr);
        }

    }
    xhttp.open("GET", "https://outmane.local/API/BuscarUsuarioPorDesc.php?descUsuario=" + input.value, true);
    xhttp.send();
}


