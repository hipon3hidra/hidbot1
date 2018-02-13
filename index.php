<?php

use Telegram\Bot\Commands\Command;
use Telegram\Bot\Keyboard\Keyboard;

$telegram = new Telegram\Bot\Api('MY_KEY'); 

$update = $telegram->getWebhookUpdates();

// данные сообщения в зависимости от callback_query
if ( isset($this->update['callback_query'])) {
    $message = $update['callback_query'];
} else {
    $message = $update;
}

$chatId = $message['message']['chat']['id'];

// правильно формируем клавиатуру:
$keyboard = [
    [
        Keyboard::inlineButton(['callback_data'=>'/butt1','text'=>'Кнопка 1']),
        Keyboard::inlineButton(['callback_data'=>'/buut2','text'=>'Кнопка 2'])
    ]
];

$reply_markup = $telegram->replyKeyboardMarkup([ 
    // 'keyboard' => $keyboard, // вместо этого используем:
    'inline_keyboard' => $keyboard,
    'resize_keyboard' => true, 
    'one_time_keyboard' => false 
]);


// если нажали кнопку:
if ( isset($this->update['callback_query'])) {
  $telegram->sendMessage(array(
    'chat_id' => $chatId,
      'text' => "Вы нажали на кнопку с кодом: " . $message['data'], // именно в $message['data'] - будет то что прописано у нажатой кнопки в качестве callback_data
      'reply_markup' => $reply_markup,
  ));
} else {
  $telegram->sendMessage(array(
    'chat_id' => $chatId,
      'text' => 'Нажмите на одну из кнопок:',
      'reply_markup' => $reply_markup,
  ));
}

