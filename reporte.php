<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Notas</title>
    <link rel="stylesheet" href="assets\styles\materialize.min.css" media="screen,projection">
</head>
<body>
<div class="container">
        <h1 class="center-align">Reporte de Notas</h1>
    <p>Promedio de Matemáticas: <?php echo $_SESSION['promedioMatematicas']; ?></p>
    <p>Promedio de Física: <?php echo $_SESSION['promedioFisica']; ?></p>
    <p>Promedio de Programación: <?php echo $_SESSION['promedioProgramacion']; ?></p>
    <p>Número de alumnos aprobados en Matemáticas: <?php echo $_SESSION['aprobadosMatematicas']; ?></p>
    <p>Número de alumnos aprobados en Física: <?php echo $_SESSION['aprobadosFisica']; ?></p>
    <p>Número de alumnos aprobados en Programación: <?php echo $_SESSION['aprobadosProgramacion']; ?></p>
    <p>Número de alumnos reprobados en Matemáticas: <?php echo $_SESSION['reprobadosMatematicas']; ?></p>
    <p>Número de alumnos reprobados en Física: <?php echo $_SESSION['reprobadosFisica']; ?></p>
    <p>Número de alumnos reprobados en Programación: <?php echo $_SESSION['reprobadosProgramacion']; ?></p>
    <p>Número de alumnos que aprobaron todas las materias: <?php echo $_SESSION['aprobadosTodas']; ?></p>
    <p>Número de alumnos que aprobaron una sola materia: <?php echo $_SESSION['aprobadosUna']; ?></p>
    <p>Número de alumnos que aprobaron dos materias: <?php echo $_SESSION['aprobadosDos']; ?></p>
    <p>Nota máxima en Matemáticas: <?php echo $_SESSION['maxMatematicas']; ?></p>
    <p>Nota máxima en Física: <?php echo $_SESSION['maxFisica']; ?></p>
    <p>Nota máxima en Programación: <?php echo $_SESSION['maxProgramacion']; ?></p>

    <h2>Promedios Individuales:</h2>
    <ul>
        <?php
        $promedios = $_SESSION['promedios'];
        foreach ($promedios as $index => $promedio) {
            echo "<li>Alumno " . ($index + 1) . ": " . $promedio . "</li>";
        }
        ?>
    </ul>
    <script type="text/javascript" src="assets\js\materialize.js"></script>
</body>
</html>
