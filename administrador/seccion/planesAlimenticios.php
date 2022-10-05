<?php include("../template/cabecera.php");?>
<div class="col-md-5">
    <form class="validacionesFormularios" id="formularioPlanesAlimenticios" novalidate>
        <div class="form-row planesAlimenticios">

            <div class="col-md-3 mb-3">
                <label for="caloriasPlan">Calorías</label>
                <input type="number" class="form-control" id="caloriasPlan" name="caloriasPlan" placeholder="2000"
                    step="any" required>
            </div>

            <div class="col-md-3 mb-3">
                <label for="proteinasPlan">Proteínas</label>
                <input type="number" class="form-control" id="proteinasPlan" name="proteinasPlan" placeholder="180"
                    step="any" required>
            </div>

            <div class="col-md-3 mb-3">
                <label for="carbohidratosPlan">Carbohidratos</label>
                <input type="number" class="form-control" id="carbohidratosPlan" name="carbohidratosPlan"
                    placeholder="360.2" step="any" required>
            </div>

            <div class="col-md-3 mb-3">
                <label for="grasasPlan">Grasas</label>
                <input type="number" class="form-control" id="grasasPlan" name="grasasPlan" placeholder="70" step="any"
                    required>
            </div>
        </div>

        <div class="form-row form-outline comidasPlanAlimenticio-parte1 ">
            <div class="col-md-6">
                <label for="comida1PlanAlimenticio">Comida 1</label>
                <textarea class="form-control mb-4" name="comida1PlanAlimenticio" id="comida1PlanAlimenticio" cols="6"
                    rows="3" required></textarea>
            </div>
            <div class="col-md-6">
                <label for="comida2PlanAlimenticio">Comida 2</label>
                <textarea class="form-control mb-4" name="comida2PlanAlimenticio" id="comida2PlanAlimenticio" cols="6"
                    rows="3" required></textarea>
            </div>
        </div>

        <div class="form-row form-outline comidasPlanAlimenticio-parte2 ">
            <div class="col-md-6">
                <label for="comida3PlanAlimenticio">Comida 3</label>
                <textarea class="form-control mb-4" name="comida3PlanAlimenticio" id="comida3PlanAlimenticio" cols="6"
                    rows="3" required></textarea>
            </div>
            <div class="col-md-6">
                <label for="comida4PlanAlimenticio">Comida 4</label>
                <textarea class="form-control mb-4" name="comida4PlanAlimenticio" id="comida4PlanAlimenticio" cols="6"
                    rows="3" required></textarea>
            </div>
        </div>
        
        <div class="form-row form-outline comidasPlanAlimenticio-parte3 ">
            <div class="col-md-6">
                <label for="comida5PlanAlimenticio">Comida 5</label>
                <textarea class="form-control mb-4" name="comida5PlanAlimenticio" id="comida5PlanAlimenticio" cols="6"
                    rows="3" required></textarea>
            </div>
            <div class="col-md-6">
                <label for="comida6PlanAlimenticio">Comida 6</label>
                <textarea class="form-control mb-4" name="comida6PlanAlimenticio" id="comida6PlanAlimenticio" cols="6"
                    rows="3" required></textarea>
            </div>
        </div>        



        <button class="btn btn-primary" type="submit">Registrar</button>
    </form>
</div>

<div class="col-md-7">
    <h1>Buscar</h1>
    planes alimenticios mostrados jeje

    <br><h1>modificar -  eliminar</h1>
    <br><span>madnar a confirmar modificación/eliminación</span>
    <br><span>Al momento de hacer la búsqueda, se rellena el formulario de la izquierda y se habilita la modificación jeje</span>
</div>

<?php include("../template/pie.php");?>