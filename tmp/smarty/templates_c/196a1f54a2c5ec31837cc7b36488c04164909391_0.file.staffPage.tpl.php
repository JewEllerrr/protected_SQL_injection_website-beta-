<?php
/* Smarty version 3.1.34-dev-7, created on 2020-11-18 09:10:38
  from 'W:\domains\xn--80aabz6blh\views\default\staffPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fb4badee56d06_01052011',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '196a1f54a2c5ec31837cc7b36488c04164909391' => 
    array (
      0 => 'W:\\domains\\xn--80aabz6blh\\views\\default\\staffPage.tpl',
      1 => 1605679804,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fb4badee56d06_01052011 (Smarty_Internal_Template $_smarty_tpl) {
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
     <header class="header">
         <div class="container">
             <div class="panel">
                 <a href="#0" class="logo"><span class="logo__label">Ор</span>ешки</a>
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
             <span class="slogan">Турбаза "Орешки"</span>
         </div>
     </header><?php }
}
