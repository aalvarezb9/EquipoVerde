const url = '../Backend/API/Users.php';

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

function cargarDatos(){
    axios({
        method: 'GET',
        url: url + '?id=' + leerCookie("id"),
        responseType: 'json'
    }).then(res => {
        if(res.data != false || res.data != null){
            console.log(res.data);
            document.getElementById('nombre').value = res.data.name;
            document.getElementById('apellido').value = res.data.lastname;
            document.getElementById('institucion').value = res.data.institution;
            document.getElementById('pais').value = res.data.country;
            document.getElementById('email').value = res.data.email;
            document.getElementById('userName').textContent = 'HOLA, ' + res.data.name.toUpperCase();
            document.getElementById(res.data.gender).setAttribute('checked', 'true');
        }else{
            alert("Error");
            return false;
        }
    }).catch(err => {
        alert("Error");
        return false;
    })
}

cargarDatos();

function validar(){
    let nombre = document.getElementById('nombre');
    let apellido = document.getElementById('apellido');
    let institution = document.getElementById('institucion');
    let country = document.getElementById('pais');
    let email = document.getElementById('email');
    let email2 = document.getElementById('confirm-email');
    let password = document.getElementById('password');
    let password2 = document.getElementById('confirm-password');
    let Masculino = document.getElementById('Masculino');
    let Femenino = document.getElementById('Femenino');
    let seleccionado;
    let small = document.getElementById('obligatorio-correo');
    let reEmail = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    if(
        nombre.value == '' ||
        apellido.value == '' ||
        institution.value == '' ||
        country.value == '' ||
        email.value == '' ||
        email2.value == '' ||
        password.value == '' ||
        password2.value == '' ||
        (!Masculino.checked &&
        !Femenino.checked)
    ){
        // small.setAttribute('style', 'display: block');
        small.textContent = 'Todos los campos son obligatorios';
    }else{
        if(!reEmail.test(email.value) || !reEmail.test(email2.value)){
            small.textContent = 'Formato de correo incorrecto';
        }else{
            if(email.value != email2.value){
                small.textContent = 'Correos no coinciden';
            }else{
                if(password.value != password2.value){
                    small.textContent = 'Contraseñas no coinciden';
                }else{
                    small.textContent = '';
                    if(Masculino.checked){
                        seleccionado = Masculino.value;
                    }else{
                        seleccionado = Femenino.value;
                    }
                    actualizar(nombre.value,
                             apellido.value,
                             institution.value,
                             country.value,
                             email.value,
                             password.value,
                             seleccionado
                    );
                }
            }
        }
    }
}


function actualizar(name, lastname, institution, country, email, password, gender){
    axios({
        method: 'PUT',
        url: url + '?id=' + leerCookie("id"),
        responseType: 'json',
        data: {
            new: {
                name: name,
                lastname:  lastname,
                email: email,
                country: country,
                gender: gender,
                institution: institution,
                password: password
            }
        }
    }).then(res => {

    }).catch(err => {
        
    })
}

