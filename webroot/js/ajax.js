var input = document.getElementById("searchTxt");
var table = document.getElementsByTagName("tbody");
loadDoc();
function loadDoc() {

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {

        let json = JSON.parse(this.responseText);
        table[0].innerHTML = "";
        console.log(json);
        for (let usuario of json) {
            var newTr = document.createElement("tr");
            for (let campo in usuario) {
                CreateTr(campo, usuario[campo], newTr); //Añadir
            }
            createbtn(newTr);
            table[0].appendChild(newTr);
        }

    }
 
    xhttp.open("GET", "https://daw202.ieslossauces.es/202DWESAplicacionFinalMulticapaPOO/API/BuscarUsuarioPorDesc.php?descUsuario=" + input.value, true);
    xhttp.send();
}

function CreateTr(campo, valor, newTr)
{
    var newTD = document.createElement("td");
    switch (campo) {
        case "imagen":
            newTD.innerHTML = valor ? "<img src='data:image/png;base64," + valor + " alt='imagen de usuario'/>" : "-";
            break;
        case "fechaHoraUltimaConexion":
            let Time = new Date(parseInt(valor) * 1000);
            newTD.innerHTML = valor ? Time.toUTCString() : '-';
            break;
        case "numConexiones":
            newTD.innerHTML = valor==0 ? '-' : valor;
            break;

        default:
            newTD.innerHTML = valor;

            break;
    }

    newTr.appendChild(newTD);
}

function createbtn(newTr) {
    var newTD = document.createElement("td");
    newTD.innerHTML = "<button type='button' name='update'><img  src='webroot/media/update.png'></button>";
    newTr.appendChild(newTD);
    var newTD = document.createElement("td");
    newTD.innerHTML = "<button type='button' name='delete'><img  src='webroot/media/delete.png'></button>";
    newTr.appendChild(newTD);
}
