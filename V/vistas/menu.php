<!--<link rel="stylesheet" type="text/css"  href="../bootstrap/css_/estilo5.css"/>
<link rel="stylesheet" type="text/css" href="../bootstrap/css_/style.css"/>
<style type="text/css">#menu{
  position:fixed;
  top:-150px;

  }

  </style>
 <header>

          <nav id="menu">

       <ul>

      <li><a href="inicio.php"><span class="primero"><i class="icon icon-home"></i></span>Inicio</a></li>
      <li><a href="#"><span class="segundo"><i class="icon icon-pencil2"></i></span>Usuario</a>

      <ul>

        <li><a href="registro_usuario.php">Agregar Usuario</a></li>
         <li><a  href="modificar_usuario.php">Modificar Usuario</a></li>
         <li><a href="consultar_usuario.php">Consultar Usuario</a></li>

      </ul>
      </li>

      <li><a href="#"><span class="segundoo"><i class="icon icon-book"></i></span>Vocero</a>

      <ul>

        <li><a href="registro_vocero.php">Registrar Vocero</a></li>
         <li><a  href="modificar_vocero.php">Modificar Vocero</a></li>
         <li><a href="consultar_vocero.php">Consultar Vocero</a></li>


      </ul>
      </li>


      <li><a href="#"><span class="segundooo"><i class="icon icon-link"></i></span>Consejo Comunal</a>

      <ul>

        <li><a href="registro_consejos.php">Registar Consejo Comunal</a></li>
         <li><a  href="modificar_consejo.php">Modificar Consejo Comunal</a></li>
         <li><a href="consultar_consejo.php">Consultar Consejo Comunal</a></li>

      </ul>
      </li>


      <li><a href="#"><span class="segundoooo"><i class="icon icon-point-up"></i></span>Censos</a>

      <ul>

        <li><a href="registro_censo.php">Registar Censo </a></li>
         <li><a  href="modificar_censo.php">Modificar Censo</a></li>
         <li><a href="consultar_censo.php">Consultar Censo</a></li>
          <li><a href="estadisticas.php">Generar Estadísticas</a></li>

      </ul>
      </li>
      <li><a href="#"><span class="sexto"><i class="icon icon-pacman"></i></span>Contactos</a></li>

       <li><a href="index.php"><span class="segundo"><i class="icon icon-home"></i></span>Salir</a></li>
      </ul>
      </nav>






</header>


-->
<?php require("slideshow.php"); ?></div>
<nav class="navbar navbar-default" role="navigation">
  <!-- El logotipo y el icono que despliega el menú se agrupan
       para mostrarlos mejor en los dispositivos móviles -->
  <div class="navbar-header">
   <button type="button" class="navbar-toggle" data-toggle="collapse"
            data-target=".navbar-ex1-collapse">
      <span class="sr-only">Desplegar navegación</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="inicio.php"><i>INICIO</i></a>
  </div>

  <!-- Agrupar los enlaces de navegación, los formularios y cualquier
       otro elemento que se pueda ocultar al minimizar la barra -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          Usuario <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <?php if ($_SESSION['per_id']==1):?>
          <li><a href="registro_usuario.php">Registrar Usuario</a></li>





          <li><a href="consultar_usuario.php">Consultar Usuarios</a></li>
           <li><a href="modificar_usuario.php">Modificar Usuario</a></li>
  <?php endif ?>

        </ul>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          Vocero <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="registro_vocero.php">Registrar Vocero</a></li>
          <li><a href="consultar_vocero.php">Consultar Vocero</a></li>
          <?php if ($_SESSION['per_id']==1): ?>


          <li><a href="modificar_vocero.php">Modificar Vocero</a></li>
  <?php endif ?>
        </ul>
      </li>
     <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          Consejos Comunales <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="registro_consejos.php">Registrar Consejo</a></li>
          <li><a href="consultar_consejo.php">Consultar Consejo</a></li>
          <?php if ($_SESSION['per_id']==1): ?>


          <li><a href="modificar_consejo.php">Modificar Consejo</a></li>
<?php endif ?>
        </ul>
      </li>


       <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          Censos <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="registro_censo.php">Registrar Censo</a></li>
          <li><a href="consultar_censo.php">Consultar Censo</a></li>
          <li><a href="modificar_censo.php">Modificar Censo</a></li>
           <li><a href="estadisticas.php">Estadisticas</a></li>
        </ul>
      </li>

    </ul>

    <!--<form class="navbar-form navbar-left" role="search">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Buscar">
      </div>
      <button type="submit" class="btn btn-default">Enviar</button>
    </form>-->

    <ul class="nav navbar-nav navbar-right">

    <li><a href="#">Contacto</a></li>
    <li><a href="../../index.php">Salir</a></li>

    </ul>
  </div>
</nav>
<div class="col-xs-12">
