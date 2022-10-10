<?php include("../template/cabecera.php");?>
<?php  
$error = "";
$operacion = "";
$nombrePaciente = $_POST['nombrePaciente'] ?? '';
$apellidoPaciente = $_POST['apellidoPaciente'] ?? '';
$telefonoPaciente = $_POST['telefonoPaciente'] ?? '';
$edadPaciente = $_POST['edadPaciente'] ?? '';
$sexoPaciente = $_POST['sexoPaciente'] ?? '';
$callePaciente = $_POST['callePaciente'] ?? '';
$numeroPaciente = $_POST['numeroPaciente'] ?? '';
$coloniaPaciente = $_POST['coloniaPaciente'] ?? '';
$codigoPostalPaciente = $_POST['codigoPostalPaciente'] ?? '';
$ocupacionPaciente = $_POST['ocupacionPaciente'] ?? '';
//$idPlanAlimenticioPaciente = $_POST['idPlanAlimenticioPaciente'] ?? '';
$usuarioPaciente = $_POST['usuarioPaciente'] ?? '';
$contraseniaPaciente = $_POST['contraseniaPaciente'] ?? '';
$accion = $_POST['accion']?? "";

$idEncontrado = "";
$nombreEncontrado = "";
$apellidoEncontrado = "";
$telefonoEncontrado = "";
$edadEncontrado = "";
$sexoEncontrado = "";
$calleEncontrado = "";
$numeroEncontrado = "";
$coloniaEncontrado = "";
$codigoPostalEncontrado = "";
$ocupacionEncontrado = "";
$planAlimenticioEncontrado = "";
$usuarioEncontrado = "";
$contraseniaEncontrado = "";
$operacionSeleccionar = "";
$errorInsercion = "";
$usuarioDuplicado = "";
$usuarioBorrado="";
$usuarioRegistrado="";
$confirmacionUsuario="";

include("../config/bd.php");
echo $accion;

