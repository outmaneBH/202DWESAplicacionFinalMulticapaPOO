var input = document.getElementById("searchTxt");
var table = document.getElementsByTagName("tbody");
var tr = document.getElementsByTagName("tr");
var btndelete = document.getElementsByName("btndelete");
var clase = "http://daw202.sauces.local/202DWESAplicacionFinalMulticapaPOO/API/BuscarUsuarioPorDesc.php?descUsuario=";
var casa = "https://outmane.local/API/BuscarUsuarioPorDesc.php?descUsuario=";
var oneandone = "https://daw202.ieslossauces.es/202DWESAplicacionFinalMulticapaPOO/API/BuscarUsuarioPorDesc.php?descUsuario=";
var alertId=document.getElementById("alert");
loadDoc();
var campoUser = "";
function loadDoc() {

    var xhttp = new XMLHttpRequest();
    xhttp.onload = function () {

        let json = JSON.parse(this.responseText);
        table[0].innerHTML = "";
        console.log(json);
        for (let usuario of json) {
            var newTr = document.createElement("tr");
            for (let campo in usuario) {
                CreateTr(campo, usuario[campo], newTr); //Añadir
                if (campo == "codUsuario") {
                    campoUser = usuario[campo];
                }
            }
            createbtn(newTr, campoUser);
            //            newTr.setAttribute("class", campoUser);

            table[0].appendChild(newTr);
        }

    }

    xhttp.open("GET", casa + input.value, true);
    xhttp.send();
}

function CreateTr(campo, valor, newTr) {
    var newTD = document.createElement("td");
    switch (campo) {
        case "imagen":
            newTD.innerHTML = valor ? "<img src='data:image/png;base64," + valor + "' alt='imagen de usuario'/>" : "-";
            break;
        case "fechaHoraUltimaConexion":
            let Time = new Date(parseInt(valor) * 1000);
            newTD.innerHTML = valor ? Time.toUTCString() : '-';
            break;
        case "numConexiones":
            newTD.innerHTML = valor == 0 ? '-' : valor;
            break;

        default:
            newTD.innerHTML = valor;
            break;
    }

    newTr.appendChild(newTD);
}

function createbtn(newTr, codigo) {
    var newTD = document.createElement("td");
    newTD.innerHTML = "<button type='button' name='update'><img  class='" + codigo + "' src='webroot/media/update.png'/></button>";
    newTr.appendChild(newTD);
    var newTD = document.createElement("td");
    newTD.innerHTML = "<button type='button' value='" + codigo + "' onclick='myFunction(event)' name='delete' ><img  class='" + codigo + "' src='webroot/media/delete.png'/></button>";
    newTr.appendChild(newTD);

}

function myFunction(event) {
    var x = event.target.classList.item(0);
    if (confirm("¿Está seguro de que desea eliminar " + x)) {
        var xtp = new XMLHttpRequest();
        xtp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                loadDoc();
                
                alertId.style.display="block";
                alertId.innerHTML+="Se ha borrado el usuario bien";
                let msgAlert = setTimeout(msg, 5000);
            }
        };
        //Clase
       
        xtp.open("GET", "https://outmane.local/API/BorrarUsuarioPorCodigo.php?codUsuario=" + x+"&key=paso", true);
        xtp.send();
    }
}

function msg() {
    alertId.style.display = "none";
}





