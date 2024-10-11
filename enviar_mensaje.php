<?php
require_once 'vendor/autoload.php';

use TelegramBot\Api\BotApi;

// Aca se carga el json
$directory = 'setting.json';
$directoryData = json_decode(file_get_contents($directory));

// Aca se crean las variables de entorno
$git =  $directoryData->git;
$telegram = $directoryData->telegram;
$git_url=$git[0];
$token=$git[1];
$TOKEN_BOT=$telegram[0];
$ID_DE_TU_CHAT=$telegram[1];

// Ejecusion del pull
shell_exec('git remote remove origin');
shell_exec('git remote add origin https://github.com/'.$git_url.'.git');
$contenido = shell_exec('git pull https://'.$token.'@github.com/'.$git_url.'.git');

$fecha_hora = date('Y-m-d H:i:s');
$text = '[' . $fecha_hora . '] ' .
    'Actualizacion ejecutada!' . "\n\n" .
    $contenido;

// Envio de notificacion via telegram
// Aca se crea el objeto
$telegram = new BotApi($TOKEN_BOT);

// Aca se envia el mensaje
$telegram->sendMessage(
    $ID_DE_TU_CHAT, // Reemplaza con el ID de tu chat
    $text,
);

