<div class="col-sm-11 col-md-10">
    <h3>Registrar Nueva Preferencia</h3>

<div class="card ">
  <div class="card-header text-white bg-success" >
    Informacion de Registro Preferencia
  </div>
  <div class="card-body">
      <h3>INFORMACION DE LA PREFERENCIA</h3>
<hr />
 
  <form method="POST" action="<?php echo base_url();?>PreferenciaCtrl/store" >


  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nombre">Nombre : </label>
      <input type="text" class="form-control" id="nombre" name="nombre" required>
    </div>

    <div class="form-group col-md-6">
      <label for="desc">Descripcion : </label>
      <textarea class="form-control" rows="3" cols="" id="desc" name="desc"></textarea>      
      
    </div>
  </div>
  


  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="activo">Activo : </label><br>
      <input class="form-control" id="activo" name="activo" type="checkbox" data-toggle="toggle" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger" checked>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="Icono"> Icono :</label><br>
      <select class="mdb-select md-form" id="icono" name="icono">       
      <option value="" disabled selected>Choose your option</option>
            <?php
            $directorio = opendir("assets/imagenes");
       $i=0;
       while ($archivo = readdir($directorio))
          {
          $nombreArch = ucwords($archivo);
          if($nombreArch != '.' && $nombreArch !='..'){
            $i++;
            echo "<option value='".base_url('assets/imagenes/').$nombreArch."' style='background-image:url(".base_url('assets/imagenes/').$nombreArch.")'>$nombreArch</option>";
           // echo "<img style='width:10px; height:10px;' src='".base_url('assets/imagenes/').$nombreArch."' alt=''>";
          }
          } 
          ?>
          </select>
     </div>
     <div class="form-group col-md-6">
      <label for="color">Activo : </label><br>
      <select name="coloricono" id="coloricono">
          <option value="green">Verde</option>
          <option value="yellow">Amarillo</option>
          <option value="blue">Azul</option>
          <option value="red">Rojo</option>
          <option value="purple">Purpura</option>
          <option value="gray">Gris</option>
      </select>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="activo">Ejemplo : </label><br>
          <div id="divEjemplo" name="divEjemplo">
          </div>
    </div>
  </div>
  <br>
  <input type="submit" class="btn btn-success" value="Registrar">
</form>
  </div>


</div>
</div>
