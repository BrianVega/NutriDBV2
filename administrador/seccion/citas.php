<?php include("../template/cabecera.php");?>
<div class="col-md-6">
    <form class="validacionesFormularios" id="formularioCitas" novalidate>

        <div class="form-row cita_paciente-Id ">

            <div class="col-md-8 mb-3">
                <label for="citaPaciente">Id del paciente</label>
                <input type="number" class="form-control" id="idPaciente" name="idPaciente" placeholder="77" min="1"
                    max="999" pattern="[0-9]{3}" required>
                <div class="invalid-feedback">
                    Ingrese el id del paciente para poderle agendar una cita
                </div>
            </div>
        </div>

        <div class="form-row cita_pacientes border-top border-3">
            <label for="fechaCitaPaciente">Fecha de la cita</label>
            <select name="diaCitaPaciente" class="form-control m-1" id="diaCitaPaciente" required>
                <option value="lunes">Lunes</option>
                <option value="martes">Martes</option>
                <option value="miercoles">Miércoles</option>
                <option value="jueves">Jueves</option>
                <option value="viernes">Viernes</option>
            </select>
            <select name="mesCitaPaciente" class="form-control m-1" id="mesCitaPaciente" required>
                <option value="enero">Enero</option>
                <option value="febrero">Febrero</option>
                <option value="marzo">Marzo</option>
                <option value="abril">Abril</option>
                <option value="mayo">Mayo</option>
                <option value="junio">Junio</option>
                <option value="julio">Julio</option>
                <option value="agosto">Agosto</option>
                <option value="septiembre">Septiembre</option>
                <option value="octubre">Octubre</option>
                <option value="noviembre">Noviembre</option>
                <option value="diciembre">Diciembre</option>
            </select>
            <select name="anioCitaPaciente" class="form-control m-1 mb-3" id="anioCitaPaciente" required>
                <option value="2022">2022</option>
            </select>
        </div>

        <div class="form-row form-outline motivos_cita-paciente ">
            <label for="motivosCitaPaciente">Motivos de la cita</label>
            <textarea class="form-control mb-4" name="motivosCitaPaciente" id="motivosCitaPaciente" cols="10" rows="5"
                required></textarea>
        </div>

        <button class="btn btn-primary" type="submit">Registrar</button>
    </form>
</div>
<div class="col-md-6 mostrar_citas">
    citas mostradas jeje
</div>
<?php include("../template/pie.php");?>