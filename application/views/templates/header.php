<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?=base_url('assets/css');?>/estilos.css">
    <link rel="stylesheet" href="<?=base_url('assets/css');?>/estiloselect.css">
    <link rel="stylesheet" href="<?=base_url('assets/css')?>/portlet.css">
    <link rel="stylesheet" href="<?=base_url('assets/css');?>/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/css');?>/bootstrap-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url('assets/css');?>/jquery.dataTables.min.css">
    <link href = "<?=base_url('assets/css');?>/tableexport.css" rel = "stylesheet" type = "text / css" >
    <link rel="stylesheet" href="<?=base_url('assets/css');?>/all.css">
    
    <title>Sistema Multicines</title>




    <!--link href='<?=base_url('assets/');?>packages/core/main.css' rel='stylesheet' />
    <link href='<?=base_url('assets/');?>packages/daygrid/main.css' rel='stylesheet' />
    <script src='<?=base_url('assets/');?>packages/core/main.js'></script>
    <script src='<?=base_url('assets/');?>packages/interaction/main.js'></script>
    <script src='<?=base_url('assets/');?>packages/daygrid/main.js'></script-->
    <!--link href='<?=base_url();?>assets/demo-topbar.css' rel='stylesheet' />
    <link href='<?=base_url();?>releases/core/4.0.1/main.min.css' rel='stylesheet' />


    <link href='<?=base_url();?>releases/daygrid/4.0.1/main.min.css' rel='stylesheet' />

    <link href='<?=base_url();?>releases/timegrid/4.0.1/main.min.css' rel='stylesheet' />


    <script src='<?=base_url();?>assets/demo-to-codepen.js'></script>

    <script src='<?=base_url();?>releases/core/4.0.1/main.min.js'></script>




    <script-- src='<?=base_url();?>releases/daygrid/4.0.1/main.min.js'></script-->
    <link href='<?=base_url()?>assets/packages/core/main.css' rel='stylesheet' />
    <link href='<?=base_url()?>assets/packages/daygrid/main.css' rel='stylesheet' />
    <link href='<?=base_url()?>assets/packages/timegrid/main.css' rel='stylesheet' />
    <link href='<?=base_url()?>assets/packages/list/main.css' rel='stylesheet' />
    <link href='<?=base_url()?>assets/css/daterangepicker.css' rel='stylesheet' />
    <link href='<?=base_url()?>assets/css/buttons.dataTables.min.css' rel='stylesheet' />
    <link href='<?=base_url()?>assets/css/style.css' rel='stylesheet' />

    <script src='<?=base_url()?>assets/packages/core/main.js'></script>
    <script src='<?=base_url()?>assets/packages/core/locales-all.js'></script>
    <script src='<?=base_url()?>assets/packages/interaction/main.js'></script>
    <script src='<?=base_url()?>assets/packages/daygrid/main.js'></script>
    <script src='<?=base_url()?>assets/packages/timegrid/main.js'></script>
    <script src='<?=base_url()?>assets/packages/list/main.js'></script>


</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  
  <a class="navbar-brand" href="#"><img id="imgmulti" src="<?=base_url('assets/imgs');?>/LogoCine4.png" alt=""> Sistema Boleteria Multicines Plaza</a>

  <div class="collapse navbar-collapse  " id="navbarText">
  <ul class="navbar-nav mr-auto">
  </ul>
    <span class="navbar-text">
    <?= $this->session->userdata('nombre');?>
    <a href="<?=base_url('');?>/UsuarioCtrl/salir">SALIR  </a><i class="fas fa-sign-out-alt"></i>
    </span>
  </div>
</nav> 
<div class="row">
    <div class="col-sm-1 col-md-2 " id="menucolor">
