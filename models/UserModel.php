<?php



function registerNewUser($login, $email, $pwdMD5)
{
    $tmp = new DataBase;
    $pdo = $tmp->connection();

    $id = NULL;
    $login = htmlspecialchars($login);
    $email = htmlspecialchars($email);
    $pwdMD5 = htmlspecialchars($pwdMD5);
    $access_level = 5;
    $reg_date = date("y-m-d");

    $data = array($id, $login, $email, $pwdMD5, $access_level,  $reg_date);

    $query = $pdo->prepare("INSERT INTO user (id, login, email, password, access_level, registration_date) VALUES (?, ?, ?, ?, ?, ?)");
    if (DEBUG && MODE == 'DEVELOPMENT') echo date(DATE_RFC822) . " Function: " . __FUNCTION__ . " User IP: " . $_SERVER['REMOTE_ADDR'] . print_r($query) . '<br>';
    $query->execute($data);

    $query = $pdo->prepare("SELECT * FROM user WHERE login = ? ");
    if (DEBUG && MODE == 'DEVELOPMENT') echo date(DATE_RFC822) . " Function: " . __FUNCTION__ . " User IP: " . $_SERVER['REMOTE_ADDR'] . print_r($query) . '<br>';
    $query->execute(array($login));

    $rs = NULL;
    $rs = $query->fetch();
    if ($rs) $rs['success'] = true;
    else $rs['success'] = false;

    return $rs;
}

function checkUserLogin($login)
{
     $tmp = new DataBase;
    $pdo = $tmp->connection();

    $rs = NULL;
    $query = $pdo->prepare("SELECT * FROM user WHERE login = ? ");
    if (DEBUG && MODE == 'DEVELOPMENT') echo date(DATE_RFC822) . " Function: " . __FUNCTION__ . " User IP: " . $_SERVER['REMOTE_ADDR'] . print_r($query) . '<br>';
    $query->execute(array($login));
    $rs = $query->fetchColumn();
    return $rs;
}

function checkUserEmail($email)
{
    $tmp = new DataBase;
    $pdo = $tmp->connection();

    $rs = NULL;
    $query = $pdo->prepare("SELECT id FROM user WHERE email = ? ");
    if (DEBUG && MODE == 'DEVELOPMENT') echo date(DATE_RFC822) . " Function: " . __FUNCTION__ . " User IP: " . $_SERVER['REMOTE_ADDR'] . print_r($query) . '<br>';
    try{
        $query->execute(array($email));
        $rs = $query->fetchColumn();

    } catch (PDOException $e) {
    error_log(date(DATE_RFC822) . " Function: " . __FUNCTION__ . " User IP: " . $_SERVER['REMOTE_ADDR'] . " The request failed: " . $e->getMessage(), 0);
    if (MODE == 'DEVELOPMENT') echo date(DATE_RFC822) . " Function: " . __FUNCTION__ . " User IP: " . $_SERVER['REMOTE_ADDR'] . " The request failed: " . $e->getMessage() . '<br>';
    header("Location: index.php");
}

    return $rs;
}
