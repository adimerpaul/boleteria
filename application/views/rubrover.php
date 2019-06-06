<div class="col-sm-11 col-md-10">
    <h3>RUBROS</h3>
    <br>
    <div class="card ">
    <div class="card-header text-white bg-warning" >
        Rubros
    </div>
    <div class="card-body">
    <?php if($this->usuarios_model->veri($_SESSION['idUs'],'120')):  ?>
          
        <a href="" class="btn btn-success" data-toggle="modal" data-target="#rubroModal">Registrar</a>
    <?php endif;?>
         <br>  <br> 
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Rubro Padre</th>
                    <th>Activo</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>

        <?php foreach($rubro as $row): ?>
        <tr>
            <td><?php echo $row['idRubro']; ?></td>
            <td><?php echo $row['nombreRubro']; ?></td>
            <td><?php echo $row['descripcion']; ?></td>
            <td><?php echo $row['rubroPadre']; ?></td>
            <td><?php if($row['activo']=="on")
            echo "SI"; else echo "NO"; ?></td>
            
            <td>
    <?php if($this->usuarios_model->veri($_SESSION['idUs'],'122')):  ?>
                <a class="btn btn-outline-warning  btn-sm" data-toggle="modal" data-target="#exampleModal" data-idrubro="<?php echo $row['idRubro']?>"> Modificar</a>
    <?php endif;?>
    <?php if($this->usuarios_model->veri($_SESSION['idUs'],'123')):  ?>
                <a class="btn btn-outline-danger eli  btn-sm" href="<?=base_url()?>RubroCtrl/delete/<?=$row['idRubro']?>"> Eliminar</a>
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
        <h5 class="modal-title" id="exampleModalLabel">Modificar Rubro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="<?php echo base_url();?>RubroCtrl/update" >

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nombre2">Nombre : </label>
      <input type="text" class="form-control text-uppercase" id="nombre2" name="nombre2" required>
      <input type="hidden"  id="idrubro" name="idrubro" required>
    </div>

    <div class="form-group col-md-6">
      <label for="desc2">Descripcion : </label>
      <textarea class="form-control text-uppercase" rows="3" cols="" id="desc2" name="desc2"></textarea>      
      
    </div>
  </div>


  <div class="form-row">
    <div class="form-group col-md-6" hidden>
      <label for="rpadre2">Rubro Padre : </label><br>
      <select name="rpadre2" id="rpadre2" class="form-control" >
          <option value=""></option>
          <?php 
                                  $query=$this->db->query("SELECT * FROM rubro");
                                  foreach ($query->result() as $row){
                                      echo "<option value='$row->idRubro'>$row->nombreRubro</option>";
                                  }
      
      ?>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="activo2">Activo : </label><br>
      <input class="form-control" id="activo2" name="activo2" type="checkbox" data-toggle="toggle" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger" checked>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="icono2"> Icono :</label><br>
      <input type="hidden" id="burl" value="<?php echo base_url();?>">
      <select class="mdb-select md-form" id="icono2" name="icono2">       
      <option value="" disabled selected>Choose your option</option>
            <?php
            $directorio = opendir("assets/imagenes");
       $i=0;
       while ($archivo = readdir($directorio))
          {
          $nombreArch = ucwords($archivo);
          if($nombreArch != '.' && $nombreArch !='..'){
            $i++;
            echo "<option value='".$nombreArch."'>$nombreArch</option>";
          }
          } 
          ?>
          </select>
     </div>
     <div class="form-group col-md-6">
      <label for="coloricono2">Color : </label><br>
      <select name="coloricono2" id="coloricono2">
          <option value="green">Verde</option>
          <option value="yellow">Amarillo</option>
          <option value="blue">Azul</option>
          <option value="red">Rojo</option>
          <option value="purple">Purpura</option>
          <option value="grey">Gris</option>
      </select>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="divEjemplo2">Ejemplo : </label><br>
          <div id="divEjemplo2" name="divEjemplo2">
          </div>
    </div>
  </div>
  <br>
  <input type="submit" class="btn btn-success" value="Modificar">
  <a type="button" class="btn btn-warning" href="<?php echo base_url();?>RubroCtrl">Cancelar</a>
</form>

      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="rubroModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar Rubro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="<?php echo base_url();?>RubroCtrl/store" >


<div class="form-row">
  <div class="form-group col-md-6">
    <label for="nombre">Nombre : </label>
    <input type="text" class="form-control text-uppercase" id="nombre" name="nombre" required>
  </div>

  <div class="form-group col-md-6">
    <label for="desc">Descripcion : </label>
    <textarea class="form-control text-uppercase" rows="3" cols="" id="desc" name="desc"></textarea>      
    
  </div>
</div>


<div class="form-row">
  <div class="form-group col-md-6" hidden>
    <label for="activo">Rubro Padre : </label><br>
    <select name="rpadre" id="rpadre" class="form-control" >
        <option value=""></option>
        <?php 
                                $query=$this->db->query("SELECT * FROM rubro");
                                foreach ($query->result() as $row){
                                    echo "<option value='$row->idRubro'>$row->nombreRubro</option>";
                                }
    
    ?>
    </select>
  </div>
  <div class="form-group col-md-6">
    <label for="activo">Activo : </label><br>
    <input class="form-control" id="activo" name="activo" type="checkbox" data-toggle="toggle" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger" checked>
  </div>
</div>
<div class="form-row">
  <div class="form-group col-md-6">
    <label for="icono"> Icono :</label><br>
    <input type="hidden" id="burl" value="<?php echo base_url();?>">
    <select class="mdb-select md-form" id="icono" name="icono" required>       
    <option value="" disabled selected>Choose your option</option>
          <?php
          $directorio = opendir("assets/imagenes");
     $i=0;
     while ($archivo = readdir($directorio))
        {
        $nombreArch = ucwords($archivo);
        if($nombreArch != '.' && $nombreArch !='..'){
          $i++;
          echo "<option value='".$nombreArch."'>$nombreArch</option>";
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
        <option value="grey">Gris</option>
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
</form>     </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>