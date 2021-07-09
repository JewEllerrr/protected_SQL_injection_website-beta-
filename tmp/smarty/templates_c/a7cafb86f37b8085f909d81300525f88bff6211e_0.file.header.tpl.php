<?php
/* Smarty version 3.1.34-dev-7, created on 2020-11-14 17:48:21
  from 'W:\domains\xn--80aabz6blh\views\default\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fafee3590e1a2_30973898',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a7cafb86f37b8085f909d81300525f88bff6211e' => 
    array (
      0 => 'W:\\domains\\xn--80aabz6blh\\views\\default\\header.tpl',
      1 => 1605364395,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fafee3590e1a2_30973898 (Smarty_Internal_Template $_smarty_tpl) {
?><html>

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
    <header class="header">
        <div class="container">
            <div class="panel">
                <a href="#0" class="logo"><span class="logo__label">Яна</span> Члене</a>
                <nav class="menu_header">
                    <a class="menu__item" href="#0">Главная</a>
                    <a class="menu__item" href="#0">О Базе</a>
                    <a class="menu__item" href="#0">Цены</a>
                    <a class="menu__item" href="#0">Контакты</a>
                    <button class="button_header" onclick="openLogIn()">LogIn</button>
                    <button class="button_header" onclick="openSignUp()">Sign Up</button>
                </nav>
            </div>
            <span class="slogan">Турбаза "Яна Члене"</span>
        </div>
    </header>

    <div class="popup" id="SignUp">
        <div class="popup__container">
            <div class="sign-up">
                <header class="sign-up__header">
                    <h3 class="sign-up__title">Sign Up!</h3>
                    <span class="sign-up__hint">It's free and takes less than 30 seconds</span>
                </header>
                <div class="sign-up__content">
                    <form class="sign-up__form">
                        <div class="_row">
                            <div class="_column">
                                <label class="sign-up__label" for="login">Enter your login</label>
                                <input id="login" class="sign-up__field login_img" placeholder="Например, lollipop" name="login" required>
                            </div>
                            <div class="_column">
                                <label class="sign-up__label" for="email">Enter your email</label>
                                <input id="email" class="sign-up__field email_img" type="email" placeholder="Например, lollipop@gmail.ru" name="email" required>
                            </div>
                        </div>
                        <div class="_row">
                            <div class="_column">
                                <label class="sign-up__label" for="password">Enter your password</label>
                                <input id="password" class="sign-up__field password_img" type="password" placeholder="Например, fo3!bU3" name="password" required>
                            </div>
                            <div class="_column">
                                <label class="sign-up__label" for="repeat-password">Confirm your password</label>
                                <input id="repeat-password" class="sign-up__field password_img" type="password" placeholder="fo3!bU3" name="confirm-password" required>
                            </div>
                        </div>
                        <div class="_row">
                            <button class="sign-up__button"><span class="button-label">Create account</span></button>
                        </div>
                    </form>
                </div>
            </div>
            <button class="popup__close" type="button" onclick="closeSignUp()">Закрыть окно</button>
        </div>
    </div>




    <div class="popup" id="LogIn">
        <div class="popup__container">
            <div class="sign-up">
                <header class="sign-up__header">
                    <h3 class="sign-up__title">LogIn</h3>
                </header>
                <div class="sign-up__content">
                    <form class="sign-up__form">
                        <div class="_row">
                            <div class="_column">
                                <label class="sign-up__label" for="login">Enter your login</label>
                                <input id="login" class="log-in__field login_img" placeholder="Например, lollipop" name="login" required>
                            </div>
                        </div>
                        <div class="_row">
                            <div class="_column">
                                <label class="sign-up__label" for="password">Enter your password</label>
                                <input id="password" class="log-in__field password_img" type="password" placeholder="******" name="password" required>
                            </div>
                        </div>
                        <div class="_row">
                            <button class="sign-up__button" style="margin-left: auto; margin-right: auto;"><span class="button-label">Enter</span></button>
                        </div>
                    </form>
                </div>
            </div>
            <button class="popup__close" type="button" onclick="closeLogIn()">Закрыть окно</button>
        </div>
    </div><?php }
}
