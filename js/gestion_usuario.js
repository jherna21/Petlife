$(document).ready(function () {

    events();
    var cedula = 'default';

    function events() {
        $('#btnBuscar').on('click', function () {
            buscar();
        });
        $('#btnGuardar').on('click', function () {
            info();
        });
    }
    function buscar() {

        var params = {
            'action': 'buscar',
            'pattern': $('#pattern').val()
        };
        $.ajax({
            data: params,
            type: "POST",
            url: "../Back-End/gestionar_usuario.php",
            success: function (json) {
                obj = JSON.parse(json);
                cedula = obj.cedula;
                $('#result').html('<h3>A continuación, la información de ' + obj.nombre + " " + obj.apellido + '</h3>');
                //info(obj.cedula);                
                var section = document.getElementById('info');
                section.style.display = 'block';
            },
            error: function (json) {
                alert("Error: " + json);
            }
        });
    }

    function info() {
        var params = {
            'action': 'guardar',
            'correo': $('#correo').val(),
            'telefono': $('#telefono').val(),
            'direccion': $('#direccion').val(),
            'cedula': cedula
        };
        $.ajax({
            data: params,
            type: "POST",
            url: "../Back-End/gestionar_usuario.php",
            success: function (json) {
                obj2 = JSON.parse(json);
                var str = json.toString();
                $('#respuesta').html('<h3>' + obj2.respuesta + '</h3>');                 
            },
            error: function (json) {
                $('#respuesta').html('<h3>' + "hubo un error" + '</h3>');
            }
        });
    }


});