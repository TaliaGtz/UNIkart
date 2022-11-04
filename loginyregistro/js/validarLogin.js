const username = document.getElementById('username');
const password = document.getElementById('password');

function validateLogIn() {
    let User = document.forms["LogIn"]["User"].value;
    let Pwd = document.forms["LogIn"]["Pwd"].value;
    const passwordV = password.value.trim();
    var strongRegex = new RegExp("^(?=.[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");

    if (User == "") {
        swal({
            title: "Error",
            text: "La celda de username no puede estar en blanco",
            icon: "error",
            button: "Aceptar",
        });
        return false;
    }

    if(passwordV === '')
    {
        swal({
            title: "Error",
            text: "La celda de password no puede estar en blanco",
            icon: "error",
            button: "Aceptar",
        });
        return false;
    }
    /*if (!strongRegex.test(passwordV))
    {
        swal({
            title: "Warning",
            text: "Tu contraseña debe tener: min 8 caracteres, una mayúscula, una minúscula, un número y un signo de puntuación",
            icon: "warning",
            button: "Aceptar",
        });
        return false;
    }*/
    return true;
}