
<div class="col-sm-11 col-md-10">
    <h3>PANEL DE VENTAS</h3>

    <div class="card ">
        <div class="card-header text-white bg-success" >
        PANEL DE VENTAS
            <input type="date" id="fecfuncion"  name="fecfuncion"  min="<?php echo date("Y-m-d");?>" required value="<?php echo date("Y-m-d");?>">
        </div>
        <div class="card-body">
            <h4><i class="fas fa-film"></i> PELICULAS</h4>
            <hr/>
            <div class="row">
            <div id="listapelicula">
                <ol id="selectable">
                    <li class="ui-widget-content">
                        <div class="titulo"><h4>Architect & Engineer</h4></div>
                        <div class="tipo">d3</div>
                        <div class="vendido">33</div>
                    </li>
                </ol>
                </div>
            </div>
            
            <hr>
        <div class="row">
            <div class="col-md-4">
            <h4><i class="far fa-clock"></i> Funciones</h4><br>
            <span>You've selected:</span> <span id="select-result">none</span>.
            <div id="horariopelicula"></div>  
            </div>


        </div>

            
        </div>
    </div>  
</div>
