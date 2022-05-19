var validaFormulario = function() {
    //DNI
    campo = document.getElementById('logDNI');
    valor = campo.value;
    if (valor == null || valor.length == 0 || /^\s+$/.test(valor)) {
        alert("Debe introducir su nombre");
        campo.style.backgroundColor = "red";
        campo.focus();
        return false;
    }
    var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];
    //num
    if (!(/^\d{8}[A-Z]$/.test(dni))) {
        alert("Modifique el formato del DNI")
        return false;
    }

    //letra
    if (dni.charAt(8) != letras[(dni.substring(0, 8)) % 23]) {
        alert("Modifique el formato del DNI")
        return false;
    }

    //Nombre
    nombre = document.getElementById("lognombre").value;
    if (document.formulario.lognombre.value.length == 0) {
        alert("Tiene que escribir su nombre")
        document.formulario.lognombre.focus()
        return 0;
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
        return 0;
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
        return 0;
    }

    apellido = document.getElementById("logapellido2").value;
    if (/^([0-9])*$/.test(apellido)) {
        alert("El valor " + apellido + " no es una letra");
        document.getElementById("logapellido2").focus();
        document.getElementById("logapellido2").style.borderColor = "red";
        return false;
    }

    //Email
    if (document.formulario.logemail.value.length == 0) {
        alert("Tiene que ser formato correo")
        document.formulario.logemail.focus()
        return 0;
    }

    correo = document.getElementById("logemail").value;
    if (!(/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)/.test(correo))) {
        alert("Tiene que ser formato correo")
        return false;
    }

    //Telefono
    if (document.formulario.logtelf.value.length == 0) {
        alert("Tiene que escribir su número de teléfono")
        document.formulario.element_5.focus()
        return 0;
    }

    telf = document.getElementById("logtelf").value;
    if (!(/^\d{9}$/.test(telf))) {
        alert("Tiene que escribir su número de teléfono")
        return false;
    }
}
alert('hola');