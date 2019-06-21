<?php

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//rror_reporting(E_ALL);
 
require_once 'vendor/autoload.php';
 
require_once 'bot_setting.php';

use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use LINE\LINEBot\MessageBuilder\ImageMessageBuilder;
use LINE\LINEBot\MessageBuilder\LocationMessageBuilder;
use LINE\LINEBot\MessageBuilder\MultiMessageBuilder;
use LINE\LINEBot;

$idPush = 'U433d8f17c86125016456c828eecb4381';

$httpClient = new CurlHTTPClient(LINE_MESSAGE_ACCESS_TOKEN);
$bot = new LINEBot($httpClient, array('channelSecret' => LINE_MESSAGE_CHANNEL_SECRET));

$textReplyMessage = "Hi";
$textMessage = new TextMessageBuilder($textReplyMessage);

$picFullSize = 'https://simple-line-bot-test-api.herokuapp.com/webhook/exam/sample.jpg';
$picThumbnail = 'https://simple-line-bot-test-api.herokuapp.com/webhook/exam/sample.jpg';
$imageMessage = new ImageMessageBuilder($picFullSize,$picThumbnail);

$placeName = "ที่ตั้งร้าน";
$placeAddress = "แขวง พลับพลา เขต วังทองหลาง กรุงเทพมหานคร ประเทศไทย";
$latitude = 13.780401863217657;
$longitude = 100.61141967773438;
$locationMessage = new LocationMessageBuilder($placeName, $placeAddress, $latitude ,$longitude);        

$multiMessage =     new MultiMessageBuilder;
$multiMessage->add($textMessage);
$multiMessage->add($imageMessage);
$multiMessage->add($locationMessage);
$replyData = $multiMessage;

$response = $bot->pushMessage($idPush, $textMessageBuilder);