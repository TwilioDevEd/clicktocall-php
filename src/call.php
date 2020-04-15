<?php
require __DIR__ . '/../vendor/autoload.php';
use \Twilio\Rest\Client;

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__, 1));
$dotenv->load();

function twilio_create_call($client, $userPhone, $TWILIO_NUMBER, $salesPhone, $host) {
    $encodedSalesPhone = urlencode($salesPhone);
    $outboundUri = "http://$host/outbound.php?sales_phone=$encodedSalesPhone";

    try {
        $client->calls->create(
            $userPhone,                 // The visitor's phone number
            $TWILIO_NUMBER,    // A Twilio number in your account
            array(
                "url" => $outboundUri   // public URL TwiML that handles the call
            )
        );
    } catch (Exception $e) {
        // Failed calls will throw
        return 'ERROR:' . $e;
    }
    return 'Call Incoming !';
}

if (!empty($_POST) ){
    // Create authenticated REST client using account credentials in
    // <project root dir>/.env
    $client = new Client(
        getenv('TWILIO_ACCOUNT_SID'),
        getenv('TWILIO_AUTH_TOKEN')
    );


    // Get form input
    $userPhone = $_POST['userPhone'];
    $TWILIO_NUMBER = getenv('TWILIO_NUMBER');
    $salesPhone = $_POST['salesPhone'];

    // Set URL for outbound call - this should be your public server URL
    $host = $_SERVER['HTTP_HOST'];

    print_r(twilio_create_call($client, $userPhone, $TWILIO_NUMBER, $salesPhone, $host));
}
