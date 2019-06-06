<div class="col-sm-11 col-md-10">
    <h3>TARIFAS</h3>
    <br>
    <div class="card ">
    <div class="card-header text-white bg-warning" >
        Lista de Tarifa
    </div>
    <div class="card-body">     <br>   
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Serie</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Dias</th>
                    <th>Peliculas</th>
                    <th>Mostrar TV</th>
                    <th>Defecto</th>
                    <th>Promo</th>
                    <th>Venta Boleteria</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>

        <?php foreach($tarifa as $row): ?>
        <tr>
            <td><?php echo $row['serie']; ?></td>
            <td><?php echo $row['descripcion']; ?></td>
            <td><?php echo $row['precio']; ?></td>

            <td><?php $dias=''; 
            if ($row['lunes']>0) $dias=$dias.'Lun, '; 
            if ($row['martes']>0) $dias=$dias.'Mar, '; 
            if ($row['miercoles']>0) $dias=$dias.'Mie, '; 
            if ($row['jueves']>0) $dias=$dias.'Jue, '; 
            if ($row['viernes']>0) $dias=$dias.'Vie, '; 
            if ($row['sabado']>0) $dias=$dias.'Sab, '; 
            if ($row['domingo']>0) $dias=$dias.'Dom, '; 
            if ($row['diaFestivo']>0) $dias=$dias.'Festivos'; 
            echo $dias;
            ?></td>
            <td><?php $pel=''; if ($row['d2']==1) $pel=$pel.'2D, ';
            if($row['d3']==1) $pel=$pel.'3D';
            echo $pel; ?></td>
            <td><?php if ($row['tv']==1) echo 'SI'; else echo 'NO'; ?></td>
            <td><?php if ($row['defecto']==1) echo 'SI'; else echo 'NO'; ?></td>
            <td><?php if ($row['promo']=='on') echo 'SI'; else echo 'NO'; ?></td>
            <td><?php if ($row['mostrarBol']==1) echo 'SI'; else echo 'NO'; ?></td>
            
            <td>
                <?php if($this->usuarios_model->veri($_SESSION['idUs'],'38')):  ?>
                    <a class="btn btn-outline-warning  btn-sm" data-toggle="modal" data-target="#exampleModal" data-idtarifa="<?php echo $row['idTarifa']?>"> Modificar</a>
                <?php endif ?>
                <?php if($this->usuarios_model->veri($_SESSION['idUs'],'39')):  ?>
                    <a class="btn btn-outline-danger eli  btn-sm" href="<?=base_url()?>TarifaCtrl/delete/<?=$row['idTarifa']?>"> Eliminar</a>
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
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar Tarifa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="<?php echo base_url();?>TarifaCtrl/update" >
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="serie">Serie:</label>   
      <input type="text" class="form-control text-uppercase" id="serie" name="serie"  required>  
      <input type="hidden" id="idtarifa" name="idtarifa">
    </div>
    <div class="form-group col-md-6">
      <label for="precio">Precio: </label>
      <input type="text" class="form-control" id="precio" name="precio" required>
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="descrip">Descripcion:</label>   
      <input type="text" class="form-control text-uppercase" id="descrip" name="descrip">  
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
  <input type="submit" class="btn btn-success" value="Modificar">
  <a type="button" class="btn btn-warning" href="<?php echo base_url();?>TarifaCtrl/tarifaver">Cancelar</a>
</form>

      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>

