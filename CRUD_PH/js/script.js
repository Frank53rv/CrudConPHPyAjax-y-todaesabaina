$(document).ready(function() {
    var baseUrl = 'http://localhost/proyectos/CRUD_PH/api/';

    // Cargar personas al cargar la página
    loadPersons();

    // Botón Guardar (Crear o Actualizar)
    $('#submitBtn').click(function() {
        var id = $('#id').val();
        var nombre = $('#doce_nombre').val();
        var apellido = $('#doce_apellido').val();
        var cumple = $('#per_cumple').val();
        var mail = $('#per_mail').val();
        var cel = $('#doce_cel').val();

        var personData = {
            doce_nombre: nombre,
            doce_apellido: apellido,
            per_cumple: cumple,
            per_mail: mail,
            doce_cel: cel
        };

        if(id) {
            // Actualizar persona existente
            $.ajax({
                url: baseUrl + 'update.php',
                type: 'PUT',
                contentType: 'application/json',
                data: JSON.stringify({...personData, id: id}),
                success: function(response) {
                    alert(response.message);  // Verificar qué propiedad contiene el mensaje
                    $('#personForm')[0].reset();
                    loadPersons();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        } else {
            // Crear nueva persona
            $.ajax({
                url: baseUrl + 'create.php',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(personData),
                success: function(response) {
                    alert(response.message);  // Verificar qué propiedad contiene el mensaje
                    $('#personForm')[0].reset();
                    loadPersons();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        }
    });

    // Cargar todas las personas
    function loadPersons() {
        $.get(baseUrl + 'read.php', function(data) {
            $('#personTable tbody').empty();
            $.each(data, function(index, person) {
                $('#personTable tbody').append(
                    `<tr>
                        <td>${person.id}</td>
                        <td>${person.doce_nombre}</td>
                        <td>${person.doce_apellido}</td>
                        <td>${person.per_cumple}</td>
                        <td>${person.per_mail}</td>
                        <td>${person.doce_cel}</td>
                        <td>
                            <button class="btn btn-warning btn-sm" onclick="editPerson(${person.id})">Editar</button>
                            <button class="btn btn-danger btn-sm" onclick="deletePerson(${person.id})">Eliminar</button>
                        </td>
                    </tr>`
                );
            });
        });
    }

    // Editar persona
    window.editPerson = function(id) {
        $.get(baseUrl + 'read.php', { id: id }, function(data) {
            $('#id').val(data[0].id);
            $('#doce_nombre').val(data[0].doce_nombre);
            $('#doce_apellido').val(data[0].doce_apellido);
            $('#per_cumple').val(data[0].per_cumple);
            $('#per_mail').val(data[0].per_mail);
            $('#doce_cel').val(data[0].doce_cel);
        });
    }

    // Eliminar persona
    window.deletePerson = function(id) {
        if(confirm("¿Estás seguro de que deseas eliminar este registro?")) {
            $.ajax({
                url: baseUrl + 'delete.php',
                type: 'DELETE',
                contentType: 'application/json',
                data: JSON.stringify({ id: id }),
                success: function(response) {
                    alert(response.message);  // Verificar qué propiedad contiene el mensaje
                    loadPersons();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        }
    }
});
