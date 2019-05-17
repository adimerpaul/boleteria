<div class="col-sm-11 col-md-10">
    <div class="mt-1">
        <i class="fas fa-clock"></i> <span>Programacion</span>
    </div>
    <?php if($this->usuarios_model->veri($_SESSION['idUs'],'41')):?>
    <button style="font-size: 12px;" type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#exampleModal">
        Agregar funcion <i class="fas fa-plus"></i>
    </button>
    <?php endif?>
    <?php
        $color = array("#01579b", "#006064", "#1b5e20", "#ff5722","#795548","e65100","#827717");
        $query=$this->db->query("SELECT * FROM sala");
        $con=0;
        foreach ($query->result() as $row){
            echo "<a  href='".base_url()."ProgramacionCtrl/index/$row->idSala' style='width: 110px;font-size: 12px; background: ".$color[$con]."' type='button' class='btn mb-1 text-white'>
               $row->nombreSala <i class='fas fa-film'></i>
                     </a>";
            $con++;
        }
    ?>
    <a href="<?=base_url()?>ProgramacionCtrl" style="font-size: 12px;" type="button" class="btn btn-success text-white mb-1">
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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar funciòn</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?=base_url()?>ProgramacionCtrl/store">
                    <div class="form-group row">
                        <label  for="idsala" class="col-sm-1 col-form-label">Sala</label>
                        <div class="col-sm-5">
                            <select name="idsala" id="idsala" required class="form-control">
                                <option value="">Seleccionar..</option>
                                <?php
                                $query=$this->db->query("SELECT * FROM SALA");
                                foreach ($query->result() as $row){
                                    echo "<option value='".$row->idSala."'>".$row->nombreSala."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <label for="idpelicula"  class="col-sm-1 col-form-label">Pelicula</label>

                        <div class="col-sm-5">
                            <select name="idpelicula" id="idpelicula" required class="form-control">
                                <option value="">Seleccionar..</option>
                                <?php
                                $query=$this->db->query("SELECT * FROM pelicula ORDER BY idPelicula DESC ");
                                foreach ($query->result() as $row){
                                    if ($row->formato=="1"){
                                        $formato="3D";
                                    }else{
                                        $formato="2D";
                                    }
                                    echo "<option value='".$row->idPelicula."' minutos='$row->duracion'>".$row->nombre." $formato</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fecha1" class="col-sm-1 col-form-label">Fechas</label>
                        <div class="col-sm-5">
                            <div class="row">
                                <div class="col-6">
                                    <input type="date" name="fecha1" id="fecha1" required  value="<?=date('Y-m-d')?>">
                                </div>
                                <div class="col-6">
                                    <input type="date" name="fecha2" id="fecha2" required value="<?=date("Y-m-d",strtotime(date("Y-m-d")."+ 6 day"))?>" >
                                    <input type="text" name="dias" id="dias" value="7" hidden>
                                </div>
                            </div>
                        </div>
                        <label for="hora" class="col-sm-1 col-form-label">Hora</label>
                        <div class="col-sm-5">
                            <input type="time" name="hora" value="<?=date('h:00:00')?>" id="hora" style="width: 100%" required>
                            <span id="estado" style="color: #bc0d0e"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="subtitulada" class="col-sm-2 col-form-label">Subtitulada</label>
                        <div class="col-sm-4">
                            <input class="form-control" id="subtitulada" name="subtitulada" type="checkbox" data-toggle="toggle" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger" checked>
                        </div>
                        <label for="numerada" class="col-sm-2 col-form-label">Numerada</label>
                        <div class="col-sm-4">
                            <input class="form-control" id="numerada" name="numerada" type="checkbox" data-toggle="toggle" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger" checked>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="idtarifa" class="col-sm-1 col-form-label">Tarifa</label>
                        <div class="col-sm-5">
                            <select name="idTarifa" required class="form-control">
                                <option value="">Seleccionar..</option>
                                <?php
                                $query=$this->db->query("SELECT * FROM tarifa WHERE activo=1");
                                foreach ($query->result() as $row){
                                    echo "<option value='".$row->idTarifa."'> $row->serie $row->precio Bs.</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success" id="aceptar"> <i class="fas fa-check"></i> Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script !src="">
    var fecha1=document.getElementById('fecha1');
    var fecha2=document.getElementById('fecha2');
    var dias=document.getElementById('dias');
    fecha1.addEventListener('change',function (e) {
        var days = 6;
        var date = new Date(fecha1.value);
        date.setDate(date.getDate() + parseInt(days));
        fecha2.valueAsDate = date;
        dias.value=days+1;
        /*var fecha=new Date(fecha1.value);
        fecha.setDate(fecha.getDate()+7);
        //console.log(fecha.getUTCFullYear());

        console.log(fecha.getUTCFullYear()+"-"+(fecha.getMonth()+1)+"-"+(fecha.getDate()));
        //fecha2.value='2019-03-14';
        */
    });

    fecha2.addEventListener('change',function (e) {
        var date1 = new Date(fecha1.value);
        var date2 = new Date(fecha2.value);
        var timeDiff = Math.abs(date2.getTime() - date1.getTime());
        var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
        dias.value=diffDays+1;
    })
</script>
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
                <form method="post" action="<?=base_url()?>ProgramacionCtrl/update">
                    <div class="form-group row">
                        <label for="idsala2" class="col-sm-1 col-form-label">Sala</label>
                        <div class="col-sm-5">
                            <input type="text" name="idfuncion" id="idfuncion2" hidden>
                            <select name="idsala" id="idsala2" required class="form-control">
                                <option value="">Seleccionar..</option>
                                <?php
                                $query=$this->db->query("SELECT * FROM SALA");
                                foreach ($query->result() as $row){
                                    echo "<option value='".$row->idSala."'>".$row->nombreSala."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <label for="idpelicula2" class="col-sm-1 col-form-label">Pelicula</label>
                        <div class="col-sm-5">
                            <select name="idpelicula" id="idpelicula2" required class="form-control">
                                <option value="">Seleccionar..</option>
                                <?php

                                $query=$this->db->query("SELECT * FROM pelicula ORDER BY idPelicula DESC ");
                                foreach ($query->result() as $row){
                                    if ($row->formato=="1"){
                                        $formato="3D";
                                    }else{
                                        $formato="2D";
                                    }
                                    echo "<option value='".$row->idPelicula."'>".$row->nombre." ".$formato."</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fecha12" class="col-sm-1 col-form-label">Fechas</label>
                        <div class="col-sm-5">
                            <span style="padding: 50px;font-weight: bold;font-size: medium" id="fecha12">01/01/2000</span>
                        </div>
                        <label for="hora2" class="col-sm-1 col-form-label">Hora</label>
                        <div class="col-sm-5">
                            <input type="time" name="hora" id="hora2" style="width: 100%" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="subtitulada2" class="col-sm-2 col-form-label">Subtitulada</label>
                        <div class="col-sm-4">
                            <input class="form-control" id="subtitulada2" name="subtitulada" type="checkbox" data-toggle="toggle" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger" checked>
                        </div>
                        <label for="numerada2" class="col-sm-2 col-form-label">Numerada</label>
                        <div class="col-sm-4">
                            <input class="form-control" id="numerada2" name="numerada" type="checkbox" data-toggle="toggle" data-on="SI" data-off="NO" data-onstyle="primary" data-offstyle="danger" checked>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="idtarifa2" class="col-sm-1 col-form-label">Tarifa</label>
                        <div class="col-sm-5" id="contenedor">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            <i class="fas fa-stop"></i> Cancelar
                        </button>
                        <?php if($this->usuarios_model->veri($_SESSION['idUs'],'43')):?>
                        <button type="submit" class="btn btn-success"> <i class="fas fa-check"></i> Modificar</button>
                        <?php endif?>
                        <?php if($this->usuarios_model->veri($_SESSION['idUs'],'44')):?>
                        <a href="ProgramacionCtrl/delete/" id="eliminar2" class="btn btn-danger text-white" > <i class="fas fa-trash"></i> Eliminar</a>
                        <?php endif?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script !src="">
    var eliminar2=document.getElementById('eliminar2');
    eliminar2.addEventListener('click',function (e) {

        //e.preventDefault();
        if (!confirm("Seguro de eliminiar?")){
            e.preventDefault();
        }
    })
</script>
