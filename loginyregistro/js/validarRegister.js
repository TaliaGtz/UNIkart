
const form = document.getElementById('form');
const names = document.getElementById('names');
const lastnames = document.getElementById('lastnames');
const birthday = document.getElementById('birthday');
const email = document.getElementById('email');
//const celular = document.getElementById('celular');
//const profileimage = document.getElementById('profileimage');
const username = document.getElementById('username');
const password = document.getElementById('password');
const confirmpassword = document.getElementById('confirmpassword');

function validar()
{
        const namesV = names.value.trim();
        const lastnamesV = lastnames.value.trim();
        const birthdayV = birthday.value.trim();
        const emailV = email.value.trim();
        //const celularV = celular.value.trim();
        //const profileimageV = profileimage.value.trim();
        const usernameV = username.value.trim();
        const passwordV = password.value.trim();
        const confirmpasswordV = confirmpassword.value.trim();
        
        var namesRegex = new RegExp("^[a-zA-ZÀ-ÿ ]+$");
        var fecha = new Date(birthdayV);
        var fechahoy = new Date();
        var strongRegex = new RegExp("^(?=.[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");

        if(namesV === '')
        {
            swal({
                title: "Error",
                text: "La celda de nombres no puede estar en blanco",
                icon: "error",
                button: "Aceptar",
            });
            return false;
        }
        
        if(lastnamesV === '')
        {
            swal({
                title: "Error",
                text: "La celda de apellidos no puede estar en blanco",
                icon: "error",
                button: "Aceptar",
            });
            return false;
        }

        if (!namesRegex.test(namesV))
        {
            swal({
                title: "Warning",
                text: "Escribe bien tu nombre",
                icon: "warning",
                button: "Aceptar",
            });
            return false;
        }
        if (!namesRegex.test(lastnamesV))
        {
            swal({
                title: "Warning",
                text: "Escribe bien tus apellidos",
                icon: "warning",
                button: "Aceptar",
            });
            return false;
        }
        
        if(birthdayV === '')
        {
            swal({
                title: "Error",
                text: "La celda de fecha de nacimiento no puede estar en blanco",
                icon: "error",
                button: "Aceptar",
            });
            return false;
            
        }
        if(fecha > fechahoy)
        {
            swal({
                title: "Error",
                text: "La fecha seleccionada es mayor a la actual favor de cambiarla por una válida",
                icon: "error",
                button: "Aceptar",
            });
            return false;
        }
        
        
        if(emailV === '')
        {
            swal({
                title: "Error",
                text: "La celda de email no puede estar en blanco",
                icon: "error",
                button: "Aceptar",
            });
            return false;
        } else if (!isEmail(emailV))
        {
            swal({
                title: "Error",
                text: "No es un email válido",
                icon: "error",
                button: "Aceptar",
            });
            return false;
        }
/*
        if(celularV === '')
        {
            swal({
                title: "Error",
                text: "La celda de número de teléfono no puede estar en blanco",
                icon: "error",
                button: "Aceptar",
            });
            return false;
        } else if (celularV.length != 10)
        {
            swal({
                title: "Error",
                text: "El número de teléfono solo acepta 10 dígitos",
                icon: "error",
                button: "Aceptar",
            });
            return false;
        }*/

        /*if(profileimageV === '')
        {
            swal({
                title: "Error",
                text: "La selección de foto de perfil no puede estar en blanco",
                icon: "error",
                button: "Aceptar",
            });
            return false;
        }*/

        if(usernameV === '')
        {
            swal({
                title: "Error",
                text: "La celda de nombre de usuario no puede estar en blanco",
                icon: "error",
                button: "Aceptar",
            });
            return false;
        }

        if(passwordV === '')
        {
            swal({
                title: "Error",
                text: "La celda de contraseña no puede estar en blanco",
                icon: "error",
                button: "Aceptar",
            });
            return false;
        }

        if(confirmpasswordV === '')
        {
            swal({
                title: "Error",
                text: "La celda de confirmar contraseña no puede estar en blanco",
                icon: "error",
                button: "Aceptar",
            });
            return false;
        }

        if (!strongRegex.test(passwordV))
        {
            swal({
                title: "Warning",
                text: "Tu contraseña debe tener: min 8 caracteres, una mayúscula, una minúscula, un número y un signo de puntuación",
                icon: "warning",
                button: "Aceptar",
            });
            return false;
        }else if (passwordV !== confirmpasswordV)
        {
            swal({
                title: "Error",
                text: "Las contraseñas no coinciden",
                icon: "error",
                button: "Aceptar",
            });
            return false;
        }
        return true;
        
}

function isEmail(email)
{
	return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}