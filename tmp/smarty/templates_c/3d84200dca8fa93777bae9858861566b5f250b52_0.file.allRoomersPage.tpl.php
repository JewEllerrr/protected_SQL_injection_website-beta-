<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-10 04:48:17
  from 'W:\domains\xn--80aabz6blh\views\default\allRoomersPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fd17e61d06405_99139968',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3d84200dca8fa93777bae9858861566b5f250b52' => 
    array (
      0 => 'W:\\domains\\xn--80aabz6blh\\views\\default\\allRoomersPage.tpl',
      1 => 1607564894,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fd17e61d06405_99139968 (Smarty_Internal_Template $_smarty_tpl) {
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

<body style="background-color: <?php echo $_smarty_tpl->tpl_vars['_SESSION']->value['bg-color'];?>
;">
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

    </header>

    <div class="container" style="min-height: 65%;">
        <div class="panel-body">
            <div style="width: 100%;">
                <table class="table_roomers">
                    <caption>
                        <label style="font-size: 40px">Постояльцы</label>
                        <div class="dataTables_length" style="text-align: left;" id="tableTasks_length">
                            <form action="index.php?controller=Roomer&action=get&page=<?php echo $_smarty_tpl->tpl_vars['_SESSION']->value['page'];?>
" method="post">
                                <label>Показать
                                    <select id="mySelect" onchange="this.form.submit()" name="dropdownParam" class=" input-sm">
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['_SESSION']->value['limit'];?>
"><?php echo $_smarty_tpl->tpl_vars['_SESSION']->value['limit'];?>
</option>
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                    </select> записей на странице
                                </label>
                            </form>
                        </div>
                    </caption>
                    <tr>
                        <th><a class="table_roomers th" href="index.php?controller=Roomer&action=get&order=surname&sort=<?php echo $_smarty_tpl->tpl_vars['_SESSION']->value['sort'];?>
">фамилия</th></a>
                        <th><a class="table_roomers th" href="index.php?controller=Roomer&action=get&order=name&sort=<?php echo $_smarty_tpl->tpl_vars['_SESSION']->value['sort'];?>
">имя</a></th>
                        <th><a class="table_roomers th" href="index.php?controller=Roomer&action=get&order=patronymic&sort=<?php echo $_smarty_tpl->tpl_vars['_SESSION']->value['sort'];?>
">отчество</a></th>
                        <th><a class="table_roomers th" href="index.php?controller=Roomer&action=get&order=room_number&sort=<?php echo $_smarty_tpl->tpl_vars['_SESSION']->value['sort'];?>
">№ комнаты</a></th>
                        <th><a class="table_roomers th" href="index.php?controller=Roomer&action=get&order=check_in_date&sort=<?php echo $_smarty_tpl->tpl_vars['_SESSION']->value['sort'];?>
">дата заселения</a></th>
                        <th><a class="table_roomers th" href="index.php?controller=Roomer&action=get&order=check_out_date&sort=<?php echo $_smarty_tpl->tpl_vars['_SESSION']->value['sort'];?>
">дата выселения</a></th>
                        <th><a class="table_roomers th" href="index.php?controller=Roomer&action=get&order=phone&sort=<?php echo $_smarty_tpl->tpl_vars['_SESSION']->value['sort'];?>
">телефон</th>
                        <th colspan="2"><a class="button_below_table" onclick="openPopUp('NewRoomerPopUp')">Новый постоялец</a></th>
                    </tr>

                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsUsers']->value, 'person');
$_smarty_tpl->tpl_vars['person']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['person']->value) {
$_smarty_tpl->tpl_vars['person']->do_else = false;
?>
    
                        <?php if ($_smarty_tpl->tpl_vars['person']->value['phone'] != NULL) {?>
                            <tr>
                                <td><a class="table_href" href="index.php?controller=Roomer&action=getPerson&id=<?php echo $_smarty_tpl->tpl_vars['person']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['person']->value['surname'];?>
</a></td>
                                <td><a class="table_href" href="index.php?controller=Roomer&action=getPerson&id=<?php echo $_smarty_tpl->tpl_vars['person']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['person']->value['name'];?>
</a></td>
                                <td><a class="table_href" href="index.php?controller=Roomer&action=getPerson&id=<?php echo $_smarty_tpl->tpl_vars['person']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['person']->value['patronymic'];?>
</a></td>
                                <td><?php echo $_smarty_tpl->tpl_vars['person']->value['room_number'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['person']->value['check_in_date'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['person']->value['check_out_date'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['person']->value['phone'];?>
</td>
                                <td><a class="table_href" onclick="openEditing('<?php echo $_smarty_tpl->tpl_vars['person']->value['surname'];?>
','<?php echo $_smarty_tpl->tpl_vars['person']->value['name'];?>
','<?php echo $_smarty_tpl->tpl_vars['person']->value['patronymic'];?>
','<?php echo $_smarty_tpl->tpl_vars['person']->value['room_number'];?>
','<?php echo $_smarty_tpl->tpl_vars['person']->value['check_in_date'];?>
','<?php echo $_smarty_tpl->tpl_vars['person']->value['check_out_date'];?>
','<?php echo $_smarty_tpl->tpl_vars['person']->value['phone'];?>
','<?php echo $_smarty_tpl->tpl_vars['person']->value['id'];?>
' )">Редактировать</a></td>
                                <td><a class="table_href" onclick="deleteFoo('Delete&id=<?php echo $_smarty_tpl->tpl_vars['person']->value['id'];?>
')">Удалить</a></td>
        
                            </tr>
                        <?php }?>
    
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </table>

                <div class="dataTables_info" id="tableTasks_info" role="status" aria-live="polite">
                    Показано с <?php echo 1+$_smarty_tpl->tpl_vars['_SESSION']->value['offset'];?>
 по

                    <?php if ($_smarty_tpl->tpl_vars['_SESSION']->value['limit']+$_smarty_tpl->tpl_vars['_SESSION']->value['offset'] > $_smarty_tpl->tpl_vars['_SESSION']->value['numPosts']) {?>
                        <?php echo $_smarty_tpl->tpl_vars['_SESSION']->value['numPosts'];?>

                    <?php } else { ?> <?php echo $_smarty_tpl->tpl_vars['_SESSION']->value['limit']+$_smarty_tpl->tpl_vars['_SESSION']->value['offset'];?>

                    <?php }?>

                    из <?php echo $_smarty_tpl->tpl_vars['_SESSION']->value['numPosts'];?>
 записей

                                        <?php if ($_smarty_tpl->tpl_vars['_SESSION']->value['page'] != $_smarty_tpl->tpl_vars['_SESSION']->value['totalPages']) {?>
                        <a class="pagination_button" href="index.php?controller=Roomer&action=get&page=<?php echo $_smarty_tpl->tpl_vars['_SESSION']->value['totalPages'];?>
">>></a>
                    <?php }?>

                                        <?php if ($_smarty_tpl->tpl_vars['_SESSION']->value['page'] < $_smarty_tpl->tpl_vars['_SESSION']->value['totalPages']) {?> <a class="pagination_button" href="index.php?controller=Roomer&action=get&page=<?php echo $_smarty_tpl->tpl_vars['_SESSION']->value['page']+1;?>
">></a><?php }?>

                                                <a class="pagination_button" style="cursor: default;  padding: 10px 10px;"><?php echo $_smarty_tpl->tpl_vars['_SESSION']->value['page'];?>
</a>

                                                <?php if ($_smarty_tpl->tpl_vars['_SESSION']->value['page'] != 1) {?><a class="pagination_button" href="index.php?controller=Roomer&action=get&page=<?php echo $_smarty_tpl->tpl_vars['_SESSION']->value['page']-1;?>
">
                            < </a><?php }?>
                                                                <?php if ($_smarty_tpl->tpl_vars['_SESSION']->value['page'] != 1) {?><a class="pagination_button" href="index.php?controller=Roomer&action=get&page=1">
                                    << </a><?php }?>

                </div>
                <div style="width: 100%;"> <a class="button_below_table" style="dispaly:block; float:right; clear:right" href="index.php">Назад</a> </div>
            </div>
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


    <?php if ($_smarty_tpl->tpl_vars['ERROR']->value['error'] != NULL) {?>
        <div class="popup" id="ERROR" style="display: flex;">
            <div class="popup__container">
                <div class="sign-up__content">
                    <div class="error"><?php echo $_smarty_tpl->tpl_vars['ERROR']->value['error'];?>
</div>
                </div>
                <button class="popup__close" type="button" onclick="closePopUp('ERROR')">Закрыть окно</button>
            </div>
        </div>
    <?php }?>

    </div><?php }
}
