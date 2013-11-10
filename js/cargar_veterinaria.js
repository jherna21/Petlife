

var loadQuery = function () {    

    var params = {
        'action': 'listar'
    };
    $.ajax({
        data: params,
        type: "POST",
        url: "../Back-End/listar_veterinaria.php",
        success: function (json) {
            obj = JSON.parse(json);
            var resp = obj.result.toString();
            var size = obj.size.toString();
            var sp = resp.split(",");
            var lista = document.getElementById('lista');

            for (var i = 0; i < size; i++) {
                var opt = document.createElement('option');
                var txt = document.createTextNode(sp[i], sp[i]);
                opt.appendChild(txt);
                lista.appendChild(opt);
            }
            //$('#hh').html('<h3>'+ txt.getAt+'</h3>');
        },
        error: function (json) {
            alert("Error: " + json);
        }
    });
};




$(document).ready(function () {
    var veterinaria = 'default';

    loadQuery();
    itemSelected();

    events();

    function events() {
        $('#btnGuardar').on('click', function () {
            itemSelected();
            guardar();
        });
    }

    function itemSelected() {
        var sel = document.getElementById('lista');
        veterinaria = sel.options[sel.selectedIndex].value;
    }

    function guardar() {
        var params = {
            'action': 'guardarVeterinario',
            'nombre': $('#nombre').val,
            'apellido': $('#apellido').val,
            'estado': $('#estado').val,
            'correo': $('#correo').val,
            'telefono': $('#telefono').val,
            'usuario': $('#usuario').val,
            'clave': $('#clave').val,
            'veterinaria': veterinaria
        };
        $.ajax({
            data: params,
            type: "POST",
            url: "../Back-End/listar_veterinaria.php",
            success: function (json) {
                obj = JSON.parse(json);
                $('#hh').html('<h3>' + obj.respuesta+ '</h3>');
            },
            error: function (json) {
                alert("Error: " + json);
            }
        });

    }

});
