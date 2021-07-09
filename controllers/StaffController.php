<?php

/**
 * 
 * Котроллер функций пользователя
 * 
 */

include_once '../models/StaffModel.php';

function registerAction()
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
        $resData['success'] = true;
        $resData['message'] = "Пользователь успешно зарегестрирован";
        $userData = $userData[0];
        $resData['userName'] = $userData['name'] ? $userData['name'] : $userData['login'];
        $resData['userEmail'] = $email;

        $_SESSION['user'] = $userData;
        $_SESSION['user'] = $userData;
        
    }
    echo ($resData['message']);


}

function indexAction($smarty){

    $smarty->assign('pageTitle', 'logOut page');

    loadTemplate($smarty, 'logOutPage');
    loadTemplate($smarty, 'footer');

}
