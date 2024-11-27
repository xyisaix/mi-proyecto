 <h1>Formulario Dinámico</h1>
    <div id="formulario">
        <!-- Pantalla 1 -->
        <div id="pantalla-1" class="pantalla pantalla-activa">
            <h2>Pantalla 1: Identificación del cliente</h2>
            <label for="cliente">¿Eres cliente nuevo?</label>
            <select id="cliente">
                <option value="nuevo">Sí</option>
                <option value="existente">No</option>
            </select>
            <button class="boton" onclick="cambiarPantalla('pantalla-1', 'pantalla-2')">Siguiente</button>
        </div>

        <!-- Pantalla 2 -->
        <div id="pantalla-2" class="pantalla">
            <h2>Pantalla 2: Selección del tipo de servicio</h2>
            <label for="servicio">Selecciona un servicio:</label>
            <select id="servicio">
                <option value="certificacion">Certificación inicial</option>
                <option value="renovacion">Renovación de certificado</option>
                <option value="ampliacion">Ampliación de certificado</option>
                <option value="correccion">Corrección de certificado</option>
                <option value="aduana">Carta de aduana</option>
            </select>
            <button class="boton" onclick="cambiarPantalla('pantalla-2', 'pantalla-1')">Regresar</button>
            <button class="boton" onclick="cambiarPantalla('pantalla-2', 'pantalla-3')">Siguiente</button>
        </div>

        <!-- Pantalla 3 -->
        <div id="pantalla-3" class="pantalla">
            <h2>Pantalla 3: Confirmación</h2>
            <p>Revisa tus datos antes de enviar:</p>
            <ul>
                <li><strong>Cliente:</strong> <span id="resumen-cliente"></span></li>
                <li><strong>Servicio:</strong> <span id="resumen-servicio"></span></li>
            </ul>
            <button class="boton" onclick="cambiarPantalla('pantalla-3', 'pantalla-2')">Regresar</button>
            <button class="boton" onclick="enviarFormulario()">Enviar</button>
        </div>
    </div>

    <script>
        /* Función para cambiar entre pantallas */
        function cambiarPantalla(actual, siguiente) {
            document.getElementById(actual).classList.remove('pantalla-activa');
            document.getElementById(actual).classList.add('pantalla');
            document.getElementById(siguiente).classList.remove('pantalla');
            document.getElementById(siguiente).classList.add('pantalla-activa');

            // Si es la última pantalla, actualiza el resumen
            if (siguiente === 'pantalla-3') {
                document.getElementById('resumen-cliente').innerText = document.getElementById('cliente').value === 'nuevo' ? 'Cliente nuevo' : 'Cliente existente';
                document.getElementById('resumen-servicio').innerText = document.getElementById('servicio').value;
            }
        }

        /* Simulación de envío del formulario */
        function enviarFormulario() {
            alert("Formulario enviado exitosamente.");
            // Aquí podrías redirigir a otra página o guardar los datos con un fetch/AJAX.
        }
    </script>