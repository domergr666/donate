<?php
                    $FkHide = 'style="display:none;"';
                    if($config['mode'] != 2) $FkHide = '';
                    $LkPass = 'style="display:none;"';
                    if($config['mode'] != 1) $LkPass = '';
                    $md_secret_word = 'style="display:none;"';
                    if($config['mode'] != 1) $md_secret_word = '';
			
?>
<div class="col-md-6 col-xl-9">
<form id="projectsettings" name="projectsettings" action="" method="post">
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title text-left">Настройки проекта</h3>
        </div>
        <div class="block-content block-content-full">
            <div class="row">
                <div class="col-md-12 col-xl-12 pl-10">
                    <div class="block block-rounded block-bordered text-left mb-10">
                        <div class="block-content block-content-full clearfix">
                            <div class="font-size-sm font-w600 text-uppercase text-muted mb-10">НАСТРОЙКИ САЙТА</div>
                            <div class="form-group row mb-10">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">Название сайта</span>
                                        <input type="text" class="form-control" id="sitename" name="sitename" value="<?=$config['sitename']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-10">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">Пароль от админки</span>
                                        <input type="text" class="form-control" id="admin_pass" name="admin_pass" value="<?=$config['admin_pass']?>">
                                    </div>
                                </div>
                            </div>
                            <!--<div class="form-group row mb-10">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">Пароль разработчика</span>
                                        <input type="text" class="form-control" id="dev_pass" name="dev_pass" value="<?=$config['dev_pass']?>">
                                    </div>
                                </div>
                            </div>
							<div class="form-group row mb-10" <?=$LkPass ?> >
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">Пароль личного кабинета</span>
                                        <input type="text" class="form-control" id="lk_pass" name="lk_pass" value="<?=$config['lk_pass']?>">
                                    </div>
                                </div>
							</div>
							<div class="form-group row mb-10" <?=$md_secret_word ?> >
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">Секретный ключ 1</span>
                                        <input type="text" class="form-control" id="md_secret.word1" name="md_secret.word1" value="<?=$config['md_secret.word1']?>">
                                    </div>
                                </div>
							</div>
							<div class="form-group row mb-10" <?=$md_secret_word ?> >
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">Секретный ключ 2</span>
                                        <input type="text" class="form-control" id="md_secret.word2" name="md_secret.word2" value="<?=$config['md_secret.word2']?>">
                                    </div>
                                </div>
							</div>
							<div class="form-group row mb-10" <?=$md_secret_word?> >
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">Секретный ключ 3</span>
                                        <input type="text" class="form-control" id="md_secret.word3" name="md_secret.word3" value="<?=$config['md_secret.word3']?>">
                                    </div>
                                </div>
							</div>-->
                            <div class="form-group row mb-10">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">Группа ВК</span>
                                        <input type="text" class="form-control" id="vk_group_domain" name="vk_group_domain" value="<?=$config['vk_group_domain']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-10">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">Ссылка на правила</span>
                                        <input type="text" class="form-control" id="rules" name="rules" value="<?=$config['rules']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-10">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">Ссылка на контакты</span>
                                        <input type="text" class="form-control" id="support" name="support" value="<?=$config['support']?>">
                                    </div>
                                </div>
                            </div>					
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xl-12 pl-10">
                    <div class="block block-rounded block-bordered text-left mb-10">
                        <div class="block-content block-content-full clearfix">
                            <div class="font-size-sm font-w600 text-uppercase text-muted mb-10">НАСТРОЙКИ СЕРВЕРА</div>
                            <div class="form-group row mb-10">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">IP</span>
                                        <input type="text" class="form-control" id="server_ip" name="server_ip" value="<?=$config['server_ip']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-10">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">Порт</span>
                                        <input type="text" class="form-control" id="server_port" name="server_port" value="<?=$config['server_port']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-10">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">RCON порт</span>
                                        <input type="text" class="form-control" id="server_rcon.port" name="server_rcon.port" value="<?=$config['server_rcon.port']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-10">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">RCON пароль</span>
                                        <input type="text" class="form-control" id="server_rcon.pass" name="server_rcon.pass" value="<?=$config['server_rcon.pass']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-10">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">Query порт</span>
                                        <input type="text" class="form-control" id="server_query.port" name="server_query.port" value="<?=$config['server_query.port']?>">
                                    </div>
                                </div>
                            </div>						
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xl-12 pl-10">
                    <div class="block block-rounded block-bordered text-left mb-10">
                        <div class="block-content block-content-full clearfix" id="fkSetup" <?= $FkHide ?>>
                            <div class="font-size-sm font-w600 text-uppercase text-muted mb-10">НАСТРОЙКИ ОПЛАТЫ FREE-KASSA</div>
                            <div class="form-group row mb-10">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">ID кассы</span>
                                        <input type="text" class="form-control" id="fk_merchant.id" name="fk_merchant.id" value="<?=$config['fk_merchant.id']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-10">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">Секретное слово 1</span>
                                        <input type="text" class="form-control" id="fk_secret.word" name="fk_secret.word" value="<?=$config['fk_secret.word']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-10">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">Секретное слово 2</span>
                                        <input type="text" class="form-control" id="fk_secret.word2" name="fk_secret.word2" value="<?=$config['fk_secret.word2']?>">
                                    </div>
                                </div>
                            </div>						
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xl-12 pt-10">
                    <button type="submit" class="btn btn-lg btn-primary min-width-300" onclick="saveData(); return false;">Сохранить</button>
                     
                </div>
            </div>
        </div>
    </div>
</form>
</div>