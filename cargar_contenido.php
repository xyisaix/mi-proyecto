<?php
if (isset($_GET['seccion'])) {
    $seccion = preg_replace('/[^a-zA-Z0-9_-]/', '', $_GET['seccion']); // Sanitiza el input
    $archivo = "sections/$seccion.php";

    if (file_exists($archivo) && is_readable($archivo)) {
        include $archivo;
    } else {
        echo "<p>La sección solicitada no existe o no tiene permisos.</p>";
    }
} else {
    echo "<p>Selecciona una opción en el menú para cargar contenido.</p>";
}
?>