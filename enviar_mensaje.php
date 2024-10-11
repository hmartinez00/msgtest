<?php
require_once 'vendor/autoload.php';

use TelegramBot\Api\BotApi;

$ruta_archivo = 'output.text';
$contenido = file_get_contents($ruta_archivo);

$directory = 'setting.json';
$directoryData = json_decode(file_get_contents($directory));
$telegram = $directoryData->telegram;

$TU_TOKEN_BOT=$telegram[0];
$ID_DE_TU_CHAT=$telegram[1];
$fecha_hora = date('Y-m-d H:i:s');
$text = '[' . $fecha_hora . '] ' .
    'Actualizacion ejecutada!' . "\n\n" .
    $contenido
    ;

// Reemplaza 'TU_TOKEN_BOT' con tu token real
$telegram = new BotApi($TU_TOKEN_BOT);

// Envía un mensaje a tu chat
$telegram->sendMessage(
    $ID_DE_TU_CHAT, // Reemplaza con el ID de tu chat
    $text,
);

$git_log = shell_exec('git log');

echo $git_log;

