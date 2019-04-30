<div class="col-sm-11 col-md-10">
    <div class="mt-1">
        <i class="fas fa-clock"></i> <span>Programacion</span>
    </div>

    <?php
        $color = array("#01579b", "#006064", "#1b5e20", "#ff5722","#795548","e65100","#827717");
        $query=$this->db->query("SELECT * FROM sala");
        $con=0;
        foreach ($query->result() as $row){
            echo "<a  href='".base_url()."VentaCtrl/paneldevol/$row->idSala' style='width: 110px;font-size: 12px; background: ".$color[$con]."' type='button' class='btn mb-1 text-white'>
               $row->nombreSala <i class='fas fa-film'></i>
                     </a>";
            $con++;
        }
    ?>
    <a href="<?=base_url()?>VentaCtrl/paneldevol" style="font-size: 12px;" type="button" class="btn btn-success text-white mb-1">
        Todas la funciones <i class="fas fa-circle"></i>
    </a>
    <div class="card ">
        <div class="card-header text-white bg-warning" >
            Programacion
        </div><!-- Large modal -->
        <!-- Button trigger modal -->

        <div class="card-body">
            <div id='calendar'></div>
        </div>
    </div>
</div>

<style>

    body {
        padding: 0;
        font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
        font-size: 14px;
    }

    #calendar {
        margin: 0 auto;
    }
    .eventos{
        background: darkred;
        color: #ffffff;
        height: 250px;
    }

</style>

<script !src="">
    var url='<?=base_url()?>';
</script>

<!-- Modal -->
<div class="modal fade" id="calendarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modificar funciòn</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>INFORMACION:</h5>
                    <div class="">
                        <label for="idsala2" class=""><b>Nombre Pelicula:</b></label>
                        <label id="titulo" class="">Pelicula</label>
                        <input type="text" name="idfuncion" id="idfuncion2" hidden>  
                    </div>
                    <div class="">
                        <label for="idsala2" class=""><b>Tipo:</b></label>
                        <label id="tipo2" class="">Pelicula</label>
                    </div>
                    <div class="">
                        <label for="idsala2" class=""><b>Sala:</b></label>
                        <label id="nsala" class="">Pelicula</label>
                    </div>
                    <div class="">
                        <label for="idsala2" class=""><b>Numero Funcion:</b></label>
                        <label id="nfuncion" class="">Pelicula</label>
                    </div>
                    <div class="">
                        <label for="idsala2" class=""><b>Fecha y Hora:</b></label>
                        <label id="fechora" class="">Pelicula</label>
                    </div>
                    <div class="">
                        <label for="idsala2" class=""><b>Entradas Vendidas:</b></label>
                        <label id="vendidas" class="">Pelicula</label>
                    </div>
                    <div class="">
                        <label for="idsala2" class=""><b>Entradas Devueltas:</b></label>
                        <label id="devueltas" class="">Pelicula</label>
                    </div>

  
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            <i class="fas fa-stop"></i> Cancelar
                        </button>
                        <?php if($this->usuarios_model->veri($_SESSION['idUs'],'47')):  ?>
                        <button type="button" class="btn btn-danger" id="devFuncion"> <i class="fas fa-check"></i> Devolver Funcion</button>
                        <?php endif ?>
                    </div>
            </div>
        </div>
    </div>
</div>

