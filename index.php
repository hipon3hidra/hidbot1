header('Content-Type: text/html; charset=utf-8');
// подрубаем API
require_once("vendor/autoload.php");

// создаем переменную бота
$token = "543178842:AAFlEue5eOAMEq3K4fmBHGGLD3wglfX7Gvo";
$bot = new \TelegramBot\Api\Client($token);




