<?php


error_reporting(E_ALL);
ini_set('display_errors','On');
include "./../libs/functions.php";
session_start();






if(isset($_POST['password']) && $_POST['password']==$config['admin_pass']){
  $_SESSION['is_admin'] = true;
}




$pgs = getPages();
$select_tpl = '<select class="selectSection form-control"><option selected value="home">Главная</option>'; // Шаблон чтобы потом вставлять в JS
$i=0;
while($pg = $pgs->fetch_assoc()){
  $i++;
  $is_selected = '';
 // if($i == 1) $is_selected = 'selected="selected"';
  $select_tpl .= '<option value="'.$pg['page_id'].'" '.$is_selected.'>'.$pg['page_name'].'</option>';
}
$select_tpl .= '</select>';



if(!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']){
  echo '<form action="index.php" method="POST">
  <input type="text" name="password" placeholder="Пароль">
  <input type="submit" name="submit" value="Поехали!">
  <input type="hidden" name="method" value="auth">
</form>
</body>
</html>';
die();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Админ Панель</title>
        <meta property="og:title" content="Автодонат для сервера — MyDonate.su" />
        <meta name="description" content="MyDonate - система принятия донатов для игровых серверов. Мы предлагаем вам удобную панель с большим количеством возможностей для быстрого и удобного принятия донатов и зачисления их на ваш сервер!">

        <meta name="robots" content="all">
        <meta name="Keywords" content="автодонат, avtodonat, самп, майнкрафт, сайт, донат, ucp, minecraft, csgo, cs, платежи, приём, samp, гта, gta"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
                    <link rel="shortcut icon" href="/favicon.png">
        <link rel="stylesheet" href="./../css/slick.min.css">
        <link rel="stylesheet" href="./../css/slick-theme.min.css">
        <link rel="stylesheet" href="./../css/ion.rangeSlider.min.css">
        <link rel="stylesheet" href="./../css/ion.rangeSlider.skinHTML5.min.css">
        <link rel="stylesheet" href="./../css/bootstrap-colorpicker.min.css">
        <link rel="stylesheet" href="./../css/sweetalert2.min.css">
        <link rel="stylesheet" id="css-main" href="./../css/codebase.css">
                    <link rel="stylesheet" id="css-main" href="./../css/earth.min.css">

        
        <script src="./../js/jquery.min.js"></script>
        <script src="./../js/popper.min.js"></script>
        <script src="./../js/bootstrap.min.js"></script>
    
        <script src="./../js/es6-promise.auto.min.js"></script>
        <script src="./../js/sweetalert2.min.js"></script>
        <script type="text/javascript" src='js/admin.js'></script>

    </head>
     <body>             
<main id="main-container" style=" background-attachment: fixed; background-size: cover;">
    <div class="bg-black-op-75" style="min-height: 100vh">
        <div class="content content-full text-center pb-5">
            <div class="block block-themed block-rounded">
                <div class="block-header block-gd-cherry text-left">
                    <h3 class="block-title text-uppercase"><?=$config['sitename']?> - Админ Панель</h3>
                    <div class="block-options">
                        <div class="block-options-item">
                            <a href="/" class="text-white h5 font-w600" onclick="logOut(); return false;">Выйти</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row gutters-tiny pt-5" style="position: relative;">
                                        <div class="col-md-6 col-xl-3">
                                                <div class="list-group push">
                            <div class="list-group-item d-flex justify-content-between align-items-center pl-10">
                                <div class="font-size-sm font-w600 text-uppercase text-muted">ОСНОВНОЕ</div>
                            </div>
                            <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" style="border-radius: 0px !important;" href="?page=index">
                                Проект
                            </a>
                            <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" href="?page=settings">
                                Настройки проекта
                            </a>
                            <div class="list-group-item d-flex justify-content-between align-items-center pl-10">
                                <div class="font-size-sm font-w600 text-uppercase text-muted">КОМПОНЕНТЫ ПРОЕКТА</div>
                            </div>
                            <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" href="?page=goods">
                                Товары
                            </a>
                            <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" href="?page=promo">
                                Промокоды
                            </a>                            
                            <div class="list-group-item d-flex justify-content-between align-items-center pl-10">
                                <div class="font-size-sm font-w600 text-uppercase text-muted">Прочее</div>
                            </div>
                            <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" href="?page=console">
                                Консоль
                            </a>
                            <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" href="?page=freekassa">
                                Free-kassa
                            </a>
                        </div>
                    </div>
                        <?php
                            if(isset($_GET['page'])){
                                   echo '<div id="pageGetter" data-page="'.$_GET['page'].'" style="display: none;"></div>'; // Дабы из JS можно было проверять какая у нас страница
                                switch($_GET['page']){
                                    case 'index': include "pages/index.php";
                                    break;
                                    case 'settings': include "pages/settings.php";
                                    break;
                                    case 'goods': include "pages/goods.php";
                                    break;
                                    case 'sections': include "pages/sections.php";
                                    break;
                                    case 'promo': include "pages/promo.php";
                                    break;
                                    case 'freekassa': include "pages/freekassa.php";
                                    break;
                                    case 'testpay': include "pages/testpay.php";
                                    break;
                                    case 'update': include "pages/update.php";
                                    break;
                                    case 'console': include "pages/console.php";
                                    break;  
                                    case 'blocks': include "pages/blocks.php";
                                    break;
                                    case 'platform': include "pages/platform.php";
                                    break; 									
                                    default: include "pages/index.php";
                                    break;
                                }
                            }else{
                            include "pages/index.php";
                            }
                        ?>
                    <!--INCLUDE  -->
                    
</div>
</div>
</div>
</main>
<div class="modal" id="formmodal" tabindex="-1" role="dialog" aria-labelledby="formmodal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0" id="modalcontent"></div>
        </div>
    </div>
</div>

<script>


    let tableValues = []; // Все значения таблиц

function getSection(obj){
  return $(obj).attr('value');
}
function __modalRcon(){

    swal.queue([{
  title: 'Выполнить RCON команду',
  confirmButtonText: 'Выполнить!',
  html:`<input type="text" class="commandExec form-control" placeholder="Команда">`,
  showLoaderOnConfirm: true,
  preConfirm: () => {
      return sendRcon($('.commandExec:last-child').val()).then(r => {
        let text = 'Команда успешно выполнена!';
        if(parseInt(r)!=1) text = 'Произошла ошибка..';
        swal.insertQueueStep(text)
      });
  }
}])
}

  
  /* О да, это время JS! */

  function deleteDonate(id){
    if(confirm('Удалить?')){
      // Удаляем
    $.post('../api.php', {
      id: id,
      method:'donate.delete'
    }).then((r) => {
      if (r == 1){
        alert('Удачно!');
        location.href='?page=goods'
      } 
      else alert('Ошибка.')
    });
    }
  }
  function __editTable(id){

    let name = $(`#tr${id} td:eq(0)`).text();
    let command = $(`#tr${id} td:eq(1)`).text();
    let price = $(`#tr${id} td:eq(2)`).text();
    let {section, description} = window.goodsInfo[id];
    let scriptToEval =`-script_ $('.selectSection option[value="${section}"]').attr('selected', 'true')-script_`;
    let scriptEval = scriptToEval.replace('_', '>').replace('_', '>').replace('-', '<').replace('-', '</');

    description = description.replace(/<br\s*\/?>/mg,"\n");

setTimeout(()=> $(`.selectSection option[value="${section}"]`).prop('selected', 'true'), 300);
swal.queue([{
  title: 'Изменить привилегию',
  confirmButtonText: 'Изменить',
  html:`<form method="POST" action="/">
  <input type="text" class="form-control" class="form-control" name="nameD" placeholder="Имя привилегии">
  <input type="text" class="form-control" class="form-control" name="priceD" placeholder="Цена привилегии">
  <input type="text" class="form-control" class="form-control" name="commandD" placeholder="Команда привилегии">
  <textarea class="form-control" class="form-control" style='height: 300px;' name="descriptionD" placeholder="Описание привилегии" value="${description}"></textarea>
  <h3>Изменить раздел</h3>
  <?= $select_tpl ?>
  <?php

  ?>
  ${scriptEval}
 </form>`,
  showLoaderOnConfirm: true,
  preConfirm: () => {
    return $.post('../api.php', {name:$("input[name='nameD']").val(), price:$("input[name='priceD']").val(), command:$("input[name='commandD']").val(), section:getSection('.selectSection :selected'), description:$("textarea[name='descriptionD']").val(), method:'donate.edit', id:id}).then(
      (data) =>{ if(data == 1){

        location.href='?page=goods';

        swal.insertQueueStep('Успешно!');

      } 
           else swal.insertQueueStep('Произошла ошибка')}
    )
  }
}])

$("input[name='nameD']").val(name);
$("input[name='priceD']").val(price);
$("input[name='commandD']").val(command);
$("input[name='sectionD']").val(section);
$("textarea[name='descriptionD']").val(description);

  }
  
async function sendRcon(command){
return await $.post('../api.php', {command:command, method:'sendRcon'});
}
  
function __showModalWindow(){
swal.queue([{
  title: 'Добавить привилегию',
  confirmButtonText: 'Добавить',
  html:`<form method="POST" action="/">
  <input type="text" class="form-control" name="name" placeholder="Имя привилегии">
  <input type="text" class="form-control" name="price" placeholder="Цена привилегии">
  <input type="text" class="form-control" name="command" required pattern="^[a-zA-Z]+$" placeholder="Команда привилегии (Без /)">
  <p style="
    position: relative;
    font-size: 13px;
    margin-top: 6px;
">Если вы хотите выполнить несколько комманд, то разделяйте их ;</p>
<textarea class="form-control" name="description" style='height: 300px; display:none;' placeholder="Описание привилегии"></textarea>
  <h3>Выберите раздел</h3>
  <?= $select_tpl ?>
  <input type="hidden" name="method" value="add">
 </form>`,
  showLoaderOnConfirm: true,
  preConfirm: () => {
    return $.post('../api.php', {name:$("input[name='name']").val(), price:$("input[name='price']").val(), command:$("input[name='command']").val(), section:getSection('.selectSection :selected'), description:$("textarea[name='description']").val(), method:'donate.add'}).then(
      (data) =>{ if(data == 1){
        swal.insertQueueStep('Успешно!');
        location.href='?page=goods'
      } 
           else swal.insertQueueStep('Произошла ошибка')}
    )
  }
}])
}

function __modalPromo(){
swal.queue([{
  title: 'Добавить промокод',
  confirmButtonText: 'Добавить',
  html:`<form method="POST" action="admin.php">
  <input type="text" class="form-control" name="promo" placeholder="Промокод (До 11 символов)">
  <input type="text" class="form-control" name="discount" required pattern="^[ 0-9]+$" placeholder="Скидка (Без знака %)">
  <input type="text" class="form-control" name="count" placeholder="Количество использований">
  <input type="hidden" name="method" value="add">
 </form>`,
  showLoaderOnConfirm: true,
  preConfirm: () => {
    return $.post('../api.php', {promo:$("input[name='promo']").val(), discount:$("input[name='discount']").val(), count:$("input[name='count']").val(), method:'promo.add'}).then(
      (data) =>{ if(data == 1){
        swal.insertQueueStep('Успешно!');
        location.href='?page=promo'
      } 
           else swal.insertQueueStep('Произошла ошибка')}
    )
  }
}])
}

function __modalPages(){
swal.queue([{
  title: 'Добавить раздел',
  confirmButtonText: 'Добавить',
  html:`<form method="POST" action="admin.php">
  <input type="text" class="form-control" name="page_name" placeholder="Название раздела">
  <input type="text" class="form-control" name="page_id" required pattern="^[a-zA-Z]+$" placeholder="ID раздела (Без пробелов, латинскими буквами)">
  <input type="hidden" name="method" value="add">
 </form>`,
  showLoaderOnConfirm: true,
  preConfirm: () => {
    return $.post('../api.php', {page_name:$("input[name='page_name']").val(), page_id:$("input[name='page_id']").val(), method:'pages.add'}).then(
      (data) =>{ if(data == 1){
        swal.insertQueueStep('Успешно!');
        location.href='?page=sections'
      } 
           else swal.insertQueueStep('Произошла ошибка')}
    )
  }
}])
}

  function deletePromo(id){
    if(confirm('Удалить?')){
      // Удаляем
    $.post('../api.php', {
      id: id,
      method:'promo.delete'
    }).then((r) => {
      if (r == 1){
        alert('Удачно!');
        location.href='?page=promo'
      } 
      else alert('Ошибка.')
    });
    }
  }
  
  function deletePages(id){
    if(confirm('Удалить?')){
      // Удаляем
    $.post('../api.php', {
      id: id,
      method:'pages.delete'
    }).then((r) => {
      if (r == 1){
        alert('Удачно!');
        location.href='?page=sections'
      } 
      else alert('Ошибка.')
    });
    }
  }

$(document).on('click', '.buttonDown', function(e) {
    var row = $(this).parents("tr:first");
    let id = $($(e.currentTarget).parent().parent()[0]).attr('id').replace('tr', '');


    var insertTo = row.next().next();
    window.row = insertTo;
    row.insertAfter(insertTo);
    moveGood(id, 'down');
});

$(document).on('click', '.buttonUp', function(e) {
    var row = $(this).parents("tr:first");
    let id = $($(e.currentTarget).parent().parent()[0]).attr('id').replace('tr', '');

    var insertTo = row.prev().prev();
    // if(row.is('script')) insertTo = insertTo.prev();
    window.row = insertTo;

    row.insertBefore(insertTo);
    moveGood(id, 'up');
});
window.Request = new Set;

  async function moveGood(id, action){
    $('#saveGoodsButton').show();
/*    let response = await $.post('../api.php', {id, action, method:'donate.move'});*/
    window.Request.add(JSON.stringify({id, action, method:'donate.move'}));
    $(`#tr${id}`).css('background-color','#f5f1f1');
    setTimeout(()=>$(`#tr${id}`).css('background-color','#ffffff'), 700);
/*
    if(response == '-1') return false;
    await updateGoodsPage();
    console.log(response);*/
  }

  async function saveMovedGoods(){
    var promises = [];

    Request.forEach(item=>{
        const {parse} = JSON;
        let params = parse(item);

        let request = $.post('../api.php', params);
        promises.push(request);
    });

    await Promise.all(promises);

    refresh();
  }

  async function updateGoodsPage(){
    // $('table').css('-webkit-filter', 'blur(11px)');
    let r = await $.get('./pages/goods.php', {ajax:1});
    $('table').css('-webkit-filter', 'blur(0px)')
    $('table').html(r)
  }

  function deleteBlock(id, type) {
    if (confirm('Удалить?')) {
        // Удаляем
        $.post('../api.php', {
            id,
            type,
            method: 'block.remove'
        }).then((r) => {
            if (r == 1) {
                alert('Удачно!');
                $(`#tr${type}${id}`).remove();
                // location.href = '?page=blocks'
            } else alert('Ошибка.')
        });
    }
}

function editBlock(id, type) {

    let currentHtml = window.blocksContent[`tr${type}${id}`];
    let blockName = $(`#tr${type}${id}`).attr('data-name');
    console.log(blockName);
    swal.queue([{
        title: 'Изменить блок',
        confirmButtonText: 'Изменить',
        html: `<form method="POST" action="admin.php">
    <input type="text" class="form-control" id='blockNameInput' placeholder="Название блока" value='${blockName}'>
  <textarea class="form-control" class="form-control" placeholder='HTML или JS код' id='blockHtmlEdit' style = "height: 500px;">${currentHtml}</textarea>
 </form>`,
        showLoaderOnConfirm: true,
        preConfirm: () => {
            return $.post('../api.php', {
                html: $("#blockHtmlEdit").val(),
                name:$('#blockNameInput').val(),
                type,
                id,
                method: 'block.edit'
            }).then(
                (data) => {
                    if (data == 1) {
                        swal.insertQueueStep('Успешно!');
                        location.href = '?page=blocks'
                    } else swal.insertQueueStep('Произошла ошибка')
                }
            )
        }
    }])
}
function addBlock(type){
    swal.queue([{
  title: 'Добавить блок',
  confirmButtonText: 'Добавить',
  html:`<form method="POST" action="admin.php">
  <input type="text" class="form-control" id='blockNameAdd' placeholder="Название блока">
  <textarea class="form-control" class="form-control" placeholder='HTML или JS код' style='height: 500px;' id='blockHtmlAdd'></textarea>
 </form>`,
  showLoaderOnConfirm: true,
  preConfirm: () => {
    return $.post('../api.php', {html:$("#blockHtmlAdd").val(), name:$("#blockNameAdd").val(), type, method:'block.add'}).then(
      (data) =>{ if(data == 1){
        swal.insertQueueStep('Успешно!');
        location.href='?page=blocks'
      } 
           else swal.insertQueueStep('Произошла ошибка')}
    )
  }
}])
}

async function sendRconCommand(command){
    return await $.post('../api.php', {command, method:'sendAndGetRconResponse'});
}
</script>           </div>
    </body>
</html>
