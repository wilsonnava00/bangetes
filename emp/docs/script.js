const formulario = document.getElementById("login-form");
const usuario = document.getElementById("usuario");
const tipoDocumento = document.getElementById("tipoDocumento");
const documentoInput = document.getElementById("documento");
const siguienteBtn = document.getElementById("btn-siguiente");
const preloader = document.getElementById("preloader");

/**
 * Handles the activation state of the 'Siguiente' button based on input length.
 * Removes 'inactive' class when the user input has at least 3 characters.
 */
function handleUsuarioInput() {
  if (usuario && siguienteBtn) {
    if (usuario.value.length >= 3) {
      siguienteBtn.disabled = false;
    } else {
      siguienteBtn.disabled = true;
    }
  }
}

/**
 * Validates document number input to only accept numeric values
 * while keeping it as a text input type.
 */
function handleDocumentoInput() {
  if (!documentoInput) return;
  
  // Get current value
  const inputValue = documentoInput.value;
  // Remove any non-numeric character
  const numericValue = inputValue.replace(/\D/g, '');
  
  // If non-numeric characters were entered, replace with filtered value
  if (inputValue !== numericValue) {
    documentoInput.value = numericValue;
  }
}

if (usuario) {
  usuario.addEventListener("input", handleUsuarioInput);
}

// Add input validation for documento field
if (documentoInput) {
  documentoInput.addEventListener("input", handleDocumentoInput);
  
  // Also validate on paste events
  documentoInput.addEventListener("paste", function() {
    // Use setTimeout to ensure we validate after the paste happens
    setTimeout(handleDocumentoInput, 0);
  });
}



