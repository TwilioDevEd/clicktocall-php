<?php
use PHPUnit\Framework\TestCase;
use Twilio\Rest\Client;


class ClickToCallTest extends TestCase
{
    protected function setUp(): void
    {
        $this->setOutputCallback(function() {});
    }

    public function tearDown(): void
    {
        Mockery::close();
    }

    public function testOutboundResponse()
    {
        include('./src/outbound.php');
        $outbound_response = generate_twiml_response();
        $this->assertXmlStringEqualsXmlString('<?xml version="1.0" encoding="UTF-8"?>' .
            '<Response><Say>Thanks for contacting our sales department. Our next available representative ' .
            'will take your call</Say></Response>', $outbound_response);
    }

    public function testCall()
    {
        $outboundUri = 'http://localhost/outbound.php?sales_phone=SALES_PHONE';


        include('./src/call.php');
        $mockClient = Mockery::mock(Client::class)->makePartial();
        $mockCalls = Mockery::mock();
        $mockClient->calls = $mockCalls;

        $mockCalls
            ->shouldReceive('create')
            ->with(
                'MY_PHONE',
                'TEST_TWILIO_NUMER',
                array(
                    'url' => $outboundUri,
                )
            )
            ->once();

        $call_response = twilio_create_call($mockClient, 'MY_PHONE', 'TEST_TWILIO_NUMER', 'SALES_PHONE', 'localhost');
        $this->assertEquals('Call Incoming !', $call_response);
    }
}
