<html>

<head>
    <meta charset="utf-8">
    <title>

    </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        @import "{$teplateWebPath}css/style.css";
        @import "{$teplateWebPath}css/header.css";
        @import "{$teplateWebPath}css/footer.css";
    </style>
</head>

<body style="background-color: {$_SESSION['bg-color']};">
    <script src="{$teplateWebPath}js/scripts.js"></script>
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
                        <a class="menu__item user_item" href="#0"> {$_SESSION['user']} </a>
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
                            <form action="index.php?controller=Roomer&action=get&page={$_SESSION['page']}" method="post">
                                <label>Показать
                                    <select id="mySelect" onchange="this.form.submit()" name="dropdownParam" class=" input-sm">
                                        <option value="{$_SESSION['limit']}">{$_SESSION['limit']}</option>
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                    </select> записей на странице
                                </label>
                            </form>
                        </div>
                    </caption>
                    <tr>
                        <th><a class="table_roomers th" href="index.php?controller=Roomer&action=get&order=surname&sort={$_SESSION['sort']}">фамилия</th></a>
                        <th><a class="table_roomers th" href="index.php?controller=Roomer&action=get&order=name&sort={$_SESSION['sort']}">имя</a></th>
                        <th><a class="table_roomers th" href="index.php?controller=Roomer&action=get&order=patronymic&sort={$_SESSION['sort']}">отчество</a></th>
                        <th><a class="table_roomers th" href="index.php?controller=Roomer&action=get&order=room_number&sort={$_SESSION['sort']}">№ комнаты</a></th>
                        <th><a class="table_roomers th" href="index.php?controller=Roomer&action=get&order=check_in_date&sort={$_SESSION['sort']}">дата заселения</a></th>
                        <th><a class="table_roomers th" href="index.php?controller=Roomer&action=get&order=check_out_date&sort={$_SESSION['sort']}">дата выселения</a></th>
                        <th><a class="table_roomers th" href="index.php?controller=Roomer&action=get&order=phone&sort={$_SESSION['sort']}">телефон</th>
                        <th colspan="2"><a class="button_below_table" onclick="openPopUp('NewRoomerPopUp')">Новый постоялец</a></th>
                    </tr>

                    {foreach $rsUsers as $person}
    
                        {if $person['phone'] != NULL}
                            <tr>
                                <td><a class="table_href" href="index.php?controller=Roomer&action=getPerson&id={$person['id']}">{$person['surname']}</a></td>
                                <td><a class="table_href" href="index.php?controller=Roomer&action=getPerson&id={$person['id']}">{$person['name']}</a></td>
                                <td><a class="table_href" href="index.php?controller=Roomer&action=getPerson&id={$person['id']}">{$person['patronymic']}</a></td>
                                <td>{$person['room_number']}</td>
                                <td>{$person['check_in_date']}</td>
                                <td>{$person['check_out_date']}</td>
                                <td>{$person['phone']}</td>
                                <td><a class="table_href" onclick="openEditing('{$person['surname']}','{$person['name']}','{$person['patronymic']}','{$person['room_number']}','{$person['check_in_date']}','{$person['check_out_date']}','{$person['phone']}','{$person['id']}' )">Редактировать</a></td>
                                <td><a class="table_href" onclick="deleteFoo('Delete&id={$person['id']}')">Удалить</a></td>
        
                            </tr>
                        {/if}
    
                    {/foreach}
                </table>

                <div class="dataTables_info" id="tableTasks_info" role="status" aria-live="polite">
                    Показано с {1 + $_SESSION['offset']} по

                    {if $_SESSION['limit'] + $_SESSION['offset']> $_SESSION['numPosts']}
                        {$_SESSION['numPosts']}
                    {else} {$_SESSION['limit'] + $_SESSION['offset']}
                    {/if}

                    из {$_SESSION['numPosts']} записей

                    {* // Проверяем нужна ли стрелка последней страницы *}
                    {if $_SESSION['page'] != $_SESSION['totalPages']}
                        <a class="pagination_button" href="index.php?controller=Roomer&action=get&page={$_SESSION['totalPages']}">>></a>
                    {/if}

                    {* // Проверяем нужны ли стрелки вперед *}
                    {if $_SESSION['page'] < $_SESSION['totalPages'] } <a class="pagination_button" href="index.php?controller=Roomer&action=get&page={$_SESSION['page'] + 1}">></a>{/if}

                        {* // Вывод текущей страницы *}
                        <a class="pagination_button" style="cursor: default;  padding: 10px 10px;">{$_SESSION['page']}</a>

                        {* // Проверяем нужны ли стрелки назад *}
                        {if $_SESSION['page'] != 1 }<a class="pagination_button" href="index.php?controller=Roomer&action=get&page={$_SESSION['page'] - 1}">
                            < </a>{/if}
                                {* // Проверяем нужна ли стрелка первой страницы *}
                                {if $_SESSION['page'] != 1}<a class="pagination_button" href="index.php?controller=Roomer&action=get&page=1">
                                    << </a>{/if}

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
                                {literal}<input id="inputRoomerSurame" class="log-in__field" value="" minlength="2" maxlength="30" name="surname" pattern="[A-Za-zА-Яа-яЁё]{2,30}">{/literal}
                            </div>
                        </div>
                        <div class="_row">
                            <div class="_column">
                                <label class="sign-up__label">Name</label>
                                {literal}<input id="inputRoomerName" class="log-in__field" value="" minlength="2" maxlength="30" name="name" pattern="[A-Za-zА-Яа-яЁё]{2,30}">{/literal}
                            </div>
                        </div>
                        <div class="_row">
                            <div class="_column">
                                <label class="sign-up__label">Patronymic</label>
                                {literal}<input id="inputRoomerPatronymic" class="log-in__field " value="" maxlength="30" name="patronymic" pattern="[A-Za-zА-Яа-яЁё]{0,30}">{/literal}
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
                                {literal}<input id="inputRoomerPhone" class="log-in__field" type="tel" value="" maxlength="11" pattern="[0-9]{11}" name="phone">{/literal}
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
                                {literal}<input id="newRoomerSurame" class="sign-up__field" value="" minlength="2" maxlength="30" name="surname" pattern="[A-Za-zА-Яа-яЁё]{2,30}" required>{/literal}
                            </div>
                        </div>
                        <div class="_row">
                            <div class="_column">
                                <label class="sign-up__label">Name</label>
                                {literal}<input id="newRoomerName" class="sign-up__field" value="" minlength="2" maxlength="30" pattern="[A-Za-zА-Яа-яЁё]{2,30}" name="name" required>{/literal}
                            </div>
                        </div>
                        <div class="_row">
                            <div class="_column">
                                <label class="sign-up__label">Patronymic</label>
                                {literal}<input id="newRoomerPatronymic" class="sign-up__field " maxlength="30" value="" name="patronymic" pattern="[A-Za-zА-Яа-яЁё]{0,30}">{/literal}
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
                                {literal}<input id="newRoomerLogin" class="sign-up__field" value="" minlength="2" maxlength="30" name="login" required pattern="[A-Za-z]{1}[A-Za-z0-9]{1,29}">{/literal}
                            </div>
                        </div>
                        <div class="_row">
                            <div class="_column">
                                <label class="sign-up__label" for="email">Email</label>
                                {literal}<input id="newRoomerEmail" class="sign-up__field email_img" type="email" name="email" value="" minlength="2" maxlength="40" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"> {/literal}
                            </div>
                        </div>
                        <div class="_row">
                            <div class="_column">
                                <label class="sign-up__label">Phone number</label>
                                {literal} <input id="newRoomerPhone" class="sign-up__field" type="tel" value="" maxlength="11" pattern="[0-9]{11}" name="phone" required>{/literal}
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


    {if $ERROR['error'] != NULL}
        <div class="popup" id="ERROR" style="display: flex;">
            <div class="popup__container">
                <div class="sign-up__content">
                    <div class="error">{$ERROR['error']}</div>
                </div>
                <button class="popup__close" type="button" onclick="closePopUp('ERROR')">Закрыть окно</button>
            </div>
        </div>
    {/if}

    </div>