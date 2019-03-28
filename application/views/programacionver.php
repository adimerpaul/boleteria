<div class="col-sm-11 col-md-10">
    <div class="mt-1">
        <i class="fas fa-clock"></i> <span>Programacion</span>
    </div>
    <button style="width: 120px;font-size: 12px;" type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#exampleModal">
        Agregar funcion <i class="fas fa-plus"></i>
    </button>
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
        max-width: 900px;
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
                        <label for="idsala" class="col-sm-1 col-form-label">Sala</label>
                        <div class="col-sm-5">
                            <select name="idsala" required class="form-control">
                                <option value="">Seleccionar..</option>
                                <?php
                                $query=$this->db->query("SELECT * FROM SALA");
                                foreach ($query->result() as $row){
                                    echo "<option value='".$row->idSala."'>".$row->nombreSala."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <label for="idpelicula" class="col-sm-1 col-form-label">Pelicula</label>
                        <div class="col-sm-5">
                            <select name="idpelicula" required class="form-control">
                                <option value="">Seleccionar..</option>
                                <?php
                                $query=$this->db->query("SELECT * FROM pelicula");
                                foreach ($query->result() as $row){
                                    echo "<option value='".$row->idPelicula."'>".$row->nombre."</option>";
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
                            <input type="time" name="hora" id="hora" style="width: 100%" required>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success"> <i class="fas fa-check"></i> Registrar</button>
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
