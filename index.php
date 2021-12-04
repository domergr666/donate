<?php
	include "libs/functions.php";
	error_reporting(E_ALL);
	ini_set('display_errors','On');
session_start();

$pages = getPages();

if($config['status'] == 0 && $_SESSION['is_admin'] != true){
	header('Location: off/');
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="yandex-verification" content="187a6a293244833c" />
	<title><?=$config['sitename']?></title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"; integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
		<link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/slick.min.css">
        <link rel="stylesheet" href="css/slick-theme.min.css">
        <link rel="stylesheet" href="css/ion.rangeSlider.min.css">
        <link rel="stylesheet" href="css/ion.rangeSlider.skinHTML5.min.css">
        <link rel="stylesheet" href="css/bootstrap-colorpicker.min.css">
        <link rel="stylesheet" href="css/sweetalert2.min.css">
        <link rel="stylesheet" id="css-main" href="css/earth.min.css">
         <script src="./js/sweetalert2.min.js"></script>

        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="styles/style.css?0.11">
    <link href="https://fonts.googleapis.com/css?family=Arimo:400,700&amp;subset=cyrillic" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
    <header>
        <nav>
            <a href="<?=$config['rules']?>"><i class="fas fa-pencil-alt"></i> Правила</a>
            <a href="<?=$config['support']?>"><i class="fas fa-headset"></i> Контакты</a>
            <a href="<?=$config['vk_group_domain']?>"><i class="fab fa-vk"></i> Группа</a>
        </nav>
        <div class="top-block">
            <div class="online">Игроков онлайн<br/><br/><span>-/-</span></div>
            <div class="logo"><img src="images/logo.png" alt="Логотип"></div>
            <div class="online">IP сервера<br/><br/><span><?=$config['server_ip']?>:<?=$config['server_port']?></span></div>
        </div>
    </header>
    <main>
        <h1>Покупка доната</h1>
        <div class="donate-block">
            <script>
                window.privileges = {};            
             </script>


            <form action="libs/buy.php" method="post" id="groups">
                <input type="text" name="nickname" id="groupName" placeholder="Введите ваш ник" required><br/>
                <select name="group" id="home">
                    <?php
                        $privileges = getPrivileges("home");
                        while (($privileg = $privileges->fetch_assoc() ) != false) {
                    ?>
                        <script>
                            window.privileges["<?=$privileg['id']?>"] = `<?=$privileg['description']?>`;
                        </script>
                      <option value="<?=$privileg['id']?>"><?=$privileg['name']?> - <?=number_format($privileg['price'],0,'.',' ').' рублей '?></option>
                    <?php } ?>
                </select><br/>
                <input type="text" name="promo" placeholder="Промокод (если есть)"><br/>
                <button type="submit" >Перейти к оплате</button>
        </div>
    </main>
    <footer>
        <div class="name">
            <p>RuMine Store © (RMS)</p>
            Все средства идут на развитие проекта.
        </div>
        <div class="links">
            <ul>
                <!--<li><a href="#">Text</a></li>-->
            </ul>
        </div>
    </footer>
</body>
</html>