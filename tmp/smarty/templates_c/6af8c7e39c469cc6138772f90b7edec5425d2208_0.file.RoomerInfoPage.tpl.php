<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-10 00:41:29
  from 'W:\domains\xn--80aabz6blh\views\default\RoomerInfoPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fd14489202fe7_53481091',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6af8c7e39c469cc6138772f90b7edec5425d2208' => 
    array (
      0 => 'W:\\domains\\xn--80aabz6blh\\views\\default\\RoomerInfoPage.tpl',
      1 => 1607550087,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fd14489202fe7_53481091 (Smarty_Internal_Template $_smarty_tpl) {
?><html>

<head>
    <meta charset="utf-8">
    <title>

    </title>
    <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"><?php echo '</script'; ?>
>
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
    <header class="header" style="min-height: 15%;">
        <div class="container">
            <div class="panel">
                <a href="#0" class="logo"><span class="logo__label">Ор</span>эх</a>
                <nav class="menu_header">
                    <form method="post" action="index.php">
                        <a class="menu__item" href="#0">Главная</a>
                        <a class="menu__item" href="#0">О Базе</a>
                        <a class="menu__item" href="#0">Цены</a>
                        <a class="menu__item" href="#0">Контакты</a>
                        <a class="menu__item user_item" href="#0"> <?php echo $_smarty_tpl->tpl_vars['_SESSION']->value['user'];?>
 </a>
                        <input type="hidden" name="logout-submit" value="logout">
                        <button class="button_header" type="submit"><span class="button-label">Logout</span></button>
                    </form>
                </nav>
            </div>
            <span class="slogan">Турбаза "Орэх"</span>
        </div>


        <div class="container" style="min-height: 65%; ">
        <div style="width: 100%;">
            <table class="table_roomers" style="margin-top: 10px; width:40%">
                <caption>
                    <label style="font-size: 40px">Инфо</label>
                </caption>
                <tr>
                    <td>Фамилия:</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['info']->value[0]['surname'];?>
</td>
                </tr>
                <tr>
                    <td>Имя:</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['info']->value[0]['name'];?>
</td>
                </tr>
                <tr>
                    <td>Отчество:</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['info']->value[0]['patronymic'];?>
</td>
                </tr>
                <tr>
                    <td>№ Комнаты:</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['info']->value[0]['room_number'];?>
</td>
                </tr>
                <tr>
                    <td>Дата заселения:</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['info']->value[0]['check_in_date'];?>
</td>
                </tr>
                <tr>
                    <td>Дата выселения:</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['info']->value[0]['check_out_date'];?>
</td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['info']->value[0]['email'];?>
</td>
                </tr>
                <tr>
                    <td>Телефон:</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['info']->value[0]['phone'];?>
</td>
                </tr>
                <tr>
                    <td>Наименование услуги:</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['info']->value[1][0]['name_of_service'];?>
</td>
                </tr>
                <tr>
                    <td>Фамилия обсуж. персонала:</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['info']->value[1][0]['surname'];?>
</td>
                </tr>
                <tr>
                    <td>Имя обсуж. персонала:</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['info']->value[1][0]['name'];?>
</td>
                </tr>
                <tr>
                    <td>Дата регистрации аккаунта:</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['info']->value[0]['registration_date'];?>
</td>
                </tr>
            </table>
        </div>
        
        <div style="margin-left: auto; margin-right: auto; width:40%; margin-top:10px" >
            <a class="button_below_table" href="/www/index.php?controller=Roomer&action=get">Назад</a>
            <a class="button_below_table" onclick="deleteFoo('Delete&id=<?php echo $_smarty_tpl->tpl_vars['info']->value[0]['id'];?>
')">Удалить</a>
            <a class="button_below_table" onclick="openEditing('<?php echo $_smarty_tpl->tpl_vars['info']->value[0]['surname'];?>
','<?php echo $_smarty_tpl->tpl_vars['info']->value[0]['name'];?>
','<?php echo $_smarty_tpl->tpl_vars['info']->value[0]['patronymic'];?>
','<?php echo $_smarty_tpl->tpl_vars['info']->value[0]['room_number'];?>
','<?php echo $_smarty_tpl->tpl_vars['info']->value[0]['additional_services'];?>
','<?php echo $_smarty_tpl->tpl_vars['info']->value[0]['check_in_date'];?>
','<?php echo $_smarty_tpl->tpl_vars['info']->value[0]['check_out_date'];?>
','<?php echo $_smarty_tpl->tpl_vars['info']->value[0]['phone'];?>
','<?php echo $_smarty_tpl->tpl_vars['info']->value[0]['id'];?>
' )">Редактировать</a>
            </div>
            </div>

        <div class="popup" id="Editing">
            <div class="popup__container">
                <div class="sign-up">
                    <div class="sign-up__content">
                        <form class="_form" method="post" action="/www/index.php?controller=Roomer&action=editRoomerByStaff">
                            <input id="inputRoomerID" type="hidden" value="" name="id">
                            <div class="_row">
                                <div class="_column">
                                    <label class="sign-up__label">Surname</label>
                                    <input id="inputRoomerSurame" class="log-in__field" value="" minlength="2" maxlength="30" name="surname" pattern="[A-Za-zА-Яа-яЁё]{2,30}">
                                </div>
                            </div>
                            <div class="_row">
                                <div class="_column">
                                    <label class="sign-up__label">Name</label>
                                    <input id="inputRoomerName" class="log-in__field" value="" minlength="2" maxlength="30" name="name" pattern="[A-Za-zА-Яа-яЁё]{2,30}">
                                </div>
                            </div>
                            <div class="_row">
                                <div class="_column">
                                    <label class="sign-up__label">Patronymic</label>
                                    <input id="inputRoomerPatronymic" class="log-in__field " value="" maxlength="30" name="patronymic" pattern="[A-Za-zА-Яа-яЁё]{0,30}">
                                </div>
                            </div>
                            <div class="_row">
                                <div class="_column">
                                    <label class="sign-up__label">Room number</label>
                                    <input id="inputRoomerRoom_number" class="log-in__field " type="number" value="" min="1" max="20" name="room_number" title="min 1, max 20">
                                </div>
                            </div>
                            <div class="_row">
                                <div class="_column">
                                    <label class="sign-up__label">Additional services</label>
                                    <input id="inputRoomerAdditional_services" class="log-in__field" value="" maxlength="30" name="additional_services">
                                </div>
                            </div>
                            <div class="_row">
                                <div class="_column">
                                    <label class="sign-up__label">Check-in date</label>
                                    <input id="inputRoomerCheck_in_date" class="log-in__field" type="date" value="" name="check_in_date">
                                </div>
                            </div>
                            <div class="_row">
                                <div class="_column">
                                    <label class="sign-up__label">Check-out date</label>
                                    <input id="inputRoomerCheck_out_date" class="log-in__field" type="date" value="" name="check_out_date">
                                </div>
                            </div>
                            <div class="_row">
                                <div class="_column">
                                    <label class="sign-up__label">Phone number</label>
                                    <input id="inputRoomerPhone" class="log-in__field" type="tel" value="" maxlength="11" pattern="[0-9]{11}" name="phone">
                                </div>
                            </div>
                            <div class="_row">
                                <button class="_button" style="margin-left: auto; margin-right: auto;"><span class="button-label">Edit</span></button>
                            </div>
                        </form>
                    </div>
                </div>
                <button class="popup__close" type="button" onclick="closePopUp('Editing')">Закрыть окно</button>
            </div>
        </div>

    </header><?php }
}
