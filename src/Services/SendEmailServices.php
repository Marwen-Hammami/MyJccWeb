<?php

namespace App\Service;

use Twilio\Rest\Client;

class SendEmailServices
{
    public function sendSms($toNumber, $message)
    {
        // Utilisez le client Twilio pour envoyer un SMS
        $accountSid = "AC18f0474fed3312dea0aabb4161679485";
        $authToken = "2fe4a4c730de99f6d64f31fc6b5b74c0";
        $twilioNumber="+12763303738" ;
        $twilio = new Client($accountSid,$authToken); 

        $message = $twilio->messages->create(
            $toNumber,
            array(
                'from' => $twilioNumber,
                'body' => $message
            )
        );
    }

}