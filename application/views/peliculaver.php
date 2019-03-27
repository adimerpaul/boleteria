<div class="col-sm-11 col-md-10">
    <h3>PELICULAS</h3>
    <br>
    <div class="card ">
    <div class="card-header text-white bg-warning" >
        Peliculas
    </div>
    <div class="card-body">     <br>   
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Duracion</th>
                    <th>Pais Origen</th>
                    <th>Distribuidor</th>
                    <th>Genero</th>
                    <th>Clasificacion</th>
                    <th>Tipo</th>
                    <th>Cartelera</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>

        <?php foreach($pelicula as $pelicula): ?>
        <tr>
            <td><?php echo $pelicula['codigoIncaa']; ?></td>
            <td><?php echo $pelicula['nombre']; ?></td>
            <td><?php echo $pelicula['duracion']; ?></td>
            <td><?php echo $pelicula['paisOrigen']; ?></td>
            <td><?php echo $pelicula['nombreDis']; ?></td>
            <td><?php echo $pelicula['genero']; ?></td>
            <td><?php echo $pelicula['clasificacion']; ?></td>
            <td><?php if ($pelicula['formato']==1) echo '3D'; else echo '2D'; ?></td>
            <td><?php if ($pelicula['cartelera']==1) echo 'SI'; else echo 'NO'; ?></td>
            
            <td>                
                    <a class="btn btn-outline-warning  btn-sm" data-toggle="modal" data-target="#exampleModal" data-idpelicula="<?php echo $pelicula['idPelicula']?>"> Modificar</a>
                    <a class="btn btn-outline-danger eli  btn-sm" href="<?=base_url()?>PeliculaCtrl/delete/<?=$pelicula['idPelicula']?>"> Eliminar</a>
                   
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
                        console.log($distribuidor);
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
        <h5 class="modal-title" id="exampleModalLabel">Modificar Pelicula</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="<?php echo base_url();?>PeliculaCtrl/update" >
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="codinca">Codigo INCAA:</label> 
      <input type="hidden" id="idpelicula" name="idpelicula">  
      <input type="text" class="form-control" id="codinca" name="codinca" readonly>  
    </div>
    <div class="form-group col-md-6">
      <label for="codultra">Codigo Ultracine:</label>   
      <input type="text" class="form-control" id="codultra" name="codultra" readonly>  
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nom">Nombre : </label>
      <input type="text" class="form-control" id="nom" name="nom" required>
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="duracion">Duracion:</label>   
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
      <select class="form-control" id="distribuidor" name="distribuidor" >
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
      <input  id="formato" name="formato" type="checkbox" data-toggle="toggle" data-on="3D" data-off="2D" data-onstyle="success" data-offstyle="primary" >

    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="fideliza">Sipnosis:</label>
      <textarea class="form-control" rows="5" cols="" id="sipnosis" name="sipnosis"></textarea>      
     
     </div>
     <div class="form-group col-md-6">
      <label for="cartelera">Cartelera: </label><br>
      <input id="cartelera" name="cartelera" type="checkbox" data-toggle="toggle" data-on="Si" data-off="No" data-onstyle="primary" data-offstyle="danger" >

    </div>
  </div>
  <input type="submit" class="btn btn-success" value="Registrar">
  <a type="button" class="btn btn-warning" href="<?php echo base_url();?>PeliculaCtrl/peliculaver">Cancelar</a>
</form>

      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>

