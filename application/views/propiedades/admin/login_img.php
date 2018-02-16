<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login page - Typica</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Responsive HTML template for Your company">

   <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ?>propiedades-asset/admin/css/bootstrap.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>propiedades-asset/admin/css/bootstrap-responsive.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url() ?>propiedades-asset/css/login_img.css">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le favicon -->
    <link rel="shortcut icon" href="favicon.ico">

  </head>

  <body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
         

          <span style="font-size:18px; margin-left: 100px;">   <img src="<?php echo base_url() ?>propiedades-asset/img/logo.png" style="font-size:18px; margin: 10px;;" alt="Home">Propiedades SRL</span>
        </div>
      </div>
    </div>

    <div class="container">

        <div id="login-wraper">
            <form class="form login-form" method="post" action="<?php echo  base_url().'propiedadessrl/login/verificar' ?>">
                <legend>Ingresar <!-- <span class="blue">Panel de Control</span> --></legend>
            
                <div class="body">
                    <label>Username</label>
                    <input type="text" name="Usuario" id="Usuario"><br>
                    
                    <label>Password</label>
                    <input type="password"name="Clave" id="Clave">
                </div>
            
                <div class="footer">
                    <label class="checkbox inline">
                        <input type="checkbox" id="inlineCheckbox1" value="option1"> Remember me
                    </label>
                                
                    <button type="submit" class="btn btn-success">Login</button>
                </div>
            <input type="hidden" id="baseurl" value="<?php echo base_url() ?>">
            </form>
        </div>

    </div>

    <footer class="white navbar-fixed-bottom">
      Don't have an account yet? <a href="register.html" class="btn btn-black">Register</a>
    </footer>


    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  <script src="<?php echo base_url() ?>propiedades-asset/admin/js/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url() ?>propiedades-asset/admin/js/bootstrap.js"></script>

    <script src="<?php echo base_url() ?>propiedades-asset/js/backstretch.js"></script>
    <script src="<?php echo base_url() ?>propiedades-asset/js/login_img.js"></script>

  </body>
</html>
