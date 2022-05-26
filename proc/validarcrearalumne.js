var validaFormulario = function() {
    //DNI
    valor = document.getElementById("logDNI").value;
    var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];
    if (!(/^\d{8}[A-Z]$/.test(valor)) || (valor.charAt(8) != letras[(valor.substring(0, 8)) % 23])) {
        alert("Escriba el DNI correctamente");
        return false;
    }

    //Nombre
    nombre = document.getElementById("lognombre").value;
    if (document.formulario.lognombre.value.length == 0) {
        alert("Tiene que escribir su nombre")
        document.formulario.lognombre.focus()
        return false;
    }


    if (/^([0-9])*$/.test(nombre)) {
        alert("El valor " + nombre + " no es una letra");
        document.getElementById("lognombre").focus();
        document.getElementById("lognombre").style.borderColor = "red";
        return false;
    }
    //Apellido 1
    if (document.formulario.logapellido1.value.length == 0) {
        alert("Tiene que escribir su apellido")
        document.formulario.logapellido1.focus()
        return false;
    }

    apellido = document.getElementById("logapellido1").value;
    if (/^([0-9])*$/.test(apellido)) {
        alert("El valor " + apellido + " no es una letra");
        document.getElementById("logapellido1").focus();
        document.getElementById("logapellido1").style.borderColor = "red";
        return false;
    }
    //Apellido 2
    if (document.formulario.logapellido2.value.length == 0) {
        alert("Tiene que escribir su apellido")
        document.formulario.logapellido2.focus()
        return false;
    }

    apellido = document.getElementById("logapellido2").value;
    if (/^([0-9])*$/.test(apellido)) {
        alert("El valor " + apellido + " no es una letra");
        document.getElementById("logapellido2").focus();
        document.getElementById("logapellido2").style.borderColor = "red";
        return false;
    }

    //Email
    valor = document.getElementById("logemail").value;
    if (!/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(valor)) {
        alert("Tiene que escribir un correo correctamente");
        return false;
    }

    //Telefono
    telf = document.getElementById("logtelf").value;
    if (!(/^\d{9}$/.test(telf))) {
        alert("Tiene que escribir su número de teléfono")
        return false;
    }

    //Curso
    indice = document.getElementById("logclase").selectedIndex;
    if (indice == null || indice == 0) {
        alert("Tiene que seleccionar un ítem del desplegable")
        return false;
    }
    //Contraseña
    passwd = document.getElementById("logpass").value;
    if (passwd.length == 0) {
        alert("Tiene que escribir una contraseña")
        return false;
    }
    return true;
}

// alert('hola');