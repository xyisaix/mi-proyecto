<?php
if (isset($_GET['tipo_servicio'])) {
    $tipo_servicio = $_GET['tipo_servicio'];

    switch ($tipo_servicio) {
        case "certificacion_inicial":
            include "../formularios/certificacion_inicial.php";
            break;
        case "renovacion":
            include "../formularios/renovacion.php";
            break;
        case "ampliacion":
            include "../formularios/ampliacion.php";
            break;
        case "correccion":
            include "../formularios/correccion.php";
            break;
        case "carta_aduana":
            include "../formularios/carta_aduana.php";
            break;
        default:
            echo "Tipo de servicio no reconocido.";
            break;
    }
} else {
    echo "No se especificó el tipo de servicio.";
}
?>