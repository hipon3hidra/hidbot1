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
    $inline_button1 = array("text"=>"Москва","url"=>"http://google.com");
    $inline_button2 = array("text"=>"Красноярск","callback_data"=>'/plz');
    $inline_button3 = array("text"=>"Новосибирск", "callback_data"=>'/nsk');
	
    $inline_keyboard = [[$inline_button1,$inline_button2, $inline_button3]];
    $keyboard=array("inline_keyboard"=>$inline_keyboard);
    $replyMarkup = json_encode($keyboard); 
     
     sendMessage($chat_id, "Добро пожаловать! Выберите город", $replyMarkup);
    break;
}
switch($data){
    case '/nsk':
    sendMessage($chat_id_in, "/nsk", $replyMarkup);
    break;
}
switch($data){
    case '/plz':
    sendMessage($chat_id_in, "/plz", $replyMarkup);
    break;
}

switch($message) {

    case '/nsk':  
    $inline_button1 = array("text"=>"Косметика","callback_data"=>'/kosmo');
    $inline_button2 = array("text"=>"Алкоголь","callback_data"=>'/alco');
    $inline_button3 = array("text"=>"Чешуя", "callback_data"=>'/cheshuya');
	
    $inline_keyboard = [[$inline_button1,$inline_button2, $inline_button3]];
    $keyboard=array("inline_keyboard"=>$inline_keyboard);
    $replyMarkup = json_encode($keyboard); 
     
     sendMessage($chat_id, "Вы выбрали город Новосибирск! Выберите категорию:", $replyMarkup);
    break;
}
switch($data){
    case '/kosmo':
    sendMessage($chat_id_in, "/kosmo", $replyMarkup);
    break;
}



function sendMessage($chat_id, $message, $replyMarkup) {
  file_get_contents($GLOBALS['api'] . '/sendMessage?chat_id=' . $chat_id . '&text=' . urlencode($message) . '&reply_markup=' . $replyMarkup);
}
