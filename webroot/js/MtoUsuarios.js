var input = document.getElementById("searchTxt");
var table = document.getElementsByTagName("tbody");
var tr = document.getElementsByTagName("tr");
var btndelete = document.getElementsByName("btndelete");
var clase = "http://daw202.sauces.local/202DWESAplicacionFinalMulticapaPOO/API/BuscarUsuarioPorDesc.php?descUsuario=";
var casa = "https://outmane.local/API/BuscarUsuarioPorDesc.php?descUsuario=";
var oneandone = "https://daw202.ieslossauces.es/202DWESAplicacionFinalMulticapaPOO/API/BuscarUsuarioPorDesc.php?descUsuario=";
var alertId = document.getElementById("alert");
var active = false;
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
            newTr.setAttribute("onclick", "index(this)");

            table[0].appendChild(newTr);
        }

    }

    xhttp.open("GET", oneandone + input.value, true);
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
//onclick='myUpdate(event)'

function createbtn(newTr, codigo) {
//    var newTD = document.createElement("td");
//    newTD.innerHTML = "<button type='button' value='" + codigo + "' name='update' ><img  class='" + codigo + "' src='webroot/media/update.png'/></button>";
//    newTr.appendChild(newTD);
    var newTD = document.createElement("td");
    newTD.innerHTML = "<button type='button' value='" + codigo + "' onclick='myDelete(event)' name='delete' ><img  class='" + codigo + "' src='webroot/media/delete.png'/></button>";
    newTr.appendChild(newTD);
}
var casa2 = "https://outmane.local/API/BorrarUsuarioPorCodigo.php?codUsuario=";
var clase2 = "http://daw202.sauces.local/202DWESAplicacionFinalMulticapaPOO/API/BorrarUsuarioPorCodigo.php?codUsuario=";
var oneandone2 = "https://daw202.ieslossauces.es/202DWESAplicacionFinalMulticapaPOO/API/BorrarUsuarioPorCodigo.php?codUsuario=";

//Para Borrar usuario 
function myDelete(event) {
    var x = event.target.classList.item(0);

    if (confirm("¿Está seguro de que desea eliminar " + x)) {
        var xtp = new XMLHttpRequest();
        xtp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                loadDoc();
                alertId.style.display = "block";
                alertId.innerHTML = "Se ha borrado el usuario bien";
                let msgAlert = setTimeout(msg, 5000);
            }
        };
        xtp.open("GET", oneandone2 + x + "&&key=administrador", true);
        xtp.send();
    }
}

function myUpdate(ev) {
}
var j = 0;
//Para modificar los datos de un usuario
function index(x) {
    var datos = [];
    var tr = document.getElementsByTagName("tr")[x.rowIndex];
    if (!active) {
        active = true;
        for (var i = 0; i < tr.children.length; i++) {
            if ((i == 1) || (i == 4)) {
                tr.children[i].setAttribute("contenteditable", "true");
                tr.children[i].style.backgroundColor = "blue";
            }
        }
        j++;

    } else {
        active = false;
        for (var i = 0; i < tr.children.length; i++) {
            if ((i == 0) || (i == 1) || (i == 4)) {
                datos.push(tr.children[i].innerText);
            }
        }
        if (j == 2) {
            if (confirm("¿Está seguro de que Quieres Modificar " + datos[0])) {
                var xtp = new XMLHttpRequest();
                xtp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        loadDoc();
                        j=0;
                        alertId.style.display = "block";
                        alertId.innerHTML = "Se ha Cambiado el usuario bien";
                        let msgAlert = setTimeout(msg, 5000);
                    }
                }
                ;
                console.log(datos[0],datos[1],datos[2]);
                xtp.open("GET", "https://daw202.ieslossauces.es/202DWESAplicacionFinalMulticapaPOO/API/cambiarDatosUsuario.php?codUsuario=" + datos[0] + "&&DescUsuario=" + datos[1] + "&&Perfil=" + datos[2], true);
                xtp.send();
            } else {
                j=0;
                loadDoc();
            }
        }
    }
}

function msg() {
    alertId.style.display = "none";
}





