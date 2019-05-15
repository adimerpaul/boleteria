<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ingreso al Sistema Multicines</title>
    <link rel="stylesheet" href="<?=base_url('assets/css');?>/estilologin.css">
    <link rel="stylesheet" href="<?=base_url('assets/css');?>/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body>
<div id="login">
        
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-4">
                    <div id="login-box" class="col-md-12">
                        <form method="POST" id="login-form" class="form" action="<?php echo base_url();?>UsuarioCtrl/verifica" >
                            <h3 class="text-center text-white">INGRESO AL SISTEMA</h3>
                            <div class="form-group">
                                <label for="user" class="text-white">Usuario:</label><br>
                                <div class="input-group-prepend">
                                    <i class="fas fa-user fa-2x" style="padding-right: 5px;"></i>
                                    <input type="text" name="user" id="user" class="form-control" placeholder="ingrese su usario" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pass" class="text-white">Password:</label><br>
                                <div class="input-group-prepend">
                                    <i class="fas fa-unlock-alt fa-2x" style="padding-right: 5px;"  ></i>
                                    <input type="password" name="pass" id="pass" class="form-control" placeholder="ingrese su password" required >
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-light btn-md" value="Ingresar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
</body>

  <script src="<?=base_url('assets/js');?>/jquery.min.js"></script>
  <script src="<?=base_url('assets/js');?>/popper.min.js"></script>
  <script src="<?=base_url('assets/js');?>/bootstrap.min.js"></script>
</html>