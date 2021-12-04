<?php

//error_reporting(E_ALL);
ini_set('display_errors','Off');
ini_set('display_startup_errors', 0);
header('Content-Type: text/html; charset= utf-8');


/**
 * Соединяет нас с mysql
 * @return resource Соединение-mysqli
 */

function mysqliConnect(){
	ini_set('display_errors','Off');
	include __DIR__."/config.php";
	$mysqli = new mysqli($settings['db']['host'], $settings['db']['user'], $settings['db']['password'], $settings['db']['dbname']);
		if (mysqli_connect_errno()) die("Не удалось подключиться к базе данных. Проверьте правильность введённых данных.");
	$mysqli->query ("SET NAMES 'utf8'");
	return $mysqli;	
}

$mysqli = mysqliConnect();

function getConfig(){
	global $mysqli;
	$config = $mysqli->query ("SELECT * FROM `settings`");
	$config = mysqli_fetch_assoc($config);
	return $config;
}

$config = getConfig();

/*
Получение информации о сервере
/*/
function getServerInfo(){
	global $config;
	Error_Reporting( E_ALL | E_STRICT );
	Ini_Set( 'display_errors', true );
	include_once __DIR__ . '/MinecraftQuery.php';
	include_once __DIR__ . '/MinecraftQueryException.php';
	$Timer = MicroTime( true );
	$Query = new MinecraftQuery( );
	try
	{
		$Query->Connect( $config['server_ip'], $config['server_query.port'], 1 );
	}
	catch( MinecraftQueryException $e )
	{
		return array('offline'=>true);
	}
	$Timer = Number_Format( MicroTime( true ) - $Timer, 4, '.', '' );
		$response = $Query->GetInfo();
		$response['offline'] = false;
		return $response;

}


function setConfig($type, $value){ 
	global $mysqli; 
	$type = addslashes($type); 
	$value = addslashes($value); 
	$mysqli->query("UPDATE settings SET `".$type."` = '".$value."' "); 
	echo mysqli_error($mysqli); 
	if(mysqli_error($mysqli)!="") return false; 
	return true; 
}
/**
 * По сути - тот же setConfig, но пихает в config.php
 */

function doTestBuy($nick, $priv){
	$command = getCommand($nick, 0, $priv);
	return sendRcon($command);
	
}
function getPages(){
	global $mysqli;
	$pages = $mysqli->query ("SELECT * FROM `pages` ORDER BY id ASC");
	return $pages;
}
function sendReqToServer($params, $method){
	 	if( $curl = curl_init() ) {
    curl_setopt($curl, CURLOPT_URL, "http://mydonate.su:8080/api/$method");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
    $out = curl_exec($curl);
    echo $out;
    curl_close($curl);
  }
	 }


/**
 * Перемещает товар выше\ниже
 * @param  integer $id     Айди товара
 * @param  string $action Направление: вниз\вверх
 * @return integer         Новый айди товара
 */
function moveGood($id, $action){
	global $mysqli;
	if(empty($id) || empty($action)) return false;
	if($action == 'up') $pre_id = $mysqli->query("SELECT * FROM `privileges` WHERE id < $id ORDER BY id DESC LIMIT 1")->fetch_assoc()['id'];
	else $pre_id = $mysqli->query("SELECT * FROM `privileges` WHERE id > $id ORDER BY id ASC LIMIT 1")->fetch_assoc()['id'];
	if(empty($pre_id)) return -1;

	$mysqli->query("UPDATE privileges SET id = 0 WHERE id = $pre_id");
	$mysqli->query("UPDATE privileges SET id = $pre_id WHERE id = $id");
	$mysqli->query("UPDATE privileges SET id = $id WHERE id = 0");

	return $pre_id;

}

function deletePages($id){
	global $mysqli;
	$mysqli->query("DELETE FROM pages WHERE id = ".intval($id)."");
	return true;
}

function addPages($page_name, $page_id){
	global $mysqli;
	if(empty($page_name) || empty($page_id)) return false;
	global $mysqli;
	$mysqli->query("INSERT INTO pages VALUES(NULL, '".addslashes($page_name)."', '".addslashes($page_id)."', 0)");
	if(mysqli_error($mysqli)!="") return false;
	return true;	
}

function addPromo($promo, $discount, $count){
	if(empty($promo) || empty($discount) || empty($count)) return false;
	if(strlen($promo) > 11 || strlen($promo) < 1 || $discount > 100 || $discount < 1 || $count <= 0) return false;
	global $mysqli;
	$mysqli->query("INSERT INTO promo VALUES(NULL,'".addslashes($promo)."', '".addslashes($discount)."', '".addslashes($count)."')");
	if(mysqli_error($mysqli)!="") return false;
	return true;
}

