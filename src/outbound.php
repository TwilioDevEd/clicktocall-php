<?php
require '../vendor/autoload.php';
use \Twilio\Twiml;

$queryArgs = array();
parse_str($_SERVER['QUERY_STRING'], $queryArgs);

$salesPhone = $queryArgs['sales_phone'];

$twiml = new Twiml();
$twiml->say('Thanks for contacting our sales department. Our next available
representative will take your call');

$twiml->dial($salesPhone);

print_r((string)$twiml);