<ul id="accordion1" class="nav nav-pills flex-column">
  <li class="nav-item">
      <?php if($this->usuarios_model->veri($_SESSION['idUs'],'1')):  ?>
        <a class="nav-link" href="<?= base_url()?>InicioCtrl" id="inicio"><i class="fas fa-home"></i> Inicio</a>
        <?php endif ?>
  </li>
    <?php if($this->usuarios_model->veri($_SESSION['idUs'],'2')):  ?>
    <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#item-2" data-parent="#accordion1" id="empresa"><i class="fas fa-briefcase"></i> Empresa</a>
    <div id="item-2" class="collapse">
      <ul class="nav flex-column ml-3">

          <?php if($this->usuarios_model->veri($_SESSION['idUs'],'18')):  ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url()?>EmpresaCtrl"><i class="fas fa-plus"></i> Registrar Nueva</a>

        
        </li>
          <?php endif ?>
          <?php if($this->usuarios_model->veri($_SESSION['idUs'],'19')):  ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url()?>EmpresaCtrl/empresaver"><i class="fas fa-list-ul"></i> Ver Empresa</a>
        </li>
          <?php endif ?>
        <li class="nav-item">
            <?php if($this->usuarios_model->veri($_SESSION['idUs'],'17')):  ?>
         <a class="nav-link" data-toggle="collapse" href="#item-21" data-parent="#accordion1"><i class="fas fa-bars"></i> Datos Dosificacion</a>
         <?php endif ?>
         <div id="item-21" class="collapse">
            <ul class="nav flex-column ml-3">
                <li class="nav-item">
                    <?php if($this->usuarios_model->veri($_SESSION['idUs'],'105')):  ?>
                    <a class="nav-link" href="<?= base_url()?>DosificacionCtrl"><i class="fas fa-plus"></i> Nuevo Dato Dosificacion</a>
                    <?php endif ?>
                </li>
                <li class="nav-item">
                    <?php if($this->usuarios_model->veri($_SESSION['idUs'],'106')):  ?>
                    <a class="nav-link" href="<?= base_url()?>DosificacionCtrl/dosificacionver"><i class="fas fa-list-ul"></i> Ver Datos Dosificacion</a>
                    <?php endif ?>
                </li>
            </ul>
        </div>
     
        </li>
    
      </ul>
    </div>
  </li>
    <?php endif  ?>
    <?php if($this->usuarios_model->veri($_SESSION['idUs'],'4')):  ?>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#item-4" data-parent="#accordion1"><i class="fas fa-truck"></i> Distribuidores</a>
            <div id="item-4" class="collapse">
                <ul class="nav flex-column ml-3">
                    <?php if($this->usuarios_model->veri($_SESSION['idUs'],'28')):  ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url()?>DistribuidorCtrl"><i class="fas fa-plus"></i> Registrar Nueva</a>
                        </li>
                    <?php endif?>
                    <?php if($this->usuarios_model->veri($_SESSION['idUs'],'29')):  ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url()?>DistribuidorCtrl/distribuidorver"><i class="fas fa-list-ul"></i> Ver Distribuidores</a>
                        </li>
                    <?php endif?>
                </ul>
            </div>
        </li>
    <?php endif?>
    <?php if($this->usuarios_model->veri($_SESSION['idUs'],'109')):  ?>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#item-41" data-parent="#accordion1"><i class="fas fa-truck"></i> Proveedores</a>
            <div id="item-41" class="collapse">
                <ul class="nav flex-column ml-3">
                <?php if($this->usuarios_model->veri($_SESSION['idUs'],'111')):  ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url()?>ProveedorCtrl"><i class="fas fa-plus"></i> Registrar Nuevo</a>
                        </li>
                        <?php endif?>
                        
                </ul>
            </div>
        </li>
        <?php endif?>

    <?php if($this->usuarios_model->veri($_SESSION['idUs'],'3')):  ?>
    <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#item-3" data-parent="#accordion1"><i class="fas fa-film"></i> Peliculas</a>
    <div id="item-3" class="collapse">
      <ul class="nav flex-column ml-3">
          <?php if($this->usuarios_model->veri($_SESSION['idUs'],'22')):  ?>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url()?>PeliculaCtrl"><i class="fas fa-plus"></i> Registrar Nueva</a>
        </li>

          <?php endif  ?>
          <?php if($this->usuarios_model->veri($_SESSION['idUs'],'23')):  ?>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url()?>PeliculaCtrl/peliculaver"><i class="fas fa-list-ul"></i> Ver Peliculas</a>
        </li>

          <?php endif  ?>
      </ul>
    </div>
  </li>
    <?php endif  ?>

    <?php
    if($this->usuarios_model->veri($_SESSION['idUs'],'5')){
        echo "  <li class='nav-item'>
                <a class='nav-link' data-toggle='collapse' href='#item-5' data-parent='#accordion1'><i class='fas fa-person-booth'></i> Salas</a>
                <div id='item-5' class='collapse'>
                  <ul class='nav flex-column ml-3'>";
                    if ($this->usuarios_model->veri($_SESSION['idUs'],'32')){
                        echo    "<li class='nav-item'>
                                    <a class='nav-link' href='".base_url()."SalaCtrl'><i class='fas fa-plus'></i> Registrar Nueva</a>
                                </li>";
                        }
                     if($this->usuarios_model->veri($_SESSION['idUs'],'33')){
                      echo "<li class='nav-item'>
                                <a class='nav-link' href='".base_url()."SalaCtrl/salaver'><i class='fas fa-list-ul'></i> Ver Salas</a>
                            </li>";
                     }
        echo          "</ul>
                </div>
              </li>";
    }
    ?>
      <li class='nav-item'>
                <a class='nav-link' data-toggle='collapse' href='#item-95' data-parent='#accordion1'><i class="fas fa-shopping-cart"></i> Puntos de Venta</a>
                <div id='item-95' class='collapse'>
                  <ul class='nav flex-column ml-3'>
                        <li class='nav-item' hidden>
                            <a class='nav-link' data-toggle="collapse" href="#item-951" data-parent="#accordion1"><i class="fas fa-glass-martini"></i> Consumible</a>
                            <div id="item-951" class="collapse">
                                <ul class="nav flex-column ml-3">
                                    <li class="nav-item">
                                        <a class="nav-link" href=""><i class="fas fa-plus"></i> Nuevo Consumible</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href=""><i class="fas fa-list-ul"></i> Consumible Activo</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href=""><i class="fas fa-list-ul"></i> Consumible Inactivo</a>
                                    </li>
                                </ul>    
                            </div>
                        </li>


                    <li class='nav-item' hidden>
                        <a class='nav-link' data-toggle="collapse" href="#item-952" data-parent="#accordion1"><i class="fab fa-gripfire"></i> Insumos</a>
                        <div id="item-952" class="collapse">
                                <ul class="nav flex-column ml-3">
                                    <li class="nav-item">
                                        <a class="nav-link" href=""><i class="fas fa-plus"></i> Nuevo Insumo</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href=""><i class="fas fa-list-ul"></i> Insumo Activo</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href=""><i class="fas fa-list-ul"></i> Insumo Inactivo</a>
                                    </li>
                                </ul>    
                            </div>
                    </li>
                    <?php if($this->usuarios_model->veri($_SESSION['idUs'],'119')):  ?>
                    <li class='nav-item'>
                        <a class='nav-link' data-toggle="collapse" href="#item-953" data-parent="#accordion1"><i class="fas fa-sitemap"></i> Rubros</a>
                        <div id="item-953" class="collapse">
                                <ul class="nav flex-column ml-3">
                                <?php if($this->usuarios_model->veri($_SESSION['idUs'],'121')):  ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?=base_url()?>RubroCtrl"><i class="fas fa-plus"></i> Rubro</a>
                                    </li>
                                <?php endif ?>

                                </ul>    
                            </div>

                    </li>
                <?php endif ?>
                    
                    <?php if($this->usuarios_model->veri($_SESSION['idUs'],'114')):  ?>
                    <li class='nav-item'>
                        <a class='nav-link' data-toggle="collapse" href="#item-954" data-parent="#accordion1"><i class="fas fa-barcode"></i> Productos</a>
                        <div id="item-954" class="collapse">
                                <ul class="nav flex-column ml-3">
                    <?php if($this->usuarios_model->veri($_SESSION['idUs'],'116')):  ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?=base_url()?>ProductoCtrl"><i class="fas fa-plus"></i> Producto</a>
                                    </li>
                    <?php endif ?>
                                </ul>    
                            </div>
                    </li>
                <?php endif ?>
                    <?php if($this->usuarios_model->veri($_SESSION['idUs'],'130')):  ?>
                    <li class='nav-item'>
                        <a class='nav-link' data-toggle="collapse" href="#item-955" data-parent="#accordion1"><i class="fas fa-gift"></i> Combos</a>
                        <div id="item-955" class="collapse">
                                <ul class="nav flex-column ml-3">
                    <?php if($this->usuarios_model->veri($_SESSION['idUs'],'133')):  ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?=base_url()?>ComboCtrl"><i class="fas fa-plus"></i> Combo</a>
                                    </li>
                    <?php endif ?>
                                </ul>    
                            </div>
                    </li>
                <?php endif ?>
                    <?php if($this->usuarios_model->veri($_SESSION['idUs'],'124')):  ?>
                    <li class='nav-item'>
                        <a class='nav-link' data-toggle="collapse" href="#item-956" data-parent="#accordion1"><i class="fas fa-edit"></i> Preferencias</a>
                        <div id="item-956" class="collapse">
                                <ul class="nav flex-column ml-3">
                    <?php if($this->usuarios_model->veri($_SESSION['idUs'],'127')):  ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?=base_url()?>PreferenciaCtrl"><i class="fas fa-plus"></i> Preferencia</a>
                                    </li>
                <?php endif ?>
                                </ul>    
                            </div>
                    </li>
                <?php endif ?>
                    <?php if($this->usuarios_model->veri($_SESSION['idUs'],'136')):  ?>
                    <li class='nav-item'>
                        <a class='nav-link' href='Imagen'><i class='fas fa-plus'></i> Imagenes Productos</a>
                        
                    </li>
                <?php endif ?>
               </ul>
                </div>
              </li>
    

    <?php if($this->usuarios_model->veri($_SESSION['idUs'],'6')):  ?>
  <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#item-6" data-parent="#accordion1"><i class="fas fa-dollar-sign"></i> Tarifas</a>
    <div id="item-6" class="collapse">
      <ul class="nav flex-column ml-3">
          <?php if($this->usuarios_model->veri($_SESSION['idUs'],'36')):  ?>
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url()?>TarifaCtrl"><i class="fas fa-plus"></i> Registrar Nueva</a>
        </li>
         <?php endif ?>
          <?php if($this->usuarios_model->veri($_SESSION['idUs'],'37')):  ?>
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url()?>TarifaCtrl/tarifaver"><i class="fas fa-list-ul"></i> Ver Tarifas</a>
        </li>
          <?php endif ?>
          <?php if($this->usuarios_model->veri($_SESSION['idUs'],'40')):  ?>
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url()?>TarifaCtrl/tarifaverinact"><i class="fas fa-list-ul"></i> Ver Tarifas Inactivas</a>
        </li>
          <?php endif ?>
          <?php if($this->usuarios_model->veri($_SESSION['idUs'],'16')):  ?>
        <li class="nav-item">
         <a class="nav-link" data-toggle="collapse" href="#item-61" data-parent="#accordion1"><i class="far fa-calendar-alt"></i> Dias Festivos</a>
         <div id="item-61" class="collapse">
            <ul class="nav flex-column ml-3">
                <?php if($this->usuarios_model->veri($_SESSION['idUs'],'100')):  ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url()?>FestivoCtrl"><i class="fas fa-plus"></i> Nuevo Dia Festivo</a>
                </li>

                <?php endif ?>
                <?php if($this->usuarios_model->veri($_SESSION['idUs'],'102')):  ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url()?>FestivoCtrl/festivover"><i class="fas fa-list-ul"></i> Ver Dias Festivos</a>
                </li>

                <?php endif ?>
                <?php if($this->usuarios_model->veri($_SESSION['idUs'],'103')):  ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url()?>FestivoCtrl/festivoverinact"><i class="fas fa-list-ul"></i> Ver Dias Festivos Inactivos</a>
                </li>

                <?php endif ?>
            </ul>
        </div>
        </li>
          <?php endif ?>
    </ul>
    </div>
  </li>
    <?php endif ?>
    <?php if($this->usuarios_model->veri($_SESSION['idUs'],'7')):?>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#item-7" data-parent="#accordion1"><i class="far fa-clock"></i> Programacion</a>
        <div id="item-7" class="collapse">
            <?php if($this->usuarios_model->veri($_SESSION['idUs'],'42')):?>
          <ul class="nav flex-column ml-3">
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url()?>ProgramacionCtrl"><i class="fas fa-calendar-alt"></i> Ver Programacion</a>
            </li>
          </ul>
            <?php endif ?>
        </div>
      </li>
    <?php endif?>
  <li class="nav-item">
    <?php if($this->usuarios_model->veri($_SESSION['idUs'],'8')):  ?>
    <a class="nav-link" data-toggle="collapse" href="#item-8" data-parent="#accordion1"><i class="far fa-credit-card"></i> Ventas Boleteria</a>
    <div id="item-8" class="collapse">
      <ul class="nav flex-column ml-3">
        <li class="nav-item">
            <?php if($this->usuarios_model->veri($_SESSION['idUs'],'45')):  ?>
                <a class="nav-link" href="<?=base_url()?>VentaCtrl"><i class="fas fa-plus"></i> Panel Ventas</a>
            <?php endif ?>
        </li>
        <li class="nav-item" hidden>
                <a class="nav-link" href="#"><i class="fas fa-plus"></i> Panel Ventas Web</a>
        </li>
            <?php if($this->usuarios_model->veri($_SESSION['idUs'],'61')):  ?>
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url()?>VentaCtrl/listaVenta"><i class="fas fa-list-ul"></i> Listado Ventas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url()?>VentaCtrl/listaDev"><i class="fas fa-list-ul"></i> Listado Devoluciones</a>
        </li>
            <?php endif ?>
        <li class="nav-item" hidden>
                <a class="nav-link" href="#"><i class="fas fa-list-ul"></i> Listado Ventas Web</a>
        </li>
        <li class="nav-item">
            <?php if($this->usuarios_model->veri($_SESSION['idUs'],'55')):  ?>
                <a class="nav-link" href="<?=base_url()?>BoletoCtrl"><i class="far fa-credit-card"></i> Ver Entradas Vendidas</a>
            <?php endif ?>
        </li>
      </ul>
    </div>
    <?php endif ?>
  </li>

            <?php if($this->usuarios_model->veri($_SESSION['idUs'],'143')):  ?>
  <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#item-80" data-parent="#accordion1"><i class="fas fa-store"></i> Ventas Candy</a>
    <div id="item-80" class="collapse">
      <ul class="nav flex-column ml-3">
        <?php if($this->usuarios_model->veri($_SESSION['idUs'],'144')):  ?>
        <li class="nav-item">
                <a class="nav-link" href="<?=base_url()?>VentaCandyCtrl"><i class="fas fa-cash-register"></i> Panel Venta</a>
        </li>
        <?php endif ?>
        <?php if($this->usuarios_model->veri($_SESSION['idUs'],'147')):  ?>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url()?>ListadoCandyCtrl"><i class="fas fa-money-bill"></i> Listado ventas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url()?>ListadoCandyCtrl/listaDevCandy"><i class="fas fa-money-bill"></i> Listado Devolucion</a>
            </li>
        <?php endif ?>
    
      </ul>
    </div>
  </li>
  <?php endif ?>
  
  <?php if($this->usuarios_model->veri($_SESSION['idUs'],'9')):  ?>
  <li class="nav-item">      
    <a class="nav-link" data-toggle="collapse" href="#item-9" data-parent="#accordion1"><i class="far fa-chart-bar"></i> Estadisticas</a>
    <div id="item-9" class="collapse">
      <ul class="nav flex-column ml-3">
        <li class="nav-item">
            <?php if($this->usuarios_model->veri($_SESSION['idUs'],'70')):  ?>
            <a class="nav-link" href="<?=base_url()?>Ventasvendedor"><i class="fas fa-plus"></i> Ventas por Vendedor</a>
            <?php endif ?>
        </li>
        <li class="nav-item">
            <?php if($this->usuarios_model->veri($_SESSION['idUs'],'76')):  ?>
            <a class="nav-link" href="<?=base_url()?>Ventasvendedor/resumenboleto"><i class="fas fa-plus"></i> Resumen Ventas (Gross Office)</a>
            <?php endif ?>
        </li>
        <li class="nav-item">
            <?php if($this->usuarios_model->veri($_SESSION['idUs'],'76')):  ?>
            <a class="nav-link" href="<?=base_url()?>Ventasvendedor/resumenventa"><i class="fas fa-plus"></i> Resumen Ventas (Box Office)</a>
            <?php endif ?>
        </li>
        <?php if($this->usuarios_model->veri($_SESSION['idUs'],'13')):  ?>
        <li class="nav-item">
         <a class="nav-link" data-toggle="collapse" href="#item-91" data-parent="#accordion1"><i class="fas fa-bars"></i> Libro IVA</a>
         <div id="item-91" class="collapse">
            <ul class="nav flex-column ml-3">
                <?php if($this->usuarios_model->veri($_SESSION['idUs'],'90')):  ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url()?>Iva/index"><i class="fas fa-list-ul"></i> Libro IVA Ventas</a>
                </li>
                <?php endif ?>
                <?php if($this->usuarios_model->veri($_SESSION['idUs'],'108')):  ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url()?>Iva/ivaCandy"><i class="fas fa-list-ul"></i> Libro IVA Candy</a>
                </li>
                <?php endif ?>
            </ul>
        </div>
        </li>
        <?php endif ?>
        <li class="nav-item" hidden>
            <a class="nav-link" href="<?=base_url()?>InformeSemanal"><i class="fas fa-file"></i> Informe semanal</a>
        </li>
          <?php if($this->usuarios_model->veri($_SESSION['idUs'],'65')):  ?>
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url()?>Reporte/porfuncion"><i class="fas fa-plus"></i> Borderaux Funcion</a>
        </li>       
        <?php endif ?>

          <?php if($this->usuarios_model->veri($_SESSION['idUs'],'67')):  ?>
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url()?>Reporte/semanadistrib"><i class="fas fa-plus"></i> Borderaux Distribuidor</a>
        </li>
        <?php endif ?>
          <?php if($this->usuarios_model->veri($_SESSION['idUs'],'66')):  ?>
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url()?>Reporte/bordistribuidor"><i class="fas fa-plus"></i> Borderaux tarifa</a>
        </li>
        <?php endif ?>
          <?php if($this->usuarios_model->veri($_SESSION['idUs'],'71')):  ?>
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url()?>Reporte/repsemana"><i class="fas fa-plus"></i> Borderaux semana</a>
        </li>
        <?php endif ?>
          <?php if($this->usuarios_model->veri($_SESSION['idUs'],'139')):  ?>
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url()?>ReporteCandy"><i class="fas fa-plus"></i> Productos Mas Vendidos</a>
        </li>
        <?php endif ?>
          <?php if($this->usuarios_model->veri($_SESSION['idUs'],'140')):  ?>
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url()?>ReporteCandy/resumenCandy"><i class="fas fa-plus"></i> Resumen Ventas Candy</a>
        </li>
        <?php endif ?>
    </ul>
    </div>
    
  </li>
  <?php endif ?>
  
    <?php if($this->usuarios_model->veri($_SESSION['idUs'],'11')):  ?>
  <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#item-10" data-parent="#accordion1"><i class="fas fa-inbox"></i> Caja</a>
    <div id="item-10" class="collapse">
      <ul class="nav flex-column ml-3">
          <?php if($this->usuarios_model->veri($_SESSION['idUs'],'82')):  ?>
