var input = document.getElementById("searchTxt");
var table = document.getElementsByTagName("tbody");
var tr = document.getElementsByTagName("tr");
loadDoc();
var campoUser = "";
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
                if (campo == "codUsuario")
                {
                    campoUser = usuario[campo];
                }
            }
            createbtn(newTr, campoUser);
//            newTr.setAttribute("class", campoUser);

            table[0].appendChild(newTr);
        }

    }
    var clase = "http://daw202.sauces.local/202DWESAplicacionFinalMulticapaPOO/API/BuscarUsuarioPorDesc.php?descUsuario=";
    var casa = "https://outmane.local/API/BuscarUsuarioPorDesc.php?descUsuario=";
    var oneandone = "https://daw202.ieslossauces.es/202DWESAplicacionFinalMulticapaPOO/API/BuscarUsuarioPorDesc.php?descUsuario=";
    xhttp.open("GET", clase + input.value, true);
    xhttp.send();
}

function CreateTr(campo, valor, newTr)
{
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
    newTD.innerHTML = "<button type='button' onclick='editar(ev);' name='update'><img  src='webroot/media/update.png'></button>";
    newTr.appendChild(newTD);
    var newTD = document.createElement("td");
    newTD.innerHTML = "<button type='button' value='" + codigo + "' onclick='borrar();' class='btndelete' name='delete'><img  src='webroot/media/delete.png'></button>";
    newTr.appendChild(newTD);
}

function borrar(codigo)
{
    if (confirm("¿Está seguro de que desea eliminar el usuario "+this.value)) { 
        alert("alll");
    }


}


//table[0].addEventListener("click", edit);
//function edit(ev) {
//
//    alert(ev.target.className);
//}

//function  editar(ev)
//{
//   
////   alert(ev.target.className);
//}



