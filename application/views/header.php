<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Distribuidos 2018 - Trabajo Practico ODBC - CGI">
    <meta name="author" content="Fiorentino - Violi - Palazzo">

    <title>Distribuidos 2018</title>

    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/Distribuidos.css">
    
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/datatables.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/jquery.dataTables.min.css">
    
</head>  

<!-- Barra de Navegacion -->
<nav class="navbar navbar-expand-xl bg-dark navbar-dark">
<ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="#">Inicio</a>
    </li>
    <li class="nav-item">
      <?php echo anchor("Reservas/ReservarCancha", "Reservar", array('class' => 'nav-link')); ?>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Mis Turnos</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Perfil</a>
    </li>
  </ul>
</nav>
<!-- Fin Barra de Navegacion -->
