<?php

namespace App\Http\Controllers;
use TelegramBot\Api\BotApi;
use Illuminate\Http\Request;

class MsgController extends Controller
{
    public function __construct()
    {
        $this->directory        = 'F:/pruebas/msgtest/setting.json';
        $directoryData          = json_decode(file_get_contents($this->directory));

        $this->telegram         = $directoryData->telegram;

        $fecha_hora = date('Y-m-d H:i:s');
        $this->text = '[' . $fecha_hora . '] ' . 
            'Hola desde laravel!'
            ;
    }

    public function home()
    {
        return view('layouts.base');
    }

    public function telegramhandle()
    {
        // Define las claves
        $api_key = $this->telegram[0];
        $id = $this->telegram[1];
        
        // Construye el objeto
        $telegram = new BotApi($api_key);
        
        // Define los parametros
        $chatId = $id;
        $text = $this->text;

        // Envia un mensaje
        $telegram->sendMessage(
            $chatId,
            $text,
        );

        return redirect()->route('home');  

    }

}
