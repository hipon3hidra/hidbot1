<?php
$access_token = '497644667:AAFYZE9znyLxdFez4tSD70RU1c-WMpGz-sk';
$api = 'https://api.telegram.org/bot' . $access_token;
$output = json_decode(file_get_contents('php://input'), TRUE);
$chat_id = $output['message']['chat']['id'];
$message = $output['message']['text'];
$callback_query = $output['callback_query'];
$data = $callback_query['data'];
$message_id = ['callback_query']['message']['message_id'];
$chat_id_in = $callback_query['message']['chat']['id'];
switch($message) {

    case '/start':  
    $inline_button1 = array("text"=>"Москва", "callback_data"=>'/msk');
    $inline_button2 = array("text"=>"Красноярск","callback_data"=>'/plz');
    $inline_button3 = array("text"=>"Новосибирск", "callback_data"=>'/plz');

    $inline_keyboard = [[$inline_button1,$inline_button2, $inline_button3]];
    $keyboard=array("inline_keyboard"=>$inline_keyboard);
    $replyMarkup = json_encode($keyboard); 
     sendMessage($chat_id, "Добро пожаловать! Выберите город", $replyMarkup);
    break;
}
switch($data){
    case '/msk':
    $inline_button1 = array("text"=>"Стим", "callback_data"=>'/msk');
    $inline_button2 = array("text"=>"Пром","callback_data"=>'/plz');
    $inline_button3 = array("text"=>"Банк", "callback_data"=>'/plz');

    $inline_keyboard = [[$inline_button1,$inline_button2, $inline_button3]];
    $keyboard=array("inline_keyboard"=>$inline_keyboard);
    $replyMarkup = json_encode($keyboard); 
    sendMessage($chat_id, "Отлично, вы выбрали город Москва, выберите категорию", $replyMarkup);
    break;
}

function sendMessage($chat_id, $message, $replyMarkup) {
  file_get_contents($GLOBALS['api'] . '/sendMessage?chat_id=' . $chat_id . '&text=' . urlencode($message) . '&reply_markup=' . $replyMarkup);
}
