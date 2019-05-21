<div class="col-sm-11 col-md-10">
    <h3>PRODUCTOS</h3>
    <br>
    <div class="card ">
    <div class="card-header text-white bg-warning" >
        PRODUCTOS
    </div>
    <div class="card-body"><br>   
        <div class="row">
            <a href="" class="btn btn-success" data-toggle="modal" data-target="#productoModal">Registrar</a>
        </div>
        <br>
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Precio Venta</th>
                    <th>Activo</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>

        <?php foreach($producto as $row): ?>
        <tr>
            <td><?php echo $row['idProducto']; ?></td>
            <td><?php echo $row['nombreProd']; ?></td>
            <td><?php echo $row['descripcion']; ?></td>
            <td><?php echo $row['precioVenta']; ?></td>
            <td><?php echo $row['activo']; ?></td>
            
            <td>
                <a class="btn btn-outline-warning  btn-sm" data-toggle="modal" data-target="#exampleModal" data-idproducto="<?php echo $row['idProducto']?>"> Modificar</a>
                <a class="btn btn-outline-danger eli  btn-sm" href="<?=base_url()?>ProductoCtrl/delete/<?=$row['idProducto']?>"> Eliminar</a>
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


<div class="modal fade" id="productoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="<?php echo base_url();?>ProductoCtrl/store" >

<div class="form-row">
  <div class="form-group col-md-6">
    <label for="nombre">Nombre : </label>
    <input type="text" class="form-control" id="nombre" name="nombre" required>
    <input type="hidden" id="burl" value="<?php echo base_url();?>">      
  </div>

  <div class="form-group col-md-6">
    <label for="desc">Descripcion : </label>
    <textarea class="form-control" rows="3" cols="" id="desc" name="desc"></textarea>      
    
  </div>
</div>
<div class="form-row">
<div class="form-group col-md-6">
    <label for="pcosto">Precio Costo :</label>
    <input type="number" class="form-control" id="pcosto" name="pcosto" step="0.01">  <br>
    <label id="utilidad" name="utilidad" style='color:green'></label>
    <input type="hidden" id="utl" name="utl">
  </div>
  <div class="form-group col-md-6">
    <label for="pventa">Precio Venta: </label>
    <input type="number" class="form-control" id="pventa" name="pventa" step="0.01"><br>
    <label id="iva" name="iva" style='color:green'></label>
  </div>
</div>


<div class="form-row">
  <div class="form-group col-md-6">
    <label for="activo">Activo : </label><br>
    <input class="form-control" id="activo" name="activo" type="checkbox" data-toggle="toggle" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger" checked>
  </div>
  <div class="form-group col-md-6">
    <label for="idrubro">Rubro : </label><br>
    <select name="idrubro" id="idrubro" class="form-control">
                          <option value="">Seleccionar...</option>
                          <?php
                          $query=$this->db->query("SELECT * FROM rubro");
                          foreach ($query->result() as $row){
                              echo "<option value='$row->idRubro'>$row->nombreRubro</option>";
                          }

                          ?>
                      </select>
  </div>
</div>
<div class="form-row">
  <div class="form-group col-md-6">
    <label for="pref">Preferencias : </label><br>
    <select id='pre-selected-options' multiple='multiple'  name="pref[]" class="form-control">

      <?php
         $query=$this->db->query("SELECT * FROM preferencia");
                          foreach ($query->result() as $row){
                              echo "<option value='$row->idPreferencia'>$row->nombrePref</option>";
                          }

                          ?>
                      </select>
                    </div>

  <div class="form-group col-md-6">
    <label for="pref">Cantidad : </label>
    <input type="number" class="form-control" id="cantidad" name="cantidad" required><br>
                            
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
          echo "<option value='".$nombreArch."' style='background-image:url(".base_url('assets/imagenes/').$nombreArch.")'>$nombreArch</option>";
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
      <div class="modal-body">
      <form method="POST" action="<?php echo base_url();?>ProductoCtrl/update" >

<div class="form-row">
  <div class="form-group col-md-6">
    <label for="upnombre">Nombre : </label>
    <input type="text" class="form-control" id="upnombre" name="upnombre" required>
    <input type="hidden" id="idproducto" name="idproducto" required>
    <input type="hidden" id="burl" value="<?php echo base_url();?>">      
  </div>

  <div class="form-group col-md-6">
    <label for="updesc">Descripcion : </label>
    <textarea class="form-control" rows="3" cols="" id="updesc" name="updesc"></textarea>      
    
  </div>
</div>
<div class="form-row">
<div class="form-group col-md-6">
    <label for="uppcosto">Precio Costo :</label>
    <input type="number" class="form-control" id="uppcosto" name="uppcosto" step="0.01">  <br>
    <label id="uputilidad" name="uputilidad" style='color:green'></label>
    <input type="hidden" id="uputl" name="uputl">
  </div>
  <div class="form-group col-md-6">
    <label for="uppventa">Precio Venta: </label>
    <input type="number" class="form-control" id="uppventa" name="uppventa" step="0.01"><br>
    <label id="upiva" name="upiva" style='color:green'></label>
  </div>
</div>


<div class="form-row">
  <div class="form-group col-md-6">
    <label for="upactivo">Activo : </label><br>
    <input class="form-control" id="upactivo" name="upactivo" type="checkbox" data-toggle="toggle" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger" checked>
  </div>
  <div class="form-group col-md-6">
    <label for="upidrubro">Rubro : </label><br>
    <select name="upidrubro" id="upidrubro" class="form-control">
                          <option value="">Seleccionar...</option>
                          <?php
                          $query=$this->db->query("SELECT * FROM rubro");
                          foreach ($query->result() as $row){
                              echo "<option value='$row->idRubro'>$row->nombreRubro</option>";
                          }

                          ?>
                      </select>
  </div>
</div>
<div class="form-row">
  <div class="form-group col-md-6">
    <label for="uppref">Preferencias : </label><br>
    <select id='uppref' multiple='multiple'  name="uppref[]" class="form-control">

      <?php
         $query=$this->db->query("SELECT * FROM preferencia");
                          foreach ($query->result() as $row){
                              echo "<option value='$row->idPreferencia'>$row->nombrePref</option>";
                          }

                          ?>
                      </select>
                    </div>
  <div class="form-group col-md-6">
    <label for="upcantidad">Cantidad : </label>
    <input type="number" class="form-control" id="upcantidad" name="upcantidad" required><br>
                            
                    </div>
</div>
<div class="form-row">
  <div class="form-group col-md-6">
    <label for="upicono"> Icono :</label><br>
    <select class="mdb-select md-form" id="upicono" name="upicono">       
    <option value="" disabled selected>Choose your option</option>
          <?php
          $directorio = opendir("assets/imagenes");
     $i=0;
     while ($archivo = readdir($directorio))
        {
        $nombreArch = ucwords($archivo);
        if($nombreArch != '.' && $nombreArch !='..'){
          $i++;
          echo "<option value='".$nombreArch."' style='background-image:url(".base_url('assets/imagenes/').$nombreArch.")'>$nombreArch</option>";
        }
        } 
        ?>
        </select>
   </div>
   <div class="form-group col-md-6">
    <label for="upcoloricono">Activo : </label><br>
    <select name="upcoloricono" id="upcoloricono">
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
        <div id="updivEjemplo" name="updivEjemplo">
        </div>
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

