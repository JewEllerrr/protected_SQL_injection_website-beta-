<?php

include_once '../config/config.php'; // инициализация настроек
include_once '../library/mainFunctions.php'; // основные функции



// определяем с каким контроллером будем работать
$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'LogIn';

// определяем с какой функцией будем работать
$actionName = isset($_GET['action']) ? $_GET['action'] : 'check';

if (isset($_POST['email'], $_POST['repeat-password'])) {
    $controllerName = "User";
    $actionName = "Register";
} elseif (isset($_POST['login'], $_POST['password'])) {
    $controllerName = "LogIn";
    $actionName = "Index";
} elseif (isset($_POST['logout-submit']) && $_POST['logout-submit'] == 'logout') {
    $controllerName = "LogOut";
    $actionName = "Index";
} else if (isset($_POST['param'])){
    $_SESSION['dropdownParam'] = $_POST['param'];
    $controllerName = "Roomer";
    $actionName = "get";
}

loadPage($smarty, $controllerName, $actionName);

