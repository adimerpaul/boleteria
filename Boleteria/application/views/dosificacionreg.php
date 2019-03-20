<div class="col-sm-11 col-md-10">
    <h3>Registrar Nuevo Dato de Dosificacion</h3>

<div class="card ">
  <div class="card-header text-white bg-success" >
    Informacion de Dosificacion
  </div>
  <div class="card-body">
      <h3>DATOS DE DOSIFICACION</h3>
<hr />

  <form method="POST" action="<?php echo base_url();?>DosificacionCtrl/store" >
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="tramite">Nro de Tramite:</label>   
      <input type="number" class="form-control" id="tramite" name="tramite" required>  
    </div>
    <div class="form-group col-md-4">
      <label for="autorizacion">Nro Autorizacion: </label>
      <input type="number" class="form-control" id="autorizacion" name="autorizacion" required>
    </div>
    <div class="form-group col-md-4">
      <label for="inicial">Nro Factura Inicial: </label>
      <input type="number" class="form-control" id="inicial" name="inicial" required value=1>
    </div>
  </div>
 
  <div class="form-group">
    <label for="llave">Llave Dosificacion: </label>
    <input type="text" class="form-control" id="llave" name="llave" required>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="fechad">Fecha Desde:</label>
      <input type="date" class="form-control" id="fechad" name="fechad" value="<?php echo date("Y-m-d");?>" required>
    </div>
    <div class="form-group col-md-6">
      <label for="fechah">Fecha Hasta: </label>
      <input type="date" id="fechah" class="form-control" name="fechah" value="<?php echo date("Y-m-d");?>" required>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="leyenda">Leyenda:</label>
      <textarea class="form-control" rows="5" cols="" id="leyenda" name="leyenda"></textarea>      
     </div>
  </div>
  <input type="submit" class="btn btn-success" value="Registrar">
  <a type="button" class="btn btn-warning" href="<?php echo base_url();?>DosificacionCtrl/dosificaver">Cancelar</a>
</form>

<script >
	$(document).ready(function()
		{
		$("input[name=fechad]").change(function () {	
            var fec=document.getElementById("fechad").value;
            console.log(fec); 
			document.getElementById("fechah").min=fec;
			});
 
		 });
</script>
</div>

</div>

