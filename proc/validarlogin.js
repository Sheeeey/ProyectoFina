var validaFormulario = function() {
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
}