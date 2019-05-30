<div class="col-sm-11 col-md-10">
    <h3>Registrar Nueva Tarifa</h3>

<div class="card ">
  <div class="card-header text-white bg-success" >
    Informacion de Registro Tarifa
  </div>
  <div class="card-body">
      <h3>INFORMACION DE LA TARIFA</h3>
<hr />
    
  <form method="POST" action="<?php echo base_url();?>TarifaCtrl/store" >
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="serie">Serie:</label>   
      <input type="text" class="form-control" id="serie" name="serie"  required>  
    </div>
    <div class="form-group col-md-6">
      <label for="precio">Precio: </label>
      <input type="text" class="form-control" id="precio" name="precio" required>
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="descrip">Descripcion:</label>   
      <input type="text" class="form-control" id="descrip" name="descrip">  
    </div>

  </div>
  <div class="form-row">
    <div class="form-group row col-md-4">
      <label for="tv" class="col-sm-6 col-form-label">Mostrar en Tv:  </label>   
      <div class="col-sm-6">
      <input type="checkbox" class="form-control" id="tv" name="tv" data-toggle="toggle" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger">  
      </div>
    </div>
    <div class="form-group row col-md-4">
      <label for="defecto" class="col-sm-4 col-form-label">Defecto:    </label>   
      <div class="col-sm-8">
      <input type="checkbox" class="form-control" id="defecto" name="defecto" data-toggle="toggle" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger">    
      </div>
    </div>
    <div class="form-group row col-md-4">
      <label for="web" class="col-sm-4 col-form-label">Venta Web:   </label>   
      <div class="col-sm-8">
      <input type="checkbox" class="form-control" id="web" name="web" data-toggle="toggle" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger">   
      </div>
    </div>
  </div>
  <div class="form-group row ">
    <label for="mostrarbol" class="col-sm-2 col-form-label">Mostrar en boleteria: </label>
      <div class="col-sm-10">
      <input type="checkbox" class="form-control" id="mostrarbol" name="mostrarbol" data-toggle="toggle" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger" checked>    
    </div>
  </div>
  <div class="form-row">
  <div class="col-md-1"></div>
    <div class="form-check col-md-5 align-items-center">
      <label for="lunes">Dias:</label><br>
      <div class="form-check center-block">
      <label class="form-check-label">
      <input type="checkbox" class="form-check-input" id="lunes" name="lunes">
      Lunes
      </label><br>
      <label class="form-check-label">
      <input type="checkbox" class="form-check-input" id="martes" name="martes">Martes
      </label><br>
      <label class="form-check-label">
      <input type="checkbox" class="form-check-input" id="miercoles" name="miercoles">Miercoles
      </label><br>
      <label class="form-check-label">
      <input type="checkbox" class="form-check-input" id="jueves" name="jueves">Jueves
      </label><br>
      <label class="form-check-label">
      <input type="checkbox" class="form-check-input" id="viernes" name="viernes">Viernes
      </label><br>
      <label class="form-check-label">
      <input type="checkbox" class="form-check-input" id="sabado" name="sabado">Sabado
      </label><br>
      <label class="form-check-label">
      <input type="checkbox" class="form-check-input" id="domingo" name="domingo">Domingo
      </label><br>
      <label class="form-check-label">
      <input type="checkbox" class="form-check-input" id="festivo" name="festivo">Dias Festivos
      </label><br></div>
    </div>
    <div class="form-group col-md-6">
      <label for="peli">Peliculas: </label>
      <div class="form-check center-block">
      <label class="form-check-label">
      <input type="checkbox" class="form-check-input" id="dosd" name="dosd">2D
      </label><br>
      <label class="form-check-label">
      <input type="checkbox" class="form-check-input" id="tresd" name="tresd">3D
      </label><br></div>
    </div>
  </div><br>
  <div class="form-row">
    <div class="form-group row col-md-6">
      <label for="activa" class=" col-form-label" >Activa:</label>
      <div class="col-sm-10">
      <input type="checkbox" class="form-control " id="activa" name="activa" data-toggle="toggle" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger" checked>    
      </div>      
    </div>
    <div class="form-group row col-md-6">
      <label for="promo" class=" col-form-label" >Promo:</label>
      <div class="col-sm-10">
      <input type="checkbox" class="form-control " id="promo" name="promo" data-toggle="toggle" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger">    
      </div>      
    </div>
  </div>  

  <input type="submit" class="btn btn-success" value="Registrar">
  <a type="button" class="btn btn-warning" href="<?php echo base_url();?>TarifaCtrl/tarifaver">Cancelar</a>
</form>
  </div>
</div>


</div>
