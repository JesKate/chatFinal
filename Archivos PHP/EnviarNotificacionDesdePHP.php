<?php

  ignore_user_abort();
  ob_start();

  $url = 'https://fcm.googleapis.com/fcm/send';

$Token = 'AAAArKSPar0:APA91bEgp9XZpSEXY410e-ZEQ5otnQNGmSyDL1qqpH1ND3YT0SVqhDHqtWNrK8XFmeXeu0RVC2WhRhk_eYAOpYWen5hTQ4IIDhq1iKfcxJrj-A0RMsRgl4a3bdIA7HGXly3iWX4r9Dbr';

  $fields = array('to' => $Token ,
   'notification' => array('body' => 'Bienvenido a nuestra aplicacion', 'title' => 'Chat Pasto'),
   'data' => array('Objetos' => 'Mesa-silla-escritorio'));

  define('GOOGLE_API_KEY', 'AIzaSyBwcw9ub--C0LW0p-JR9GsHjrvP_Yfs8R4');

  $headers = array(
          'Authorization:key='.GOOGLE_API_KEY,
          'Content-Type: application/json'
  );      

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

  $result = curl_exec($ch);
  if($result === false)
    die('Curl failed ' . curl_error());
  curl_close($ch);
  return $result;
?>