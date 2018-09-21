<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es" ng-app="app" ng-controller="ctrl">

<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/jquery.datetimepicker.min.css"/>
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/Distribuidos.css">
	
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/Angular.js"></script>
	
</head>
	
<body>

	<h3>Solicitud de Modificacion de turno para la Cancha</h3>
	<h6>Recomendaci&oacute;n: No se registrar&aacute;n reservas con menos de una hora de anticipaci&oacute;n</h6>
	
	<div>
	  <?= form_open('Reservas/ModificarTurno') ?>
	  	  <input type="hidden" name="idTurno" value="<?php echo $_GET['idTurno'] ?>" >
	  	  <input type="hidden" name="idCancha" value="<?php echo $_GET['idCancha'] ?>" >
    	  <label>Reservar esta cancha el d&iacute;a </label>
    	  <input type="text" name="datepicker" id="datepicker" readonly="readonly" size="12" required />
    	  <label>a las </label>
    	  <input type="text" name="timepicker" id="timepicker" readonly="readonly" size="12" required />
    	  <label>horas. </label> <br><br>
    	  <button type="submit" class="btn btn-primary">Solicitar</button>
	   <?= form_close() ?>
	</div>
	
</body>


<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.datetimepicker.full.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/scriptDateTimePicker.js"></script>

</html>