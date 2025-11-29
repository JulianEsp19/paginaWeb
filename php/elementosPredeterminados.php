<?php
session_start();
function barraPredeterminada()
{
  $_barraNavegacion = "<nav class='nav'>
        <div class='usuarioNav'>
        </div>
        <div class='opcionesNav'>
          <a href='index.php'>inicio</a>
          <a href='productos.php'>productos</a>
          <a href='inicioSesion.php'>Iniciar Sesion</a>
          <a href='registro.php'>Registro</a>
        </div>
        </nav>";

  if (isset($_SESSION["datosSesion"]["Nombre"])) {

    $nombreSesion = $_SESSION["datosSesion"]["Nombre"];

    if ($_SESSION["datosSesion"]["Permiso"] == 1) {

      $_barraNavegacion = "<nav class='nav'>
      <div class='usuarioNav'>
        <a class='usuario' href=''>Bienvenido $nombreSesion</a>
      </div>
      <div class='opcionesNav'>
        <a href='ingresarProductos.php'>añadir Productos</a>
        <a href='productosAdmin.php'>productos</a>
        <a href='bitacora.php'>Bitacora</a>
        <a href='php/cerrarSesion.php'>Cerrar Sesion</a>
      </div>
      </nav>";
    } else {

      include "php/conexion.php";

      $id = $_SESSION['datosSesion']["IDUsuario"];

      $consulta = pg_query(
        $con,
        "SELECT carrito.IDProducto FROM carrito 
        WHERE carrito.IdUsuario = $id"
      );

      $cantidadProductos = 0;

      while($row = pg_fetch_assoc($consulta)){
        $cantidadProductos++;
      }

      $_barraNavegacion = "<nav class='nav'>
      <div class='usuarioNav'> 
      <a class='usuario' href=''>Bienvenido $nombreSesion</a>
      </div>
      <div class='opcionesNav'> 
      <a href='index.php'>inicio</a>
      <a href='productos.php'>productos</a>
      <a id='carrito' href='carrito.php'>carrito</a>
      <a href='php/cerrarSesion.php'>Cerrar Sesion</a>
      </div>
      </nav>
      
      <script> 
        carrito = document.querySelector('#carrito')
        carrito.setAttribute('numProductos' , $cantidadProductos)
      </script>
      ";
    }
  }
  echo $_barraNavegacion;
}

function footerPredeterminada()
{
  $_footerPredeterminado = "<footer class='footer'>
      <div class='columnContainer'>
        <div class='columFooter columnFooter-3'>
          <img src='src/icon/icono.png' alt=''>
        </div>
        <div class='columFooter columnFooter-1'>
          <h3>Sobre nosotros</h3>
          <a href=''>Inicio</a>
          <a href='index.php#nosotros'>Nosotros</a>
          <a href=''>Inciar Sesion</a>
          <a href=''>Registrarse</a>
        </div>
        <div class='columFooter columnFooter-2'>
          <h3>Comunicate</h3>
          <p>
            correo:<br>
            a23110304@ceti.mx <br><br>
            Numero: <br>
            3323589467 <br><br>
            Direccion: <br>
            C. Nueva Escocia 1885, Providencia 5a Secc., 44638 Guadalajara, Jal.
          </p>
        </div>
      </div>
      
      <div class='redesSociales'>
        <img class='iconoFooter' src='src/icon/facebook.png' alt=''>
        <img class='iconoFooter' src='src/icon/gorjeo.png' alt=''>
        <img class='iconoFooter' src='src/icon/hilos.png' alt=''>
        <img class='iconoFooter' src='src/icon/tik-tok.png' alt=''>
      </div>
    </footer>";

  echo $_footerPredeterminado;
}
