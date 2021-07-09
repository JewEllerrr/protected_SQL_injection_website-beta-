<?php


function getLastRoomers($order, $sort, $limit, $page)
{
    
    $tmp = new DataBase;
    $pdo = $tmp->connection();

    $order = htmlspecialchars($order);
    $sort = htmlspecialchars($sort);
    $limit = htmlspecialchars($limit);
    $page = htmlspecialchars($page);


    // Определяем общее число сообщений в базе данных
    try {

        $query = $pdo->prepare("SELECT COUNT(*) FROM roomer");

        if (DEBUG && MODE == 'DEVELOPMENT') echo date(DATE_RFC822) . " Function: " . __FUNCTION__ . " User IP: " . $_SERVER['REMOTE_ADDR'] . print_r($query) . '<br>';

        $query->execute();
        $posts = $query->fetchColumn();

        // Находим общее число страниц
        $total = intval(($posts - 1) / $limit) + 1;
        // Определяем начало сообщений для текущей страницы
        $page = intval($page);
        // Если значение $page меньше единицы или отрицательно
        // переходим на первую страницу
        // А если слишком большое, то переходим на последнюю
        if (empty($page) or $page < 0) $page = 1;
        if ($page > $total) $page = $total;
        // Вычисляем начиная к какого номера
        // следует выводить сообщения
        $start = $page * $limit - $limit;
        // Выбираем $limit сообщений начиная с номера $start

        //$data = array($order, $sort);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $pdo->prepare("SELECT * FROM roomer ORDER BY $order $sort LIMIT :start, :limit");

        if (DEBUG && MODE == 'DEVELOPMENT') echo date(DATE_RFC822) . " Function: " . __FUNCTION__ . " User IP: " . $_SERVER['REMOTE_ADDR'] . print_r($query) . '<br>';

        $query->bindParam(':start', $start, PDO::PARAM_INT);
        $query->bindParam(':limit', $limit, PDO::PARAM_INT);
        $query->execute();

        // Переносим результаты запроса в массив $postrow
        $postrow = $query->fetchAll(PDO::FETCH_ASSOC);

        $_SESSION['totalPages'] = $total;
        $_SESSION['numPosts'] = $posts;
        $_SESSION['offset'] = $start;
        $_SESSION['order'] = $order;

        return $postrow;
    } catch (PDOException $e) {
        error_log(date(DATE_RFC822) . " Function: " . __FUNCTION__ . " User IP: " . $_SERVER['REMOTE_ADDR'] . " The request failed: " . $e->getMessage(), 0);
        if (MODE == 'DEVELOPMENT') echo date(DATE_RFC822) . " Function: " . __FUNCTION__ . " User IP: " . $_SERVER['REMOTE_ADDR'] . " The request failed: " . $e->getMessage() . '<br>';
        header("Location: index.php");
    }
}



