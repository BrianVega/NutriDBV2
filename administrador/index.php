<?php
session_start();
$error = "";
if($_POST){
    include("./config/bd.php");

    $probarUsuario = $_POST['usuarioAdmi'];
    $probarContrasenia = $_POST['contraseniaAdmi'];
    
    $sentenciaSQL = $conexion -> prepare("SELECT * FROM administradores WHERE Usuario = :usuario AND contrasenia = :contrasenia");
    $sentenciaSQL -> bindParam(':usuario', $probarUsuario);
    $sentenciaSQL -> bindParam(':contrasenia', $probarContrasenia);
    $sentenciaSQL -> execute();
    $resultadoLogin = $sentenciaSQL -> fetch(PDO::FETCH_LAZY);

    $validarUsuario = $resultadoLogin['usuario'] ?? '' ; 
    $validarContrasenia = $resultadoLogin['contrasenia'] ?? '';

    
    if(($probarUsuario == $validarUsuario) && ($probarUsuario != "") && ($probarContrasenia == $validarContrasenia) && ($probarContrasenia != "")){

        $_SESSION['usuario'] = "ok";
        $_SESSION['nombreUsuario'] = "Brian";
        header('Location:inicio.php');
    }else{
        $error = "error";
        $mensaje = "Error: Datos de acceso incorrectos";
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>administrador</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="row">

            <div class="col-md-4">

            </div>

            <div class="col-md-4">

                <br /><br /><br /><br />
                <div class="card">
                    <div class="card-header">
                        Iniciar sesión
                    </div>
                    <div class="card-body">

                        <?php if($error == "error") {?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $mensaje;?>
                        </div>
                        <?php } ?>

                        <form method="POST">
                            <div class="form-group">
                                <label>Usuario:</label>
                                <input type="text" class="form-control" name="usuarioAdmi"
                                    placeholder="Escribe tu usuario">
                            </div>

                            <div class="form-group">
                                <label>Contraseña:</label>
                                <input type="password" class="form-control" name="contraseniaAdmi"
                                    placeholder="Escribe tu contraseña">
                            </div>

                            <button type="submit" name="btnLogin" class="btn btn-primary">Entrar al
                                administrador</button>
                        </form>



                    </div>

                </div>

            </div>

        </div>
    </div>

</body>

</html>