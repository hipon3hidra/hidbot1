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
    $inline_button4 = array("text"=>"Назад", "callback_data"=>'/backmsk');	
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
    $inline_button4 = array("text"=>"Назад", "callback_data"=>'/backkrn');	
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
    $inline_button4 = array("text"=>"Назад", "callback_data"=>'/backnsk');	
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
		    $inline_button5 = array("text"=>"Назад", "callback_data"=>'/backstimmsk');	
		    $inline_keyboard = [[$inline_button1,$inline_button2], [$inline_button3, $inline_button4], [$inline_button5]];
		    $keyboard=array("inline_keyboard"=>$inline_keyboard);
		    $replyMarkup = json_encode($keyboard); 
		     
		     sendMessage($chat_id_in, "Вы выбрали категорию стимуляторы! Выберите подкатегорию:", $replyMarkup);
		    break;
///Подкатегории Москва Экстази
		    case '/exmsk':
		    $inline_button1 = array("text"=>"экстази","callback_data"=>'/extmsk');
		    $inline_button2 = array("text"=>"mdma","callback_data"=>'/mdmamsk');
		    $inline_button3 = array("text"=>"mda", "callback_data"=>'/mdamsk');
		    $inline_button4 = array("text"=>"Назад", "callback_data"=>'/backexmsk');	
		    $inline_keyboard = [[$inline_button1,$inline_button2, $inline_button3], [$inline_button4]];
		    $keyboard=array("inline_keyboard"=>$inline_keyboard);
		    $replyMarkup = json_encode($keyboard); 
		     
		     sendMessage($chat_id_in, "Вы выбрали категорию Экстази! Выберите подкатегорию:", $replyMarkup);

		    break;
///Подкатегории Москва Марихуана
		    case '/marmsk':
		    $inline_button1 = array("text"=>"Бошка","callback_data"=>'/extmsk');
		    $inline_button2 = array("text"=>"Гашиш","callback_data"=>'/mdmamsk');
		    $inline_button3 = array("text"=>"Семена", "callback_data"=>'/mdamsk');
		    $inline_button4 = array("text"=>"Назад", "callback_data"=>'/backmarmsk');	
		    $inline_keyboard = [[$inline_button1,$inline_button2, $inline_button3], [$inline_button4]];
		    $keyboard=array("inline_keyboard"=>$inline_keyboard);
		    $replyMarkup = json_encode($keyboard); 
		     
		     sendMessage($chat_id_in, "Вы выбрали категорию Марихуана! Выберите подкатегорию:", $replyMarkup);
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
    case '/stimmsk':
    $inline_button1 = array("text"=>"Кокаин","callback_data"=>'/cocamsk');
    $inline_button2 = array("text"=>"Скорость","callback_data"=>'/skmsk');
    $inline_button3 = array("text"=>"Мефедрон", "callback_data"=>'/mefmsk');
    $inline_button4 = array("text"=>"Амфетамин", "callback_data"=>'/amfmsk');
    $inline_button5 = array("text"=>"Назад", "callback_data"=>'/backstimmsk');	
    $inline_keyboard = [[$inline_button1,$inline_button2], [$inline_button3, $inline_button4], [$inline_button5]];
    $keyboard=array("inline_keyboard"=>$inline_keyboard);
    $replyMarkup = json_encode($keyboard); 
		     
    sendMessage($chat_id_in, "Вы выбрали категорию стимуляторы! Выберите подкатегорию:", $replyMarkup);
    break;
///Подкатегории Красноярск Экстази
		    case '/exmsk':
		    $inline_button1 = array("text"=>"экстази","callback_data"=>'/extmsk');
		    $inline_button2 = array("text"=>"mdma","callback_data"=>'/mdmamsk');
		    $inline_button3 = array("text"=>"mda", "callback_data"=>'/mdamsk');
		    $inline_button4 = array("text"=>"Назад", "callback_data"=>'/backexmsk');	
		    $inline_keyboard = [[$inline_button1,$inline_button2, $inline_button3], [$inline_button4]];
		    $keyboard=array("inline_keyboard"=>$inline_keyboard);
		    $replyMarkup = json_encode($keyboard); 
		     
		     sendMessage($chat_id_in, "Вы выбрали категорию Экстази! Выберите подкатегорию:", $replyMarkup);

		    break;
///Подкатегории Красноярск Марихуана
		    case '/marmsk':
		    $inline_button1 = array("text"=>"Бошка","callback_data"=>'/extmsk');
		    $inline_button2 = array("text"=>"Гашиш","callback_data"=>'/mdmamsk');
		    $inline_button3 = array("text"=>"Семена", "callback_data"=>'/mdamsk');
		    $inline_button4 = array("text"=>"Назад", "callback_data"=>'/backmarmsk');	
		    $inline_keyboard = [[$inline_button1,$inline_button2, $inline_button3], [$inline_button4]];
		    $keyboard=array("inline_keyboard"=>$inline_keyboard);
		    $replyMarkup = json_encode($keyboard); 
		     
		     sendMessage($chat_id_in, "Вы выбрали категорию Марихуана! Выберите подкатегорию:", $replyMarkup);
		    break;
		    case '/backmsk':
		    $inline_button1 = array("text"=>"Стимуляторы","callback_data"=>'/stim');
		    $inline_button2 = array("text"=>"Экстази","callback_data"=>'/ex');
		    $inline_button3 = array("text"=>"Марихуана", "callback_data"=>'/mar');
		    $inline_button4 = array("text"=>"Назад", "callback_data"=>'/back');	
		    $inline_keyboard = [[$inline_button1,$inline_button2, $inline_button3], [$inline_button4]];
		    $keyboard=array("inline_keyboard"=>$inline_keyboard);
		    $replyMarkup = json_encode($keyboard); 
		     
		     sendMessage($chat_id_in, "Вы вернулись к выбору категорий города Москвы! Выберите категорию:", $replyMarkup);
		    break;



		}




switch($data){
case'/ext':


	$inline_button1 = array("text"=>"Я оплатил","callback_data"=>'/oplata');
    $inline_keyboard = [[$inline_button1]];
    $keyboard=array("inline_keyboard"=>$inline_keyboard);
    $replyMarkup = json_encode($keyboard); 
sendMessage($chat_id_in, "Если вы оплатили, нажми Я оплатил:", $replyMarkup);


break;

}


  	







function sendMessage($chat_id, $message, $replyMarkup) {
  file_get_contents($GLOBALS['api'] . '/sendMessage?chat_id=' . $chat_id . '&text=' . urlencode($message) . '&reply_markup=' . $replyMarkup);
}








?> 
 