function deletePromo($id){
	global $mysqli;
	if(empty($id)) return false;
	$mysqli->query("DELETE FROM promo WHERE id = '".$id."'");
	return true;
}

/**
 * Получает привилегии
 * @param  integer $page_id Секция для получения из бд
 * @return raw mysqli       Сырой mysqli Объект
 */
function getPrivileges($page_id){
	global $mysqli;
	$privileges = $mysqli->query ("SELECT * FROM `privileges` WHERE `section` = '".$page_id."' ORDER BY id ASC");
	return $privileges;
}
/**
 * Добавляет привилегию в бд
 * @param string $name    Имя привилегии
 * @param string $command Комманда
 * @param integer $price  цена для покупки привилегии|
 * @param string $description описание привилегии
 */
function addPrivileges($name, $command, $price, $page_id, $description){
	if(empty($name) || empty($command) || empty($price) || empty($page_id)) return false;
	global $mysqli;
	$mysqli->query("INSERT INTO privileges VALUES(NULL, '".addslashes($name)."', '".addslashes($command)."', '".addslashes($price)."', '".addslashes($page_id)."', '".addslashes($description)."')");
	if(mysqli_error($mysqli)!="") return false;
	return true;
	
}

function addRoulette($rouletteName, $price){
	if(empty($rouletteName) || empty($price)) return false;
	global $mysqli;
	$mysqli->query("INSERT INTO privileges VALUES(NULL, '".addslashes($rouletteName)."', 'none', '".addslashes($price)."', 'roulette')");

	if(mysqli_error($mysqli)!="") return false;
	return true;
}

function openRoulette($id){
global $mysqli;
// if(!in_array($id, $_SESSION['roulette'])) return 'Вы не покупали данную рулетку!';
$commandsRaw = $mysqli->query("SELECT * FROM roulette_content WHERE roulette_parent = '".addslashes($id)."'");
$commands = array();
while($command = $commandsRaw->fetch_assoc()){
	$commands[] = $command;
}

$command = $commands[array_rand($commands, 1)];
sendRcon($command['command']);
return $command['content_name'];
foreach ($_SESSION['roulette'] as $key => $value) { // Удаляем эту рулетку
	if($value == $id) unset($_SESSION['roulette'][$key]);
}
}

function addRoulettePrize($id, $command, $chance, $name){
	global $mysqli;
	$mysqli->query("INSERT INTO roulette_content VALUES(null, '".addslashes($id)."', '".addslashes($command)."', '".addslashes($chance)."', '".addslashes($name)."')");
	return true;
}

function getRoulettes(){
	$roulettesRaw = getPrivileges('roulette');
	$roulettes = array();
	while($roulette = $roulettesRaw->fetch_assoc()){
		$roulettes[] = $roulette;
	}
	return $roulettes;
}

function getFooters(){
	global $mysqli;
	$footers = $mysqli->query ("SELECT * FROM `footers` ORDER BY id ASC");
	return $footers;	
}

function getHeaders(){
	global $mysqli;
	$headers= $mysqli->query ("SELECT * FROM `headers` ORDER BY id ASC");
	return $headers;
}

function getBlockContent($type, $id){
	global $mysqli;
	$content = $mysqli->query ("SELECT * FROM `".$type."` WHERE id = '".$id."'");
	return $contents;	
}


function editBlock($type, $id, $name, $html){
	global $mysqli;
	
	$mysqli->query("UPDATE `".$type."` SET `html` = '".addslashes($html)."' WHERE id = '".$id."'");
	$mysqli->query("UPDATE `".$type."` SET `name` = '".addslashes($name)."' WHERE id = '".$id."'");
	
	if(mysqli_error($mysqli)!="") return false;
	return true;
}

function editSectionVisible($id, $value){
	global $mysqli;
	$mysqli->query("UPDATE `pages` SET `is_hidden` = '".addslashes($value)."' WHERE id = '".$id."'");
	
	if(mysqli_error($mysqli)!="") return false;
	return true;	
}

function addBlock($type, $name, $html){
	global $mysqli;
	$mysqli->query("INSERT INTO `".$type."` VALUES(NULL, '".addslashes($name)."', '".addslashes($html)."')");
	echo mysqli_error($mysqli);
	return true;
}

function removeBlock($type, $id){
	global $mysqli;
	$mysqli->query("DELETE FROM `".$type."` WHERE `id` = ".intval($id)."");
	return true;	
}

