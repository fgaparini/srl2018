<!-- Header -->
<!-- Server status -->
<header>
    <div class="container_12">
        <p id="skin-name"><small>San Rafael Late<br> Clientes</small> <strong>1.0</strong></p>
        <div class="server-info">SOPORTE: 0260 4540127</div>
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
            <li class="current" ><a href="<?php echo base_url(); ?>users/dash" title="Dashboard- Home Admin">Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>users/dash/perfil" title="Editar su Perfil de ususario">Perfil</a></li>
            <li><a href="<?php echo base_url(); ?>users/dash/edit_info" title="Editar la Info de su Alojamiento">Info Alojamiento</a></li>
            <li><a href="<?php echo base_url(); ?>users/dash/editar/servicios/" title="Agregue o elimine Servicios a su Alojamiento">Servicios</a></li>
            <li><a href="<?php echo base_url(); ?>users/dash/editar/fotos/" title="agregue o elimine Fotografias de Su Alojamiento">Fotos</a></li>
        </ul>
    </div>
</div>
<!-- End sub nav -->
<!-- Status bar -->
<div id="status-bar"><div class="container_12">
        <ul id="status-infos">
            <li class="spaced">Bienvenido <strong><?php echo $Usuario . ", "; ?>
                    <?php echo $namealojar['Nombre']; ?>
                </strong>
            </li>
            <li><a href="<?php echo base_url() ?>users/login_user/salir" class="button red" title="Logout"><span class="smaller">SALIR</span></a></li>
        </ul>
        <ul id="breadcrumb">
            <li><a href="<?php echo base_url(); ?>users/dash" title="Dashboard">Dashboard</a></li>
        </ul>
    </div>
</div>
<!-- End status bar -->

<div id="header-shadow"></div>
<!-- End header -->