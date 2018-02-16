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
$komment = rand(1110,9999);

///Выбор города с помощью текста
switch($message) {

    case 'Москва':  
    $inline_button1 = array("text"=>"Стимуляторы","callback_data"=>'/stim');
    $inline_button2 = array("text"=>"Экстази","callback_data"=>'/ex');
    $inline_button3 = array("text"=>"Марихуана", "callback_data"=>'/mar');
    $inline_button4 = array("text"=>"Назад", "callback_data"=>'/back');	
    $inline_keyboard = [[$inline_button1,$inline_button2, $inline_button3], [$inline_button4]];
    $keyboard=array("inline_keyboard"=>$inline_keyboard);
    $replyMarkup = json_encode($keyboard); 
     
     sendMessage($chat_id, "Вы выбрали город Москва! Выберите категорию:", $replyMarkup);
    break;
    case 'Красноярск':  
    $inline_button1 = array("text"=>"Стимуляторы","callback_data"=>'/stim');
    $inline_button2 = array("text"=>"Экстази","callback_data"=>'/ex');
    $inline_button3 = array("text"=>"Марихуана", "callback_data"=>'/mar');
    $inline_button4 = array("text"=>"Назад", "callback_data"=>'/back');	
    $inline_keyboard = [[$inline_button1,$inline_button2, $inline_button3], [$inline_button4]];
    $keyboard=array("inline_keyboard"=>$inline_keyboard);
    $replyMarkup = json_encode($keyboard); 
     
     sendMessage($chat_id, "Вы выбрали город Красноярск! Выберите категорию:", $replyMarkup);
    break;
    case 'Новосибирск':  
    $inline_button1 = array("text"=>"Стимуляторы","callback_data"=>'/stim');
    $inline_button2 = array("text"=>"Экстази","callback_data"=>'/ex');
    $inline_button3 = array("text"=>"Марихуана", "callback_data"=>'/mar');
    $inline_button4 = array("text"=>"Назад", "callback_data"=>'/back');	
    $inline_keyboard = [[$inline_button1,$inline_button2, $inline_button3], [$inline_button4]];
    $keyboard=array("inline_keyboard"=>$inline_keyboard);
    $replyMarkup = json_encode($keyboard); 
     
     sendMessage($chat_id, "Вы выбрали город Новосибирск! Выберите категорию:", $replyMarkup);
    break;

    }
/// Выбор города после команды /start
   switch($message) {

   case '/start':  
   $inline_button1 = array("text"=>"Москва", "callback_data"=>'/msk');
   $inline_button2 = array("text"=>"Красноярск","callback_data"=>'/krn');
    $inline_button3 = array("text"=>"Новосибирск", "callback_data"=>'/nsk');
	
   $inline_keyboard = [[$inline_button1,$inline_button2, $inline_button3]];
   $keyboard=array("inline_keyboard"=>$inline_keyboard);
   $replyMarkup = json_encode($keyboard); 
     
   sendMessage($chat_id, "Добро пожаловать! Выберите город", $replyMarkup);
   break;
   }
