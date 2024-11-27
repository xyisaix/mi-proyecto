<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Solicitud de Certificación de Producto</title>
    <!-- Enlaces a los estilos CSS, etc. -->
</head>
<body>

<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<!-- start: page -->
<div class="row">
    <div class="col">
        <section class="card">
            <header class="card-header">
                <div class="card-actions">
                    <a href="#" class="card-action card-action-toggle" data-card-toggle=""></a>
                    <a href="#" class="card-action card-action-dismiss" data-card-dismiss=""></a>
                </div>
                <h2 class="card-title"></h2>
            </header>
            <div id="main-content" class="card-body" style="display: block;">
                <!-- El contenido de las secciones se cargará aquí -->
                
                <?php include 'cargar_contenido.php'; ?>
            </div>
        </section>
    </div>
</div>
<!-- end: page -->
</section>
</div>
</section>

<!-- Vendor -->
<script src="vendor/jquery/jquery.js"></script>
<script src="vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
<script src="vendor/popper/umd/popper.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="vendor/common/common.js"></script>
<script src="vendor/nanoscroller/nanoscroller.js"></script>
<script src="vendor/magnific-popup/jquery.magnific-popup.js"></script>
<script src="vendor/jquery-placeholder/jquery.placeholder.js"></script>

<!-- Specific Page Vendor -->
<script src="vendor/autosize/autosize.js"></script>
<script src="vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="js/theme.js"></script>

<!-- Theme Custom -->
<script src="js/custom.js"></script>

<!-- Theme Initialization Files -->
<script src="js/theme.init.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Cuando se haga clic en un enlace del menú
    $('#menu a').click(function(e) {
        e.preventDefault();
        
        // Obtener el valor del atributo href
        var seccion = $(this).attr('href').substring(1); // Esto elimina el '#' del href
        
        // Realizar la petición AJAX
        $.ajax({
            url: 'cargar_contenido.php',  // El archivo PHP que maneja la carga de contenido
            type: 'GET',
            data: { seccion: seccion },  // Pasamos el parámetro 'seccion' para determinar qué cargar
            success: function(response) {
                // Insertar el contenido cargado en el contenedor 'main-content'
                $('#main-content').html(response);
            }
        });
    });
});
</script>