<!--        <li class="nav-item">-->
<!--            <a class="nav-link" href="#"><i class="fas fa-plus"></i> Nuevo Movimiento</a>-->
<!--        </li>-->

          <?php endif ?>
          <?php if($this->usuarios_model->veri($_SESSION['idUs'],'83')):  ?>
<!--        <li class="nav-item">-->
<!--            <a class="nav-link" href="#"><i class="fas fa-list-ul"></i> Ver Caja</a>-->
<!--        </li>-->

          <?php endif ?>

          <?php if($this->usuarios_model->veri($_SESSION['idUs'],'82')):  ?>
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url()?>ResumenDia"><i class="fas fa-plus"></i> Resumen Boleteria</a>
        </li>
          <?php endif ?>
          <?php if($this->usuarios_model->veri($_SESSION['idUs'],'83')):  ?>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url()?>ResumenDia/diacandy"><i class="fas fa-plus"></i> Resumen Candy</a>
        </li>
          <?php endif ?>
      </ul>
    </div>
  </li>
    <?php endif ?>
    <?php if($this->usuarios_model->veri($_SESSION['idUs'],'10')):  ?>
  <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#item-011" data-parent="#accordion1"><i class="fas fa-users"></i> Usuarios</a>
    <div id="item-011" class="collapse">
      <ul class="nav flex-column ml-3">
          <?php if($this->usuarios_model->veri($_SESSION['idUs'],'77')):  ?>
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url()?>UsuarioCtrl/usuarioreg"><i class="fas fa-plus"></i> Registrar Nuevo</a>
        </li>
          <?php endif?>
          <?php if($this->usuarios_model->veri($_SESSION['idUs'],'78')):  ?>
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url()?>UsuarioCtrl/usuariover"><i class="fas fa-list-ul"></i> Ver Usuarios</a>
        </li>
          <?php endif?>
      </ul>
    </div>
  </li>
    <?php endif?>
    <?php if($this->usuarios_model->veri($_SESSION['idUs'],'15')):  ?>
  <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#item-012" data-parent="#accordion1"><i class="fas fa-male"></i> Clientes</a>
    <div id="item-012" class="collapse">
      <ul class="nav flex-column ml-3">
          <?php if($this->usuarios_model->veri($_SESSION['idUs'],'95')):  ?>
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url()?>ClienteCtrl"><i class="fas fa-plus"></i> Registrar Nuevo</a>
        </li>
          <?php endif?>
          <?php if($this->usuarios_model->veri($_SESSION['idUs'],'98')):  ?>
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url()?>ClienteCtrl/clientever"><i class="fas fa-list-ul"></i> Ver Clientes</a>
        </li>
          <?php endif?>
      </ul>
    </div>
  </li>
