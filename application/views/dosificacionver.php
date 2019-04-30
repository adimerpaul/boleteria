<div class="col-sm-11 col-md-10">
    <h3>DATOS DE DOSIFICACION</h3>
    <br>
    <div class="card ">
    <div class="card-header text-white bg-warning" >
        Datos de Dosificacion
    </div>
    <div class="card-body">     <br>   
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Desde </th>
                    <th>Hasta</th>
                    <th>Nro Tramite</th>
                    <th>Nro Autorizacion</th>
                    <th>Llave Dosificacion</th>
                    <th>Factura Inicial</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>

        <?php foreach($dosif as $dosif): ?>
        <tr>
            <td><?php echo $dosif['idDosif']; ?></td>
            <td><?php echo $dosif['fechaDesde']; ?></td>
            <td><?php echo $dosif['fechaHasta']; ?></td>
            <td><?php echo $dosif['nroTramite']; ?></td>
            <td><?php echo $dosif['nroAutorizacion']; ?></td>
            <td><?php echo $dosif['llaveDosif']; ?></td>
            <td><?php echo $dosif['nroFactIni']; ?></td>
            <td><?php if ($dosif['activo'] == 0) echo 'Inactivo';
            else echo 'Activo';
            ?></td>
            <td>
                <?php if($this->usuarios_model->veri($_SESSION['idUs'],'107')):  ?>
                    <a class="btn btn-outline-warning  btn-sm" data-toggle="modal" data-target="#exampleModal" data-idosif="<?php echo $dosif['idDosif']?>"> Modificar</a>
                    <a class="btn btn-outline-danger eli  btn-sm" href="<?=base_url()?>DosificacionCtrl/delete/<?=$dosif['idDosif']?>"> Eliminar</a>
                <?php endif  ?>
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
        <h5 class="modal-title" id="exampleModalLabel">Modificar Dosificacion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="<?php echo base_url();?>DosificacionCtrl/update" >
      <div class="form-row">
    <div class="form-group col-md-4">
      <label for="tramite">Nro de Tramite:</label>   
      <input type="hidden" id="idosif" class="form-control" name="idosif">
      <input type="number" class="form-control" id="tramite" name="tramite" required>  
    </div>
    <div class="form-group col-md-4">
      <label for="autorizacion">Nro Autorizacion: </label>
      <input type="number" class="form-control" id="autorizacion" name="autorizacion" required>
    </div>
    <div class="form-group col-md-4">
      <label for="inicial">Nro Factura Inicial: </label>
      <input type="number" class="form-control" id="inicial" name="inicial" required min=1>
    </div>
  </div>
 
  <div class="form-group">
    <label for="llave">Llave Dosificacion: </label>
    <input type="text" class="form-control" id="llave" name="llave" required>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="fechad">Fecha Desde:</label>
      <input type="date" class="form-control" id="fechad" name="fechad" required>
    </div>
    <div class="form-group col-md-6">
      <label for="fechah">Fecha Hasta: </label>
      <input type="date" id="fechah" class="form-control" name="fechah" required>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="leyenda">Leyenda:</label>
      <textarea class="form-control" rows="5" cols="" id="leyenda" name="leyenda"></textarea>      
     </div>
  </div>
  <input type="submit" class="btn btn-success" value="Registrar">
  <a type="button" class="btn btn-warning" href="<?php echo base_url();?>DosificacionCtrl/dosificacionver">Cancelar</a>
</form>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>

