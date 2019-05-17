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
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Localidad</th>
                    <th>Telefono</th>
                    <th>NIT</th>
                    <th>Email</th>
                    <th>Responsable</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>

        <?php foreach($distribuidor as $distrib): ?>
        <tr>
            <td><?php echo $distrib['idDistrib']; ?></td>
            <td><?php echo $distrib['nombreDis']; ?></td>
            <td><?php echo $distrib['direccionDis']; ?></td>
            <td><?php echo $distrib['localidadDis']; ?></td>
            <td><?php echo $distrib['telefonoDis']; ?></td>
            <td><?php echo $distrib['nit']; ?></td>
            <td><?php echo $distrib['email']; ?></td>
            <td><?php echo $distrib['responsable']; ?></td>

            <td>
                <?php if($this->usuarios_model->veri($_SESSION['idUs'],'30')):  ?>
                <a class="btn btn-outline-warning  btn-sm" data-toggle="modal" data-target="#exampleModal" data-iddistrib="<?php echo $distrib['idDistrib']?>"> Modificar</a>
                <?php endif ?>
                <?php if($this->usuarios_model->veri($_SESSION['idUs'],'31')):  ?>
                <a class="btn btn-outline-danger eli  btn-sm" href="<?=base_url()?>DistribuidorCtrl/delete/<?=$distrib['idDistrib']?>"> Eliminar</a>
                <?php endif ?>
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
        <h5 class="modal-title" id="exampleModalLabel">Modificar Distribuidor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="<?php echo base_url();?>DistribuidorCtrl/update" >
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="nombre">Nombre:</label>
      <input type="text" id="iddistrib" name="idDistrib" hidden>
      <input type="text" class="form-control" id="nombre" name="nombre" required>  
    </div>

  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="direccion">Direccion:</label>   
      <input type="text" class="form-control" id="direccion" name="direccion" required>  
    </div>
    <div class="form-group col-md-6">
      <label for="localidad">Localidad: </label>
      <input type="text" class="form-control" id="localidad" name="localidad" required>
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="nit">NIT: </label>   
      <input type="text" class="form-control" id="nit" name="nit" required>  
    </div>
    <div class="form-group col-md-6">
      <label for="telefono">Telefono: </label>
      <input type="text" class="form-control" id="telefono" name="telefono">
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="email">Email: </label>   
      <input type="text" class="form-control" id="email" name="email">  
    </div>
    <div class="form-group col-md-6">
      <label for="responsable">Responsable: </label>
      <input type="text" class="form-control" id="responsable" name="responsable">
    </div>
  </div>

  <input type="submit" class="btn btn-success" value="Registrar">
  <a type="button" class="btn btn-warning" href="<?php echo base_url();?>DistribuidorCtrl/distribuidorver">Cancelar</a>
</form>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>

