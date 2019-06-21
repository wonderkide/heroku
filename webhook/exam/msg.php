<?php

require "vendor/autoload.php";
$access_token = 'qvQckpPL0EbDkJC1xU3T0sT+sr7MRks2yK48ApMDH8il8ZmyYV9huFBJOdvlVZMa8O0cziiS51ZiUdzRRBJpZQllAgSLN6ln6+YhmaDHWvyDNq/rto0PZbE263pQD5C7x7/F2JZqA0Dcib0fOFJTIQdB04t89/1O/w1cDnyilFU=';
$channelSecret = '234c26728e0c47f150cbf4ed83de57de';
$idPush = 'U433d8f17c86125016456c828eecb4381';
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);
//$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
//$response = $bot->pushMessage($idPush, $textMessageBuilder);

$actionBuilder = array(
        new \LINE\LINEBot\TemplateActionBuilder\MessageTemplateActionBuilder(
            'Message Template',// ข้อความแสดงในปุ่ม
            'This is Text' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
        ),
        new \LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder(
            'Uri Template', // ข้อความแสดงในปุ่ม
            'https://www.ninenik.com'
        ),
        new \LINE\LINEBot\TemplateActionBuilder\DatetimePickerTemplateActionBuilder(
            'Datetime Picker', // ข้อความแสดงในปุ่ม
            http_build_query(array(
                'action'=>'reservation',
                'person'=>5
            )), // ข้อมูลที่จะส่งไปใน webhook ผ่าน postback event
            'datetime', // date | time | datetime รูปแบบข้อมูลที่จะส่ง ในที่นี้ใช้ datatime
            substr_replace(date("Y-m-d H:i"),'T',10,1), // วันที่ เวลา ค่าเริ่มต้นที่ถูกเลือก
            substr_replace(date("Y-m-d H:i",strtotime("+5 day")),'T',10,1), //วันที่ เวลา มากสุดที่เลือกได้
            substr_replace(date("Y-m-d H:i"),'T',10,1) //วันที่ เวลา น้อยสุดที่เลือกได้
        ),      
        new \LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder(
            'Postback', // ข้อความแสดงในปุ่ม
            http_build_query(array(
                'action'=>'buy',
                'item'=>100
            )), // ข้อมูลที่จะส่งไปใน webhook ผ่าน postback event
            'Postback Text'  // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
        ),      
    );
    $imageUrl = 'https://www.mywebsite.com/imgsrc/photos/w/simpleflower';
    $replyData = new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder('Button Template',
        new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ButtonTemplateBuilder(
                'button template builder', // กำหนดหัวเรื่อง
                'Please select', // กำหนดรายละเอียด
                $imageUrl, // กำหนด url รุปภาพ
                $actionBuilder  // กำหนด action object
        )
    );
$response = $bot->pushMessage($idPush, $replyData);