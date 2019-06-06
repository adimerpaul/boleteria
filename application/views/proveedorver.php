<div class="col-sm-11 col-md-10">
    <h3>PROVEEDORES</h3>
    <br>
    <div class="card ">
    <div class="card-header text-white bg-warning" >
        Proveedores
    </div>
    <div class="card-body">    
    <div class="row">
        <?php if($this->usuarios_model->veri($_SESSION['idUs'],'110')):  ?>
            <a href="" class="btn btn-success" data-toggle="modal" data-target="#proveedorModal">Registrar</a>
        <?php endif;?>
        </div> <br>   
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Razon Social</th>
                    <th>E-Mail</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                    <th>Activo</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>

        <?php foreach($proveedor as $row): ?>
        <tr>
            <td><?php echo $row['idProveedor']; ?></td>
            <td><?php echo $row['razonSocial']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['telefono']; ?></td>
            <td><?php echo $row['direccion']; ?></td>
            <td><?php if ($row['activo']==1) echo 'SI'; else echo 'NO'; ?></td>
            
            <td>
                    <?php if($this->usuarios_model->veri($_SESSION['idUs'],'112')):  ?>
                <a class="btn btn-outline-warning  btn-sm" data-toggle="modal" data-target="#exampleModal" data-idproveedor="<?php echo $row['idProveedor']?>"> Modificar</a>
        <?php endif;?>
                    <?php if($this->usuarios_model->veri($_SESSION['idUs'],'113')):  ?>
                <a class="btn btn-outline-danger eli  btn-sm" href="<?=base_url()?>ProveedorCtrl/delete/<?=$row['idProveedor']?>"> Eliminar</a>
        <?php endif;?>
            </td>
        </tr>
    <?php endforeach; ?>
            </tbody>
        </table>
        <script>
                var eli=document.getElementsByClassName('eli');
                for(var i=0;i<eli.length;i++){
                    eli[i].addEventListener('click',function(e){
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
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> <i class="fas fa-shipping-fast"></i> Modificar Proveedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="<?php echo base_url();?>ProveedorCtrl/update" >

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="razonsocial2">Razon Social : </label>
      <input type="text" class="form-control text-uppercase" id="razonsocial2" name="razonsocial2" required>
      <input type="hidden"  id="idproveedor" name="idproveedor" required>
    </div>

    <div class="form-group col-md-6">
      <label for="nit2">NIT  : </label>
      <input type="text" class="form-control" id="nit2" name="nit2" >
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="telefono2">Telefono :</label>
      <input type="text" class="form-control" id="telefono2" name="telefono2" required>  
    </div>
    <div class="form-group col-md-6">
      <label for="email2">Email : </label>
      <input type="email" class="form-control" id="email2" name="email2" required>
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-12">
      <label for="direccion2">Direccion :</label>
      <input type="text" class="form-control text-uppercase" id="direccion2" name="direccion2" required>  
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="activo2">Activo : </label><br>
      <input class="form-control" id="activo2" name="activo2" type="checkbox" data-toggle="toggle" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger" checked>
    </div>
  </div>
  <input type="submit" class="btn btn-success" value="Modificar">
  <a type="button" class="btn btn-warning" href="<?php echo base_url();?>ProveedorCtrl/proveedorver">Cancelar</a>
</form>

      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="proveedorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar Proveedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="<?php echo base_url();?>ProveedorCtrl/store" >

<div class="form-row">
  <div class="form-group col-md-6">
    <label for="razonsocial">Razon Social : </label>
    <input type="text" class="form-control text-uppercase" id="razonsocial" name="razonsocial" required>
  </div>

  <div class="form-group col-md-6">
    <label for="nit">NIT  : </label>
    <input type="text" class="form-control" id="nit" name="nit" >
  </div>
</div>
<div class="form-row">
<div class="form-group col-md-6">
    <label for="telefono">telefono :</label>
    <input type="text" class="form-control" id="telefono" name="telefono" required>  
  </div>
  <div class="form-group col-md-6">
    <label for="email">Email : </label>
    <input type="email" class="form-control" id="email" name="email" required>
  </div>
</div>
<div class="form-row">
<div class="form-group col-md-12">
    <label for="direccion">Direccion :</label>
    <input type="text" class="form-control text-uppercase" id="direccion" name="direccion" >  
  </div>
</div>
<div class="form-row">
  <div class="form-group col-md-6">
    <label for="activo">Activo : </label><br>
    <input class="form-control" id="activo" name="activo" type="checkbox" data-toggle="toggle" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger" checked>
  </div>
</div>

<input type="submit" class="btn btn-success" value="Registrar">
</form>

      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>

