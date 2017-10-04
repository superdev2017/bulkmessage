<?php

require_once 'HTTP/Request.php';
$request = new HTTP_Request();

$apiKey = 'sm8c6bdbf78d6c49e38a4f7432cd1f05df';

$request->setUrl('http://api.onehop.co/v1/sms/send/');
$request->setMethod(HTTP_REQUEST_METHOD_GET);

$request->addQueryString('mobile_number','13852135544');
$request->addQueryString('sms_text','Hi, This is test message!!!!!!!!!!!!!!!!!!!!1');
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
} catch (HttpException $ex) {
  echo $ex;
}

/*
$request->setUrl('http://api.onehop.co/v1/labels/');
$request->setMethod(HTTP_REQUEST_METHOD_GET);
$request->addHeader('cache-control','no-cache');
$request->addHeader('apikey','sm8c6bdbf78d6c49e38a4f7432cd1f05df');
try {
  echo $request->sendRequest();
  echo $request->getResponseBody();
} catch (HttpException $ex) {
  echo $ex;
}
*/



//curl -X GET -H "apiKey: sme1caf1bd2c78471ebcebf6aa354b7973" "http://api.onehop.co/v1/labels/"