<?php

/**
 * 
 * Файл настроек
 * 
 */
session_start();
include_once '../config/DataBase.class.php';

define('MODE', 'PRODUCTION');// PRODUCTION
define('DEBUG', true);


if (MODE == 'DEVELOPMENT') $_SESSION['bg-color']=' #767676'; 
else $_SESSION['bg-color']=' #2d253a';

if (MODE == 'DEVELOPMENT') {
    ini_set('display_errors', 'On'); 
    ini_set('display_startup_errors', 1);
    ini_set('error_reporting', E_ALL);
}
else {
    ini_set('display_errors', 'Off'); 
    ini_set('error_reporting', E_ERROR);
} 
ini_set('log_errors', 'On');
ini_set('error_log', $_SERVER['DOCUMENT_ROOT'] . '/logs/php-errors.log');

//константы для обращения к котроллерам
define('PathPrefix', '../controllers/');
define('PathPostfix', 'Controller.php');

// используемый шаблон
$template = 'default';

// пути к файлам шаблонов (*.tpl)
define('TemplatePrefix', "../views/{$template}/");
define('TemplatePostfix', '.tpl');

// пути к файлам шаблонов в вебпространстве
define('TemplateWebPath', "/templates/{$template}/");

// Инициализация шаблонизатора Smarty
// put full path to Smarty.class.php
require('../library/Smarty/libs/Smarty.class.php');

$smarty = new Smarty();

$smarty->setTemplateDir(TemplatePrefix);
$smarty->setCompileDir('../tmp/smarty/templates_c');
$smarty->setCacheDir('../tmp/smarty/cache');
$smarty->setConfigDir('../library/Smarty/configs');

$smarty->assign('teplateWebPath', TemplateWebPath);