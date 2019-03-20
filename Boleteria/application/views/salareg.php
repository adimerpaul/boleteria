<div class="col-sm-11 col-md-10">
    <h3>Registrar Nuevo Sala</h3>

    <div class="card ">
        <div class="card-header text-white bg-success" >
            Informacion de Registro Sala
        </div>
        <div class="card-body">
            <h3>INFORMACION DEL SALA</h3>
            <hr />
            <form method="POST" action="<?php echo base_url();?>SalaCtrl/store" >
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nroSala">nroSala:</label>
                        <input type="number" class="form-control" id="nroSala" name="nroSala" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nombreSala">nombreSala:</label>
                        <input type="text" class="form-control" id="nombreSala" name="nombreSala" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nroFila">nroFila:</label>
                        <input type="number" class="form-control" id="nroFila" name="nroFila" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="nroColumna">nroColumna:</label>
                        <input type="number" class="form-control" id="nroColumna" name="nroColumna" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="capacidad">capacidad:</label>
                        <input type="number" class="form-control" id="capacidad" name="capacidad" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="invert">invert:</label>
                        <input type="text" class="form-control" id="invert" name="invert" required>
                    </div>
                </div>
                <input type="submit" class="btn btn-success" value="Registrar">
                <a type="button" class="btn btn-warning" href="<?php echo base_url();?>SalaCtrl/salaver">Cancelar</a>
            </form>
        </div>
    </div>

</div>