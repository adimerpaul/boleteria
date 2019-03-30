
<div class="col-sm-11 col-md-10">
    <h3>PANEL DE VENTAS</h3>

    <div class="card ">
        <div class="card-header text-white bg-success" >
        PANEL DE VENTAS
            <input type="date" id="fecfuncion"  name="fecfuncion"  min="<?php echo date("Y-m-d");?>" required value="<?php echo date("Y-m-d");?>">
        </div>
        <div class="card-body">
            <h3>INFORMACION DE LA PELICULA</h3>
            <hr/>
            <div id="listapelicula">
                <ol id="selectable">
                    <li class="ui-widget-content col-sm-2">
                        <div class="titulo"><h4>Architect & Engineer</h4></div>
                        <div class="tipo">d3</div>
                        <div class="numero">33</div>
                    </li>
                </ol>
            </div>
        </div>
    </div>  
</div>
