<?php
error_reporting(E_ALL);
ini_set('display_errors','On');
include "functions.php";

$row = $mysqli->query ("SELECT * FROM `privileges` WHERE `id` = '".$_POST['group']."'");
$num = $row->num_rows;
if($num <= 0) die();
$row = mysqli_fetch_array($row);
$nickname = urlencode(trim($_POST["nickname"]));
$donate = urlencode($row["name"]);
$price = getPrice(trim($_POST['promo']), $row["price"]);


if($config['mode'] == 1){
$order_id = rand(1000, 9999);
$merchant_id = $config['fk_merchant.id'];
$secret_word = $config['fk_secret.word'];
$sign = md5($merchant_id.':'.$price.':'.$secret_word.':'.$order_id);
$mysqli->close();

header("Location: http://www.free-kassa.ru/merchant/cash.php?m=$merchant_id&oa=$price&s=$sign&o=$order_id&us_nickname=$nickname&us_donate=$donate");
}else{

$params = array(
   'nickname' => urlencode($nickname),
   'name' => urlencode($donate),
   'price' => $price,
   'domain' => $_SERVER['HTTP_HOST'],
   'md_secret_word2' => md5($config['md_secret.word2']),
   'lk_pass' => md5($config['lk_pass']),
   'token' => md5($price.md5($config['md_secret.word1']).$nickname.$donate) //Токен
);


header("Location: http://mydonate.su/pay/merchant.php?".http_build_query($params));
}
?>