switch($accion){

    case "Registrar":

        $usuarioDuplicado = $_POST['usuarioPaciente'] ?? '';
        
        $sentenciaSQL = $conexion -> prepare ("SELECT * FROM pacientes WHERE usuario = :buscarUsuario");
        $sentenciaSQL -> bindParam(':buscarUsuario', $usuarioDuplicado);
        $sentenciaSQL -> execute();
        $resultadoBuscarUsuario = $sentenciaSQL -> fetch(PDO::FETCH_LAZY);

        $usuarioEncontradoR = $resultadoBuscarUsuario['usuario'] ?? '';
        
        //echo " ".$usuarioEncontradoR." ".$usuarioDuplicado;
        if($usuarioDuplicado != $usuarioEncontradoR && $usuarioDuplicado != ""){

        $sentenciaSQL = $conexion->prepare("INSERT INTO pacientes (nombre, apellido, telefono,
        edad, sexo, calle, numero, colonia, codigoPostal, ocupacion, usuario, contrasenia) 
        VALUES (:nombrePaciente, :apellidoPaciente, :telefonoPaciente, :edadPaciente, :sexoPaciente, 
        :callePaciente, :numeroPaciente, :coloniaPaciente, :codigoPostalPaciente, :ocupacionPaciente, 
        :usuarioPaciente, :contraseniaPaciente);");
        
        $sentenciaSQL->bindParam(':nombrePaciente',$nombrePaciente);
        $sentenciaSQL->bindParam(':apellidoPaciente',$apellidoPaciente);
        $sentenciaSQL->bindParam(':telefonoPaciente',$telefonoPaciente);
        $sentenciaSQL->bindParam(':edadPaciente',$edadPaciente);
        $sentenciaSQL->bindParam(':sexoPaciente',$sexoPaciente);
        $sentenciaSQL->bindParam(':callePaciente',$callePaciente);
        $sentenciaSQL->bindParam(':numeroPaciente',$numeroPaciente);
        $sentenciaSQL->bindParam(':coloniaPaciente',$coloniaPaciente);
        $sentenciaSQL->bindParam(':codigoPostalPaciente',$codigoPostalPaciente);
        $sentenciaSQL->bindParam(':ocupacionPaciente',$ocupacionPaciente);
        //$sentenciaSQL->bindParam(':idPlanAlimenticioPaciente',$idPlanAlimenticioPaciente);
        $sentenciaSQL->bindParam(':usuarioPaciente',$usuarioPaciente);
        $sentenciaSQL->bindParam(':contraseniaPaciente',$contraseniaPaciente);

        $sentenciaSQL->execute();

        $usuarioRegistrado = "true";
        $confirmacionUsuario = "Se ha registrado el paciente de manera exitosa";
        }
        else if($usuarioPaciente == "" &&  $contraseniaPaciente == ""){
            $errorInsercion = "error";
            $usuarioDuplicado = "Por favor, rellene todos los campos";
        }
        else{
            $errorInsercion = "error";
            $usuarioDuplicado = "Error: el usuario ".$usuarioDuplicado." Ya ha sido previamente registrado.";
        }
        break;

    case "Modificar":

        $usuarioDuplicado = $_POST['usuarioPaciente'] ?? '';
        
        $sentenciaSQL = $conexion -> prepare ("SELECT * FROM pacientes WHERE usuario = :buscarUsuario");
        $sentenciaSQL -> bindParam(':buscarUsuario', $usuarioDuplicado);
        $sentenciaSQL -> execute();
        $resultadoBuscarUsuario = $sentenciaSQL -> fetch(PDO::FETCH_LAZY);

        $usuarioEncontradoR = $resultadoBuscarUsuario['usuario'] ?? '';
        
        //echo " ".$usuarioEncontradoR." ".$usuarioDuplicado;
        if($usuarioDuplicado == $usuarioEncontradoR && $usuarioDuplicado != ""){

        $sentenciaSQL = $conexion->prepare("UPDATE pacientes SET nombre = :nombrePaciente, apellido = :apellidoPaciente, 
        telefono = :telefonoPaciente, edad = :edadPaciente, sexo = :sexoPaciente, calle = :callePaciente, numero = :numeroPaciente, 
        colonia = :coloniaPaciente, codigoPostal = :codigoPostalPaciente, ocupacion = :ocupacionPaciente, usuario = :usuarioPaciente, 
        contrasenia = :contraseniaPaciente WHERE usuario = :usuarioEncontradoR");
        
        $sentenciaSQL->bindParam(':nombrePaciente',$nombrePaciente);
        $sentenciaSQL->bindParam(':apellidoPaciente',$apellidoPaciente);
        $sentenciaSQL->bindParam(':telefonoPaciente',$telefonoPaciente);
        $sentenciaSQL->bindParam(':edadPaciente',$edadPaciente);
        $sentenciaSQL->bindParam(':sexoPaciente',$sexoPaciente);
        $sentenciaSQL->bindParam(':callePaciente',$callePaciente);
        $sentenciaSQL->bindParam(':numeroPaciente',$numeroPaciente);
        $sentenciaSQL->bindParam(':coloniaPaciente',$coloniaPaciente);
        $sentenciaSQL->bindParam(':codigoPostalPaciente',$codigoPostalPaciente);
        $sentenciaSQL->bindParam(':ocupacionPaciente',$ocupacionPaciente);
        //$sentenciaSQL->bindParam(':idPlanAlimenticioPaciente',$idPlanAlimenticioPaciente);
        $sentenciaSQL->bindParam(':usuarioPaciente',$usuarioPaciente);
        $sentenciaSQL->bindParam(':contraseniaPaciente',$contraseniaPaciente);
        $sentenciaSQL->bindParam(':usuarioEncontradoR',$usuarioEncontradoR);


        $sentenciaSQL->execute();

        
        //$operacion = "mostrar datos";
        $confirmacionUsuario = "Se ha modificado el registro del paciente de manera exitosa";
        $usuarioRegistrado = "true";

        }
        else if($usuarioPaciente == "" &&  $contraseniaPaciente == ""){
            $errorInsercion = "error";
            $usuarioDuplicado = "Por favor, rellene todos los campos";
        }
        else{
            $errorInsercion = "error";
            $usuarioDuplicado = "Error: el usuario ".$usuarioDuplicado." Ya ha sido previamente registrado.";
        }
        break;


        break;

    case "Cancelar":
        header('Location:pacientes.php');
        break;

    //case "Seleccionar":
    case "Buscar":
        
        //echo "Presionado botón Buscar";
        $buscarUsuario = $_POST['buscarUsuario'] ?? '';
    
            $sentenciaSQL = $conexion -> prepare ("SELECT * FROM pacientes WHERE usuario = :buscarUsuario");
            $sentenciaSQL -> bindParam(':buscarUsuario', $buscarUsuario);
            $sentenciaSQL -> execute();
            $resultadoBuscarUsuario = $sentenciaSQL -> fetch(PDO::FETCH_LAZY);
    
            $idEncontrado = $resultadoBuscarUsuario['id'] ?? '';
            $nombreEncontrado = $resultadoBuscarUsuario['nombre'] ?? '';
            $apellidoEncontrado = $resultadoBuscarUsuario['apellido'] ?? '';
            $telefonoEncontrado = $resultadoBuscarUsuario['telefono'] ?? '';
            $edadEncontrado = $resultadoBuscarUsuario['edad'] ?? '';
            $sexoEncontrado = $resultadoBuscarUsuario['sexo'] ?? '';
            $calleEncontrado = $resultadoBuscarUsuario['calle'] ?? '';
            $numeroEncontrado = $resultadoBuscarUsuario['numero'] ?? '';
            $coloniaEncontrado = $resultadoBuscarUsuario['colonia'] ?? '';
            $codigoPostalEncontrado = $resultadoBuscarUsuario['codigoPostal'] ?? '';
            $ocupacionEncontrado = $resultadoBuscarUsuario['ocupacion'] ?? '';
            $planAlimenticioEncontrado = $resultadoBuscarUsuario['planAlimenticio'] ?? '';
            $usuarioEncontrado = $resultadoBuscarUsuario['usuario'] ?? '';
            $contraseniaEncontrado = $resultadoBuscarUsuario['contrasenia'] ?? '';

            
            if($buscarUsuario == $usuarioEncontrado && $buscarUsuario != "" && $usuarioEncontrado != ""){
                $operacion = "mostrar datos";
            }else{
                $error = "error";
                $mensaje = "Error: Usuario no encontrado";
            }
            
        break;

    case "Seleccionar":
        
        $buscarUsuario = $_POST['usuarioEncontrado'] ?? '';
    
            $sentenciaSQL = $conexion -> prepare ("SELECT * FROM pacientes WHERE usuario = :buscarUsuario");
            $sentenciaSQL -> bindParam(':buscarUsuario', $buscarUsuario);
            $sentenciaSQL -> execute();
            $resultadoBuscarUsuario = $sentenciaSQL -> fetch(PDO::FETCH_LAZY);
    
            $idEncontrado = $resultadoBuscarUsuario['id'] ?? '';
            $nombreEncontrado = $resultadoBuscarUsuario['nombre'] ?? '';
            $apellidoEncontrado = $resultadoBuscarUsuario['apellido'] ?? '';
            $telefonoEncontrado = $resultadoBuscarUsuario['telefono'] ?? '';
            $edadEncontrado = $resultadoBuscarUsuario['edad'] ?? '';
            $sexoEncontrado = $resultadoBuscarUsuario['sexo'] ?? '';
            $calleEncontrado = $resultadoBuscarUsuario['calle'] ?? '';
            $numeroEncontrado = $resultadoBuscarUsuario['numero'] ?? '';
            $coloniaEncontrado = $resultadoBuscarUsuario['colonia'] ?? '';
            $codigoPostalEncontrado = $resultadoBuscarUsuario['codigoPostal'] ?? '';
            $ocupacionEncontrado = $resultadoBuscarUsuario['ocupacion'] ?? '';
            $planAlimenticioEncontrado = $resultadoBuscarUsuario['planAlimenticio'] ?? '';
            $usuarioEncontrado = $resultadoBuscarUsuario['usuario'] ?? '';
            $contraseniaEncontrado = $resultadoBuscarUsuario['contrasenia'] ?? '';


                $operacion = "mostrar datos";
                $operacionSeleccionar = "mostrar datos seleccionar";


        break;

        case "Borrar":
            $buscarUsuario = $_POST['usuarioEncontrado'] ?? '';
    
                $sentenciaSQL = $conexion -> prepare ("DELETE FROM pacientes WHERE usuario = :usuarioBorrar");
                $sentenciaSQL -> bindParam('usuarioBorrar', $buscarUsuario);
                $sentenciaSQL -> execute();
                $usuarioBorrado = true;

        break;
    

    }



   


?>





<div class="col-md-12">

    <div class="card mb-5">
        <div class="card-header">
            Datos del paciente
        </div>

        <div class="card-body">
            <form class="validacionesFormularios" id="formularioPacientes" method="POST" enctype="multipart/form-data"
                novalidate>
                <?php if($errorInsercion == "error" && $errorInsercion  != "") {?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $usuarioDuplicado;?>
                </div>
                <?php }?>

                <?php if($usuarioRegistrado == "true") {?>
                <div class="alert alert-success d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                        <use xlink:href="#check-circle-fill" />
                    </svg>
                    <div>
                        <?php echo $confirmacionUsuario; ?>
                    </div>
                </div>
                <?php }?>


                <div class="form-row generales-paciente">
                    <div class="col-md-6 mb-1">
                        <label for="validationCustom01">Nombre(s)</label>
                        <input name="nombrePaciente" type="text" class="form-control" id="validationCustom01"
                            placeholder="Juan" pattern="[a-zA-Z\s]{2,100}"
                            value="<?php if($operacionSeleccionar == "mostrar datos seleccionar") { echo $nombreEncontrado; } else echo "";?>"
                            required>
                        <div class="invalid-feedback">
                            Ingrese un nombre válido
                        </div>
                    </div>
                    <div class="col-md-6 mb-1">
                        <label for="validationCustom02">Apellido(s)</label>
                        <input name="apellidoPaciente" type="text" class="form-control" id="validationCustom02"
                            placeholder="Escutia" pattern="[a-zA-Z\s]{2,100}"
                            value="<?php if($operacionSeleccionar == "mostrar datos seleccionar") { echo $apellidoEncontrado; } else echo "";?>"
                            required>
                        <div class="invalid-feedback">
                            Ingrese un apellido válido
                        </div>
                    </div>
                </div>
                <div class="form-row tel-sex-edad-paciente">
                    <div class="col-md-4 mb-4">
                        <label for="telefonoPaciente">Teléfono</label>
                        <input type="text" class="form-control" id="telefonoPaciente" name="telefonoPaciente"
                            placeholder="3414205938" pattern="[0-9]{10}" maxlength="10"
                            value="<?php if($operacionSeleccionar == "mostrar datos seleccionar") { echo $telefonoEncontrado; } else echo "";?>"
                            required>
                        <div class="invalid-feedback">
                            Ingrese un número de teléfono de 10 dígitos
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="edadPaciente">Edad</label>
                        <input type="text" class="form-control" id="edadPaciente" name="edadPaciente" placeholder="24"
                            min="1" max="99"
                            value="<?php if($operacionSeleccionar == "mostrar datos seleccionar") { echo $edadEncontrado; } else echo "";?>"
                            required>
                        <div class="invalid-feedback">
                            Ingrese una edad válida
                        </div>
                    </div>

                    <div class="col-md-5 mb-5">
                        <label for="sexoPaciente">Sexo</label><br>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="sexoPacienteMasculino"
                                name="sexoPaciente" value="M"
                                <?php if($operacionSeleccionar == "mostrar datos seleccionar" && $sexoEncontrado == "M") { ?>
                                checked <?php } else ?> required>
                            <label for="sexoPacienteMasculino" class="custom-control-label">Masculino</label><br>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="sexoPacienteFemenino"
                                name="sexoPaciente" value="F"
                                <?php if($operacionSeleccionar == "mostrar datos seleccionar" && $sexoEncontrado == "F") { ?>
                                checked <?php } else ?> required>
                            <label for="sexoPacienteFemenino" class="custom-control-label">Femenino</label><br>
                        </div>
                    </div>
                </div>

                <div class="form-row direccion-paciente">
                    <div class="col-md-6 mb-1">
                        <label for="callePaciente">Calle</label>
                        <input type="text" class="form-control" name="callePaciente" id="callePaciente"
                            placeholder="Federico del toro" pattern="[a-zA-Z\s]{2,100}"
                            value="<?php if($operacionSeleccionar == "mostrar datos seleccionar") { echo $calleEncontrado; } else echo "";?>"
                            required>
                        <div class="invalid-feedback">
                            Ingrese una calle válida
                        </div>
                    </div>
                    <div class="col-md-6 mb-1">
                        <label for="numeroPaciente">Número</label>
                        <input type="text" class="form-control" name="numeroPaciente" id="numeroPaciente"
                            placeholder="365" min="1"
                            value="<?php if($operacionSeleccionar == "mostrar datos seleccionar") { echo $numeroEncontrado; } else echo "";?>"
                            required>
                        <div class="invalid-feedback">
                            Ingrese un número válido
                        </div>
                    </div>
                </div>
                <div class="form-row direccion_CP-paciente">
                    <div class="col-md-3 mb-3">
                        <label for="codigoPostalPaciente">Código postal</label>
                        <input type="text" class="form-control" name="codigoPostalPaciente" id="codigoPostalPaciente"
                            placeholder="49064" min="1"
                            value="<?php if($operacionSeleccionar == "mostrar datos seleccionar") { echo $codigoPostalEncontrado; } else echo "";?>"
                            required>
                        <div class="invalid-feedback">
                            Ingrese un código postal válido
                        </div>
                    </div>
                    <div class="col-md-9 mb-3">
                        <label for="coloniaPaciente">Colonia</label>
                        <input type="text" class="form-control" name="coloniaPaciente" id="coloniaPaciente"
                            placeholder="El nogal" pattern="[a-zA-Z\s]{2,100}"
                            value="<?php if($operacionSeleccionar == "mostrar datos seleccionar") { echo $coloniaEncontrado; } else echo "";?>"
                            required>
                        <div class="invalid-feedback">
                            Ingrese una colonia válida
                        </div>
                    </div>

                </div>

                <div class="form-row ocupacion-paciente">
                    <div class="col-md-12 mb-3">
                        <label for="ocupacionPaciente">Ocupación</label>
                        <input type="text" class="form-control" name="ocupacionPaciente" id="ocupacionPaciente"
                            placeholder="Estudiante" pattern="[a-zA-Z0-9\s]{2,100}"
                            value="<?php if($operacionSeleccionar == "mostrar datos seleccionar") { echo $ocupacionEncontrado; } else echo "";?>"
                            required>
                        <div class="invalid-feedback">
                            Ingrese la ocupación del paciente
                        </div>
                    </div>
                </div>

                <div class="form-row usuario_contraseña-paciente">
                    <div class="col-md-6 mb-3">
                        <label for="usuarioPaciente">Usuario</label>
                        <input type="text" class="form-control" name="usuarioPaciente" id="usuarioPaciente"
                            placeholder="User01" pattern="[a-zA-Z0-9\s]{2,100}"
                            value="<?php if($operacionSeleccionar == "mostrar datos seleccionar") { echo $usuarioEncontrado; } else echo "";?>"
                            required>
                        <div class="invalid-feedback">
                            Ingrese un usuario de mínimo 2 carácteres.
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="contraseniaPaciente">Contraseña</label>
                        <input type="text" class="form-control" name="contraseniaPaciente" id="contraseniaPaciente"
                            placeholder="ContrasenaFalsa1" minlength="8" maxlength="16"
                            pattern="^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$"
                            value="<?php if($operacionSeleccionar == "mostrar datos seleccionar") { echo $contraseniaEncontrado; } else echo "";?>"
                            required>
                        <div class="invalid-feedback">
                            La contraseña debe de contener entre 8 y 16 Carácteres, mínimo un número, mínimo una
                            minúscula y mínimo una mayúscula.
                        </div>
                    </div>
                </div>

                <div class="btn-group" role="group" aria-label="">
                    <button type="submit" name="accion" value="Registrar" class="btn btn-success">Registrar</button>
                    <button type="submit" name="accion" value="Modificar" class="btn btn-warning">Modificar</button>
                    <button type="submit" name="accion" value="Cancelar" class="btn btn-info">Cancelar</button>
                </div>
            </form>

        </div>


    </div>



</div>
<section class=" col-md-12 pb-4 d-flex row justify-content-center">
    <div class="bg-white border rounded">
        <section class="w-180 p-4">
            <div class="col-md-12">
                <form method="POST">
                    <div class="input-group mb-3">

                        <input type="text" class="form-control" placeholder="Usuario del paciente" name="buscarUsuario"
                            id="buscarUsuario" />
                        <input class="btn btn-outline-secondary botonBuscar" name="accion" type="submit"
                            value="Buscar" />
                    </div>

                </form>
                <?php if($error == "error" && $error  != "" && $operacion != "mostrar datos") {?>
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                        <use xlink:href="#exclamation-triangle-fill" />
                    </svg>
                    <div><?php echo $mensaje;?></div>
                </div>
                <?php }?>

                <?php if($usuarioBorrado == "true") {?>
                <div class="alert alert-success d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                        <use xlink:href="#check-circle-fill" />
                    </svg>
                    <div>
                        Se ha borrado el registro de manera exitosa
                    </div>
                </div>
                <?php }?>

                <table class="table table-bordered">
                    <?php if($operacion == "mostrar datos") {?>

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Teléfono</th>
                            <th>Edad</th>
                            <th>Sexo</th>
                            <th>Calle</th>
                            <th>Número</th>
                            <th>Colonia</th>
                            <th>C.P.</th>
                            <th>Ocupación</th>
                            <th>ID Plan alimenticio</th>
                            <th>Usuario</th>
                            <th>Contraseña</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $idEncontrado?></td>
                            <td><?php echo $nombreEncontrado?></td>
                            <td><?php echo $apellidoEncontrado?></td>
                            <td><?php echo $telefonoEncontrado?></td>
                            <td><?php echo $edadEncontrado?></td>
                            <td><?php echo $sexoEncontrado?></td>
                            <td><?php echo $calleEncontrado?></td>
                            <td><?php echo $numeroEncontrado?></td>
                            <td><?php echo $coloniaEncontrado?></td>
                            <td><?php echo $codigoPostalEncontrado?></td>
                            <td><?php echo $ocupacionEncontrado?></td>
                            <td><?php echo $planAlimenticioEncontrado?></td>
                            <td><?php echo $usuarioEncontrado?></td>
                            <td><?php echo $contraseniaEncontrado?></td>

                            <td>
                                <form method="POST">
                                    <input type="hidden" name="usuarioEncontrado"
                                        value="<?php echo $usuarioEncontrado; ?>" />
                                    <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary" />
                                    <input type="submit" name="accion" value="Borrar" class="btn btn-danger" />
                                </form>

                            </td>
                        </tr>

                    </tbody>
                </table>
                <?php }?>


            </div>
        </section>

    </div>
</section>
<script src="../js/formularioValidaciones.js"></script>
<?php include("../template/pie.php");?>
