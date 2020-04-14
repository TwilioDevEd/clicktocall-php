<?php
require __DIR__ . '/../vendor/autoload.php';

use Twilio\TwiML\VoiceResponse;



$response = new VoiceResponse();
$response->say('Thanks for contacting our sales department. Our next available representative will take your call');

if (array_key_exists('QUERY_STRING', $_SERVER)) {
  $queryArgs = array();
  parse_str($_SERVER['QUERY_STRING'], $queryArgs);
  
  $salesPhone = $queryArgs['sales_phone'];
  // Uncomment this code and replace the number with the number you want
  // your customers to call.
  //$response->dial($salesPhone);
}

print_r((string)$response);
?>
