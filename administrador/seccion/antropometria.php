<?php include("../template/cabecera.php");?>
<div class="col-md-5">

    <form class="validacionesFormularios" id="formularioAntropometria" novalidate>

        <div class="form-row antropometria_paciente-Id ">

            <div class="col-md-8 mb-3">
                <label for="citaPaciente">Id del paciente</label>
                <input type="number" class="form-control" id="idPaciente" name="idPaciente" placeholder="77" min="1"
                    max="999" pattern="[0-9]{3}" required>
                <div class="invalid-feedback">
                    Ingrese el id del paciente para su búsqueda
                </div>
            </div>
        </div>

        <div class="form-row antropometria_paciente-datos1 border-top border-3">

            <div class="col-md-3 mb-3">
                <label for="pesoPaciente">Peso</label>
                <input type="number" class="form-control" id="pesoPaciente" name="pesoPaciente" placeholder="80.2"
                    step="any" value="" required>
                <div class="invalid-feedback">
                    Ingrese el peso
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <label for="estaturaPaciente">Estatura (cm)</label>
                <input type="number" class="form-control" id="estaturaPaciente" name="estaturaPaciente"
                    placeholder="180" required>
                <div class="invalid-feedback">
                    Ingrese la estatura
                </div>
            </div>

            <div class="col-md-5 mb-3">
                <label for="estaturaPaciente">Porcentaje graso</label>
                <input type="number" class="form-control" id="porcentajeGrasoPaciente" name="porcentajeGrasoPaciente"
                    placeholder="15" required>
                <div class="invalid-feedback">
                    Ingrese el porcentaje
                </div>
            </div>

        </div>

        <div class="form-row antropometria_paciente-datos2">

            <div class="col-md-4 mb-3">
                <label for="KilogramosMusculoPaciente">Kilogramos de Músculo</label>
                <input type="number" class="form-control" id="kilogramosMusculoPaciente" name="kilogramosMusculoPaciente" placeholder="62.7"
                    step="any" required>
                <div class="invalid-feedback">
                    Ingrese los Kilogramos
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <label for="circunferenciaCaderaPaciente">Circunferencia de la cadera (cm)</label>
                <input type="number" class="form-control" id="circunferenciaCaderaPaciente" name="circunferenciaCaderaPaciente"
                    placeholder="105" required>
                <div class="invalid-feedback">
                    Ingrese la Circunferencia
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <label for="circunferenciaCinturaPaciente">Circunferencia de la cintura</label>
                <input type="number" class="form-control" id="circunferenciaCinturaPaciente" name="circunferenciaCinturaPaciente"
                    placeholder="84.2" required>
                <div class="invalid-feedback">
                    Ingrese la circunferencia
                </div>
            </div>

        </div>



        <button class="btn btn-primary" type="submit">Registrar</button>
    </form>

</div>
<div class="col-md-7">
    mosttra datos antropiometricos


</div>
<?php include("../template/pie.php");?>