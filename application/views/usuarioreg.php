<div class="col-sm-11 col-md-10">
    <h3>Registrar Nueva Usuario</h3>

<div class="card ">
  <div class="card-header text-white bg-success" >
    Informacion de Registro de Usuario
  </div>
  <div class="card-body">
      <h3>INFORMACION DEL USUARIO</h3>
<hr />
    
  <form id="formregus" method="POST" action="<?php echo base_url();?>UsuarioCtrl/store" >
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nombre">Nombre:</label>   
      <input type="text" class="form-control" id="nombre" name="nombre" required>  
    </div>
    <div class="form-group col-md-6">
      <label for="textuser">User: </label>
      <input type="text" class="form-control" id="textuser" name="textuser" required>
      <label id="user_error" class="control-label col-md-6 text-danger" style="display: block;"></label>
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="pass">Password:</label>   
      <input type="password" class="form-control" id="pass" name="pass" required>  
    </div>
    <div class="form-group col-md-6">
      <label for="confpass">Confirmar Password: </label>
      <input type="password" class="form-control" id="confpass" name="confpass" required>
      <label id="mensaje_error" class="control-label col-md-6 text-danger" style="display: block;"></label>
    </div>
  </div>
  <h3>Permisos del Usuario</h3>
  <hr />
 
  <div class="form-row">
        <div class="col-md-6" id='secciones'> 

        </div>            
    </div>
    <hr>
  <input id="regusuario" type="submit" class="btn btn-success" value="Registrar">
  <a type="button" class="btn btn-warning" href="<?php echo base_url();?>UsuarioCtrl/usuariover">Cancelar</a>
</form>
  </div>
</div>
</div>
