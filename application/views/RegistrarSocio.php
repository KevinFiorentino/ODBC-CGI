<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
    <li class="nav-item">
      <?php echo anchor("LogearUsuario/IniciarSesion", "Iniciar Sesi&oacute;n", array('class' => 'nav-link')); ?>   
    </li>
    <li class="nav-item active">
      <?php echo anchor("RegistrarSocio/NuevoSocio", "Asociarme", array('class' => 'nav-link')); ?>
    </li>
  </ul>
</nav>
<!-- Fin Barra de Navegacion -->

<body ng-app="AngularForms" ng-controller="ControllerForms">

	<br><br><br>	

	<div class="container">
		<div class="panel-group">
			<div class="panel panel-primary">
  				<div class="panel-body">
            		<div class="tab-content col-sm-12">
            		
            		<h2 class="h2">Polideportivo Los Amigos</h2> <br>
                <?php echo validation_errors(); ?>
            	<?= form_open('RegistrarSocio/Asociar') ?>
            	
            	<h4 class="h4">Datos del Asociado: </h4> <br>
            	
            	  <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" value="<?php echo set_value('nombre'); ?>" required size="45">
                  </div>

                  <div class="form-group">
                    <label for="apellido">Apellido:</label>
                    <input type="text" class="form-control" name="apellido" required size="45">
                  </div>
                   
                  <div class="form-group">
                    <label for="direc">Direcci&oacute;n:</label>
                    <input type="text" class="form-control" name="direc" required size="45">
                  </div>
                  
                  <div class="form-group">
                    <label for="tel">Telefono:</label>
                    <input type="number" class="form-control" name="tel" required size="11">
                  </div>
                  
                  <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" value="<?php echo set_value('email'); ?>" required size="45">
                  </div>
                  
                  <br>
                  
                  <hr> <br>
                  
                  <h4 class="h4">Datos de la Cuenta: </h4> <br>
            	
                  <div class="form-group">
                    <label for="user">Nombre Usuario:</label>
                    <input type="text" class="form-control" name="user" value=""<?php echo set_value('user'); ?>" ng-model="user" ng-change="validarUser()" required size="45">
                    <span style="color: {{ colorUs }}">{{ validUser }}</span>
                  </div>
                  
                  <div class="form-group">
                    <label for="pass">Contrase&ntilde;a:</label>
                    <input type="password" class="form-control" name="pass" ng-model="pass" value="<?php echo set_value('pass'); ?>" ng-change="validarPass()" required size="45">
                  </div>
                  
                  <div class="form-group">
                    <label for="passrepeat">Repetir Contrase&ntilde;a:</label>
                    <input type="password" class="form-control" name="passrepeat" ng-model="passrepeat" value="<?php echo set_value('passrepeat'); ?>" ng-change="validarPass()" required>
                  	<span style="color: {{ colorPss }}">{{ validPass }}</span>
                  </div>
                  
                  <button type="submit" class="btn btn-primary">Registrarme</button>
                  
                <?= form_close() ?>
                
                <br>
    
    			<?php echo anchor("LogearUsuario/IniciarSesion", "Ya estoy registrado", array('class' => 'nav-link')); ?>
    
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    
    <br><br><br>
    
    <!-- Angular --> 
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/AngularForms.js"></script>
	
</body>

</html>