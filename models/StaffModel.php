<?php

include_once '../config/db.php';
$tmp = new DataBase;
$pdo = $tmp->connection();

function getAllStaff($pdo)
{
    $stmt = $pdo->prepare('SELECT name FROM staff');
    $stmt->execute();

    while ($row = $stmt->fetch())
    {
        echo $row['name'] . "\n";
    }
}

function getLastStaff($limit = NULL, $pdo)
{
    $sql = "SELECT * FROM staff ORDER BY id DESC";
    if ($limit){
        $sql.=" LIMIT {$limit}";
    }
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    /* Извлечение всех оставшихся строк результирующего набора */
    while ($row = $stmt->fetch())
    {
        echo $row['surname'] . "\n";
    }
    // createSmartyArray($rs);
}

function fullRegisterNewStaff($id, $surname, $name, $patronymic, $position, $schedule, $salary, $phone, $pdo)
{
    $data = array($id, $surname, $name, $patronymic, $position, $schedule, $salary, $phone);
    $STH = $pdo->prepare("INSERT INTO roomer (id, surname, name, patronymic, position, schedule, salary, phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $STH->execute($data);
}