<div class="col-sm-11 col-md-10">
    <h3>Registrar Nueva Usuario</h3>

<div class="card ">
  <div class="card-header text-white bg-success" >
    Informacion de Registro de Usuario
  </div>
  <div class="card-body">
      <h3>INFORMACION DEL USUARIO</h3>
<hr />
    
  <form method="POST" action="<?php echo base_url();?>UsuarioCtrl/store" >
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nombre">Nombre:</label>   
      <input type="text" class="form-control" id="nombre" name="nombre">  
    </div>
    <div class="form-group col-md-6">
      <label for="textuser">User: </label>
      <input type="text" class="form-control" id="textuser" name="textuser">
      <label id="user_error" class="control-label col-md-6 text-danger" style="display: block;"></label>
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="pass">Password:</label>   
      <input type="password" class="form-control" id="pass" name="pass">  
    </div>
    <div class="form-group col-md-6">
      <label for="confpass">Confirmar Password: </label>
      <input type="password" class="form-control" id="confpass" name="confpass">
      <label id="mensaje_error" class="control-label col-md-6 text-danger" style="display: block;"></label>
    </div>
  </div>
  <h3>Permisos del Usuario</h3>
  <hr />
 
  <div class="form-row">
    <div class="col-md-1"></div>
        <div class="form-group col-md-6" id='secciones'> 
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" id="inicio1" name="inicio1">Inicio
            </label><br>
            <label class="form-check-label">      
                <input type="checkbox" class="form-check-input" id="empresa1" name="empresa1">Empresas
            </label><br>
            <div id="empresa12" name="empresa12" hidden>
                <div class="col-md-4"></div>
                <div class="col-md-8">
                    <label class="form-check-label"> <input type="checkbox" class="form-check-input" id="regempresa1" name="regempresa1">RegistrarNuevaEmpresa </label><br>
                    <label class="form-check-label"> <input type="checkbox" class="form-check-input" id="verempresa1" name="verempresa1">VerEmpresas </label><br>
                    <label class="form-check-label"> <input type="checkbox" class="form-check-input" id="modempresa1" name="modempresa1">ModificarEmpresa </label><br>
                    <label class="form-check-label"> <input type="checkbox" class="form-check-input" id="elempresa1" name="elempresa1">EliminarEmpresa </label><br>
                </div>
            </div>

            <label class="form-check-label">      
                <input type="checkbox" class="form-check-input" id="pelicula1" name="pelicula1">Peliculas
            </label><br>
            <div id="pelicula12" name="pelicula12" hidden>
                <div class="col-md-4"></div>
                <div class="col-md-8">
                    <label class="form-check-label"> <input type="checkbox" class="form-check-input" id="regpelicula1" name="regpelicula1">RegistrarNuevaPelicula </label><br>
                    <label class="form-check-label"> <input type="checkbox" class="form-check-input" id="verpelicula1" name="verpelicula1">VerPeliculas </label><br>
                    <label class="form-check-label"> <input type="checkbox" class="form-check-input" id="modpelicula1" name="modpelicula1">ModificarPelicula </label><br>
                    <label class="form-check-label"> <input type="checkbox" class="form-check-input" id="elpelicula1" name="elpelicula1">EliminarPelicula </label><br>
                </div>
            </div>

            <label class="form-check-label">      
                <input type="checkbox" class="form-check-input" id="distrib1" name="distrib1">Distribuidoras
            </label><br>
            <div id="distrib12" name="distrib12" hidden>
                <div class="col-md-4"></div>
                <div class="col-md-8">
                    <label class="form-check-label"> <input type="checkbox" class="form-check-input" id="regdistrib1" name="regdistrib1">RegistrarNuevaDistribuidora </label><br>
                    <label class="form-check-label"> <input type="checkbox" class="form-check-input" id="verdistrib1" name="verdistrib1">VerDistribuidoras </label><br>
                    <label class="form-check-label"> <input type="checkbox" class="form-check-input" id="moddistrib1" name="moddistrib1">ModificarDistribuidora </label><br>
                    <label class="form-check-label"> <input type="checkbox" class="form-check-input" id="eldistrib1" name="eldistrib1">EliminarDistribuidora </label><br>
                </div>
            </div>
            
            <label class="form-check-label">      
                <input type="checkbox" class="form-check-input" id="sala1" name="sala1">Salas
            </label><br>
            <div id="sala12" name="sala12" hidden>
                <div class="col-md-4"></div>
                <div class="col-md-8">
                    <label class="form-check-label"> <input type="checkbox" class="form-check-input" id="regsala1" name="regsala1">RegistrarNuevaSala </label><br>
                    <label class="form-check-label"> <input type="checkbox" class="form-check-input" id="versala1" name="versala1">VerSala </label><br>
                    <label class="form-check-label"> <input type="checkbox" class="form-check-input" id="modsala1" name="modsala1">Modificarsala </label><br>
                    <label class="form-check-label"> <input type="checkbox" class="form-check-input" id="elsala1" name="elsala1">EliminarSala </label><br>
                </div>
            </div>

            <label class="form-check-label">      
                <input type="checkbox" class="form-check-input" id="tarifa1" name="tarifa1">Tarifas
            </label><br>
            <div id="tarifa12" name="tarifa12" hidden>
                <div class="col-md-4"></div>
                <div class="col-md-8">
                    <label class="form-check-label"> <input type="checkbox" class="form-check-input" id="regtarifa1" name="regtarifa1">RegistrarNuevaTarifa </label><br>
                    <label class="form-check-label"> <input type="checkbox" class="form-check-input" id="vertarifa1" name="vertarifa1">VerTarifas </label><br>
                    <label class="form-check-label"> <input type="checkbox" class="form-check-input" id="modtarifa1" name="modtarifa1">ModificarTarifa </label><br>
                    <label class="form-check-label"> <input type="checkbox" class="form-check-input" id="eltarifa1" name="eltarifa1">EliminarTarifa </label><br>
                    <label class="form-check-label"> <input type="checkbox" class="form-check-input" id="vertarifain1" name="vertarifain1">VerTarifaInactivas </label><br>
                </div>
            </div>

            <label class="form-check-label">      
                <input type="checkbox" class="form-check-input" id="Ventas" name="Ventas">Ventas
            </label><br>
            <div id="ventas2" name="ventas2" hidden>
                <div class="col-md-4"></div>
                <div class="col-md-8">
                    <label class="form-check-label"> <input type="checkbox" class="form-check-input" id="PanelVentas" name="PanelVentas">PanelVentas </label><br>
                    <label class="form-check-label"> <input type="checkbox" class="form-check-input" id="PanelDevoluciones" name="PanelDevoluciones">PanelDevoluciones</label><br>
                    <label class="form-check-label"> <input type="checkbox" class="form-check-input" id="DevolverEntrada" name="DevolverEntrada">DevolverEntrada </label><br>
                    <label class="form-check-label"> <input type="checkbox" class="form-check-input" id="DevolverFuncion" name="DevolverFuncion">DevolverFuncion</label><br>
                    <label class="form-check-label"> <input type="checkbox" class="form-check-input" id="VolverImprimirEntrada" name="VolverImprimirEntrada">VolverImprimirEntrada</label><br>
                    <label class="form-check-label"> <input type="checkbox" class="form-check-input" id="VolverImprimirDevolucion" name="VolverImprimirDevolucion">VolverImprimirDevolucion</label><br>
                    <label class="form-check-label"> <input type="checkbox" class="form-check-input" id="PanelVentaWeb" name="PanelVentaWeb">PanelVentaWeb</label><br>
                    <label class="form-check-label"> <input type="checkbox" class="form-check-input" id="ConsultarVentaWeb" name="ConsultarVentaWeb">ConsultarVentaWeb</label><br>
                    <label class="form-check-label"> <input type="checkbox" class="form-check-input" id="RegistrarVentaWeb" name="RegistrarVentaWeb">RegistrarVentaWeb</label><br>
                    <label class="form-check-label"> <input type="checkbox" class="form-check-input" id="VerPanelVentasWeb" name="VerPanelVentasWeb">VerPanelVentasWeb</label><br>
                    <label class="form-check-label"> <input type="checkbox" class="form-check-input" id="VerEntradasVendidas" name="VerEntradasVendidas">VerEntradasVendidas</label><br>
                    <label class="form-check-label"> <input type="checkbox" class="form-check-input" id="ReactivarEntradaWeb" name="ReactivarEntradaWeb">ReactivarEntradaWeb</label><br>
                    <label class="form-check-label"> <input type="checkbox" class="form-check-input" id="VerPanel" name="VerPanel">VerPanel</label><br>
                </div>
            </div>

            <label class="form-check-label">      
                <input type="checkbox" class="form-check-input" id="venta1" name="venta1">Ventas
            </label><br>
            <div id="venta12" name="venta12" hidden>
                <div class="col-md-4"></div>
                <div class="col-md-8">
               </div>
            </div>

        </div>            
    </div>
  <input type="submit" class="btn btn-success" value="Registrar">
  <a type="button" class="btn btn-warning" href="<?php echo base_url();?>UsuarioCtrl/usuariover">Cancelar</a>
</form>
  </div>
</div>
</div>
