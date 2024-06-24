<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">CRUD Application</h1>
        <form id="personForm" class="mt-4">
            <input type="hidden" id="id" name="id">
            <div class="form-group">
                <label for="doce_nombre">Nombre:</label>
                <input type="text" class="form-control" id="doce_nombre" name="doce_nombre" required>
            </div>
            <div class="form-group">
                <label for="doce_apellido">Apellido:</label>
                <input type="text" class="form-control" id="doce_apellido" name="doce_apellido" required>
            </div>
            <div class="form-group">
                <label for="per_cumple">Fecha de Cumpleaños:</label>
                <input type="date" class="form-control" id="per_cumple" name="per_cumple" required>
            </div>
            <div class="form-group">
                <label for="per_mail">Email:</label>
                <input type="email" class="form-control" id="per_mail" name="per_mail" required>
            </div>
            <div class="form-group">
                <label for="doce_cel">Celular:</label>
                <input type="text" class="form-control" id="doce_cel" name="doce_cel" required>
            </div>
            <button type="button" id="submitBtn" class="btn btn-primary">Submit</button>
        </form>

        <table class="table table-bordered mt-4" id="personTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Fecha de Cumpleaños</th>
                    <th>Email</th>
                    <th>Celular</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Los registros se cargarán aquí -->
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Tu archivo JS personalizado -->
    <script src="script.js"></script>
</body>
</html>
