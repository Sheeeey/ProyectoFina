var validaFormulario = function() {
    //Nombre
    if (document.formulario.element_1_1.value.length == 0) {
        alert("Tiene que escribir su nombre")
        document.formulario.element_1_1.focus()
        return 0;
    }

    nombre = document.getElementById("element_1_1").value;
    if (/^([0-9])*$/.test(nombre)) {
        alert("El valor " + nombre + " no es una letra");
        document.getElementById("element_1_1").focus();
        document.getElementById("element_1_1").style.borderColor = "red";
        return false;
    }
    //Apellido
    if (document.formulario.element_1_2.value.length == 0) {
        alert("Tiene que escribir su apellido")
        document.formulario.element_1_2.focus()
        return 0;
    }

    apellido = document.getElementById("element_1_2").value;
    if (/^([0-9])*$/.test(apellido)) {
        alert("El valor " + apellido + " no es una letra");
        document.getElementById("element_1_2").focus();
        document.getElementById("element_1_2").style.borderColor = "red";
        return false;
    }
    //Paises
    pais = document.getElementById("element_3_6").selectedIndex;
    if (pais == null || pais == 0) {
        alert("Tiene que seleccionar su pais")
        return false;
    }
    //Ciudad
    if (document.formulario.element_3_3.value.length == 0) {
        alert("Tiene que escribir su ciudad")
        document.formulario.element_3_3.focus()
        return 0;
    }

    ciudad = document.getElementById("element_3_3").value;
    if (/^([0-9])*$/.test(ciudad)) {
        alert("El valor " + ciudad + " no es una letra");
        document.getElementById("element_3_3").focus();
        document.getElementById("element_3_3").style.borderColor = "red";
        return false;
    }
    //Provincia
    if (document.formulario.element_3_4.value.length == 0) {
        alert("Tiene que escribir su provincia")
        document.formulario.element_3_4.focus()
        return 0;
    }

    provincia = document.getElementById("element_3_4").value;
    if (/^([0-9])*$/.test(provincia)) {
        alert("El valor " + provincia + " no es una letra");
        document.getElementById("element_3_4").focus();
        document.getElementById("element_3_4").style.borderColor = "red";
        return false;
    }
    //Telefono
    if (document.formulario.element_5.value.length == 0) {
        alert("Tiene que escribir su número de teléfono")
        document.formulario.element_5.focus()
        return 0;
    }

    telf = document.getElementById("element_5").value;
    if (!(/^\d{9}$/.test(telf))) {
        alert("Tiene que escribir su número de teléfono")
        return false;
    }

    //Movil
    if (document.formulario.element_6.value.length == 0) {
        alert("Tiene que escribir su número de móvil")
        document.formulario.element_6.focus()
        return 0;
    }

    movil = document.getElementById("element_6").value;
    if (!(/^\d{9}$/.test(movil))) {
        alert("Tiene que escribir su número de móvil")
        return false;
    }
    //DNI
    if (document.formulario.element_7.value.length == 0) {
        alert("Tiene que escribir su DNI")
        document.formulario.element_7.focus()
        return 0;
    }

    dni = document.getElementById("element_7").value;
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

    //Notificaciones
    check = document.getElementById("element_9_1");
    if (!check.checked) {
        return false;
    }
    //Sexo
    opciones = document.getElementsByName("element_8");
    var seleccionado = false;
    for (var i = 0; i < opciones.length; i++) {
        if (opciones[i].checked) {
            seleccionado = true;
            break;
        }
    }
    if (!seleccionado) {
        return false;
    }
    //Fechas
    var ano = document.getElementById("ano").value;
    var mes = document.getElementById("mes").value;
    var dia = document.getElementById("dia").value;

    fecha = new Date(ano, mes, dia);

    if (!isNaN(fecha)) {

        return false;
    }
    //Email
    if (document.formulario.element_4.value.length == 0) {
        alert("Tiene que ser formato correo")
        document.formulario.element_4.focus()
        return 0;
    }

    correo = document.getElementById("element_4").value;
    if (!(/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)/.test(correo))) {
        alert("Tiene que ser formato correo")
        return false;
    }
    //Codigo Postal
    if (document.formulario.element_3_5.value.length == 0) {
        alert("Tiene que escribir su codigo postal")
        document.formulario.element_3_5.focus()
        return 0;
    }

    postal = document.getElementById("element_3_5").value;
    if (isNaN(postal)) {
        alert("Tiene que escribir su codigo postal")
        return false;
    }
}