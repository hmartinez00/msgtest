<?php

require __DIR__ . '/vendor/autoload.php';

use Illuminate\Foundation\Application;
use Illuminate\Encryption\Encrypter;

// Carga la aplicación Laravel
$app = new Application(__DIR__);
$app->loadEnvironmentFrom('.env');

// Obtiene la clave de cifrado desde la configuración
$key = $app->config->get('app.key');

echo $key;

// // Crea una instancia de Encrypter
// $encrypter = new Encrypter($key);

// // Encripta un valor
// $encryptedValue = $encrypter->encrypt('alpha');

// echo $encryptedValue;