<?php
require '../vendor/autoload.php';
use \Twilio\Rest\Client;

if (!empty($_POST) ){
    // Get form input
    $userPhone = $_POST['userPhone'];
    $encodedSalesPhone = urlencode($_POST['salesPhone']);
    // Set URL for outbound call - this should be your public server URL
    $host = $_SERVER['HTTP_HOST'];

    // Create authenticated REST client using account credentials in
    // <project root dir>/.env.php
    $client = new Client(
        getenv('TWILIO_ACCOUNT_SID'),
        getenv('TWILIO_AUTH_TOKEN')
    );

    $outboundUri = "http://$host/outbound.php?sales_phone=$encodedSalesPhone";

    try {
        $client->calls->create(
            $userPhone, // The visitor's phone number
            getenv('TWILIO_NUMBER'), // A Twilio number in your account
            array(
                "url" => $outboundUri
            )
        );
    } catch (Exception $e) {
        // Failed calls will throw
        echo $e;
    }

    print_r('Call Incoming !');
}
