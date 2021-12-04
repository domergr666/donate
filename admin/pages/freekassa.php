<div class="col-md-6 col-xl-9">
<form id="projectmain" name="projectmain" action="975" method="post">
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title text-left">Настройки Free-Kassa</h3>
		</div>
		<div class="block-content text-left p-5">
		URL оповещения - <b><?php echo $_SERVER['HTTP_HOST']."/fk/request.php"; ?></b><br>
		URL возврата в случае успеха - <b><?php echo $_SERVER['HTTP_HOST']; ?></b><br>
		URL возврата в случае неудачи - <b><?php echo $_SERVER['HTTP_HOST']; ?></b><br>
		Метод оповещения - <b>везде POST</b><br>
		Подтверждение платежа - <b>не требуется</b>
		</div>
</form>

</div>