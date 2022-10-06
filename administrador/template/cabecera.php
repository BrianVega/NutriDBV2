<?php
session_start();
if($_SESSION['usuario']!="ok"){
  header("Location: ../index.php");

}else{
  if($_SESSION['usuario']=="ok"){
    $nombreUsuario=$_SESSION["nombreUsuario"];
  }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
    <!-- CSS DOCS -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">
    <link rel="stylesheet" href="../../css/estilosAdministrador.css">
    <!--<link rel="stylesheet" href="../../estilosForm.css">
-->
    
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <!--<script src="../js/formularioValidaciones.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
  </head>
  <body>

    <?php $url="http://".$_SERVER['HTTP_HOST']."/sitioweb" ?>
    <?php $url2="http://".$_SERVER['HTTP_HOST']."/sitioweb" ?>

    <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="nav navbar-nav">
            <a class="nav-item nav-link active" href="<?php echo $url;?>/administrador/inicio.php">administrador de NutriDB <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/seccion/pacientes.php">Pacientes</a>
            <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/seccion/antropometria.php">Antropometría</a>
            <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/seccion/planesAlimenticios.php">Planes alimenticios</a>
            <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/seccion/consultar.php">Consultar</a>
            <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/seccion/citas.php">Citas</a>
            <a class="nav-item nav-link" href="<?php echo $url;?>/indexPacientes.php">Ver sitio Web</a>
            <a class="nav-item nav-link" href="<?php echo $url2;?>/publicitario.php">Ver sitio publicitario</a>
            <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/seccion/cerrar.php">Cerrar</a>
            




        </div>
    </nav>
    
    <div class="container">
        <br/>
        <div class="row">