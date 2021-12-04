<?php
error_reporting(E_ALL);
ini_set('display_errors','On');
ini_set('display_startup_errors', 1);

include "./../libs/functions.php";


if($config['mode'] == 1){
    function getIP() {
		if(isset($_SERVER['HTTP_X_REAL_IP'])) return $_SERVER['HTTP_X_REAL_IP'];
			return $_SERVER['REMOTE_ADDR'];
		}
		if (!in_array(getIP(), array('136.243.38.147', '136.243.38.149', '136.243.38.150', '136.243.38.151', '136.243.38.189', '88.198.88.98'))) {
			header('Location: https://pornhub.com');
			die();
		}

    $sign = md5($config['fk_merchant.id'].':'.$_REQUEST['AMOUNT'].':'.$config['fk_secret.word2'].':'.$_REQUEST['MERCHANT_ORDER_ID']);

		if ($sign != $_REQUEST['SIGN']) {
			die('wrong sign');
		}
}else{
    function getIP() {
		if(isset($_SERVER['HTTP_X_REAL_IP'])) return $_SERVER['HTTP_X_REAL_IP'];
			return $_SERVER['REMOTE_ADDR'];
		}
		if (!in_array(getIP(), array('83.220.173.102'))) {
			header('Location: https://pornhub.com');
			die();
		}
		if($_REQUEST['us_md_secret_word2'] != md5($config['md_secret.word2'])) die("Wrong MD sign");
}


date_default_timezone_set('Europe/Moscow');
$amount = $_REQUEST["AMOUNT"];
$intid = urldecode($_REQUEST["intid"]);
$email = urldecode($_REQUEST["P_EMAIL"]);
$order_id = urldecode($_REQUEST["MERCHANT_ORDER_ID"]);
$nickname = urldecode($_REQUEST["us_nickname"]);
$donate = urldecode($_REQUEST["us_donate"]);
$time = time();


$command = addslashes(getCommand($nickname, $amount, $donate));

$commands = explode(';', $command);


$mysqli->query ("INSERT INTO `data` (`id`, `command`, `intid`,`email`,`nickname`,`amount`,`order_id`,`donate`, `status`, `time`)  VALUES (NULL, '$command', '$intid','$email','$nickname','$amount','$order_id','$donate', 0, '$time')");

if(strlen($config['vk_admin_id'])!=0){

    $admins = explode(';', $config['vk_admin_id']);

foreach ($admins as $key => $value) {
    @file_get_contents("http://mydonate.su/server/send.php?nick=".urlencode($nickname)."&priv=".urlencode($donate)."&server=".urlencode($config['server_ip'])."&to=".urlencode($value).""); // отправляем уведомление

}

}

foreach ($commands as $key => $value) {
   	 $status = sendRcon($value);
   	 // sleep(1); // Меня заставили
   	 $mysqli->query ("UPDATE `data` SET  `status` =  $status WHERE `order_id` = $order_id");
}







die("YES");
?>