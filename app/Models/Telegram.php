<?php


namespace App\Models;


use GuzzleHttp\Client;

class Telegram
{
    public static function sendMessage($message)
    {

        $client = new Client();
        $res = $client->request('GET', 'https://api.telegram.org/bot723843188:AAEknvp7s0UVvGLmil2PTB9aQPaqIYzVq7k/sendMessage?chat_id=616711612&text='.$message, [
            'form_params' => [
                'client_id' => 'test_id',
                'secret' => 'test_secret',
            ]
        ]);

    }
}