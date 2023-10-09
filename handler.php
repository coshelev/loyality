<?php

$inputStream 	= file_get_contents("php://input");
//file_put_contents ("koshelev_handler.txt", $inputStream, FILE_APPEND);

$site	= 'coshelev.ru';		// for Agr
$phone	= '9506080027';
//$extra	= sprintf('{"Subject":"%s", "type":"%s", "question1":"%s", "question2":"%s", "message":"%s", "client":"%s", "pos":"%s" }', $Subject, $type, $question1, $author, $message, $client, $pos);

$extra = json_decode($inputStream);

//variant1 - xml
//--------------
$data = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?> <request> <phone>'.$phone.'</phone><site>'.$site.'</site> <extra>'.$extra.'</extra> </request>';
//file_put_contents ("koshelev_handler.txt", $data, FILE_APPEND);
$url = 'http://mainappl.main.luidorauto.ru/sys_agr/hs/webhooks/callback/v1';

//variant2 - json
//--------------
$data = $extra;
//file_put_contents ("koshelev_handler.txt", $data, FILE_APPEND);
$url = 'http://mainappl.main.luidorauto.ru/sys_agr/hs/webhooks/anypost/v1';

$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,		$url);
curl_setopt($ch,CURLOPT_POST, 		true);
curl_setopt($ch,CURLOPT_POSTFIELDS, 	$data);
$result = curl_exec($ch);
?>
