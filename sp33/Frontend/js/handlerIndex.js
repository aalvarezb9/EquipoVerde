const tilesProvider = "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png";
const tilesProvider2 = "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png";
var tiempos = [];
const urlInfo = '../Backend/API/Infos.php';
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

// var ruta = L.icon({
//     iconUrl: 'img/ruta.svg',
//     iconSize: [5, 5],
//     iconAnchor: [5, 5]
// });

L.marker([14.087097, -87.159390], {icon: iconSat}).addTo(mymap);

function movSatellite(lon, lat){
    L.marker([lon, lat], {icon: iconSat}).addTo(mymap2);
}


function llenarTiempo(){
    let i = 0;
    while(i < 5917){
        tiempos.push(i);
        i += 30;
    }
}

llenarTiempo();
var iterador = tiempos[0];
// setInterval(llenarTiempo, 10000);


function latitud(time){
    return -87.159390 + (time/240);
}

function longitud(time){
    return 14.087097 + (time/240);
}

function arrSat(){
    iterador = iterador + 1;
    if(iterador < tiempos.length){
        movSatellite(longitud(tiempos[iterador]), latitud(tiempos[iterador]));
    }else{
        iterador = 0;
    }
}

setInterval(arrSat, 30000);

// var mark;
// function dibujarRuta(){
//     for(let i = 0; i < tiempos.length; i++){
//         L.marker([longitud(tiempos[i]), latitud(tiempos[i])], {icon: ruta}).addTo(mymap2);
//     }
// }



function dinamico(){
    document.getElementById('mostrar-posicion').setAttribute('style', 'display: block');
    document.getElementById('mostrar-orbita').setAttribute('style', 'display: none');
    document.getElementById('map-sec').setAttribute('style', 'display: none');
    document.getElementById('map-sec-2').setAttribute('style', 'display: block');
    // document.getElementById('ver-orbita').setAttribute('style', 'display: block');
}

function estatico(){
    document.getElementById('mostrar-posicion').setAttribute('style', 'display: none');
    document.getElementById('mostrar-orbita').setAttribute('style', 'display: block');
    document.getElementById('map-sec').setAttribute('style', 'display: block');
    document.getElementById('map-sec-2').setAttribute('style', 'display: none');
    // document.getElementById('ver-orbita').setAttribute('style', 'display: none');
    // document.getElementById('ocultar-orbita').setAttribute('style', 'display: none');
}

function cargarDatos(){
    axios({

    })
}

function verDatos(){
    $("#modal-datos").modal('show');
}

function redirigirLogin(){
    alert("Tienes que iniciar sesión para descargar los datos");
    window.location.href = 'login.html';
    return false;
}
// function dibujarOrbita(){
//     document.getElementById('ver-orbita').setAttribute('style', 'display: none');
//     document.getElementById('ocultar-orbita').setAttribute('style', 'display: block');
//     dibujarRuta();
// }

// function ocultarOrbita(){
//     document.getElementById('ver-orbita').setAttribute('style', 'display: block');
//     document.getElementById('ocultar-orbita').setAttribute('style', 'display: none');
//     mymap2.removeLayer(mark);
// }

// 1. Obtengo tu hora
// 2. Esa hora será mi valor inicial
// 3. Actualizar cada 30 segundos

// function orbForm(time){
    
// }

//14.6 vueltas al día

//Altura -> 700 km
//Velocidad -> 7.51 km/S, 4.67 mi/s
//Energía orbital -> 28.1855 J/kg
