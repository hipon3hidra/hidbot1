<?php
header('Content-Type: text/html; charset=utf-8');
// подрубаем API
require_once("vendor/autoload.php");

// создаем переменную бота
$token = "543178842:AAFlEue5eOAMEq3K4fmBHGGLD3wglfX7Gvo";
$bot = new \TelegramBot\Api\Client($token);


// если бот еще не зарегистрирован - регистрируем
if(!file_exists("registe
red.trigger")){ 
	/**
	 * файл registered.trigger будет создаваться после регистрации бота. 
	 * если этого файла нет значит бот не зарегистрирован 
	 */
	 
	// URl текущей страницы
	$page_url = "https://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	$result = $bot->setWebhook($page_url);
	if($result){
		file_put_contents("registered.trigger",time()); // создаем файл дабы прекратить повторные регистрации
	}
}

// обязательное. Запуск бота
$bot->command('start', function ($message) use ($bot) {
    $answer = 'Добро пожаловать!';
    $bot->sendMessage($message->getChat()->getId(), $answer);
});

// помощь
$bot->command('help', function ($message) use ($bot) {
    $answer = 'Команды:
/help - помощь';
    $bot->sendMessage($message->getChat()->getId(), $answer);
});





















// Выбор города
// Reply-Кнопки
$bot->command("buttons", function ($message) use ($bot) {
	$keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup([[["text" => "Красноярск"], ["text" => "Новосибирск"]]], true, true);

	$bot->sendMessage($message->getChat()->getId(), "тест", false, null,null, $keyboard);
});




// Отлов любых сообщений + обработка reply-кнопок
$bot->on(function($Update) use ($bot){
	
	$message = $Update->getMessage();
	$mtext = $message->getText();
	$cid = $message->getChat()->getId();
	
	if(mb_stripos($mtext,"Красноярск") !== false){
		$bot->sendMessage($message->getChat()->getId(), "Вы выбрали город Красноярск, можете выбрать интересующую вас категорию");
	}
	if(mb_stripos($mtext,"Новосибирск") !== false){
		$bot->sendMessage($message->getChat()->getId(), "Вы выбрали город Новосибирск, можете выбрать интересующую вас категорию");
	}
}, function($message) use ($name){
	return true; // когда тут true - команда проходит
});









// запускаем обработку
$bot->run();















