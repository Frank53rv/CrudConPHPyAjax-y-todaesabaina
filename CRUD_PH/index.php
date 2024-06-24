<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        .background {
            background-image: url('background.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            filter: blur(4px);
            z-index: -1; 
        }

        .content {
            position: relative;
            z-index: 1;
        }
        
        table {
            background-color: white;
            opacity: .8;
            transition: all .3s;
        }
        
        table:hover {
            opacity: .9;
            background-color: black;
            color: white;
            font-size: 20px;
        }
        
        label {
            text-shadow: 1px 1px 2px black;
            font-size: 25px;

            color: white;
        }
    </style>
</head>
<body>
    <div class="background"></div>
    <div id="blur" class="container mt-5">
        <h1 class="text-center">CRUD Aplicación</h1>
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
            <button type="button" id="submitBtn" class="btn btn-primary">Guardar</button>
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
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>