<?php
//defined('_JEXEC') or die('Restricted access');

/* Это мост для ajax */
include "libs/functions.php";


foreach ($_POST as $key => $value) {
	$_POST[urldecode($key)] = urldecode($value);
}

/**
 * Не одменские фичи
 */
switch($_POST['method']){
		case 'getServerInfo':	
		$response = getServerInfo();
		echo json_encode($response);
		die();
		break;
}


session_start();
if(!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) die('Што вам нада');
/*
С помощью этой штуки убираем все штуки с юрла( справедливо! )
 */


switch ($_POST['method']) {
		case 'donate.add':
			echo addPrivileges($_POST['name'], $_POST['command'], $_POST['price'], $_POST['section'], $_POST['description']);
		break;
		case 'donate.move':
			echo moveGood($_POST['id'], $_POST['action']);
		break;
		case 'donate.edit':
			echo editPrivileges($_POST['name'], $_POST['command'], $_POST['price'], $_POST['section'], $_POST['id'], $_POST['description']);
		break;
		case 'donate.delete':
			echo deletePrivileges($_POST['id']);
		break;
		case 'editSectionVisible':
			echo editSectionVisible($_POST['id'], $_POST['value']);
		break;
		case 'sendRcon':
			echo sendRcon($_POST['command']);
		break;
		case 'sendAndGetRconResponse':
			echo sendAndGetRconResponse($_POST['command']);
		break;
		case 'block.edit': //Редактировать блок. $type - footers либо headers, $html - html код
			echo editBlock($_POST['type'], $_POST['id'], $_POST['name'], $_POST['html']);
		break;
		case 'block.remove': //Удалить блок. $type - footers либо headers
			echo removeBlock($_POST['type'], $_POST['id']);
		break;
		case 'block.add': //Добавить блок. $type - footers либо headers, $html - html код
			echo addBlock($_POST['type'],$_POST['name'], $_POST['html']);
		break;
		case 'block.get.content': //Получить содержимое блока. $type - footers либо headers, $id - id блока
			echo getBlockContent($_POST['type'], $_POST['id']);
		break;
		case 'promo.add':
			echo addPromo($_POST['promo'], $_POST['discount'], $_POST['count']);
		break;
		case 'promo.delete':
			echo deletePromo($_POST['id']);
		break;
		case 'pages.delete':
			echo deletePages($_POST['id']);
		break;
		case 'pages.add':
			echo addPages($_POST['page_name'], $_POST['page_id']);
		break;
		case 'config.set':
			 echo setConfig($_POST['type'], $_POST['value']);
		break;
		case 'config.setText':
		echo setTextConfig($_POST['host'], $_POST['user'], $_POST['password'], $_POST['dbname']);
		break;
		case 'buy.test':	
		echo doTestBuy($_POST['nick'], $_POST['priv']);
		break;
		case 'account.logout':
		$_SESSION['is_admin'] = false;
		break;
		case 'installer.remove':
		function httpPost($url, $data)
{
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}

		return unlink('./install.php');
		break;

		default:
			echo 'Ошибка.';
		break;
}
?>