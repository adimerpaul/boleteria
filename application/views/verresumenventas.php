<style>
@bg-blue: #337ab7;
@bg-hoki: #67809F;
@bg-red: #e7505a;
@bg-purple: #8E44AD;
.wrapper {
  position: relative;  
}
.dashboard-stat {
  position: relative;
  display: block;
  margin: 0 0 25px;
  overflow: hidden;
  border-radius: 4px;
  .visual {
    width: 80px;
    height: 80px;
    display: block;
    float: left;
    padding-top: 10px;
    padding-left: 15px;
    margin-bottom: 15px;
    font-size: 35px;
    line-height: 35px;
    > i {
      margin-left: -15px;
      font-size: 110px;
      line-height: 110px;
      color: #fff;
      opacity: .1;
    }
  }
  .details {
    position: absolute;
    right: 15px;
    padding-right: 15px;
    color: #fff;
    .number {
      padding-top: 25px;
      text-align: right;
      font-size: 34px;
      line-height: 36px;
      letter-spacing: -1px;
      margin-bottom: 0;
      font-weight: 300;
      .desc {
        text-transform: capitalize;
        text-align: right;
        font-size: 16px;
        letter-spacing: 0;
        font-weight: 300;
      }
    }
  }
  &.blue {
    background-color: blue;
  }
  &.red {
    background-color: red;
  }
  &.green {
    background-color: green;
  }
  &.yellow {
    background-color: yellow;
  }
}
</style>
<div class="col-sm-11 col-md-10">
    <h3 class="page-title">
        Resumen de Ventas <small> Analice las ventas desde aquí </small>
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href="#"> <i class="fas fa-home"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="#"> <i class="fas fa-signal"></i> Resumen ventas</a></li>
            <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-ticket-alt" ></i> Ver resumen ventas</li>
        </ol>
    </nav>

                    <div class="col-sm-5">
                        <div type="text" class="form-control" id="fecha" value="<?=date('Y-m-d')?>">
                            <i class="fa fa-calendar"></i>
                            <span></span>
                            <i class="fa fa-caret-down"></i>
                        </div>
                    </div>
                    <br>
    <div class="card">
        <div class="card-header text-white bg-dark">
            <h5>PELICULAS PERIODO SELECCIONADO</h5>
        </div>
        <div class="card-body" id="listapeliculas">
    
        </div>
    </div>

     <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <a class="dashboard-stat blue" href="#">
            <div class="visual">
                <i class="fas fa-film"></i>
            </div>
            <div class="details">
                <div class="number" id="resventa">
                    <span>0/0%</span>
                </div>
                <div class="desc">Ventas Mostrador</div>
            </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <a class="dashboard-stat yellow" href="#">
            <div class="visual">
                <i class="fas fa-shopping-cart"></i>
            </div>
            <div class="details">
                <div class="number" id="resweb">
                    <span>0/0%</span>
            </div>
            <div class="desc">Ventas Web</div>
            </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <a class="dashboard-stat red" href="#">
            <div class="visual">
                <i class="fas fa-tags"></i>
            </div>
            <div class="details">
                <div class="number" id="resdev">
                    <span>0/0.00 Bs</span>
                </div>
                <div class="desc">Devoluciones</div>
            </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <a class="dashboard-stat green" href="#">
            <div class="visual">
            <i class="fas fa-coins"></i>
            </div>
            <div class="details">
            <div class="number" id="restotal">
                <span>0/0.00 Bs</span>
            </div>
            <div class="desc">Total Ventas</div>
            </div>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-white bg-primary"><i class="fas fa-list"></i> Resumen por Pelicula</div>
                <div class="card-body">
                
                        <canvas id="oilChart" width="600" height="400"></canvas>
	               
                </div>
            </div>
        </div>
        <div class="col-md-6">
        <div class="card">
                <div class="card-header text-white bg-primary"><i class="fas fa-list"></i> Resumen por Tarifa</div>
                <div class="card-body">
                    <canvas id="oilChart2" width="600" height="400"></canvas>
                    
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row col-md-12">
        <div class="card">
                <div class="card-header text-white bg-primary"><i class="fas fa-list"></i> Resumen por Pelicula</div>
                <div class="card-body">
                
	    <table  class="table">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Pelicula</th>
                    <th>Jueves</th>
                    <th>Viernes</th>
                    <th>Sabado</th>
                    <th>Domingo</th>
                    <th>Lunes</th>
                    <th>Martes</th>
                    <th>Miercoles</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody id="tabPelicula">
            </tbody>
            </table>
            </div>
        </div>

    </div>
<br>
    <div class="row col-md-12">
        <div class="card">
            <div class="card-header text-white bg-primary"><i class="fas fa-list"></i> Per Capita Diario</div>
            <div class="card-body">
                <div id="chartContainer" ></div>
            </div>
        </div>
    </div>
</div>