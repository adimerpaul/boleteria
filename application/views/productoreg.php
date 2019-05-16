<div class="col-sm-11 col-md-10">
    <h3>Registrar Nuevo Producto</h3>

<div class="card ">
  <div class="card-header text-white bg-success" >
    Informacion de Registro Prodcuto
  </div>
  <div class="card-body">
      <h3>INFORMACION DEL PRODUCTO</h3>
<hr />
 
  <form method="POST" action="<?php echo base_url();?>ProductoCtrl/store" >


  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nom">Nombre : </label>
      <input type="text" class="form-control" id="nom" name="nom" required>
    </div>

    <div class="form-group col-md-6">
      <label for="desc">Descripcion : </label>
      <textarea class="form-control" rows="3" cols="" id="desc" name="desc"></textarea>      
      
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="pcosto">Precio Costo :</label>
      <input type="number" class="form-control" id="pcosto" name="pcosto" step="2">  
      <label for="" id="utilidad"></label>
    </div>
    <div class="form-group col-md-6">
      <label for="pventa">Precio Venta: </label>
      <input type="number" class="form-control" id="pventa" name="pventa" step="2">
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
      <label for="Icono"> Icono :</label>
        <select id="icono">
            <option value="">Seleciona icono</option>
            <?php
            $directorio = opendir("assets/imagenes");
       $i=0;            
       while ($archivo = readdir($directorio))
          {
          $nombreArch = ucwords($archivo);
          if($nombreArch != '.' && $nombreArch !='..'){
            $i++;
          echo "<option value='$nombreArch '>$i";              
          echo "<img style='height:10px; wigth:10px;' src='".base_url('assets/imagenes/').$nombreArch."' alt='$nombreArch'></option>";
          }
          } 
          closedir("assets/imagenes");?>
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
          <div id="ejemplo">
          </div>
    </div>
  </div>
  <br>
  <input type="submit" class="btn btn-success" value="Registrar">
</form>
  </div>


</div>
</div>