switch($data){
///Выбор категории при выборе города Москва
    case '/msk':
    $inline_button1 = array("text"=>"Стимуляторы","callback_data"=>'/stimmsk');
    $inline_button2 = array("text"=>"Экстази","callback_data"=>'/exmsk');
    $inline_button3 = array("text"=>"Марихуана", "callback_data"=>'/marmsk');
    $inline_button4 = array("text"=>"Назад", "callback_data"=>'/back');	
    $inline_keyboard = [[$inline_button1,$inline_button2, $inline_button3], [$inline_button4]];
    $keyboard=array("inline_keyboard"=>$inline_keyboard);
    $replyMarkup = json_encode($keyboard); 
     
     sendMessage($chat_id_in, "Вы выбрали город Москва! Выберите категорию:", $replyMarkup);
    break;
///Выбор категории при выборе города Красноярск
    case '/krn':
    $inline_button1 = array("text"=>"Стимуляторы","callback_data"=>'/stimkrn');
    $inline_button2 = array("text"=>"Экстази","callback_data"=>'/exkrn');
    $inline_button3 = array("text"=>"Марихуана", "callback_data"=>'/markrn');
    $inline_button4 = array("text"=>"Назад", "callback_data"=>'/back');	
    $inline_keyboard = [[$inline_button1,$inline_button2, $inline_button3], [$inline_button4]];
    $keyboard=array("inline_keyboard"=>$inline_keyboard);
    $replyMarkup = json_encode($keyboard); 
     
     sendMessage($chat_id_in, "Вы выбрали город Красноярск! Выберите категорию:", $replyMarkup);
    break;
///Выбор категории при выборе города Новосибирск
    case '/nsk':
    $inline_button1 = array("text"=>"Стимуляторы","callback_data"=>'/stimnsk');
    $inline_button2 = array("text"=>"Экстази","callback_data"=>'/exnsk');
    $inline_button3 = array("text"=>"Марихуана", "callback_data"=>'/marnsk');
    $inline_button4 = array("text"=>"Назад", "callback_data"=>'/back');	
    $inline_keyboard = [[$inline_button1,$inline_button2, $inline_button3], [$inline_button4]];
    $keyboard=array("inline_keyboard"=>$inline_keyboard);
    $replyMarkup = json_encode($keyboard); 
     
     sendMessage($chat_id_in, "Вы выбрали город Новосибирск! Выберите категорию:", $replyMarkup);
    break;
///При нажатии НАЗАД
    case '/back':
    $inline_button1 = array("text"=>"Москва", "callback_data"=>'/msk');
    $inline_button2 = array("text"=>"Красноярск","callback_data"=>'/krn');
    $inline_button3 = array("text"=>"Новосибирск", "callback_data"=>'/nsk');
	
    $inline_keyboard = [[$inline_button1,$inline_button2, $inline_button3]];
    $keyboard=array("inline_keyboard"=>$inline_keyboard);
    $replyMarkup = json_encode($keyboard); 
     
     sendMessage($chat_id_in, "Вы вернулись к выбору города! Выберите город:", $replyMarkup);
    break;
}



    		switch($data){
///Подкатегории Москва Стимуляторы
 		   case '/stimmsk':
 		    $inline_button1 = array("text"=>"Кокаин","callback_data"=>'/cocamsk');
		    $inline_button2 = array("text"=>"Скорость","callback_data"=>'/skmsk');
		    $inline_button3 = array("text"=>"Мефедрон", "callback_data"=>'/mefmsk');
		    $inline_button4 = array("text"=>"Амфетамин", "callback_data"=>'/amfmsk');
		    $inline_button5 = array("text"=>"Назад", "callback_data"=>'/backmsk');	
		    $inline_keyboard = [[$inline_button1,$inline_button2], [$inline_button3, $inline_button4], [$inline_button5]];
		    $keyboard=array("inline_keyboard"=>$inline_keyboard);
		    $replyMarkup = json_encode($keyboard); 
		     
		     sendMessage($chat_id_in, "Вы выбрали категорию стимуляторы Москва! Выберите подкатегорию:", $replyMarkup);
		    break;
///Подкатегории Москва Экстази
		    case '/exmsk':
		    $inline_button1 = array("text"=>"экстази","callback_data"=>'/extmsk');
		    $inline_button2 = array("text"=>"mdma","callback_data"=>'/mdmamsk');
		    $inline_button3 = array("text"=>"mda", "callback_data"=>'/mdamsk');
		    $inline_button4 = array("text"=>"Назад", "callback_data"=>'/backmsk');	
		    $inline_keyboard = [[$inline_button1,$inline_button2, $inline_button3], [$inline_button4]];
		    $keyboard=array("inline_keyboard"=>$inline_keyboard);
		    $replyMarkup = json_encode($keyboard); 
		     
		     sendMessage($chat_id_in, "Вы выбрали категорию Экстази Москва! Выберите подкатегорию:", $replyMarkup);

		    break;
///Подкатегории Москва Марихуана
		    case '/marmsk':
		    $inline_button1 = array("text"=>"Бошка","callback_data"=>'/bomsk');
		    $inline_button2 = array("text"=>"Гашиш","callback_data"=>'/gamsk');
		    $inline_button3 = array("text"=>"Семена", "callback_data"=>'/semmsk');
		    $inline_button4 = array("text"=>"Назад", "callback_data"=>'/backmsk');	
		    $inline_keyboard = [[$inline_button1,$inline_button2, $inline_button3], [$inline_button4]];
		    $keyboard=array("inline_keyboard"=>$inline_keyboard);
		    $replyMarkup = json_encode($keyboard); 
		     
		     sendMessage($chat_id_in, "Вы выбрали категорию Марихуана Москва! Выберите подкатегорию:", $replyMarkup);
		    break;
		    case '/backmsk':
		    $inline_button1 = array("text"=>"Стимуляторы","callback_data"=>'/stimmsk');
		    $inline_button2 = array("text"=>"Экстази","callback_data"=>'/exmsk');
		    $inline_button3 = array("text"=>"Марихуана", "callback_data"=>'/marmsk');
		    $inline_button4 = array("text"=>"Назад", "callback_data"=>'/back');	
		    $inline_keyboard = [[$inline_button1,$inline_button2, $inline_button3], [$inline_button4]];
		    $keyboard=array("inline_keyboard"=>$inline_keyboard);
		    $replyMarkup = json_encode($keyboard); 
		     
		     sendMessage($chat_id_in, "Вы вернулись к выбору категорий города Москвы! Выберите категорию:", $replyMarkup);
		    break;


///Подкатегории Красноярск Стимуляторы
		 		   case '/stimkrn':
		 		    $inline_button1 = array("text"=>"Кокаин","callback_data"=>'/cocakrn');
				    $inline_button2 = array("text"=>"Скорость","callback_data"=>'/skkrn');
				    $inline_button3 = array("text"=>"Мефедрон", "callback_data"=>'/mefkrn');
				    $inline_button4 = array("text"=>"Амфетамин", "callback_data"=>'/amfkrn');
				    $inline_button5 = array("text"=>"Назад", "callback_data"=>'/backkrn');	
				    $inline_keyboard = [[$inline_button1,$inline_button2], [$inline_button3, $inline_button4], [$inline_button5]];
				    $keyboard=array("inline_keyboard"=>$inline_keyboard);
				    $replyMarkup = json_encode($keyboard); 
				     
				     sendMessage($chat_id_in, "Вы выбрали категорию стимуляторы Красноярск! Выберите подкатегорию:", $replyMarkup);
				    break;
///Подкатегории Красноярск Экстази
				    case '/exkrn':
				    $inline_button1 = array("text"=>"экстази","callback_data"=>'/extkrn');
				    $inline_button2 = array("text"=>"mdma","callback_data"=>'/mdmakrn');
				    $inline_button3 = array("text"=>"mda", "callback_data"=>'/mdakrn');
				    $inline_button4 = array("text"=>"Назад", "callback_data"=>'/backkrn');	
				    $inline_keyboard = [[$inline_button1,$inline_button2, $inline_button3], [$inline_button4]];
				    $keyboard=array("inline_keyboard"=>$inline_keyboard);
				    $replyMarkup = json_encode($keyboard); 
				     
				     sendMessage($chat_id_in, "Вы выбрали категорию Экстази Красноярск! Выберите подкатегорию:", $replyMarkup);

				    break;
///Подкатегории Красноярск Марихуана
				    case '/markrn':
				    $inline_button1 = array("text"=>"Бошка","callback_data"=>'/bokrn');
				    $inline_button2 = array("text"=>"Гашиш","callback_data"=>'/gakrn');
				    $inline_button3 = array("text"=>"Семена", "callback_data"=>'/semkrn');
				    $inline_button4 = array("text"=>"Назад", "callback_data"=>'/backkrn');	
				    $inline_keyboard = [[$inline_button1,$inline_button2, $inline_button3], [$inline_button4]];
				    $keyboard=array("inline_keyboard"=>$inline_keyboard);
				    $replyMarkup = json_encode($keyboard); 
				     
				     sendMessage($chat_id_in, "Вы выбрали категорию Марихуана Красноярск! Выберите подкатегорию:", $replyMarkup);
				    break;
				    case '/backkrn':
				    $inline_button1 = array("text"=>"Стимуляторы","callback_data"=>'/stimkrn');
				    $inline_button2 = array("text"=>"Экстази","callback_data"=>'/exkrn');
				    $inline_button3 = array("text"=>"Марихуана", "callback_data"=>'/markrn');
				    $inline_button4 = array("text"=>"Назад", "callback_data"=>'/back');	
				    $inline_keyboard = [[$inline_button1,$inline_button2, $inline_button3], [$inline_button4]];
				    $keyboard=array("inline_keyboard"=>$inline_keyboard);
				    $replyMarkup = json_encode($keyboard); 
				     
				     sendMessage($chat_id_in, "Вы вернулись к выбору категорий города Красноярск! Выберите категорию:", $replyMarkup);
				    break;


///Подкатегории Новосибирск Стимуляторы
 		   case '/stimnsk':
 		    $inline_button1 = array("text"=>"Кокаин","callback_data"=>'/cocansk');
		    $inline_button2 = array("text"=>"Скорость","callback_data"=>'/sknsk');
		    $inline_button3 = array("text"=>"Мефедрон", "callback_data"=>'/mefnsk');
		    $inline_button4 = array("text"=>"Амфетамин", "callback_data"=>'/amfnsk');
		    $inline_button5 = array("text"=>"Назад", "callback_data"=>'/backnsk');	
		    $inline_keyboard = [[$inline_button1,$inline_button2], [$inline_button3, $inline_button4], [$inline_button5]];
		    $keyboard=array("inline_keyboard"=>$inline_keyboard);
		    $replyMarkup = json_encode($keyboard); 
		     
		     sendMessage($chat_id_in, "Вы выбрали категорию стимуляторы Новосибирск! Выберите подкатегорию:", $replyMarkup);
		    break;
///Подкатегории Новосибирск Экстази
		    case '/exnsk':
		    $inline_button1 = array("text"=>"экстази","callback_data"=>'/extnsk');
		    $inline_button2 = array("text"=>"mdma","callback_data"=>'/mdmansk');
		    $inline_button3 = array("text"=>"mda", "callback_data"=>'/mdansk');
		    $inline_button4 = array("text"=>"Назад", "callback_data"=>'/backnsk');	
		    $inline_keyboard = [[$inline_button1,$inline_button2, $inline_button3], [$inline_button4]];
		    $keyboard=array("inline_keyboard"=>$inline_keyboard);
		    $replyMarkup = json_encode($keyboard); 
		     
		     sendMessage($chat_id_in, "Вы выбрали категорию Экстази Новосибирск! Выберите подкатегорию:", $replyMarkup);

		    break;
///Подкатегории Новосибирск Марихуана
		    case '/marnsk':
		    $inline_button1 = array("text"=>"Бошка","callback_data"=>'/bonsk');
		    $inline_button2 = array("text"=>"Гашиш","callback_data"=>'/gansk');
		    $inline_button3 = array("text"=>"Семена", "callback_data"=>'/semnsk');
		    $inline_button4 = array("text"=>"Назад", "callback_data"=>'/backnsk');	
		    $inline_keyboard = [[$inline_button1,$inline_button2, $inline_button3], [$inline_button4]];
		    $keyboard=array("inline_keyboard"=>$inline_keyboard);
		    $replyMarkup = json_encode($keyboard); 
		     
		     sendMessage($chat_id_in, "Вы выбрали категорию Марихуана Новосибирск! Выберите подкатегорию:", $replyMarkup);
		    break;
		    case '/backnsk':
		    $inline_button1 = array("text"=>"Стимуляторы","callback_data"=>'/stimnsk');
		    $inline_button2 = array("text"=>"Экстази","callback_data"=>'/exnsk');
		    $inline_button3 = array("text"=>"Марихуана", "callback_data"=>'/marnsk');
		    $inline_button4 = array("text"=>"Назад", "callback_data"=>'/back');	
		    $inline_keyboard = [[$inline_button1,$inline_button2, $inline_button3], [$inline_button4]];
		    $keyboard=array("inline_keyboard"=>$inline_keyboard);
		    $replyMarkup = json_encode($keyboard); 
		     
		     sendMessage($chat_id_in, "Вы вернулись к выбору категорий города Новосибирска! Выберите категорию:", $replyMarkup);
		    break;

		}






