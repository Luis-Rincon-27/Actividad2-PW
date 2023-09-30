<?php
session_start();

// Obtener datos del formulario
$cedulas = $_POST['cedula'];
$nombres = $_POST['nombre'];
$notasMatematicas = $_POST['matematicas'];
$notasFisica = $_POST['fisica'];
$notasProgramacion = $_POST['programacion'];

// Crear un nuevo registro de alumno
$alumno = array(
    'Cedula' => $cedulas,
    'Nombre' => $nombres,
    'Matematicas' => $notasMatematicas,
    'Fisica' => $notasFisica,
    'Programacion' => $notasProgramacion
);

// Almacenar el registro en la sesión
if (!isset($_SESSION['alumnos'])) {
    $_SESSION['alumnos'] = array();
}

array_push($_SESSION['alumnos'], $alumno);

// Calcular promedios y otras estadísticas
$promedios = [];
$aprobadosMatematicas = 0;
$aprobadosFisica = 0;
$aprobadosProgramacion = 0;
$reprobadosMatematicas = 0;
$reprobadosFisica = 0;
$reprobadosProgramacion = 0;
$aprobadosTodas = 0;
$aprobadosUna = 0;
$aprobadosDos = 0;
$maxMatematicas = 0;
$maxFisica = 0;
$maxProgramacion = 0;

foreach ($_SESSION['alumnos'] as $alumno) {
    $promedio = (array_sum($alumno['Matematicas']) + array_sum($alumno['Fisica']) + array_sum($alumno['Programacion'])) / 3;
    $promedios[] = $promedio;

    if (max($alumno['Matematicas']) >= 10 && max($alumno['Fisica']) >= 10 && max($alumno['Programacion']) >= 10) {
        $aprobadosTodas++;
    }

    $aprobadas = 0;

    if (max($alumno['Matematicas']) >= 10) {
        $aprobadosMatematicas++;
        $aprobadas++;
    }

    if (max($alumno['Fisica']) >= 10) {
        $aprobadosFisica++;
        $aprobadas++;
    }

    if (max($alumno['Programacion']) >= 10) {
        $aprobadosProgramacion++;
        $aprobadas++;
    }

    if (max($alumno['Matematicas']) < 10) {
        $reprobadosMatematicas++;
    }else {
        $reprobadosMatematicas = 0;
    }

    if (max($alumno['Fisica']) < 10) {
        $reprobadosFisica++;
    } else {
        $reprobadosFisica = 0;
    }

    if (max($alumno['Programacion']) < 10) {
        $reprobadosProgramacion++;
    } else {
        $reprobadosProgramacion = 0;
    }
    
    if ($aprobadas == 1) {
        $aprobadosUna++;
    } elseif ($aprobadas == 2) {
        $aprobadosDos++;
    }

    $maxMatematicas = max($maxMatematicas, max($alumno['Matematicas']));
    $maxFisica = max($maxFisica, max($alumno['Fisica']));
    $maxProgramacion = max($maxProgramacion, max($alumno['Programacion']));
}

$promedioMatematicas = array_sum($notasMatematicas) / count($notasMatematicas);
$promedioFisica = array_sum($notasFisica) / count($notasFisica);
$promedioProgramacion = array_sum($notasProgramacion) / count($notasProgramacion);

// Almacenar resultados en la sesión
$_SESSION['promedioMatematicas'] = $promedioMatematicas;
$_SESSION['promedioFisica'] = $promedioFisica;
$_SESSION['promedioProgramacion'] = $promedioProgramacion;
$_SESSION['aprobadosMatematicas'] = $aprobadosMatematicas;
$_SESSION['aprobadosFisica'] = $aprobadosFisica;
$_SESSION['aprobadosProgramacion'] = $aprobadosProgramacion;
$_SESSION['reprobadosMatematicas'] = $reprobadosMatematicas;
$_SESSION['reprobadosFisica'] = $reprobadosFisica;
$_SESSION['reprobadosProgramacion'] = $reprobadosProgramacion;
$_SESSION['aprobadosTodas'] = $aprobadosTodas;
$_SESSION['aprobadosUna'] = $aprobadosUna;
$_SESSION['aprobadosDos'] = $aprobadosDos;
$_SESSION['maxMatematicas'] = $maxMatematicas;
$_SESSION['maxFisica'] = $maxFisica;
$_SESSION['maxProgramacion'] = $maxProgramacion;
$_SESSION['promedios'] = $promedios;

// Redirigir a la página de resultados
header("Location: reporte.php");
exit();
?>
