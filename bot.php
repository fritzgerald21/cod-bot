<?php

include 'cod-api/class.CodAPI.php';
include 'config.php';
include 'cod-api/players.php';


$call= new CodAPI;
$stats= $call->getStats($players[0], 'bo4', 'xbl');


$messages['weekly_stats']= $stats['user']['username'].' kills: '. $stats['stats']['kills'];

// Data in JSON format
$data = array(
    'bot_id' => $config['bot_id'],
    'text' => $messages['weekly_stats']
);
 

$payload = json_encode($data);
var_dump('PAYLOAD:');
var_dump($payload);
$curl = curl_init();
curl_setopt($curl, CURLOPT_VERBOSE, true);
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.groupme.com/v3/bots/post",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $payload,
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json",
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
