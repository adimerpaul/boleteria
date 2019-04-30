<div class="col-sm-11 col-md-10">
    <h3>EMPRESAS</h3>
    <br>
    <div class="card ">
    <div class="card-header text-white bg-warning" >
        Empresa
    </div>
    <div class="card-body">     <br>   
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Razon Social</th>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>Localidad</th>
                    <th>NIT</th>
                    <th>Ingreso Bruto</th>
                    <th>Agencia Afip</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>

        <?php foreach($empresa as $empresa): ?>
        <tr>
            <td><?php echo $empresa['codigo']; ?></td>
            <td><?php echo $empresa['razonSocial']; ?></td>
            <td><?php echo $empresa['nombreFant']; ?></td>
            <td><?php echo $empresa['direccion']; ?></td>
            <td><?php echo $empresa['telefono']; ?></td>
            <td><?php echo $empresa['localidad']; ?></td>
            <td><?php echo $empresa['ci_nit']; ?></td>
            <td><?php echo $empresa['ingresoBruto']; ?></td>
            <td><?php echo $empresa['agenciaAfip']; ?></td>
            <td>
                <?php if($this->usuarios_model->veri($_SESSION['idUs'],'20')):  ?>
                    <a class="btn btn-outline-warning  btn-sm" data-toggle="modal" data-target="#exampleModal" data-idempresa="<?php echo $empresa['idEmpresa']?>"> Modificar</a>
                <?php endif ?>
                <?php if($this->usuarios_model->veri($_SESSION['idUs'],'21')):  ?>
                    <a class="btn btn-outline-danger eli  btn-sm" href="<?=base_url()?>EmpresaCtrl/delete/<?=$empresa['idEmpresa']?>"> Eliminar</a>
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
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar Empresa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="<?php echo base_url();?>EmpresaCtrl/update" >
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="codigo">Codigo:</label>   
      <input type="hidden" id="idemp" name="idemp">  
      <input type="text" class="form-control" id="codigo" name="codigo">  
    </div>
    <div class="form-group col-md-6">
      <label for="razonsocial">Razon Social: </label>
      <input type="text" class="form-control" id="razonsocial" name="razonsocial">
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="nomfant">Nombre Fantasia:</label>   
      <input type="text" class="form-control" id="nomfant" name="nomfant">  
    </div>
    <div class="form-group col-md-6">
      <label for="nomsuc">Nombre Sucursal: </label>
      <input type="text" class="form-control" id="nomsuc" name="nomsuc">
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="telefono">Telefono:</label>   
      <input type="text" class="form-control" id="telefono" name="telefono">  
    </div>
    <div class="form-group col-md-6">
      <label for="localidad">Localidad: </label>
      <input type="text" class="form-control" id="localidad" name="localidad">
    </div>
  </div>
  <div class="form-group">
    <label for="direccion">Direccion: </label>
    <input type="text" class="form-control" id="direccion" name="direccion">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="cinit">CI / NIT:</label>
      <input type="text" class="form-control" id="cinit" name="cinit">
    </div>
    <div class="form-group col-md-6">
      <label for="ingbruto">Ingresos Brutos: </label>
      <input type="text" id="ingbruto" class="form-control" name="ingbruto">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="afip">Agencia AFIP:</label>
      <input type="text" class="form-control" id="afip" name="afip">
    </div>
    <div class="form-group col-md-6">
      <label for="urldom">URL Dominio: </label>
      <input type="text" id="urldom" class="form-control" name="urldom">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="fideliza">Fidelizacion:</label>
      <select class="form-control" id="fideliza" name="fideliza">
        <option selected value="Ninguno">Ninguno</option> 
        <option value="Siempre">Siempre</option> 
        <option value="Opcional">Opcional</option> 
     </select>       
     </div>
  </div>
  <input type="submit" class="btn btn-success" value="Registrar">
  <a type="button" class="btn btn-warning" href="<?php echo base_url();?>EmpresaCtrl/empresaver">Cancelar</a>
</form>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>

