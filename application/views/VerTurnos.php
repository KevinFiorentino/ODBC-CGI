<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es">


<body>

	<br><br><br>
		
<?php if(isset( $_SESSION['CancelarTurnoOk'] )) { 
        echo '<div class="container bg-success">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="alert-link-text">
                            <h4>' . $_SESSION['CancelarTurnoOk'] . '</h4>
                        </div>
                    </div>
                </div>
              </div>';
        unset( $_SESSION['CancelarTurnoOk'] ); } ?> <br>
        
        
       <?php if(isset( $_SESSION['CancelarTurnoError'] )) { 
        echo '<div class="container bg-danger">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="alert-link-text">
                            <h4>' . $_SESSION['CancelarTurnoError'] . '</h4>
                        </div>
                    </div>
                </div>
              </div>';
        unset( $_SESSION['CancelarTurnoError'] ); } ?> <br>
        
	<div class="container">
		<div class="panel-group">
			<div class="panel panel-primary">
  				<div class="panel-body">
            		<div class="tab-content col-sm-12">
            		
            		<h2 class="h2">Mis turnos Confirmados</h2>
					
    				<table class="table table-striped table-bordered nowrap cargando" id="TraerTurnos" 
    					cellspacing="0" width="100%">
						<thead>
							<tr>
								<th></th>
								<th>COD TURNO</th>
								<th>FECHA</th>
								<th>TIPO DE CANCHA</th>
								<th>DEPORTE</th>
								<th>LOCALIDAD</th>
								<th>CANCHA N&deg;</th>
							</tr>
						</thead>
					</table>
					
					<br><br><br><br><br><br>
    
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    
    <br><br><br>
 
</body>

</html>