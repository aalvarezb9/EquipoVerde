let usuario= document.getElementById("userName");
let cookies=document.cookie;
cookies= cookies.split(';');
cookies = cookies[3].split('=');
let nombre= cookies[1];
usuario.textContent=`HOLA, ${nombre.toUpperCase()}`;