<?php endif?>
          <?php if($this->usuarios_model->veri($_SESSION['idUs'],'14')):  ?>
  <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#item-013" data-parent="#accordion1"><i class="fas fa-bullhorn"></i> Promos / Cortesias</a>
    <div id="item-013" class="collapse">
      <ul class="nav flex-column ml-3">
      <li class="nav-item" hidden>
         <a class="nav-link" data-toggle="collapse" href="#item-0131" data-parent="#accordion1"><i class="far fa-image"></i> Banners</a>
         <div id="item-0131" class="collapse">
            <ul class="nav flex-column ml-3">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-plus"></i> Nuevo Banner</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-list-ul"></i> Banners Activos</a>
                </li>
            </ul>
        </div>
        </li>
        <li class="nav-item">
          <?php if($this->usuarios_model->veri($_SESSION['idUs'],'94')):  ?>
         <a class="nav-link" data-toggle="collapse" href="#item-0132" data-parent="#accordion1"><i class="fas fa-barcode"></i> Cupones</a>
         <div id="item-0132" class="collapse">
            <ul class="nav flex-column ml-3">
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url()?>CuponCtrl"><i class="fas fa-plus"></i> Nuevo Cupon</a>
                </li>
                <li class="nav-item" hidden>
                    <a class="nav-link" href="#"><i class="fas fa-list-ul"></i> Ver Cupones</a>
                </li>
            </ul>
        </div>
          <?php endif?>
        </li>
 
      </ul>
    </div>
  </li>  
  <?php endif?>
  <li class="nav-item" hidden>
         <a class="nav-link" data-toggle="collapse" href="#item-0133" data-parent="#accordion1"><i class="fab fa-android"></i> Notificaciones</a>
         <div id="item-0133" class="collapse">
            <ul class="nav flex-column ml-3">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fab fa-android"></i> Enviar Notificaciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-list-ul"></i> Ver Notificaciones</a>
                </li>
            </ul>
        </div>
        </li>
          <?php if($this->usuarios_model->veri($_SESSION['idUs'],'12')):  ?>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#item-014" data-parent="#accordion1"><i class="fas fa-key"></i> Control de Ingreso</a>
            <div id="item-014" class="collapse">
                <ul class="nav flex-column ml-3">
          <?php if($this->usuarios_model->veri($_SESSION['idUs'],'89')):  ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-list-ul"></i> Ver Controles Ingreso</a>
                    </li>
            <?php endif?>
                 </ul>
            </div>
        </li>  
        <?php endif?>
</ul>  
</div> 
