<?php



function logInUser($login, $pwdMD5)
{

    $tmp = new DataBase;
    $pdo = $tmp->connection();

    $login = htmlspecialchars($login);
    $pwdMD5 = htmlspecialchars($pwdMD5);

    $rs = NULL;
    $data = array($login, $pwdMD5);

    try {
        $queryForAdmin = $pdo->prepare("SELECT * FROM admin WHERE login = ? and password = ? LIMIT 1");
        if (DEBUG && MODE == 'DEVELOPMENT') echo date(DATE_RFC822) . " Function: " . __FUNCTION__ . " User IP: " . $_SERVER['REMOTE_ADDR'] . print_r($queryForAdmin) . '<br>';
        $queryForStuff = $pdo->prepare("SELECT * FROM staff WHERE login = ? and password = ? LIMIT 1");
        if (DEBUG && MODE == 'DEVELOPMENT') echo date(DATE_RFC822) . " Function: " . __FUNCTION__ . " User IP: " . $_SERVER['REMOTE_ADDR'] . print_r($queryForStuff) . '<br>';
        $queryForRoomer = $pdo->prepare("SELECT * FROM roomer WHERE login = ? and password = ? LIMIT 1");
        if (DEBUG && MODE == 'DEVELOPMENT') echo date(DATE_RFC822) . " Function: " . __FUNCTION__ . " User IP: " . $_SERVER['REMOTE_ADDR'] . print_r($queryForRoomer) . '<br>';

        $queryForAdmin->execute($data);
        $queryForStuff->execute($data);
        $queryForRoomer->execute($data);

        $rsAdmin = $queryForAdmin->fetch();
        $rsStuff = $queryForStuff->fetch();
        $rsRoomer = $queryForRoomer->fetch();

        if ($rsAdmin) $rs = $rsAdmin;
        elseif ($rsStuff) $rs = $rsStuff;
        elseif ($rsRoomer) $rs = $rsRoomer;

        if ($rs) {
            $rs['message'] = " Пользователь успешно авторизован";
            $rs['success'] = true;
            error_log(date(DATE_RFC822) . " Function: " . __FUNCTION__ . " User IP: " . $_SERVER['REMOTE_ADDR'] . $rs['message'], 0);
            if (MODE == 'DEVELOPMENT') echo date(DATE_RFC822) . " Function: " . __FUNCTION__ . " User IP: " . $_SERVER['REMOTE_ADDR'] . $rs['message'] . '<br>';
        }
        else {
            $rs['message'] = " Неверный логин или пароль";
            $rs['success'] = false;
            error_log(date(DATE_RFC822) . " Function: " . __FUNCTION__ . " User IP: " . $_SERVER['REMOTE_ADDR'] . $rs['message'], 0);
            if (MODE == 'DEVELOPMENT') echo date(DATE_RFC822) . " Function: " . __FUNCTION__ . " User IP: " . $_SERVER['REMOTE_ADDR'] . $rs['message'] . '<br>';
        }
       

        return $rs;

    } catch (PDOException $e) {

        error_log(date(DATE_RFC822) . " Function: " . __FUNCTION__ . " User IP: " . $_SERVER['REMOTE_ADDR'] ." ".$e->getMessage(), 0);
        if (MODE == 'DEVELOPMENT') echo date(DATE_RFC822) . " Function: " . __FUNCTION__ . " User IP: " . $_SERVER['REMOTE_ADDR']  ." ". $e->getMessage() . '<br>';
        header("Location: index.php");
    }
}
