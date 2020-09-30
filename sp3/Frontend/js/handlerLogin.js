const url = '../Backend/API/Logins.php';
const url2 = 'http://localhost/sp3/Backend/API/Logins.php';

function send(){
    if(verificar() == 1){
        document.getElementById('obligatorio-correo').setAttribute('style', 'display:block');
        document.getElementById('obligatorio-contra').setAttribute('style', 'display:block');
        document.getElementById('emailHelp').setAttribute('style', 'display:none');
        document.getElementById('incorrecto-correo').setAttribute('style', 'display:none');
    }else if(verificar() == 2){
        document.getElementById('obligatorio-correo').setAttribute('style', 'display:block');
        document.getElementById('obligatorio-contra').setAttribute('style', 'display:none');
        document.getElementById('emailHelp').setAttribute('style', 'display:none');
        document.getElementById('incorrecto-correo').setAttribute('style', 'display:none');
    }else if(verificar() == 3){
        document.getElementById('obligatorio-correo').setAttribute('style', 'display:none');
        document.getElementById('obligatorio-contra').setAttribute('style', 'display:block');
        document.getElementById('emailHelp').setAttribute('style', 'display:none');
        document.getElementById('incorrecto-correo').setAttribute('style', 'display:none');
    }else if(verificar() == 5){
        document.getElementById('obligatorio-correo').setAttribute('style', 'display:none');
        document.getElementById('obligatorio-contra').setAttribute('style', 'display:none');
        document.getElementById('emailHelp').setAttribute('style', 'display:none');
        document.getElementById('incorrecto-correo').setAttribute('style', 'display:block');
    }else{
        document.getElementById('obligatorio-correo').setAttribute('style', 'display:none');
        document.getElementById('obligatorio-contra').setAttribute('style', 'display:none');
        document.getElementById('emailHelp').setAttribute('style', 'display:block');
        document.getElementById('incorrecto-correo').setAttribute('style', 'display:none');
        axios({
            method: 'POST',
            url: url,
            responseType: 'json',
            data: {
                email: document.getElementById("email").value,
                password: document.getElementById("password").value
            }
        }).then(res => {
            if(res.data.status == "ok"){
                console.log(res.data);
                //Se inicia sesión
            }else{
                alert("Contraseña incorrecta");
                return false;
                // Hacer esto bonito
            }
        }).catch(err => {
            alert("Error " + err);
            return false;
        })
    }
}

function verificar(){
    let verifica = 0;
    let email = document.getElementById("email");
    let password = document.getElementById("password");
    let reEmail = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    if(email.value == '' && password.value == ''){
        verifica = 1; // Ambos campos están vacíos
    }else if(email.value == '' && password.value != ''){
        verifica = 2; // Correo vacío
    }else if(email.value != '' && password.value == ''){
        verifica = 3; // Contraseña vacía
    }else{
        if(reEmail.test(email.value)){
            verifica = 4; // Nada vacío Y se cumple la regex del correo
        }else{
            verifica = 5; // Nada vacío Y no se cumple con la expresión regular del correo
        }
    }

    return verifica;
}