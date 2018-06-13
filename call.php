<?php
require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;

// Your Account SID and Auth Token from twilio.com/console
$account_sid = 'AC576ad95382ee2920d2a6e2a3298ed312';
$auth_token = '06f479cd45d8a90d33197816084390bb';
// In production, these should be environment variables. E.g.:
// $auth_token = $_ENV["TWILIO_ACCOUNT_SID"]

// A Twilio number you own with SMS capabilities
$twilio_number = "+12109413895 ";

// Where to make a voice call (your cell phone?)
$destNum = $_POST["targetNumber"];
$to_number = $destNum;
echo $twilio_number;
echo $to_number;

$client = new Client($account_sid, $auth_token);
try {
    $call = $client->account->calls->create(  
        $to_number,
        $twilio_number,
        array(
            "url" => "http://demo.twilio.com/docs/voice.xml"
        )
    );
    echo "Started call: ". $call->sid;
} catch (Exception $e){
    echo "Error: ". $e->getMessage();
}
