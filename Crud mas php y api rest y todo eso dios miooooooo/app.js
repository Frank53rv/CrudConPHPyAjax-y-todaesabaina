

try {
  // Crear persona
$("#formulario").submit(function(event) {
    event.preventDefault();
    var datos = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "create.php",
        data: datos,
        success: function(response) {
            alert(response);
        }
    });
});

// Leer personas
$.ajax({
    type: "GET",
    url: "read.php",
    success: function(response) {
        var personas = JSON.parse(response);
        // Mostrar personas en la interfaz de usuario
    }
});

// Actualizar persona
$("#formulario").submit(function(event) {
    event.preventDefault();
    var datos = $(this).serialize();
    $.ajax({
        type: "PUT",
        url: "update.php",
        data: datos,
        success: function(response) {
            alert(response);
        }
    });
});

// Eliminar persona
$.ajax({
    type: "DELETE",
    url: "delete.php",
    data: { id: id_persona },
    success: function(response) {
        alert(response);
    }
});
} catch (error) {
    alert("Error: " + error.message);
}