switch($data){
//Развесовка Москва Кокаин
case '/cocamsk':
$inline_button1 = array("text"=>"0,5Г Цена 5000₽","callback_data"=>'/05cocamsk');
$inline_button2 = array("text"=>"1Г Цена 10000₽","callback_data"=>'/1cocamsk');
$inline_button3 = array("text"=>"2Г Цена 20000₽" ,"callback_data"=>'/2cocamsk');
$inline_button4 = array("text"=>"3Г Цена 28000₽","callback_data"=>'/3cocamsk');
$inline_button5 = array("text"=>"5Г Цена 45000₽","callback_data"=>'/5cocamsk');
$inline_button6 = array("text"=>"10Г Цена 90000₽","callback_data"=>'/10cocamsk');
$inline_button7 = array("text"=>"Назад", "callback_data"=>'/backmsk');	
$inline_keyboard = [[$inline_button1,$inline_button2, $inline_button3], [$inline_button4, $inline_button5, $inline_button6],[$inline_button7]];
$keyboard=array("inline_keyboard"=>$inline_keyboard);
$replyMarkup = json_encode($keyboard); 
     
sendMessage($chat_id_in, "Вы выбрали товар Кокаин Москва! Выберите вес:", $replyMarkup);
break;
//Развесовка Москва Скорость
case '/skmsk':

$inline_button1 = array("text"=>"1Г","callback_data"=>'/1skmsk');
$inline_button2 = array("text"=>"2Г","callback_data"=>'/2skmsk');
$inline_button3 = array("text"=>"3Г","callback_data"=>'/3skmsk');
$inline_button4 = array("text"=>"5Г","callback_data"=>'/5skmsk');
$inline_button5 = array("text"=>"10Г","callback_data"=>'/10skmsk');
$inline_button6 = array("text"=>"Назад", "callback_data"=>'/backmsk');	
$inline_keyboard = [[$inline_button1,$inline_button2, $inline_button3], [$inline_button4, $inline_button5], [$inline_button6]];
$keyboard=array("inline_keyboard"=>$inline_keyboard);
$replyMarkup = json_encode($keyboard); 
     
sendMessage($chat_id_in, "Вы выбрали товар Скорость Москва! Выберите вес:", $replyMarkup);
break;

}






















