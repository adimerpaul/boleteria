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
    <div class="card ">
        <div class="card-header text-white bg-warning" >
            Sala
        </div>
        <div class="card-body">     <br>
            <table id="example" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>Idsala</th>
                    <th>Nombre Sala</th>
                    <th>Nro Fila</th>
                    <th>Nro Columna</th>
                    <th>Capacidad</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach($sala as $row): ?>
                    <tr>
                        <td><?php echo $row['nroSala']; ?></td>
                        <td><?php echo $row['nombreSala']; ?></td>
                        <td><?php echo $row['nroFila']; ?></td>
                        <td><?php echo $row['nroColumna']; ?></td>
                        <td><?php echo $row['capacidad']; ?></td>
                        <td>
                            <?php if ($this->usuarios_model->veri($_SESSION['idUs'],'34')):?>
                                <button class="btn btn-outline-warning  btn-sm" data-toggle="modal" data-target="#exampleModal" data-idsala="<?php echo $row['idSala']?>"> Modificar</button>
                                <button class="btn btn-outline-info  btn-sm" data-toggle="modal" data-target="#manual" data-idsala="<?php echo $row['idSala']?>"> Cambiar</button>
                            <?php endif?>
                            <?php if ($this->usuarios_model->veri($_SESSION['idUs'],'35')):?>
                            <a class="btn btn-outline-danger eli  btn-sm" href="<?=base_url()?>SalaCtrl/delete/<?=$row['idSala']?>"> Eliminar</a>
                            <?php endif?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <script>
                var eli=document.getElementsByClassName('eli');
                for(var i=0;i<eli.length;i++){
                    eli[i].addEventListener('click',function(e){
                        //alert('asd');
                        if(!confirm('seguro de eliminar')){
                            e.preventDefault();
                        }
                    });
                }
            </script>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modificar Sala</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo base_url();?>SalaCtrl/update" >
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="nroSala">nroSala:</label>
                            <input type="text" id="idSala" name="idSala" hidden>
                            <input type="text" id="nroFila" name="nroFila" hidden>
                            <input type="text" id="nroColumna" name="nroColumna" hidden>
                            <input type="number" class="form-control" id="nroSala" name="nroSala" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="nombreSala">nombreSala:</label>
                            <input type="text" class="form-control" id="nombreSala" name="nombreSala" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="capacidad">capacidad:</label>
                            <input type="number" class="form-control" id="capacidad" name="capacidad" required>
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
                                <div id="habilitados" hidden >

                                </div>
                            </center>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-success" value="Modificar">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="manual" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modificar Sala Manual</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo base_url();?>SalaCtrl/manual" >
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="nroSala">Letra:</label>
                            <input type="text" id="idSala2" name="idSala" hidden >
                            <select name="letra" id="letra" class="form-control"></select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="nroSala">Numero:</label>
                            <select name="numero" id="numero" class="form-control"></select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="nroSala">Estado:</label>
                            <select name="estado" id="estado" class="form-control" required>
                                <option value="">Seleccionar...</option>
                                <option value="ACTIVO">ACTIVO</option>
                                <option value="INACTIVO">INACTIVO</option>
                            </select>
                        </div>
                    </div><div class="modal-footer">
                    <input type="submit" class="btn btn-success" value="Modificar">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>



        </div>
    </div>
</div>

