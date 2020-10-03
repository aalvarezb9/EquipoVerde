
const url = '../Backend/API/Users.php';
const urlDatos = '../Backend/API/Infos.php';

const tilesProvider = "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png";
const tilesProvider2 = "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png";
var tiempos = [];

var mymap = L.map('map-sec').setView([51.505, -0.09], 2.3);
var mymap2 = L.map('map-sec-2').setView([51.505, -0.09], 2.3);

L.tileLayer(tilesProvider, {
    // attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 25,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'your.mapbox.access.token'
}).addTo(mymap);

L.tileLayer(tilesProvider2, {
    // attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 25,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'your.mapbox.access.token'
}).addTo(mymap2);


let marker = L.marker([14.087097, -87.159380]).addTo(mymap);

let marker2 = L.marker([14.087097, -87.159380]).addTo(mymap2);


var iconSat = L.icon({
    iconUrl: 'img/satellite.svg',
    iconSize: [20, 20],
    iconAnchor: [20, 20]
});
L.marker([14.087097, -87.159390], { icon: iconSat }).addTo(mymap);

function movSatellite(lon, lat) {
    L.marker([lon, lat], { icon: iconSat }).addTo(mymap2);
}


function llenarTiempo() {
    let i = 0;
    while (i < 5917) {
        tiempos.push(i);
        i += 30;
    }
}

llenarTiempo();
var iterador = tiempos[0];
// setInterval(llenarTiempo, 10000);


function latitud(time) {
    return -87.159390 + (time / 240);
}

function longitud(time) {
    return 14.087097 + (time / 240);
}

function arrSat() {
    iterador = iterador + 1;
    if (iterador < tiempos.length) {
        movSatellite(longitud(tiempos[iterador]), latitud(tiempos[iterador]));
    } else {
        iterador = 0;
    }
}

setInterval(arrSat, 30000);

function verDatos() {
    $("#modal-datos").modal('show');
}

function cargarFechas() {
    axios({
        method: 'GET',
        url: urlDatos + '?id=all',
        responseType: 'json'
    }).then(res => {

    }).catch(err => {

    })
}

function enviar() {
    let hora = document.getElementById('hour').value + ":00";
    let fecha = document.getElementById('date').value;
    
    axios({
        method: 'GET',
        url: urlDatos+`?fecha=${fecha}&hora=${hora}`,
        responseType: 'json',
        data: {
            fecha:fecha,
            hora:hora
        }
    }).then(res => {
        console.log(res.data);
        for(let i = 0; i<res.data.length;i++){
            document.getElementById('temp-dato').innerHTML = res.data[i].temperatura;
            document.getElementById('temp-hora').innerHTML = res.data[i].marcaTiempo
            document.getElementById('pres-dato').innerHTML = res.data[i].presionAtmosferica;
            document.getElementById('pres-hora').innerHTML = res.data[i].marcaTiempo
            document.getElementById('altu-dato').innerHTML = res.data[i].alturaRio;
            document.getElementById('altu-hora').innerHTML = res.data[i].marcaTiempo
            document.getElementById('caud-dato').innerHTML = res.data[i].caudal;
            document.getElementById('caud-hora').innerHTML = res.data[i].marcaTiempo
            document.getElementById('prec-dato').innerHTML = res.data[i].precipitacion;
            document.getElementById('prec-hora').innerHTML = res.data[i].marcaTiempo
        }
        
    }).catch(err => {
        console.log(err);
    })
}


function dinamico() {
    document.getElementById('mostrar-posicion').setAttribute('style', 'display: block');
    document.getElementById('mostrar-orbita').setAttribute('style', 'display: none');
    document.getElementById('map-sec').setAttribute('style', 'display: none');
    document.getElementById('map-sec-2').setAttribute('style', 'display: block');
}

function estatico() {
    document.getElementById('mostrar-posicion').setAttribute('style', 'display: none');
    document.getElementById('mostrar-orbita').setAttribute('style', 'display: block');
    document.getElementById('map-sec').setAttribute('style', 'display: block');
    document.getElementById('map-sec-2').setAttribute('style', 'display: none');
}

function leerCookie(namee) {
    let name = namee + "=";
    let ca = document.cookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return unescape(c.substring(name.length, c.length));
    }
    return "";
}

function cargarNombre() {
    axios({
        method: 'GET',
        url: url + '?id=' + leerCookie("id"),
        responseType: 'json'
    }).then(res => {
        if (res.data.name != false || res.data.name != null) {
            document.getElementById("userName").textContent = `HOLA, ${res.data.name.toUpperCase()}`;
        } else {
            alert("Error");
            return false;
        }
    }).catch(err => {
        alert("Error");
        return false;
    })
}

cargarNombre();