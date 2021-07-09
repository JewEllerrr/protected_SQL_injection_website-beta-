<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-08 23:26:13
  from 'W:\domains\xn--80aabz6blh\views\default\pageForStuff.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fcfe165f1c7d7_59860471',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '08d1091508d522bbae60dd6fc0eb70dc24fe3f80' => 
    array (
      0 => 'W:\\domains\\xn--80aabz6blh\\views\\default\\pageForStuff.tpl',
      1 => 1607459119,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fcfe165f1c7d7_59860471 (Smarty_Internal_Template $_smarty_tpl) {
?> <html>

 <head>
     <meta charset="utf-8">
     <title>

     </title>
     <style>
         @import "<?php echo $_smarty_tpl->tpl_vars['teplateWebPath']->value;?>
css/style.css";
         @import "<?php echo $_smarty_tpl->tpl_vars['teplateWebPath']->value;?>
css/header.css";
         @import "<?php echo $_smarty_tpl->tpl_vars['teplateWebPath']->value;?>
css/footer.css";
     </style>
 </head>

 <body>
     <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['teplateWebPath']->value;?>
js/scripts.js"><?php echo '</script'; ?>
>
     <header class="header" style="min-width: 100%">
         <div class="container">
             <div class="panel">
                 <a href="#0" class="logo"><span class="logo__label">Ор</span>эх</a>
                 <nav class="menu_header">
                     <form method="post" action="index.php">
                         <a class="menu__item" href="#0">Главная</a>
                         <a class="menu__item" href="#0">О Базе</a>
                         <a class="menu__item" href="#0">Цены</a>
                         <a class="menu__item" href="#0">Контакты</a>
                         <a class="menu__item user_item" href="#0"> <?php echo $_smarty_tpl->tpl_vars['rsUsers']->value['user'];?>
 </a>
                         <input type="hidden" name="logout-submit" value="logout">
                         <button class="button_header" type="submit"><span class="button-label">Logout</span></button>
                     </form>
                 </nav>
             </div>
             <span class="slogan">Турбаза "Орэх"</span>
         </div>
         <div class="container">
             <table class="table_for_stuff">
                 <tr>
                     <th>Персонал</th>
                     <th>Постоялец</th>
                     <th>Номер</th>
                 </tr>
                 <tr>
                     <td><a class="table_button" href="#0">График работы</a></td>
                     <td><a class="table_button" onclick="openPopUp('NewRoomerPopUp')">Новый постоялец</a></td>
                     <td><a class="table_button" href="#0">Свободные номера</a></td>
                 </tr>
                 <tr>
                     <td></td>
                     <td><a class="table_button" href="/www/index.php?controller=Roomer&action=get">Все постояльцы</a></td>
                     <td><a class="table_button">Занятые номера</a></td>
                 </tr>
                 <tr>
                     <td></td>
                     <td></td>
                     <td><a class="table_button" href="#0">Список услуг</a></td>
                 </tr>
             </table>
         </div>
     </header>


     <div class="popup" id="NewRoomerPopUp">
     <div class="popup__container">
         <div class="sign-up">
             <div class="sign-up__content">
                     <form class="_form" onsubmit="return checkDate();" method="post" action="/www/index.php?controller=Roomer&action=addNewRoomerByStaff" name="newRoomerForm">
                         <div class="_row">
                             <div class="_column">
                                 <label class="sign-up__label">Surname</label>
                                 <input id="newRoomerSurame" class="sign-up__field" value="" minlength="2" maxlength="30" name="surname" pattern="[A-Za-zА-Яа-яЁё]{2,30}" required>
                             </div>
                         </div>
                         <div class="_row">
                             <div class="_column">
                                 <label class="sign-up__label">Name</label>
                                 <input id="newRoomerName" class="sign-up__field" value="" minlength="2" maxlength="30" pattern="[A-Za-zА-Яа-яЁё]{2,30}" name="name" required>
                             </div>
                         </div>
                         <div class="_row">
                             <div class="_column">
                                 <label class="sign-up__label">Patronymic</label>
                                 <input id="newRoomerPatronymic" class="sign-up__field " maxlength="30" value="" name="patronymic" pattern="[A-Za-zА-Яа-яЁё]{0,30}">
                             </div>
                         </div>
                         <div class="_row">
                             <div class="_column">
                                 <label class="sign-up__label">Room number</label>
                                 <input id="newRoomerRoom_number" class="sign-up__field " type="number" value="" min="1" max="20" name="room_number" title="min 1, max 20" required>
                             </div>
                         </div>
                         <div class="_row">
                             <div class="_column">
                                 <label class="sign-up__label">Additional services</label>
                                 <input id="newRoomerAdditional_services" class="sign-up__field" maxlength="250" value="" name="additional_services">
                             </div>
                         </div>
                         <div class="_row">
                             <div class="_column">
                                 <label class="sign-up__label">Check-in date</label>
                                 <input id="newRoomerCheck_in_date" class="sign-up__field" type="date" value="" name="check_in_date" required>
                             </div>
                         </div>
                         <div class="_row">
                             <div class="_column">
                                 <label class="sign-up__label">Check-out date</label>
                                 <input id="newRoomerCheck_out_date" class="sign-up__field" type="date" value="" name="check_out_date" required>
                             </div>
                         </div>
                         <div class="_row">
                             <div class="_column">
                                 <label class="sign-up__label">Login</label>
                                 <input id="newRoomerLogin" class="sign-up__field" value="" minlength="2" maxlength="30" name="login" required pattern="[A-Za-z]{1}[A-Za-z0-9]{1,29}">
                             </div>
                         </div>
                         <div class="_row">
                             <div class="_column">
                                 <label class="sign-up__label" for="email">Email</label>
                                 <input id="newRoomerEmail" class="sign-up__field email_img" type="email" name="email" value="" minlength="2" maxlength="40" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"> 
                             </div>
                         </div>
                         <div class="_row">
                             <div class="_column">
                                 <label class="sign-up__label">Phone number</label>
                                  <input id="newRoomerPhone" class="sign-up__field" type="tel" value="" maxlength="11" pattern="[0-9]{11}" name="phone" required>
                             </div>
                         </div>
                         <div class="_row">
                             <button class="_button" type="submit" style="margin-left: auto; margin-right: auto;"><span class="button-label">Register</span></button>
                         </div>
                     </form>
             </div>
         </div>
         <button class="popup__close" type="button" onclick="closePopUp('NewRoomerPopUp')">Закрыть окно</button>
     </div>
 </div>
 </div><?php }
}
