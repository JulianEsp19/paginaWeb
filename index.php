<?php include "php/elementosPredeterminados.php";
include "php/versiones.php" ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="style/style.css?v=<?php echo $versionStyle ?>" />
</head>

<body>

  <!-- Barra de navegacion -->
  <?php
  barraPredeterminada();
  ?>
  <a href=""></a>

  <!-- Area de titulos -->
  <header class="inicio fix-inicio">
    <h1 class="titulo">GroveLab</h1>
  </header>

  <section class="seccion1 fix-inicio">
  </section>

  <!-- Acerca de nosotros (Mision y vision)-->
  <div class="contenedorInicio nosotros">
    <h1 id="nosotros">Nosotros</h1>

    <div class="mision">
      <h2>Mision</h2>
      <p>
        Proporcionar a músicos de todos los niveles,
        desde principiantes hasta profesionales,
        instrumentos de alta calidad y accesibles,
        acompañados de un servicio excepcional.
        Nos comprometemos a ser una fuente
        confiable de inspiración, conocimiento
        y pasión musical, brindando asesoramiento
        experto y fomentando una comunidad
        creativa
      </p>
    </div>

    <div class="vision">
      <h2>Vision</h2>
      <p>
        Convertirnos en la tienda de referencia para
        músicos en busca de los mejores instrumentos,
        ampliando nuestra presencia tanto física como
        digitalmente. Aspiramos a inspirar la
        creatividad y el talento musical en todo
        el mundo, creando una experiencia de
        compra que combine tecnología,
        accesibilidad y una conexión profunda
        con la música
      </p>
    </div>
  </div>

  <!-- Productos -->

  <div class="contenedorInicio productos">
    <h1>Productos</h1>

    <div class="imagenes-Productos">
      <div class="imagen" id="imagen-1"></div>
      <div class="imagen" id="imagen-2"></div>
      <div class="imagen" id="imagen-3"></div>
      <div class="imagen" id="imagen-4"></div>
      <div class="imagen" id="imagen-5"></div>
    </div>

    <button id="verMas" onclick="window.location.href = '/paginaWeb/productos.php'">ver mas</button>
  </div>

  <!-- Encuentranos -->

  <div class="contenedorInicio encuentranos">
    <h1>Encuentranos</h1>

    <div class="informacionMapa">
      El CETI es una institución con carácter regional, que cuenta con tres planteles ubicados dentro de la Zona Metropolitana de la Ciudad de Guadalajara Jalisco: El Plantel Colomos, ubicado dentro del municipio de Guadalajara y el Plantel Tonalá, ubicado dentro del municipio de Tonalá, ofrecen servicios educativos de Educación Media Superior y Superior y el Plantel Río Santiago, ubicado dentro del municipio de Tonalá, ofrece únicamente estudios de nivel medio superior.

      En las últimas décadas ha destacado en su entorno como una institución educativa dedicada a la formación de tecnólogos profesionales y de ingenieros que han alcanzado un amplio reconocimiento en los ámbitos social y productivo.
    </div>

    <iframe id="mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3732.1782065520006!2d-103.39181702492836!3d20.702986880866018!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428ae4e98d5453d%3A0xc4fdd3929a2ecbd1!2sCETI%20Plantel%20Colomos!5e0!3m2!1ses-419!2smx!4v1725978257794!5m2!1ses-419!2smx" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>

  <!-- footer -->
  <?php
  footerPredeterminada();
  ?>
</body>

</html>