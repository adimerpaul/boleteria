<style>
    .imgsize{height: 60px; width: 60px;}
</style>
<div class="col-sm-11 col-md-10">
    <h3>IMAGENES</h3>
    <br>
    <div class="card ">
    <div class="card-header text-white bg-warning" >
        Imagenes
    </div>
    <div class="card-body">     <br>  
    
        <div>
        <form action="<?php echo base_url();?>Imagen/cargarArchivo" method="post" enctype="multipart/form-data">
            <input type="file" name="fichero">
            <input type="submit" class="btn btn-success" value="Subir">            
        </form>
        </div>
        <br>
        <table id="example" class="table" style="width:100%">
            <thead>
            <tr>
            </tr></thead>
            <tbody>
        
        <?php    
       $directorio = opendir("assets/imagenes");
       while ($archivo = readdir($directorio))
          {
          $nombreArch = ucwords($archivo);
          if($nombreArch != '.' && $nombreArch !='..'){
          echo "<tr><td>";
          echo "<img class='imgsize' src='".base_url('assets/imagenes/').$nombreArch."' alt='$nombreArch'";
          echo " border=0></td>";
          echo "<td><b>&nbsp;$nombreArch</b></td>";
          //echo "<td>".filesize(base_url('assets/imagenes/').$nombreArch)."</td>";
          echo "<td> <a type='button' class='btn btn-danger' href='".base_url()."Imagen/eliminaImagen/$nombreArch'>Eliminar</a></td>";
      
          echo "</tr>";}
          } 
    ?>

  
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
