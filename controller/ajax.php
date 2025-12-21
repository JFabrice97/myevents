<?php
require '../vendor/autoload.php';

use Model\ConnectionBdd;
use Model\Utilisateur;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

var_dump(' get ', $_GET, ' post ', $_POST);
$action = $_GET['action'] ?? '';
$bdd = ConnectionBdd::connecter();

var_dump($_POST, $_GET, 'sds');
switch($action){
    case 'get':
        $url = $_GET['url'] ?? '';
        if ($url) {
            $response = file_get_contents($url);
            echo $response;
        } else {
            echo json_encode(['error' => 'No URL provided']);
        }
        break;

    case 'save_user_data':
        $user_data = $_GET['data'] ?? '';
        if (empty($user_data)) {
            echo json_encode(['error' => 'User data is required']);
            exit;
        }
        $jwt = $user_data;
        var_dump($jwt, 'jwt');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://oauth2.googleapis.com/tokeninfo?id_token='.$jwt);
        $res = curl_exec($ch);
        curl_close($ch);
        var_dump($res, 'res');

        // list($headerEncoded, $payloadEncoded, $signatureEncoded) = explode('.', $jwt);
        // $header = json_decode(base64_decode($headerEncoded), true);
        // var_dump($header, 'header');
        // $payload = json_decode(base64_decode($payloadEncoded), true);
        // var_dump($payload, 'payload');
        // $signature = base64_decode(strtr($signatureEncoded, '-_', '+/'));
        // // var_dump($signature, 'signature');
        // $kid = $header['kid'];
        // $jwks = json_decode(file_get_contents('https://oauth2.googleapis.com/tokeninfo?id_token=XYZ123'), true);
        // if (!$jwks || !isset($jwks['keys'])) {
        //     echo json_encode([
        //             'error' => 'Failed to retrieve JWKS', 
        //             "status" => 500, 
        //             "message" => utf8_encode("La connexion de google a échoué, veuillez réessayer à nouveau."),
        //         ]);
        //     exit;
        // }
        $publicKey = null;
        print_r($jwks);
        // foreach ($jwks['keys'] as $key) {
        //     if ($key['kid'] === $kid) {
        //         $publicKey = "-----BEGIN CERTIFICATE-----\n" .
        //                     chunk_split($key['x5c'][0], 64, "\n") .
        //                     "-----END CERTIFICATE-----\n";
        //         break;
        //     }
        // }
        
        // try {
        //     $decoded = JWT::decode($jwt, new Key($publicKey, 'RS256'));
        //     print_r($decoded); // Le contenu du token
        // } catch (Exception $e) {
        //     echo 'Échec de la vérification : ' . $e->getMessage();
        // }

        break;

    default:
        echo json_encode(['error' => 'Invalid action']);
        break;
}