<?php


include_once '../models/LogInModel.php';


function indexAction($smarty)
{
    $login = isset($_POST['login']) ? $_POST['login'] : NULL;
    $login = trim($login);

    $pwdMD5 = isset($_POST['password']) ? $_POST['password'] : NULL;
    $pwdMD5 = md5($pwdMD5);

    $userData = logInUser($login, $pwdMD5);

    if ($userData['success'] == true) {
        $_SESSION['id'] = $userData['id'];
        $_SESSION['user'] = $userData['login'];
        $_SESSION['email'] = $userData['email'];
        $_SESSION['access_level'] = $userData['access_level'];
        $smarty->assign('rsUsers', $userData);
    } else {
        unset($_SESSION);
        $smarty->assign('ERROR', $userData);
    }

    checkAction($smarty);
}

function checkAction($smarty)
{
    if (!isset($_SESSION) || isset($_SESSION)) {
        $smarty->assign('rsUsers', $_SESSION);

        if ($_SESSION['access_level'] == 5) {

            $smarty->assign('pageTitle', 'page for roomer');
            $smarty->assign('rsUsers', $_SESSION);

            loadTemplate($smarty, 'pageForRoomer');
            loadTemplate($smarty, 'footer');
        } elseif ($_SESSION['access_level'] == 1) {

            $smarty->assign('pageTitle', 'page for admin');
            $smarty->assign('rsUsers', $_SESSION);

            loadTemplate($smarty, 'pageForAdmin');
            loadTemplate($smarty, 'footer');
        } elseif ($_SESSION['access_level'] == 2) {

            $smarty->assign('pageTitle', 'page for stuff');
            $smarty->assign('rsUsers', $_SESSION);

            loadTemplate($smarty, 'pageForStuff');
            loadTemplate($smarty, 'footer');
        } else {
            $smarty->assign('pageTitle', 'logOut page');
            $smarty->assign('ErrorLogIn', $_SESSION['message']);

            loadTemplate($smarty, 'logOutPage');
            loadTemplate($smarty, 'footer');
        }

        $smarty->assign('ERROR');
    }
}
