<?php
require_once 'vendor/autoload.php';

use TelegramBot\Api\BotApi;

$directory = 'setting.json';
$directoryData = json_decode(file_get_contents($directory));
$telegram = $directoryData->telegram;

$TU_TOKEN_BOT=$telegram[0];
$ID_DE_TU_CHAT=$telegram[1];
$fecha_hora = date('Y-m-d H:i:s');
$text = '[' . $fecha_hora . '] ' . 
    'Actualizacon ejecutada!';

// Reemplaza 'TU_TOKEN_BOT' con tu token real
$telegram = new BotApi($TU_TOKEN_BOT);

// Envía un mensaje a tu chat
$telegram->sendMessage(
    $ID_DE_TU_CHAT, // Reemplaza con el ID de tu chat
    $text,
);

