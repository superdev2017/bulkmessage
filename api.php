<?php

/*
// initialize variable

$txt_phone = @$_POST["phone"];
$txt_message = @$_POST["message"];
require_once 'HTTP/Request.php';
$request = new HTTP_Request();

$apiKey = 'sm8c6bdbf78d6c49e38a4f7432cd1f05df';

$request->setUrl('http://api.onehop.co/v1/sms/send/');
$request->setMethod(HTTP_REQUEST_METHOD_GET);

$request->addQueryString('mobile_number',$txt_phone);
$request->addQueryString('sms_text',$txt_message);
$request->addQueryString('label','og-100157-one-way');
$request->addQueryString('sender_id','gssdfdsfds');
//$request->addQueryString('source','1001');
$request->addQueryString('encoding',array(
    'plaintext',
    'unicode'
));


$request->addHeader('cache-control','no-cache');
$request->addHeader('apikey','sm8c6bdbf78d6c49e38a4f7432cd1f05df');


try {
    $response = $request->sendRequest();
    echo $request->getResponseBody();

    sleep(2);
} catch (HttpException $ex) {
    echo $ex;
}
*/

sleep(2);
echo "success";