<html>

<head>
    <meta charset="utf-8">
    <title>

    </title>
    <style>
        @import "{$teplateWebPath}css/style.css";
        @import "{$teplateWebPath}css/header.css";
        @import "{$teplateWebPath}css/footer.css";
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>

<body>
    <script src="{$teplateWebPath}js/scripts.js"></script>
    <header class="header">
        <div class="container">
            <div class="panel">
                <a href="#0" class="logo"><span class="logo__label">Ор</span>эх</a>
                <nav class="menu_header">
                    <a class="menu__item" href="#0">Главная</a>
                    <a class="menu__item" href="#0">О Базе</a>
                    <a class="menu__item" href="#0">Цены</a>
                    <a class="menu__item" href="#0">Контакты</a>
                    <button class="button_header" onclick="openPopUp('LogIn')">LogIn</button>
                    <button class="button_header" onclick="openPopUp('SignUp')">Sign Up</button>
                </nav>
            </div>
            <span class="slogan">Турбаза "Орэх"</span>
        </div>
    </header>

    <div class="popup" id="SignUp">
        <div class="popup__container">
            <div class="sign-up">
                <header class="sign-up__header">
                    <h3 class="sign-up__title">Sign Up!</h3>
                    <span class="sign-up__hint">It's free and takes less than 30 seconds</span>
                </header>
                <div id = "registerBox" class="sign-up__content">
                    <form class="_form" method = "post" action = "index.php">
                        <div class="_row">
                            <div class="_column">
                                <label class="sign-up__label" for="login">Enter your login</label>
                                <input id="sign-up_login" class="sign-up__field login_img" placeholder="Например, lollipop" name="sign-up_login" value = "" required>
                            </div>
                            <div class="_column">
                                <label class="sign-up__label" for="email">Enter your email</label>
                                <input id="email" class="sign-up__field email_img" type="email" placeholder="Например, lollipop@gmail.ru" name="email" value = "" required>
                            </div>
                        </div>
                        <div class="_row">
                            <div class="_column">
                                <label class="sign-up__label" for="password">Enter your password</label>
                                <input id="sign-up_password" class="sign-up__field password_img" type="password" placeholder="Например, fo3!bU3" name="sign-up_password" value = "" required>
                            </div>
                            <div class="_column">
                                <label class="sign-up__label" for="repeat-password">Confirm your password</label>
                                <input id="repeat-password" class="sign-up__field password_img" type="password" placeholder="fo3!bU3" name="repeat-password" value = "" required>
                            </div>
                        </div>
                        <div class="_row">
                            <button class="_button" type = "submit" ><span class="button-label">Create account</span></button>
                        </div>
                    </form>
                </div>
            </div>
            <button class="popup__close" type="button" onclick="closePopUp('SignUp')">Закрыть окно</button>
        </div>
    </div>




    <div class="popup" id="LogIn">
        <div class="popup__container">
            <div class="sign-up">
                <header class="sign-up__header">
                    <h3 class="sign-up__title">LogIn</h3>
                </header>
                <div class="sign-up__content">
                    <form class="_form" method = "post" action = "index.php">
                        <div class="_row">
                            <div class="_column">
                                <label class="sign-up__label" for="login">Enter your login</label>
                                <input id="log-in_login" class="log-in__field login_img" placeholder="Например, lollipop" name="login" value = "" required>
                            </div>
                        </div>
                        <div class="_row">
                            <div class="_column">
                                <label class="sign-up__label" for="password">Enter your password</label>
                                <input id="log-in_password" class="log-in__field password_img" type="password" minlength = 12, maxlength = 64, placeholder="******" name="password" value = "" required>
                            </div>
                        </div>
                        <div class="_row">
                            <button class="_button" style="margin-left: auto; margin-right: auto;"><span class="button-label">Enter</span></button>
                        </div>
                    </form>
                </div>
            </div>
            <button class="popup__close" type="button" onclick="closePopUp('LogIn')">Закрыть окно</button>
        </div>
    </div>


    {if $ERROR['message'] != NULL}
        <div class="popup" id="ERROR" style="display: flex;">
            <div class="popup__container">
                <div class="sign-up__content">
                    <div class="error">{$ERROR['message']}</div>
                </div>
                <button class="popup__close" type="button" onclick="closePopUp('ERROR')">Закрыть окно</button>
            </div>
        </div>
    {/if}