<?php
require "vendor/autoload.php";
$access_token = 'qvQckpPL0EbDkJC1xU3T0sT+sr7MRks2yK48ApMDH8il8ZmyYV9huFBJOdvlVZMa8O0cziiS51ZiUdzRRBJpZQllAgSLN6ln6+YhmaDHWvyDNq/rto0PZbE263pQD5C7x7/F2JZqA0Dcib0fOFJTIQdB04t89/1O/w1cDnyilFU=';
$channelSecret = '234c26728e0c47f150cbf4ed83de57de';
$idPush = 'C57f74162e12d08a9085753349db78572';
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);
$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($idPush, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();