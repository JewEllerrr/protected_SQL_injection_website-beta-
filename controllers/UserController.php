<?php

/**
 * 
 * Котроллер функций пользователя
 * 
 */

include_once '../models/UserModel.php';

function register()
{
    $login = isset($_POST['sign-up_login']) ? $_POST['sign-up_login'] : NULL;
    $login = trim($login);

    $email = isset($_POST['email']) ? $_POST['email'] : NULL;
    $email = trim($email);

    $pwd1 = isset($_POST['sign-up_password']) ? $_POST['sign-up_password'] : NULL;
    $pwd2 = isset($_POST['repeat-password']) ? $_POST['repeat-password'] : NULL;

    $resData['success'] = true;

    if ($pwd1 != $pwd2) {
        $resData['success'] = false;
        $resData['message'] = 'Пароли не совпадают';
    }

    if (checkUserLogin($login)) {
        $resData['success'] = false;
        $resData['message'] = "Пользователь с таким никнеймом ({$login}) уже существует";
    }

    if (checkUserEmail($email)) {
        $resData['success'] = false;
        $resData['message'] = "Пользователь с таким email ({$email}) уже существует";
    }

    if ($resData['success']) {
        $pwdMD5 = md5($pwd1);
        $userData = registerNewUser($login, $email, $pwdMD5);
        if ($userData['success']) {
            $userData['message'] = "Пользователь успешно зарегестрирован";

            $_SESSION['user'] = $userData['login'];
            $_SESSION['access_level'] = $userData['access_level'];

        } else $userData['message'] = " Ошибка регистрации";
        return  $userData;
    } else
        return $resData;
}

function RegisterAction($smarty)
{

    $rsUsers = register();
    if($rsUsers){
        $smarty->assign('ERROR', $rsUsers);
    }
    else $smarty->assign('rsUsers', $rsUsers);

    if ($_SESSION['access_level'] == 1) {
        
        $smarty->assign('pageTitle', 'page for admin');
        $smarty->assign('rsUsers', $_SESSION);

        loadTemplate($smarty, 'pageForAdmin');
        loadTemplate($smarty, 'footer');

    } elseif ($_SESSION['access_level'] == 2) {
        
        $smarty->assign('pageTitle', 'page for stuff');
        $smarty->assign('rsUsers', $_SESSION);

        loadTemplate($smarty, 'pageForStuff');
        loadTemplate($smarty, 'footer');

    } elseif ($_SESSION['access_level'] == 5) {
        
        $smarty->assign('pageTitle', 'page for roomer');
        $smarty->assign('rsUsers', $_SESSION);

        loadTemplate($smarty, 'pageForRoomer');
        loadTemplate($smarty, 'footer');

    } else {
        $smarty->assign('pageTitle', 'logOut page');
        $smarty->assign('ErrorLogIn', $_SESSION['message']);

        loadTemplate($smarty, 'logOutPage');
        loadTemplate($smarty, 'footer');
    }

    $smarty->assign('ERROR');
}
