<div class="col-sm-11 col-md-10">
    <h3>USUARIOS</h3>
    <br>
    <div class="card ">
    <div class="card-header text-white bg-warning" >
        Lista de Usuarios
    </div>
    <div class="card-body">     <br>   
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>

        <?php foreach($usuario as $row): ?>
        <tr>
            <td><?php echo $row['nombreUser']; ?></td>
            <td><?php echo $row['user']; ?></td>

            <td>                
                    <a class="btn btn-outline-warning  btn-sm" data-toggle="modal" data-target="#exampleModal" data-idusmod="<?php echo $row['idUsuario']?>"> Modificar</a>
                    <a class="btn btn-outline-primary  btn-sm" data-toggle="modal" data-target="#Modalpass" data-idUsuario="<?php echo $row['idUsuario']?>"> Mod Password</a>
                    <a class="btn btn-outline-danger eli  btn-sm" href="<?=base_url()?>UsuarioCtrl/delete/<?=$row['idUsuario']?>"> Eliminar</a>
                   
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
        <h5 class="modal-title" id="exampleModalLabel">Modificar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="<?php echo base_url();?>UsuarioCtrl/update" >
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nombre">Nombre:</label>   
      <input type="text" class="form-control" id="nombre" name="nombre"  required>  
      <input type="hidden" id="idusuario1" name="idusuario1">
    </div>
  </div>
  <hr>
<h3>Permisos de Usuario</h3>
  <div class="form-row">
        <div class="col-md-6" id='secciones'> 

        </div>            
    </div>
  

  <input type="submit" class="btn btn-success" value="Registrar">
  <a type="button" class="btn btn-warning" href="<?php echo base_url();?>UsuarioCtrl/usuariover">Cancelar</a>
</form>

      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="Modalpass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="formuppass" method="POST" action="<?php echo base_url();?>UsuarioCtrl/updatepass" >
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="pass">Password:</label>   
      <input type="password" class="form-control" id="pass" name="pass"  required>  
      <input type="hidden" id="idusuario2" name="idusuario2">
    </div>
    <div class="form-group col-md-6">
      <label for="pass">Password Confirmar:</label>   
      <input type="password" class="form-control" id="confpass" name="confpass"  required>  
      <label id="mensaje_error" class="control-label col-md-6 text-danger" style="display: block;"></label>
    </div>
  </div>
  <hr>
  

  <input type="submit" class="btn btn-success" value="Registrar">
  <a type="button" class="btn btn-warning" href="<?php echo base_url();?>UsuarioCtrl/usuariover">Cancelar</a>
</form>

      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>