function getRoomerInfo($id)
{
    $tmp = new DataBase;
    $pdo = $tmp->connection();

    $id = htmlspecialchars($id);

    try {
        $query = $pdo->prepare("SELECT id, surname, name, patronymic, room_number, check_in_date, check_out_date, email, registration_date, phone 
                                FROM roomer 
                                WHERE roomer.id = ? 
                                LIMIT 1");

        if (DEBUG && MODE == 'DEVELOPMENT') echo date(DATE_RFC822) . " Function: " . __FUNCTION__ . " User IP: " . $_SERVER['REMOTE_ADDR'] . print_r($query) . '<br>';

        $query->execute(array($id));
        $postrow = $query->fetchAll(PDO::FETCH_ASSOC);

        $query = $pdo->prepare("SELECT services.name_of_service, staff.surname, staff.name
                                FROM contract 
                                LEFT JOIN roomer ON roomer.id = contract.id_roomer
                                JOIN staff ON contract.id_staff = staff.id
                                JOIN services ON contract.id_service = services.id
                                WHERE roomer.id = :id
                                LIMIT 1");

        if (DEBUG && MODE == 'DEVELOPMENT') echo date(DATE_RFC822) . " Function: " . __FUNCTION__ . " User IP: " . $_SERVER['REMOTE_ADDR'] . print_r($query) . '<br>';

        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();

        array_push($postrow, $query->fetchAll(PDO::FETCH_ASSOC));

        return $postrow;
    } catch (PDOException $e) {
        error_log(date(DATE_RFC822) . " Function: " . __FUNCTION__ . " User IP: " . $_SERVER['REMOTE_ADDR'] . " The request failed: " . $e->getMessage(), 0);
        if (MODE == 'DEVELOPMENT') echo date(DATE_RFC822) . " Function: " . __FUNCTION__ . " User IP: " . $_SERVER['REMOTE_ADDR'] . "The request failed: " . $e->getMessage() . '<br>';
        header("Location: index.php");
    }
}




function deleteRoomer($id)
{
    $tmp = new DataBase;
    $pdo = $tmp->connection();

    $id = htmlspecialchars($id);
    $query = $pdo->prepare("DELETE FROM roomer WHERE id = ? ");

    try {
        $query->execute(array($id));

        if (DEBUG && MODE == 'DEVELOPMENT') echo date(DATE_RFC822) . " Function: " . __FUNCTION__ . " User IP: " . $_SERVER['REMOTE_ADDR'] . print_r($query) . '<br>';
    } catch (PDOException $e) {
        error_log(date(DATE_RFC822) . " Function: " . __FUNCTION__ . " " . $_SERVER['REMOTE_ADDR'] . " The request failed: " . $e->getMessage(), 0);
        if (MODE == 'DEVELOPMENT') echo date(DATE_RFC822) . " Function: " . __FUNCTION__ . " User IP: " . $_SERVER['REMOTE_ADDR'] . " The request failed: " . $e->getMessage() . '<br>';
        header("Location: index.php");
    }
}


function registerNewRoomerByStaff($surname, $name, $patronymic, $room_number, $check_in_date, $check_out_date, $login, $email, $phone)
{
    $tmp = new DataBase;
    $pdo = $tmp->connection();

    $surname = htmlspecialchars($surname);
    $name = htmlspecialchars($name);
    $patronymic = htmlspecialchars($patronymic);
    $room_number = htmlspecialchars($room_number);
    $check_in_date = htmlspecialchars($check_in_date);
    $check_out_date = htmlspecialchars($check_out_date);
    $login = htmlspecialchars($login);
    $email = htmlspecialchars($email);
    $phone = htmlspecialchars($phone);

    try {

        $query = $pdo->prepare("SELECT COUNT(*) FROM roomer WHERE room_number = ?");

        if (DEBUG && MODE == 'DEVELOPMENT') echo date(DATE_RFC822) . " Function: " . __FUNCTION__ . " User IP: " . $_SERVER['REMOTE_ADDR'] . print_r($query) . '<br>';

        $query->execute(array($room_number));
        $num_of_roomers = $query->fetchColumn();

        $query = $pdo->prepare("SELECT sleeping_places FROM room WHERE room_number = ?");

        if (DEBUG && MODE == 'DEVELOPMENT') echo date(DATE_RFC822) . " Function: " . __FUNCTION__ . " User IP: " . $_SERVER['REMOTE_ADDR'] . print_r($query) . '<br>';

        $query->execute(array($room_number));
        $sleeping_places = $query->fetchColumn();

        if (($num_of_roomers + 1) > $sleeping_places) {
            $error['error'] = "Room is full";
            return $error;
        }

        $password = md5('qwerty123');
        $access_level = 5;
        $registration_date = date("y-m-d");

        $data = array($id = NULL, $surname, $name, $patronymic, $room_number, $check_in_date, $check_out_date, $login, $email, $password, $access_level, $phone, $registration_date);
        $query = $pdo->prepare("INSERT INTO roomer (id, surname, name, patronymic, room_number, check_in_date, check_out_date, login, email, password, access_level, phone, registration_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        if (DEBUG && MODE == 'DEVELOPMENT')  echo date(DATE_RFC822) . " Function: " . __FUNCTION__ . " User IP: " . $_SERVER['REMOTE_ADDR'] . print_r($query) . '<br>';

        $query->execute($data);
    } catch (PDOException $e) {

        error_log(date(DATE_RFC822) . " Function: " . __FUNCTION__ . " User IP: " . $_SERVER['REMOTE_ADDR'] . " The request failed: " . $e->getMessage(), 0);
        if (MODE == 'DEVELOPMENT') echo date(DATE_RFC822) . " Function: " . __FUNCTION__ . " User IP: " . $_SERVER['REMOTE_ADDR'] . " The request failed: " . $e->getMessage() . '<br>';

        if ($e->errorInfo[1] == 1062) {
            $error['error'] = "login, email or telephone already registered";
            return $error;
        }
    }
}

function registerNewRoomerByRoomer($surname, $name, $patronymic, $room_number, $check_in_date, $check_out_date, $login, $email, $password, $phone)
{

    $tmp = new DataBase;
    $pdo = $tmp->connection();

    $surname = htmlspecialchars($surname);
    $name = htmlspecialchars($name);
    $patronymic = htmlspecialchars($patronymic);
    $room_number = htmlspecialchars($room_number);

    $check_in_date = htmlspecialchars($check_in_date);
    $check_out_date = htmlspecialchars($check_out_date);
    $login = htmlspecialchars($login);
    $email = htmlspecialchars($email);
    $password = htmlspecialchars($password);
    $phone = htmlspecialchars($phone);

    $access_level = 5;
    $registration_date = date("y-m-d");

    $data = array($id = NULL, $surname, $name, $patronymic, $room_number,  $check_in_date, $check_out_date, $login, $email, $password, $access_level, $phone, $registration_date);
    $query = $pdo->prepare("INSERT INTO roomer (id, surname, name, patronymic, room_number, check_in_date, check_out_date, login, email, password, access_level, phone, registration_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if (DEBUG && MODE == 'DEVELOPMENT') echo date(DATE_RFC822) . " Function: " . __FUNCTION__ . " User IP: " . $_SERVER['REMOTE_ADDR'] . print_r($query) . '<br>';

    try {
        $query->execute($data);
    } catch (PDOException $e) {
        error_log(date(DATE_RFC822) . " Function: " . __FUNCTION__ . " User IP: " . $_SERVER['REMOTE_ADDR'] . " The request failed: " . $e->getMessage(), 0);
        if (MODE == 'DEVELOPMENT') echo date(DATE_RFC822) . " Function: " . __FUNCTION__ . " User IP: " . $_SERVER['REMOTE_ADDR'] . " The request failed: " . $e->getMessage() . '<br>';
        header("Location: index.php");
    }
}

function editRoomerByStaff($id, $surname, $name, $patronymic, $room_number, $check_in_date, $check_out_date, $phone)
{

    $tmp = new DataBase;
    $pdo = $tmp->connection();

    $id = htmlspecialchars($id);
    $surname = htmlspecialchars($surname);
    $name = htmlspecialchars($name);
    $patronymic = htmlspecialchars($patronymic);
    $room_number = htmlspecialchars($room_number);
    $check_in_date = htmlspecialchars($check_in_date);
    $check_out_date = htmlspecialchars($check_out_date);
    $phone = htmlspecialchars($phone);

    try {
        $query = $pdo->prepare("SELECT room_number FROM roomer WHERE id = ?");

        if (DEBUG && MODE == 'DEVELOPMENT')  echo date(DATE_RFC822) . " Function: " . __FUNCTION__ . " User IP: " . $_SERVER['REMOTE_ADDR'] . print_r($query) . '<br>';

        $query->execute(array($id));
        $is_same_room = $query->fetchColumn();

        if ($is_same_room == $room_number) $flag = 1;
        else $flag = 0;

        $query = $pdo->prepare("SELECT COUNT(*) FROM roomer WHERE room_number = ?");

        if (DEBUG && MODE == 'DEVELOPMENT') echo date(DATE_RFC822) . " Function: " . __FUNCTION__ . " User IP: " . $_SERVER['REMOTE_ADDR'] . print_r($query) . '<br>';

        $query->execute(array($room_number));
        $num_of_roomers = $query->fetchColumn();

        $query = $pdo->prepare("SELECT sleeping_places FROM room WHERE room_number = ?");

        if (DEBUG && MODE == 'DEVELOPMENT') echo date(DATE_RFC822) . " Function: " . __FUNCTION__ . " User IP: " . $_SERVER['REMOTE_ADDR'] . print_r($query) . '<br>';

        $query->execute(array($room_number));
        $sleeping_places = $query->fetchColumn();

        if (($num_of_roomers + 1) > $sleeping_places && $flag == 0) {
            $error['error'] = "Room is full";
            return $error;
        }

        $data = array($surname, $name, $patronymic, $room_number, $check_in_date, $check_out_date, $phone, $id);
        $query = $pdo->prepare("UPDATE roomer 
                                SET surname = ?, name = ?, patronymic = ?, room_number = ?, check_in_date = ?, check_out_date = ?, phone = ? 
                                WHERE roomer.id = ? ");

        if (DEBUG && MODE == 'DEVELOPMENT') echo date(DATE_RFC822) . " Function: " . __FUNCTION__ . " User IP: " . $_SERVER['REMOTE_ADDR'] . print_r($query) . '<br>';

        $query->execute($data);
        
    } catch (PDOException $e) {

        error_log(date(DATE_RFC822) . " Function: " . __FUNCTION__ . " User IP: " . $_SERVER['REMOTE_ADDR'] . "The request failed: " . $e->getMessage(), 0);
        if (MODE == 'DEVELOPMENT') echo date(DATE_RFC822) . " Function: " . __FUNCTION__ . " User IP: " . $_SERVER['REMOTE_ADDR'] . " The request failed: " . $e->getMessage() . '<br>';

        if ($e->errorInfo[1] == 1062) {
            $error['error'] = "login, email or telephone already registered";
            return $error;
        }
    }
}

function editRoomerByRoomer($id, $check_out_date, $password)
{

    $tmp = new DataBase;
    $pdo = $tmp->connection();

    $id = htmlspecialchars($id);
    $check_out_date = htmlspecialchars($check_out_date);
    $phone = htmlspecialchars($password);

    $data = array( $check_out_date, $password, $id);
    $query = $pdo->prepare("UPDATE roomer SET check_out_date = ?, password = ? WHERE roomer.id = '$id' ");

    if (DEBUG && MODE == 'DEVELOPMENT') echo date(DATE_RFC822) . " Function: " . __FUNCTION__ . " User IP: " . $_SERVER['REMOTE_ADDR'] . print_r($query) . '<br>';

    try {
        $query->execute($data);
    } catch (PDOException $e) {
        error_log(date(DATE_RFC822) . " Function: " . __FUNCTION__ . " User IP: " . $_SERVER['REMOTE_ADDR'] . " The request failed: " . $e->getMessage(), 0);
        if (MODE == 'DEVELOPMENT') echo date(DATE_RFC822) . " Function: " . __FUNCTION__ . " User IP: " . $_SERVER['REMOTE_ADDR'] . " The request failed: " . $e->getMessage() . '<br>';
        header("Location: index.php");
    }
}
