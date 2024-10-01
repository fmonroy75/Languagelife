$(document).ready(function () {
  $("#contactForm").on("submit", function (event) {
    event.preventDefault(); // Prevenir el envío predeterminado del formulario

    // Mostrar mensaje de carga
    $(".loading").show();
    $(".sent-message, .error-message").hide();

    // Obtener los datos del formulario
    var formData = $(this).serialize();

    // Enviar datos por AJAX
    $.ajax({
      type: "POST",
      url: "../forms/contact.php", // Se modifica la ruta
      data: formData,
      success: function (response) {
        // Ocultar mensaje de carga
        $(".loading").hide();

        // Comprobar si el correo se envió correctamente
        if (response.trim() == "success") {
          $(".sent-message").show();
          $("#contactForm")[0].reset(); // Resetear el formulario
        } else {
          $(".error-message").html(response).show();
        }
      },
      error: function () {
        $(".loading").hide();
        $(".error-message")
          .html(
            "Hubo un problema al enviar el mensaje, por favor intenta nuevamente."
          )
          .show();
      },
    });
  });
});
