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
$request->addQueryString('sender_id','TestSender!!!!');
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


sleep(5);
echo "success3333";
*/


include('Requests.php');
Requests::register_autoloader();


if (!function_exists('http_build_query')) {
    if (!defined('PHP_QUERY_RFC1738')) {
        define('PHP_QUERY_RFC1738', 1);
    }
    if (!defined('PHP_QUERY_RFC3986')) {
        define('PHP_QUERY_RFC3986', 2);
    }
    function http_build_query($query_data, $numeric_prefix = '', $arg_separator = '&', $enc_type = PHP_QUERY_RFC1738)
    {
        $data = array();
        foreach ($query_data as $key => $value) {
            if (is_numeric($key)) {
                $key = $numeric_prefix . $key;
            }
            if (is_scalar($value)) {
                $k = $enc_type == PHP_QUERY_RFC3986 ? urlencode($key) : rawurlencode($key);
                $v = $enc_type == PHP_QUERY_RFC3986 ? urlencode($value) : rawurlencode($value);
                $data[] = "$k=$v";
            } else {
                foreach ($value as $sub_k => $val) {
                    $k = "$key[$sub_k]";
                    $k = $enc_type == PHP_QUERY_RFC3986 ? urlencode($k) : rawurlencode($k);
                    $v = $enc_type == PHP_QUERY_RFC3986 ? urlencode($val) : rawurlencode($val);
                    $data[] = "$k=$v";
                }
            }
        }
        return implode($arg_separator, $data);
    }
}


$txt_phone = @$_POST["phone"];
$txt_message = @$_POST["message"];
$apiKey = 'sm8c6bdbf78d6c49e38a4f7432cd1f05df';
$url = "http://api.onehop.co/v1/sms/send?";
$headers = array("cache-control" => "no-cache", "apikey" => $apiKey);
$data = array('mobile_number' => $txt_phone, 
	'sms_text' => $txt_message, 
	'label' => 'og-100157-one-way',
	'sender_id' => 'TestSender!!!!', 
	'encoding' => array(
    	'plaintext',
    	'unicode'
	));
$query = http_build_query($data);

echo $query;
try {

	$request = Requests::get($url . $query, $headers);
	//$request = Requests::get('http://httpbin.org/get', array('Accept' => 'application/json'));
	var_dump($request);
    sleep(2);
} catch (Exception $ex) {
    echo $ex;
}

