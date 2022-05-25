var validarLogin = function() {
    //Email
    valor = document.getElementById("logemail").value;
    if (!/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(valor)) {
        alert("Escriba el correo correctamente");
        return false;
    }


    passwd = document.getElementById("logpass").value;
    if (passwd.length == 0) {
        alert("Tiene que escribir una contraseña")
        return false;
    }
    return true;
}