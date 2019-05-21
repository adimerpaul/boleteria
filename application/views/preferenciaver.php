<div class="col-sm-11 col-md-10">
    <h3>PREFERNCIAS</h3>
    <br>
    <div class="card ">
    <div class="card-header text-white bg-warning" >
        Preferncias
    </div>
    <div class="card-body"><br>   
        <div class="row">
            <a href="" class="btn btn-success" data-toggle="modal" data-target="#preferenciaModal">Registrar</a>
        </div>
        <br>
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Activo</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>

        <?php foreach($preferencia as $row): ?>
        <tr>
            <td><?php echo $row['idPreferencia']; ?></td>
            <td><?php echo $row['nombrePref']; ?></td>
            <td><?php echo $row['descripcion']; ?></td>
            <td><?php echo $row['activa']; ?></td>
            
            <td>
                <a class="btn btn-outline-warning  btn-sm" data-toggle="modal" data-target="#exampleModal" data-idPreferencia="<?php echo $row['idPreferencia']?>"> Modificar</a>
                <a class="btn btn-outline-danger eli  btn-sm" href="<?=base_url()?>PreferenciaCtrl/delete/<?=$row['idPreferencia']?>"> Eliminar</a>
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
                        //console.log($distribuidor);
                        if(!confirm('seguro de eliminar')){
                            e.preventDefault();
                        }  
                    });
                }
        
        </script>
    </div>
</div>
</div>


<div class="modal fade" id="preferenciaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar Preferencia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
<br>
                <input type="submit" class="btn btn-success" value="Registrar">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </form>
        </div>

      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar Preferencia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="<?php echo base_url();?>PreferenciaCtrl/update" >
      <div class="form-row">
  <div class="form-group col-md-6">
    <label for="nombre">Nombre : </label>
    <input type="text" class="form-control" id="nombreup" name="nombreup" required>
    <input type="hidden" id="idpref" name="idpref">
  </div>

  <div class="form-group col-md-6">
    <label for="desc">Descripcion : </label>
    <textarea class="form-control" rows="3" cols="" id="descup" name="descup"></textarea>      
    
  </div>
</div>



<div class="form-row">
  <div class="form-group col-md-6">
    <label for="activoup">Activo : </label><br>
    <input class="form-control" id="activoup" name="activoup" type="checkbox" data-toggle="toggle" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger" checked>
  </div>
</div>
<br>
                <input type="submit" class="btn btn-success" value="Modificar">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </form>

      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>

