<style>
background-img: url();
</style>
<div class="col-sm-11 col-md-10 ">
	<div style="padding: 10px">
    <h3><b>SISTEMAS MULTI CINES PLAZA</b></h3>
    <h4><i>Recomendaciones para usuario</i></h4>
        <div class="alert alert-danger">Fecha limite para cambiar su contraseña es en 
        <?php 
        	$fecha1= new DateTime($_SESSION['fecha']);
			$fecha2= new DateTime(date("Y-m-d"));
			$diff = $fecha1->diff($fecha2);
			// El resultados sera 3 dias
			echo 90-$diff->days . ' dias';
         ?>
         ,Lo puede cambiar con el adminitrador</div>
        <div class="alert alert-warning">No olvidar cerrar su cuenta al finalizar su turno</div>
        <div class="alert alert-warning">No Compartir su cuenta o password </div>
        <div class="alert alert-warning">Cada Usuario debe Ingresar con su cuenta y password  si no tiene cuenta contante con el adminitrador</div>
        <div class="alert alert-warning">Para mejorar el rendimiento evite descargas inecesarias o el uso indebido de la red </div>
        <div class="alert alert-warning">Si existe algun problema con el sistema (retraso de respuesta) refrescar la pagina, si persiste el error conctacte con sistemas</div>
        <div class="alert alert-warning">Se aceptan sugerencias para mejorar el sistema, contacte a los encargados de Sistemas</div>
    </div>
</div>