/**
 * Удаляет привилегию из бд
 * @param  integer $id Айди привилегии
 * @return boolean     Успех 
 **/
function deletePrivileges($id){
	global $mysqli;
	if(empty($id)) return false;
	$mysqli->query("DELETE FROM privileges WHERE id = ".intval($id)."");
	return true;
}



function editPrivileges($name, $command, $price, $page_id, $id, $description){
	if(empty($name) || empty($command) || empty($price) || empty($page_id)) return false;
	global $mysqli;

	$description = str_replace("\n", '<br>', $description);
	$mysqli->query("UPDATE privileges SET name = '".$name."', command = '".$command."', price = ".intval($price).", section='".$page_id."', description = '".$description."' WHERE id = '".$id."'");

	if(mysqli_error($mysqli)!="") return false;
	return true;
}

/**
 * Функция получения команды
 * @param  string $nickname Никнейм
 * @param  integer $amount  Строка для поиска в бд
 * @param  string $donate   Название донат-привилегии
 * @return string           Готовая команда для выполнения в RCON
 */


function getCommand($nickname, $amount, $donate){
	global $mysqli; //глобальная переменная
	$nickname = trim($nickname); //убираем лишние пробелы
	$row = $mysqli->query ("SELECT * FROM `privileges` WHERE `name` = '".$donate."'"); //выбираем команду из бд
	$row = mysqli_fetch_array($row);
	$command = str_replace('!user', $nickname, $row["command"]); //заменяем !user на ник игрока
	return $command; //возвращаем готовую команду
}


/**
 * Функция получения цены с учётом промокода
 * @param  string $promo Промо-код
 * @param  integer $price Цена для получения
 * @return integer        Цена с учетом промокода
 */
function getPrice($promo, $price){
	global $mysqli; //глобальная переменная
	$raw = $mysqli->query ("SELECT * FROM `promo` WHERE `promo` = '".$promo."'")->fetch_assoc(); //берём промокод из бд
	$discount = $raw['discount'];

	if($raw['count'] <= 0) return $price;
	if($raw['count'] == 1) $mysqli->query("DELETE FROM `promo` WHERE promo = '".$promo."'");
	if($raw['count'] > 1) $mysqli->query("UPDATE `promo` SET `count` = `count` - 1 WHERE `promo` = '".$promo."' ");
	
	return $price = $price - (($price / 100) * $discount);

}

/**
 * Отправляет RCON-комманду
 * @param  string $command Комманда
 * @return boolean         Успех
 */

include "mcraftrcon.class.php"; //инклудим класс для работы с ркон

function sendRcon($command){
	global $config, $mysqli;
	$rcon = new MinecraftRcon();
	$rcon->Connect($config["server_ip"], $config['server_rcon.port'], $config['server_rcon.pass']);	 //подключение к ркон
	$response = $rcon->Command($command);
	return 1; //Успешно
}

function sendAndGetRconResponse($command){
	global $config, $mysqli;
	$rcon = new MinecraftRcon();
	$rcon->Connect($config["server_ip"], $config['server_rcon.port'], $config['server_rcon.pass']);	 //подключение к ркон
	return $rcon->Command($command);
}	


function getUserUUID($name){
    $val = md5("OfflinePlayer:". $name, true);
    $byte = array_values(unpack('C16', $val));

    $tLo = ($byte[0] << 24) | ($byte[1] << 16) | ($byte[2] << 8) | $byte[3];
    $tMi = ($byte[4] << 8) | $byte[5];
    $tHi = ($byte[6] << 8) | $byte[7];
    $csLo = $byte[9];
    $csHi = $byte[8] & 0x3f | (1 << 7);

    if (pack('L', 0x6162797A) == pack('N', 0x6162797A)) {
        $tLo = (($tLo & 0x000000ff) << 24) | (($tLo & 0x0000ff00) << 8) | (($tLo & 0x00ff0000) >> 8) | (($tLo & 0xff000000) >> 24);
        $tMi = (($tMi & 0x00ff) << 8) | (($tMi & 0xff00) >> 8);
        $tHi = (($tHi & 0x00ff) << 8) | (($tHi & 0xff00) >> 8);
    }

    $tHi &= 0x0fff;
    $tHi |= (3 << 12);

    $uuid = sprintf(
        '%08x-%04x-%04x-%02x%02x-%02x%02x%02x%02x%02x%02x',
        $tLo, $tMi, $tHi, $csHi, $csLo,
        $byte[10], $byte[11], $byte[12], $byte[13], $byte[14], $byte[15]
    );
    return $uuid;
}
