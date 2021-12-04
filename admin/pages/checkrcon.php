<?php
//	include "../../libs/functions.php";
	include "./../libs/mcraftrcon.class.php"; //инклудим класс для работы с ркон
	$rcon = new MinecraftRcon();
	$connect = $rcon->Connect($config["server_ip"], $config['server_rcon.port'], $config['server_rcon.pass']);	 //подключение к ркон
?>

<div class="col-md-6 col-xl-9">
<form id="projectmain" name="projectmain" action="975" method="post">
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title text-left">Проверка rcon подключения</h3>
		</div>
		<div class="block-content text-left p-5">

<?php
	if($connect === 'Server offline'){
		echo "<b>Состояние rcon</b> - <b style = 'color: orange;'>Сервер выключен либо не найден. Проверье правильность введённых данных.</b>";
	}elseif($rcon->Command()){
		echo "<b>Состояние rcon</b> - <b style = 'color: green;'>Подключен</b>";
	}else{
		echo "<b>Состояние rcon</b> - <b style = 'color: red;'>Не удалось авторизоваться</b>";
	}
?>
		</div>
</form>

</div>
</div>