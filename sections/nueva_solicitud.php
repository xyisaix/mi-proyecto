<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Solicitud</title>
</head>
<body>
<div class="row">
    <div class="col">
        <section class="card_">
            <header class="card-header">
                <h2 class="card-title">Formulario de Solicitud</h2>
            </header>
            <div class="card-body">
                <div id="form-container">
                    <!-- Pantalla 1: Cliente nuevo o registrado -->
                    <div id="pantalla1" class="pantalla">
                        <h2>¿Es un cliente nuevo?</h2>
                        <button class="btn btn-primary next-btn" data-next="pantalla2" onclick="mostrarPantalla('pantalla2')">Sí</button>
                        <button class="btn btn-secondary next-btn" data-next="pantalla3" onclick="mostrarPantalla('pantalla3')">No</button>
                    </div>

                    <!-- Pantalla 2: Datos fiscales (cliente nuevo) -->
                    <div id="pantalla2" class="pantalla" style="display:none;">
                        <h2>Datos fiscales del cliente</h2>
                        <form class="form-horizontal form-bordered">
                            <div class="form-group row pb-4">
                                <label class="col-lg-3 control-label text-lg-end pt-2" for="razon_social">Razón social:</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="razon_social" name="razon_social" autocomplete="organization" required>
                                </div>
                            </div>
                            <div class="form-group row pb-4">
                                <label class="col-lg-3 control-label text-lg-end pt-2" for="rfc">R.F.C.:</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="rfc" name="rfc" autocomplete="tax-id" required>
                                </div>
                            </div>
                            <div class="form-group row pb-4">
                                <label class="col-lg-3 control-label text-lg-end pt-2" for="domicilio">Domicilio:</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="domicilio" name="domicilio" autocomplete="street-address"  required>
                                </div>
                            </div>
                            <div class="form-group row pb-4">
                                <label class="col-lg-3 control-label text-lg-end pt-2" for="telefono">Teléfono:</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="telefono" name="telefono" autocomplete="tel" required>
                                </div>
                            </div>
                            <div class="form-group row pb-4">
                                <label class="col-lg-3 control-label text-lg-end pt-2" for="email">Correo electrónico:</label>
                                <div class="col-lg-6">
                                    <input type="email" class="form-control" id="email" name="email" autocomplete="email" required>
                                </div>
                            </div>
                            <button class="btn btn-primary next-btn" data-next="pantalla4" type="button" onclick="guardarDatos('pantalla2')">Siguiente</button>
                        </form>
                    </div>

                    <!-- Pantalla 3: Cliente registrado -->
                    <div id="pantalla3" class="pantalla" style="display:none;">
                        <h2>Introduce la razón social para autocompletar los datos</h2>
                        <form class="form-horizontal form-bordered">
                            <div class="form-group row pb-4">
                                <label class="col-lg-3 control-label text-lg-end pt-2" for="razon_social_reg">Razón social:</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="razon_social_reg" name="razon_social_reg" required>
                                </div>
                            </div>
                            <button class="btn btn-primary" data-next="pantalla4" onclick="guardarDatos('pantalla3')">Siguiente</button>
                        </form>
                    </div>

                    <!-- Pantalla 4: Tipo de servicio -->
                    <div id="pantalla4" class="pantalla" style="display:none;">
                        <h2>Tipo de servicio</h2>
                        <div class="form-group row pb-4">
                            <label class="col-lg-3 control-label text-lg-end pt-2" for="tipo_servicio" autocomplete="off">Seleccione:</label>
                            <div class="col-lg-6">
                                <select id="tipo_servicio" class="form-control" onchange="mostrarFormularioServicio()">
                                    <option value="">Seleccione una opción</option>
                                    <option value="certificacion_inicial">Certificación inicial</option>
                                    <option value="renovacion">Renovación</option>
                                    <option value="ampliacion">Ampliación</option>
                                    <option value="correccion">Corrección</option>
                                    <option value="carta_aduana">Carta de aduana</option>
                                </select>
                            </div>
                        </div>
                            <div id="contenedorFormulario"></div> <!-- Contenedor donde se mostrará el formulario -->

                        <button class="btn btn-primary next-btn" data-next="pantalla5" type="button" onclick="guardarDatos('pantalla4')">Siguiente</button>
                    </div>

                    <script>
                    function mostrarFormularioServicio() {
    var tipoServicio = document.getElementById("tipo_servicio").value; // Asegúrate de que el ID exista
    var contenedorFormulario = document.getElementById("contenedorFormulario"); // Asegúrate de que este ID también exista

    if (!contenedorFormulario) {
        console.error("Error: No se encontró el contenedor con id 'contenedorFormulario'.");
        return;
    }

    // Mostrar mensaje mientras carga
    contenedorFormulario.innerHTML = "Cargando formulario...";

    // Cambiar a la ruta completa
    fetch(`https://comecer.com.mx/solicitud/includes/cargar_formulario.php?tipo_servicio=${tipoServicio}`)
        .then((response) => {
            if (!response.ok) {
                throw new Error("No se pudo cargar el formulario.");
            }
            return response.text();
        })
        .then((html) => {
            contenedorFormulario.innerHTML = html; // Insertar el formulario en el contenedor
        })
        .catch((error) => {
            console.error("Error al cargar el formulario:", error);
            contenedorFormulario.innerHTML = `<p style="color: red;">Error al cargar el formulario. Inténtalo más tarde.</p>`;
        });
}
                    </script>
                   

                    <!-- Pantalla 5: Confirmación -->
                    <div id="pantalla5" class="pantalla" style="display:none;">
                        <h2>Confirmación de los datos</h2>
                        <p>Revise los datos ingresados antes de enviar la solicitud.</p>
                        <button class="btn btn-success" onclick="submitFormulario()">Enviar solicitud</button>
                    </div>

                        <!-- Pantalla 6: Subir archivos adjuntos -->
                        <div id="pantalla6" class="pantalla" style="display:none;">
                            <h2>Subir archivos necesarios</h2>
                            <p>Por favor, sube los documentos requeridos para procesar tu solicitud.</p>
                            <div class="form-group row pb-4">
                                <label class="col-lg-3 control-label text-lg-end pt-2" for="documento">Seleccionar archivo:</label>
                                <div class="col-lg-6">
                                    <input type="file" id="documento" name="documento[]" class="form-control" multiple required>
                                </div>
                            </div>
                            <button class="next-btn" data-next="pantalla7" onclick="guardarDatos('pantalla6')">Siguiente</button>
                        </div>

                        <!-- Pantalla 7: Confirmación final -->
                        <div id="pantalla7" class="pantalla" style="display:none;">
                            <h2>Confirmación final</h2>
                            <p>Por favor, revisa toda la información ingresada y confirma para enviar la solicitud.</p>
                            <div class="form-group row pb-4">
                                <label class="col-lg-3 control-label text-lg-end pt-2" for="aceptar_terminos">
                                    <input type="checkbox" id="aceptar_terminos" name="aceptar_terminos" required> Acepto los términos y condiciones
                                </label>
                            </div>
                            <button onclick="submitFormulario()">Confirmar y Enviar</button>
                        </div>



                </div>
            </div>
        </section>
    </div>
</div>

<script src="js/formulario.js"></script>
</body>
</html>