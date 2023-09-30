<!DOCTYPE html>
<html>
<head>
    <title>Registro de Notas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="assets\styles\materialize.min.css" media="screen,projection">
</head>
<body>
    <div class="container">
        <h1 class="center-align">Registro de Notas</h1>
        <form action="registro.php" method="post">
            <div class="input-field">
                <label for="cedula">Cédula de Identidad del Alumno:</label>
                <input type="text" id="cedula" name="cedula[]" required>
            </div>

            <div class="input-field">
                <label for="nombre">Nombre del Alumno:</label>
                <input type="text" id="nombre" name="nombre[]" required>
            </div>

            <div class="input-field">
                <label for="matematicas">Nota de Matemáticas:</label>
                <input type="number" id="matematicas" name="matematicas[]" min="0" max="20" required>
            </div>

            <div class="input-field">
                <label for="fisica">Nota de Física:</label>
                <input type="number" id="fisica" name="fisica[]" min="0" max="20" required>
            </div>

            <div class="input-field">
                <label for="programacion">Nota de Programación:</label>
                <input type="number" id="programacion" name="programacion[]" min="0" max="20" required>
            </div>

            <button class="btn waves-effect waves-light" type="submit">Registrar</button>
            <a href="reporte.php" class="waves-effect waves-light btn">Reporte</a>
        </form>
    </div>
    <script type="text/javascript" src="assets\js\materialize.js"></script>
</body>
</html>
