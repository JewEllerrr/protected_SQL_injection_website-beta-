<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-07 00:39:59
  from 'W:\domains\xn--80aabz6blh\views\default\logOutPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fcd4faf63ab68_77226097',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2b0904b7fe0b9fa67c284ca14aca20dbd348438d' => 
    array (
      0 => 'W:\\domains\\xn--80aabz6blh\\views\\default\\logOutPage.tpl',
      1 => 1607290796,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fcd4faf63ab68_77226097 (Smarty_Internal_Template $_smarty_tpl) {
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
    <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"><?php echo '</script'; ?>
>
</head>

<body>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['teplateWebPath']->value;?>
js/scripts.js"><?php echo '</script'; ?>
>
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
                                <input id="log-in_password" class="log-in__field password_img" type="password" placeholder="******" name="password" value = "" required>
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


    <?php if ($_smarty_tpl->tpl_vars['ERROR']->value['message'] != NULL) {?>
        <div class="popup" id="ERROR" style="display: flex;">
            <div class="popup__container">
                <div class="sign-up__content">
                    <div class="error"><?php echo $_smarty_tpl->tpl_vars['ERROR']->value['message'];?>
</div>
                </div>
                <button class="popup__close" type="button" onclick="closePopUp('ERROR')">Закрыть окно</button>
            </div>
        </div>
    <?php }
}
}
