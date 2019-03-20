<div class="col-sm-11 col-md-10">
    <h3>DISTRIBUIDORES</h3>
    <br>
    <div class="card ">
        <div class="card-header text-white bg-warning" >
            Distribuidor
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
                    <th>Invert</th>
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
                        <td><?php echo $row['invert']; ?></td>

                        <td>
                            <a class="btn btn-outline-warning  btn-sm" data-toggle="modal" data-target="#exampleModal" data-idsala="<?php echo $row['idSala']?>"> Modificar</a>
                            <a class="btn btn-outline-danger eli  btn-sm" href="<?=base_url()?>SalaCtrl/delete/<?=$row['idSala']?>"> Eliminar</a>

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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
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
                        <div class="form-group col-md-6">
                            <label for="nroSala">nroSala:</label>
                            <input type="text" id="idSala" name="idSala" hidden>
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
                    <input type="submit" class="btn btn-success" value="Modificar">
                    <a type="button" class="btn btn-warning" href="<?php echo base_url();?>SalaCtrl/salaver">Cancelar</a>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

