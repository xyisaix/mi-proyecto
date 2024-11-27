function mostrarPantalla(pantallaID) {
    console.log(`Mostrando pantalla: ${pantallaID}`);

    // Oculta todas las pantallas
    const pantallas = document.querySelectorAll(".pantalla");
    pantallas.forEach((pantalla) => {
        pantalla.style.display = "none";
    });

    // Muestra la pantalla seleccionada
    const pantallaSeleccionada = document.getElementById(pantallaID);
    if (pantallaSeleccionada) {
        pantallaSeleccionada.style.display = "block";
    } else {
        console.error(`No se encontró la pantalla con ID: ${pantallaID}`);
    }
}

function guardarDatos(pantallaId) {
    // Guardar datos en la sesión (o localStorage)
    if (pantallaId === 'pantalla2') {
        // Datos de cliente nuevo
        sessionStorage.setItem('razon_social', document.getElementById('razon_social').value);
        sessionStorage.setItem('rfc', document.getElementById('rfc').value);
        sessionStorage.setItem('domicilio', document.getElementById('domicilio').value);
        sessionStorage.setItem('telefono', document.getElementById('telefono').value);
        sessionStorage.setItem('email', document.getElementById('email').value);
    }

    if (pantallaId === 'pantalla3') {
        // Datos de cliente registrado
        sessionStorage.setItem('razon_social_reg', document.getElementById('razon_social_reg').value);
    }

    if (pantallaId === 'pantalla4') {
        // Tipo de servicio
        sessionStorage.setItem('tipo_servicio', document.getElementById('tipo_servicio').value);
    }

    // Avanzar a la siguiente pantalla
    let siguientePantalla = document.querySelector(`[data-next="${pantallaId}"]`);
    if (siguientePantalla) {
        let siguienteId = siguientePantalla.getAttribute('data-next');
        mostrarPantalla(siguienteId);
    }
    console.log(`Mostrando pantalla: ${pantallaID}`);
}

function submitFormulario() {
    // Aquí puedes hacer un submit del formulario o enviar los datos al servidor
    alert('Formulario enviado con éxito.');
    // Ejemplo: Usar AJAX o redirigir a una página de confirmación
}


let datosFormulario = {}; // Objeto global para almacenar datos temporalmente

function guardarDatos(pantallaActual) {
    console.log(`Guardando datos de la pantalla: ${pantallaActual}`);

    // Obtiene los campos de la pantalla actual
    const inputs = document.querySelectorAll(`#${pantallaActual} input, #${pantallaActual} select`);
    const datosPantalla = {};

    inputs.forEach((input) => {
        datosPantalla[input.name] = input.value; // Guarda los valores con el nombre del campo
    });

    // Verifica si los datos están completos (valida si están vacíos)
    const camposVacios = Object.entries(datosPantalla).filter(([key, value]) => !value.trim());
    if (camposVacios.length > 0) {
        alert("Por favor, complete todos los campos antes de continuar.");
        return; // No avanza si hay campos vacíos
    }

    // Guarda los datos de esta pantalla en el objeto global
    datosFormulario = { ...datosFormulario, ...datosPantalla };

    console.log("Datos guardados:", datosFormulario); // Muestra los datos en consola

    // Transición a la siguiente pantalla
    const siguientePantalla = document.querySelector(`#${pantallaActual} .next-btn`).getAttribute("data-next");
    mostrarPantalla(siguientePantalla);
}

function submitFormulario() {
    alert("Solicitud enviada exitosamente. ¡Gracias!");
    // Aquí puedes incluir el código para enviar los datos al servidor
}

function mostrarFormularioServicio() {
    var tipoServicio = document.getElementById("tipo_servicio").value;
    var contenedorFormulario = document.getElementById("contenedorFormulario");

    if (!contenedorFormulario) {
        console.error("Error: No se encontró el contenedor con id 'contenedorFormulario'.");
        return;
    }

    // Mostrar mensaje mientras carga
    contenedorFormulario.innerHTML = "Cargando formulario...";

    // Cambia la URL aquí
    fetch(`https://comecer.com.mx/solicitud/includes/cargar_formulario.php?tipo_servicio=${tipoServicio}`)
        .then((response) => {
            console.log("Estado de respuesta HTTP:", response.status);
            if (!response.ok) {
                throw new Error(`Error HTTP: ${response.status}`);
            }
            return response.text();
        })
        .then((html) => {
            contenedorFormulario.innerHTML = html;
        })
        .catch((error) => {
            console.error("Error al cargar el formulario:", error);
            contenedorFormulario.innerHTML = `<p style="color: red;">Error al cargar el formulario. Inténtalo más tarde.</p>`;
        });


        function validarFormulario() {
        var campos = document.querySelectorAll("input, select, textarea");
        for (var i = 0; i < campos.length; i++) {
            // Ignorar campos ocultos
            if (campos[i].type !== "hidden" && campos[i].offsetParent !== null) {
                if (campos[i].value.trim() === "") {
                    alert("Por favor, llena todos los campos requeridos.");
                    return false;
                }
            }
        }
        return true; // Si todo está completo
    }

    document.getElementById("botonSiguiente").addEventListener("click", function(event) {
    if (!validarFormulario()) {
        event.preventDefault(); // Previene que avance si falta algo
    } else {
        avanzarPantalla(); // Continúa si todo está bien
    }
});

function mostrarCamposAdicionales() {
    var modeloFamilia = document.getElementById("familia_producto").value;
    var nombreModelos = document.getElementById("nombre_modelos");
    
    if (modeloFamilia === "si") {
        nombreModelos.style.display = "block";
        nombreModelos.querySelector('input').disabled = false; // Activa el campo de texto
    } else {
        nombreModelos.style.display = "none";
        nombreModelos.querySelector('input').disabled = true; // Desactiva el campo de texto
    }
}



}