<?php 
$a = $this->session->userdata('logged_in');
$usuario=$a['Usuario'];
?>
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="#">sanrafaelLate</a>
            <div class="nav-collapse collapse">
                <div class="btn-group pull-right">
                    <a class="btn btn-primary" href="#"><i class="icon-user icon-white"></i><?php echo $usuario ?></a>
                    <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url() ?>user/login_user/salir"><i class="icon-ban-circle"></i>Salir</a></li>
                    </ul>
                </div>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>