<div class="col-sm-11 col-md-10">
    <h3>Registrar Nueva Usuario</h3>

<div class="card ">
  <div class="card-header text-white bg-success" >
    Informacion de Registro de Usuario
  </div>
  <div class="card-body">
      <h3>INFORMACION DEL USUARIO</h3>
<hr />
    <div class="col-md-10">
  <form method="POST" action="<?php echo base_url();?>UsuarioCtrl/store" >
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nombre">Nombre:</label>   
      <input type="text" class="form-control" id="nombre" name="nombre">  
    </div>
    <div class="form-group col-md-6">
      <label for="textuser">User: </label>
      <input type="text" class="form-control" id="textuser" name="textuser">
      <label id="user_error" class="control-label col-md-6 text-danger" style="display: block;"></label>
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="pass">Password:</label>   
      <input type="password" class="form-control" id="pass" name="pass">  
    </div>
    <div class="form-group col-md-6">
      <label for="confpass">Confirmar Password: </label>
      <input type="password" class="form-control" id="confpass" name="confpass">
      <label id="mensaje_error" class="control-label col-md-6 text-danger" style="display: block;"></label>
    </div>
  </div>
  <h3>Permisos del Usuario</h3>
  <hr />
 
  <div class="form-row">
    <div class="form-group col-md-6">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input" id="inicio1" name="inicio1">Inicio
      </label><br>
        <label class="form-check-label">      
      <input type="checkbox" class="form-check-input" id="empresa1" name="empresa1">Empresas
      </label><br>
      <div id="empresa12" name="empresa12" hidden>
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <label class="form-check-label"> <input type="checkbox" class="form-check-input" id="regempresa1" name="regempresa1">RegistrarNuevaEmpresa </label><br>
        <label class="form-check-label"> <input type="checkbox" class="form-check-input" id="verempresa1" name="verempresa1">VerEmpresas </label><br>
        <label class="form-check-label"> <input type="checkbox" class="form-check-input" id="modempresa1" name="modempresa1">ModificarEmpresa </label><br>
        <label class="form-check-label"> <input type="checkbox" class="form-check-input" id="elempresa1" name="elempresa1">EliminarEmpresa </label><br>
      </div>
      </div>
    </div>

        <label class="form-check-label">      
      <input type="checkbox" class="form-check-input" id="pelicula1" name="pelicula1">Peliculas
      </label><br>
      <div id="pelicula12" name="pelicula12" hidden>
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <label class="form-check-label"> <input type="checkbox" class="form-check-input" id="regempresa1" name="regempresa1">RegistrarNuevaEmpresa </label><br>
        <label class="form-check-label"> <input type="checkbox" class="form-check-input" id="verempresa1" name="verempresa1">VerEmpresas </label><br>
        <label class="form-check-label"> <input type="checkbox" class="form-check-input" id="modempresa1" name="modempresa1">ModificarEmpresa </label><br>
        <label class="form-check-label"> <input type="checkbox" class="form-check-input" id="elempresa1" name="elempresa1">EliminarEmpresa </label><br>
      </div>
      </div>

    </div>
  </div>

  <input type="submit" class="btn btn-success" value="Registrar">
  <a type="button" class="btn btn-warning" href="<?php echo base_url();?>UsuarioCtrl/usuariover">Cancelar</a>
</form>
  </div>
</div>

</div>
</div>
