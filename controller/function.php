<?php
if($_POST && isset($_POST["credential"]) && $_POST["g_csrf_token"] === $_COOKIE["g_csrf_token"]){
    // Traitement de la connexion avec Google
    var_dump('connexion avec google');
    $jwt = $_POST["credential"];
    list($headerEncoded, $payloadEncoded, $signatureEncoded) = explode('.', $jwt);
         $header = json_decode(base64_decode($headerEncoded), true);
         var_dump($header, 'header');
         $payload = json_decode(base64_decode($payloadEncoded), true);
         var_dump($payload, 'payload');
         $signature = base64_decode(strtr($signatureEncoded, '-_', '+/'));
         
    exit;
}