<div id="certificacion_inicial">
    <h3>Certificación Inicial</h3>
    <form id="form-certificacion-inicial">
        <!-- Norma Oficial Aplicable (Desplegable) -->
        <div class="form-group">
            <label for="norma_oficial">Norma Oficial Aplicable:</label>
            <select class="form-control" id="norma_oficial" name="norma_oficial">
                <option value="NOM-008-CONAGUA-1998">NOM-008-CONAGUA-1998</option>
                <option value="NOM-002-CONAGUA-2021">NOM-002-CONAGUA-2021</option>
                <option value="NMX-C-415-ONNCCE-2015">NMX-C-415-ONNCCE-2015</option>
            </select>
        </div>

        <!-- Solicitar Datos del Producto -->
        <div class="form-group">
            <label for="modelo_producto">Modelo:</label>
            <input type="text" class="form-control" id="modelo_producto" name="modelo_producto" placeholder="Ingrese el modelo" required>
        </div>

        <div class="form-group">
            <label for="familia_producto">¿El modelo integra una Familia de producto?</label>
            <select class="form-control" id="familia_producto" name="familia_producto" onchange="mostrarCamposAdicionales()">
                <option value="">Seleccione</option>
                <option value="si">Sí</option>
                <option value="no">No</option>
            </select>
        </div>

        <div id="nombre_modelos_wrapper" class="form-group" style="display: none;" aria-hidden="true">
    <label for="nombre_modelos">Ingrese los nombres de los modelos:</label>
    <input type="text" class="form-control" id="nombre_modelos" name="nombre_modelos" placeholder="Ingrese los nombres de los modelos" disabled>
</div>

        <!-- Más campos específicos de la certificación inicial pueden ir aquí -->

        <!-- Botón para continuar -->
        <button type="button" class="btn btn-primary" id="siguiente_certificacion_inicial">Siguiente</button>
    </form>
</div>

<script>
    // Mostrar campo para ingresar modelos cuando se selecciona "Sí"
    document.getElementById('familia_producto').addEventListener('change', function() {
        var display = this.value === 'si' ? 'block' : 'none';
        document.getElementById('nombre_modelos_wrapper').style.display = 'block';
        document.getElementById('nombre_modelos').focus(); // Asegura que el campo está activado
    });

    // Manejar el clic en el botón "Siguiente"
    document.getElementById('siguiente_certificacion_inicial').addEventListener('click', function() {
        // Realizar validaciones si es necesario
        // Cargar el siguiente módulo utilizando AJAX
        cargarSiguienteModulo();
    });

    function cargarSiguienteModulo() {
        // Realizamos la petición AJAX para cargar el siguiente archivo (Renovación de Certificado)
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'renovacion_certificado.php', true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Insertar el siguiente módulo en la página
                document.getElementById('main_content').innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    }
</script>