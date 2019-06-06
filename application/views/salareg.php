<style>
.pantalla{
    width: 250px;
    background: #2a6496;
    font-size: 30px;
    font-family: Cambria;
    color: white;
}
    .libre{
        width: 45px;
        background: #4cae4c;
    }
    .ocupado{
        width: 45px;
        background: #5a6268;
    }
.disabledContent
{
    cursor: not-allowed;
    background-color: rgb(229, 229, 229) !important;
}

</style>
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
                        <input type="text" class="form-control text-uppercase" id="nombreSala" name="nombreSala" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="nroFila">nroFila:</label>
                        <input type="number" class="form-control" id="nroFila" name="nroFila" required min=0>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="nroColumna">nroColumna:</label>
                        <input type="number" class="form-control" id="nroColumna" name="nroColumna" required min=0>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="capacidad">capacidad:</label>
                        <input type="number" class="form-control disabledContent" value="0" id="capacidad" name="capacidad" >
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12" style="width: 100%;justify-content: center">
                        <center>
                            <div class="pantalla">Pantalla</div>
                        <table id="tabla" class="table-bordered">

                            <thead id="head">
                            </thead>
                            <tbody id="body">

                            </tbody>
                        </table>
                        <div id="habilitados" hidden>

                        </div>
                        </center>
                    </div>
                </div>
                <input type="submit" class="btn btn-success" value="Registrar">
                <a type="button" class="btn btn-warning" href="<?php echo base_url();?>SalaCtrl/salaver">Cancelar</a>
            </form>
        </div>
    </div>
</div>

