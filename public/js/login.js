// Validación básica del formulario de inicio de sesión
document.getElementById("login-form").addEventListener("submit", function(event) {
    event.preventDefault();
    
    var username = document.getElementsByName("username")[0].value;
    var password = document.getElementsByName("password")[0].value;
  
    // Envía los datos de inicio de sesión a través de AJAX a login.php
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "/wlogin/src/Controller/LoginController.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        var response = JSON.parse(xhr.responseText);
        if (response.success) {
          window.location.href = "http://localhost/wlogin/template/base.php"; // Redirige al usuario a la página de inicio después del inicio de sesión exitoso
        } else {
          alert(response.message); // Muestra un mensaje de error en caso de inicio de sesión fallido
        }
      }
    };
    xhr.send("username=" + encodeURIComponent(username) + "&password=" + encodeURIComponent(password));
  });