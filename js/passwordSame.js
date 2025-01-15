//script para verificar si las contraseñas son iguales
//en la pagina de registro

//campos de las contraseñas
contrasena = document.getElementById("contrasena");
repetirContrasena = document.getElementById("repetirContrasena");
//boton para enviar (submit)
botonEnviar = document.getElementById("enviarJS");
//texto para advertencias
advertencias = document.getElementById("advertenciasJS");

//se agregan eventos
contrasena.addEventListener("input", cambio);
repetirContrasena.addEventListener("input", cambio)


//evento agregado para cuando se detecte cambio
function cambio() {
  if (contrasena.value == repetirContrasena.value) {
    botonEnviar.removeAttribute("disabled")

    advertencias.innerHTML = "";
  } else {
    botonEnviar.setAttribute("disabled", "true");

    advertencias.innerHTML = "las contraseñas no coinciden";
  }

  console.log("hola")
}
