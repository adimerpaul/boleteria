<div class="col-sm-11 col-md-10">
    <h3>Registrar Nueva Pelicula</h3>

<div class="card ">
  <div class="card-header text-white bg-success" >
    Informacion de Registro Pelicula
  </div>
  <div class="card-body">
      <h3>INFORMACION DE LA Pelicula</h3>
<hr />
 
  <form method="POST" action="<?php echo base_url();?>PeliculaCtrl/store" >


  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nom">Nombre : </label>
      <input type="text" class="form-control" id="nom" name="nom" required>
    </div>

    <div class="form-group col-md-6">
        <?php if($this->usuarios_model->veri($_SESSION['idUs'],'24')):  ?>
      <label for="imagen">IMAGEN : </label>
      <input type="file" class="form-control" id="imagen" name="imagen" >
        <?php endif ?>
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="duracion">Duracion(minutos):</label>
      <input type="number" class="form-control" id="duracion" name="duracion">  
    </div>
    <div class="form-group col-md-6">
      <label for="origen">Pais Origen: </label>
      <input type="text" class="form-control" id="origen" name="origen">
    </div>
  </div>

  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="genero">Genero:</label>   
      <select  class="form-control" id="genero" name="genero" required>
          <option value="Accion">Accion</option>
          <option value="Animacion">Animacion</option>
          <option value="Animada">Animada</option>
          <option value="Aventura">Aventura</option>
          <option value="Aventuras">Aventuras</option>
          <option value="Ciencia Ficcion">Ciencia Ficcion</option>
          <option value="Comedia">Comedia</option>
          <option value="Deporte">Deporte</option>
          <option value="Documental">Documental</option>
          <option value="Drama">Drama</option>
          <option value="Historica">Historica</option>
          <option value="Infantil">Infantil</option>
          <option value="Musical">Musical</option>
          <option value="Romantica">Romantica</option>
          <option value="Suspenso">Suspenso</option>
          <option value="Terror">Terror</option>
          <option value="Thiller">Thiller</option>
          <option value="Western">Western</option>         
    </select >
    </div>
    <div class="form-group col-md-6">
      <label for="distribuidor">Distribuidor: </label>
      <select class="form-control" id="distribuidor" name="distribuidor" required>
      <?php foreach($distribuidor as $distribuidor): ?>
        <option value="<?php echo $distribuidor['idDistrib']; ?>"><?php echo $distribuidor['nombreDis']; ?></option>
        <?php endforeach; ?>
    </select>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="clasificacion">Clasificacion :</label>
      <select  class="form-control" id="clasificacion" name="clasificacion"  required>
          <option value="+13">+13</option>
          <option value="+13 C/R">+13 C/R</option>
          <option value="+16">+16</option>
          <option value="+18">+18</option>
          <option value="ATP">ATP</option>
          <option value="ATP C/R">ATP C/R</option>
          <option value="R">R</option>
    </select>
    </div>

  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="url">URL Trailer(YouTube):</label>
      <input type="text" class="form-control" id="url" name="url">
    </div>
    <div class="form-group col-md-6">
      <label for="formato">Formato: </label><br>
      <input class="form-control" id="formato" name="formato" type="checkbox" data-toggle="toggle" data-on="3D" data-off="2D" data-onstyle="success" data-offstyle="primary" checked>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="fideliza">Sipnosis:</label>
      <textarea class="form-control" rows="5" cols="" id="sipnosis" name="sipnosis"></textarea>      
     
     </div>
     <div class="form-group col-md-6">
         <?php if($this->usuarios_model->veri($_SESSION['idUs'],'27')):  ?>
      <label for="cartelera">Cartelera: </label><br>
      <input class="form-control" id="cartelera" name="cartelera" type="checkbox" data-toggle="toggle" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger" checked>
        <?php endif?>
    </div>
  </div>
  <input type="submit" class="btn btn-success" value="Registrar">
  <a type="button" class="btn btn-warning" href="<?php echo base_url();?>PeliculaCtrl/peliculaver">Cancelar</a>
</form>
  </div>


</div>
</div>
