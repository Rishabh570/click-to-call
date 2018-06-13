<?php
require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;

// Your Account SID and Auth Token from twilio.com/console
$account_sid = 'AC46ab99cc43af89e7ba40b15dd34f24fe';
$auth_token = '9d8704102601b3df26b4ee5eac4df919';
// In production, these should be environment variables. E.g.:
// $auth_token = $_ENV["TWILIO_ACCOUNT_SID"]

// A Twilio number you own with SMS capabilities
$twilio_number = "+14158786844";

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
