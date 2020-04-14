<?php
use PHPUnit\Framework\TestCase;

function get_include_contents($filename)
{
    if (is_file($filename)) {
        ob_start();
        include $filename;
        return ob_get_clean();
    }
    return false;
}


class ClickToCallTest extends TestCase
{
    public function testOutboundResponse()
    {
        $outbound_response = get_include_contents('./src/outbound.php');
        $this->assertXmlStringEqualsXmlString('<?xml version="1.0" encoding="UTF-8"?>' .
            '<Response><Say>Thanks for contacting our sales department. Our next available representative ' .
            'will take your call</Say></Response>', $outbound_response);
    }
}
