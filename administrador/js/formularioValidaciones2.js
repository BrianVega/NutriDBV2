// Example starter JavaScript for disabling form submissions if there are invalid fields
//validarPacientes() //validar q se ingresó algo en todos los campos

(function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('validacionesFormularios');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();
/*
var formulario = document.getElementById('formularioPacientes');
formulario.addEventListener('submit', function(e){
    e.preventDefault();
    console.log('Me diste un click jeje')
    var datos= new FormData(formulario);
    console.log(datos)
})*/