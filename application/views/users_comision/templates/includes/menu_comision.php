<!-- Header -->
<!-- Server status -->

<header>
    <div class="container_12">
        <p id="skin-name"><small>San Rafael Late<br> Clientes</small> <strong>1.0</strong></p>
        <div class="server-info">Soporte:</div>
    </div>
</header>
<!-- End server status -->

<!-- Logo section -->
<div id="header-bg">
    <img src="<?php echo base_url() ?>logo_nuevo2.png" width="auto" height="40">
</div>

<!-- Sub nav -->
<div id="sub-nav">
    <div class="container_12">
        <ul>
            <li><a href="<?php echo base_url(); ?>users_comision/dash_comision/main" >Dash</a></li>
            <li><a href="<?php echo base_url(); ?>users_comision/dash_reservas/reservas_form" >Crear Reserva</a></li>
            <li><a href="<?php echo base_url(); ?>users_comision/dash_calendario/calendario_form" >Tarifario</a></li>
            <li><a href="<?php echo base_url(); ?>users_comision/dash_reservas/lists">Reservas</a></li>
        </ul>
    </div>
</div>
<!-- End sub nav -->
<!-- Status bar -->
<div id="status-bar"><div class="container_12">
        <ul id="status-infos">
            <li class="spaced">Bienvenido <strong><?php echo ucfirst($Usuario )?>
                
                </strong>
            </li>
            <li><a href="<?php echo base_url() ?>users_comision/dash_login/salir" class="button red" title="Logout"><span class="smaller">SALIR</span></a></li>
        </ul>
        <ul id="breadcrumb">
            <li><a href="<?php echo base_url(); ?>users/dash" title="Dashboard">Dashboard</a></li>
        </ul>
    </div>
</div>
<!-- End status bar -->

<div id="header-shadow"></div>
<!-- End header -->