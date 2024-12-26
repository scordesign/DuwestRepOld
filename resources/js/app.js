require('./bootstrap');



function opem() {
    var onselect = document.getElementById("first"); 
    var condicion = onselect.getAttribute("value");
    var oscuro = document.getElementById("oscuro");
    if (condicion == 0) {     
    } else {
        var oscuro = document.getElementById("oscuro");
        oscuro.setAttribute("style","display:hidden;");
    }
}

function exit() {
    var oscuro = document.getElementById("oscuro");
    oscuro.setAttribute("style","display:hidden;");
}

function blanbio() {
    var blancobio = document.getElementById("blancobio");
    if (blancobio.classList.contains("vis")) {
        blancobio.classList.remove("vis");
    } else {
        blancobio.classList.add("vis");
    }
}

function parttotal() {
    var partotal = document.getElementById("partotal").innerHTML;
    var part = document.getElementById("parti").getAttribute("value");
    var sum = partotal + part;
    if (sum > 100) {
        window.alert("la participacion total es mayor al 100% corrijalo por favor")
    } 
}

function replace() {
    var descfact = document.getElementById("descfact").value;
    var descfact1 = document.getElementById("descfact1");
    var descfact2 = document.getElementById("descfact2");
    descfact1.setAttribute("value",descfact);
    descfact2.setAttribute("value",descfact);
}

function replace() {
    var opciones = document.getElementById("opciones").value;
    var opcion0 = document.getElementById("opcion0");
    var opcion1 = document.getElementById("opcion1");
    if (Number(opciones) = 0) {
        if (opcion1.classList.contains("vis")) {
            opcion1.classList.add("vis");
        }
        opcion0.classList.remove("vis");
    } else {
        if (opcion0.classList.contains("vis")) {
            opcion0.classList.add("vis");
            console.log('hola');
        }
        opcion1.classList.remove("vis");
    }
}

function promedioa(cond) {
    var mes = document.getElementById("mes"+cond).value;
    var clima = document.getElementById("clima"+cond).value;
    console.log(mes);
    console.log(clima);
}

function buscar() {
    var buscar = document.getElementById("buscar");
    var count = Number(document.getElementById("count"));
    var acu = 1 ;
    while (acu <= count) {
        var elements = document.getElementById(acu).innerHTML;
        if (elements.includes(buscar)) {
            console.log(elements);
        } else {
            console.log(buscar);
            
        }
        acu++;
    }
}

function disabled(cult,cond) {
    var select = document.getElementById("bb"+cult+cond).value.toLowerCase();
    select.setAttribute("disabled")
    var search = document.getElementById("allcults").innerHTML.toLowerCase();
    if (search.includes(select)) {
        window.alert("hola");
    }
}