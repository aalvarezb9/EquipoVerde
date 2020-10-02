const url = '../Backend/API/Users.php';

function validar(){
    let nombre = document.getElementById('nombre');
    let apellido = document.getElementById('apellido');
    let institution = document.getElementById('institucion');
    let country = document.getElementById('pais');
    let email = document.getElementById('email');
    let email2 = document.getElementById('confirm-email');
    let password = document.getElementById('password');
    let password2 = document.getElementById('confirm-password');
    let man = document.getElementById('man');
    let woman = document.getElementById('woman');
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
        (!man.checked &&
        !woman.checked)
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
                    if(man.checked){
                        seleccionado = man.value;
                    }else{
                        seleccionado = woman.value;
                    }
                    registrar(nombre.value,
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

function registrar(name, lastname, institution, country, email, password, gender){
    axios({
        method: 'POST',
        url: url,
        responseType: 'json',
        data: {
            name: name,
            lastname: lastname,
            email: email,
            institution: institution,
            password: password,
            country: country,
            gender: gender
        }
    }).then(res => {
        console.log(res);
        if(res.data.status == "ok"){
            document.getElementById('nombre').value = '';
            document.getElementById('apellido').value = '';
            document.getElementById('institucion').value = '';
            document.getElementById('pais').value = '';
            document.getElementById('email').value = '';
            document.getElementById('confirm-email').value = '';
            document.getElementById('password').value = '';
            document.getElementById('confirm-password').value = '';
            // alert("Usuario registrado con éxito");
            window.location.href = 'login.html';
            // return false;
        }else{
            alert("Correo ya existente");
            return false;
        }
    }).catch(err => {
        alert(err);
        return false;
    })
}