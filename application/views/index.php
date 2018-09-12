<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Distribuidos 2018 - Trabajo Practico ODBC - CGI">
    <meta name="author" content="Fiorentino - Violi - Palazzo">

    <title>Distribuidos 2018</title>

    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/Distribuidos.css">
    
</head>  

<!-- Barra de Navegacion -->
<nav class="navbar navbar-expand-xl bg-dark navbar-dark">
<ul class="navbar-nav">
    <li class="nav-item active">
      <?php echo anchor("LogearUsuario/IniciarSesion", "Iniciar Sesi&oacute;n", array('class' => 'nav-link')); ?>   
    </li>
    <li class="nav-item">
      <?php echo anchor("RegistrarSocio/NuevoSocio", "Asociarme", array('class' => 'nav-link')); ?>
    </li>
  </ul>
</nav>
<!-- Fin Barra de Navegacion -->

<body>

	<br><br>	
	
	<?php if(isset( $_SESSION['errorLogin'] )) { 
        echo '<div class="container bg-danger">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="alert-link-text">
                            <h4>' . $_SESSION['errorLogin'] . '</h4>
                        </div>
                    </div>
                </div>
              </div>';
        unset( $_SESSION['errorLogin'] ); } ?> <br>

	<?php if(isset( $_SESSION['RegistroOk'] )) { 
        echo '<div class="container bg-danger">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="alert-link-text">
                            <h4>' . $_SESSION['RegistroOk'] . '</h4>
                        </div>
                    </div>
                </div>
              </div>';
        unset( $_SESSION['RegistroOk'] ); } ?> <br>
        
	<div class="container">
		<div class="panel-group">
			<div class="panel panel-primary">
  				<div class="panel-body">
            		<div class="tab-content col-sm-12">
            		
            		<h2 class="h2">Polideportivo Los Amigos</h2>
					<h4 class="h4">Inicie Sesi&oacute;n o H&aacute;gase Socio</h4> <br>
	 
            	<?= form_open('LogearUsuario/Login') ?>
            	
                  <div class="form-group">
                    <label for="user">Usuario:</label>
                    <input type="text" class="form-control" name="user" placeholder="Usuario" required>
                  </div>
                  <div class="form-group">
                    <label for="pass">Contrase&ntilde;a:</label>
                    <input type="password" class="form-control" name="pass" placeholder="Constrase&ntilde;a" required>
                  </div>
                  <button type="submit" class="btn btn-primary">Login</button>
                  
                <?= form_close() ?>
                
                <br>
                
                <?php echo anchor("RegistrarSocio/NuevoSocio", "Quiero Ser Socio !!!", array('class' => 'nav-link')); ?>
    
    
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    
    <br><br><br>
	
</body>

</html>