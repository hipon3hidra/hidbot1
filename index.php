<?php
/**
 * revcom_bot
 *
 * @author - Александр Штокман
 */
header('Content-Type: text/html; charset=utf-8');
// подрубаем API
require_once("vendor/autoload.php");

// дебаг
if(true){
	error_reporting(E_ALL & ~(E_NOTICE | E_USER_NOTICE | E_DEPRECATED));
	ini_set('display_errors', 1);
}

// создаем переменную бота
$token = "497644667:AAFYZE9znyLxdFez4tSD70RU1c-WMpGz-sk";
$bot = new \TelegramBot\Api\Client($token,null);

if($_GET["bname"] == "Hihihidra"){
	$bot->sendMessage("@hihihihidra_bot", "Тест");
}

// если бот еще не зарегистрирован - регистируем
if(!file_exists("registered.trigger")){ 
	/**
	 * файл registered.trigger будет создаваться после регистрации бота. 
	 * если этого файла нет значит бот не зарегистрирован 
	 */
	 
	// URl текущей страницы
	$page_url = "https://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	$result = $bot->setWebhook($page_url);
	if($result){
		file_put_contents("registered.trigger",time()); // создаем файл дабы прекратить повторные регистрации
	} else die("ошибка регистрации");
}

// Команды бота
// пинг. Тестовая
$bot->command('ping', function ($message) use ($bot) {
	$bot->sendMessage($message->getChat()->getId(), 'pong!');
});

// обязательное. Запуск бота
$bot->command('start', function ($message) use ($bot) {
    $answer = 'Добро пожаловать!';
    $bot->sendMessage($message->getChat()->getId(), $answer);
});

// помощ
$bot->command('help', function ($message) use ($bot) {
    $answer = 'Команды:
/help - помощ';
    $bot->sendMessage($message->getChat()->getId(), $answer);
});

// передаем картинку
$bot->command('getpic', function ($message) use ($bot) {
	$pic = "http://aftamat4ik.ru/wp-content/uploads/2017/03/photo_2016-12-13_23-21-07.jpg";

    $bot->sendPhoto($message->getChat()->getId(), $pic);
});

// передаем документ
$bot->command('getdoc', function ($message) use ($bot) {
	$document = new \CURLFile('shtirner.txt');

    $bot->sendDocument($message->getChat()->getId(), $document);
});

// Кнопки у сообщений
$bot->command("ibutton", function ($message) use ($bot) {
	$keyboard = new \TelegramBot\Api\Types\Inline\InlineKeyboardMarkup(
		[
			[
				['callback_data' => 'data_test', 'text' => 'Answer'],
				['callback_data' => 'data_test2', 'text' => 'ОтветЪ']
			]
		]
	);

	$bot->sendMessage($message->getChat()->getId(), "тест", false, null,null,$keyboard);
});

// Обработка кнопок у сообщений
$bot->on(function($update) use ($bot, $callback_loc, $find_command){
	$callback = $update->getCallbackQuery();
	$message = $callback->getMessage();
	$chatId = $message->getChat()->getId();
	$data = $callback->getData();
	
	if($data == "data_test"){
		$bot->answerCallbackQuery( $callback->getId(), "This is Ansver!",true);
	}
	if($data == "data_test2"){
		$bot->sendMessage($chatId, "Это ответ!");
		$bot->answerCallbackQuery($callback->getId()); // можно отослать пустое, чтобы просто убрать "часики" на кнопке
	}

}, function($update){
	$callback = $update->getCallbackQuery();
	if (is_null($callback) || !strlen($callback->getData()))
		return false;
	return true;
});



// Reply-Кнопки
$bot->command("buttons", function ($message) use ($bot) {
	$keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup([[["text1" => "Красноярск!"], ["text2" => "Москва!"]]], true, true);

	$bot->sendMessage($message->getChat()->getId(), "Выберите город", false, null,null, $keyboard);







// Отлов любых сообщений + обрабтка reply-кнопок
$bot->on(function($Update) use ($bot){
	
	$message = $Update->getMessage();
	$mtext = $message->getText();
	$cid = $message->getChat()->getId();
	
	if(mb_stripos($mtext,"text1") !== false){
		$pic = "http://aftamat4ik.ru/wp-content/uploads/2017/05/14277366494961.jpg";

		$bot->sendPhoto($message->getChat()->getId(), $pic);
	}
	if(mb_stripos($mtext,"text2") !== false){
		$bot->sendMessage($message->getChat()->getId(), "Отлично, вы выбрали Москву! Теперь выбирете категорию");
	}
}, function($message) use ($name){
	return true; // когда тут true - команда проходит
});


});



// запускаем обработку
$bot->run();

echo "бот";