switch($data){
//Оплата за 0.5 Кокаина
case'/05cocamsk':


	$inline_button1 = array("text"=>"Я оплатил","callback_data"=>'/oplata');
    $inline_keyboard = [[$inline_button1]];
    $keyboard=array("inline_keyboard"=>$inline_keyboard);
    $replyMarkup = json_encode($keyboard); 
sendMessage($chat_id_in, "Вы приобретаете 0,5 Кокаин
➖➖➖➖➖➖➖➖➖➖
Совершите платеж на QIWI в течение 60 минут
➖➖➖➖➖➖➖➖➖➖
Кошелек: +79996667755
Сумма: 5000 руб
Комментарий: {$komment}
➖➖➖➖➖➖➖➖➖➖
БЕЗ КОММЕНТАРИЯ ДЕНЬГИ НЕ ЗАЧИСЛЯЮТСЯ
➖➖➖➖➖➖➖➖➖➖
После оплаты нажмите 'Я оплатил'", $replyMarkup);


break;

}


  	











switch($data){
//Неудачный платеж
case'/oplata':


$inline_button1 = array("text"=>"Я оплатил","callback_data"=>'/oplata');
$inline_button2 = array("text"=>"Контакты","callback_data"=>'/conact');
$inline_keyboard = [[$inline_button1],[$inline_button2]];
$keyboard=array("inline_keyboard"=>$inline_keyboard);
$replyMarkup = json_encode($keyboard); 
sendMessage($chat_id_in, "❌ Оплата не произведена!
➖➖➖➖➖➖➖➖➖➖
Подождите пару минут, и повторите снова
➖➖➖➖➖➖➖➖➖➖
Или обратитесь к администратору, в разделе контакты", $replyMarkup);


break;

}











function sendMessage($chat_id, $message, $replyMarkup) {
  file_get_contents($GLOBALS['api'] . '/sendMessage?chat_id=' . $chat_id . '&text=' . urlencode($message) . '&reply_markup=' . $replyMarkup);
}








?> 
 
