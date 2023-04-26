<?php

namespace App\Services;

use Twilio\Rest\Client;

class SendSms{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function sendSMS($to, $message)
    {
        // Récupérer les informations d'identification Twilio depuis le fichier de configuration ou des variables d'environnement
        $account_sid = 'AC18f0474fed3312dea0aabb4161679485';
        $auth_token = '2fe4a4c730de99f6d64f31fc6b5b74c0';
        $twilio_number = '+12763303738';

        // Envoyer le SMS
        $message = $this->client->messages->create(
            $to,
            array(
                'from' => $twilio_number,
                'body' => $message
            )
        );

        // Retourner le SID du message Twilio
        return $message->sid;
    }



}