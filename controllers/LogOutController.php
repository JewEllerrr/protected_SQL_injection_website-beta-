<?php

function indexAction($smarty) {
    unset($_SESSION);

    $smarty->assign('ERROR');
    loadTemplate($smarty, 'logOutPage');
    loadTemplate($smarty, 'footer');
    
}

// if(!empty($_SESSION[‘id’])) {
// 	unset($_SESSION[‘id’]);
// }
// if(!empty($_COOKIE[‘ses_id’])) {
// 	setcookie(‘ses_id’, $_SESSION[‘id’], time() - 60);
// 	setcookie(‘user’, $_SESSION[‘id’], time() - 60);
// }
