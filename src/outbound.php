<?php
require '../vendor/autoload.php';
use Twilio\TwiML\VoiceResponse;

$queryArgs = array();
parse_str($_SERVER['QUERY_STRING'], $queryArgs);

$salesPhone = $queryArgs['sales_phone'];

$response = new VoiceResponse();
$response->say('Thanks for contacting our sales department. Our next available
representative will take your call');
// Uncomment this code and replace the number with the number you want
// your customers to call.
// $response->dial($salesPhone);

print_r((string)$response);
?>
