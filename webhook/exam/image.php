<?php

require "vendor/autoload.php";

use LINE\LINEBot\MessageBuilder\TemplateMessageBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselColumnTemplateBuilder;
use LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder;

$access_token = 'qvQckpPL0EbDkJC1xU3T0sT+sr7MRks2yK48ApMDH8il8ZmyYV9huFBJOdvlVZMa8O0cziiS51ZiUdzRRBJpZQllAgSLN6ln6+YhmaDHWvyDNq/rto0PZbE263pQD5C7x7/F2JZqA0Dcib0fOFJTIQdB04t89/1O/w1cDnyilFU=';
$channelSecret = '234c26728e0c47f150cbf4ed83de57de';
$idPush = 'Cee67dd9c9ed8717f9abe5cc8aa0d05bc';
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$replyData = new TemplateMessageBuilder('Image Carousel',
        new ImageCarouselTemplateBuilder(
            array(
                new ImageCarouselColumnTemplateBuilder(
                    'https://simple-line-bot-test-api.herokuapp.com/webhook/exam/sample.jpg',
                    new UriTemplateActionBuilder(
                        'https://ligaz888club.com'
                    )
                ),                       
            )
        )
    );

$response = $bot->pushMessage($idPush, $replyData);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();