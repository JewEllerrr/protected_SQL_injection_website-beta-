<?php

/**
 * 
 * Инициализация подключения к БД
 * 
 */

class DataBase {

    private static $connection = NULL;

    function connection()
    {

        if (static::$connection){
            return  static::$connection;
        }else {
            
            $host = "127.0.0.1";
            $db_name = "restclub";
            $db_user = "root";
            $db_password = "root";
            $charset = 'utf8';
    
            $dsn = "mysql:host=$host;dbname=$db_name;charset=$charset";
            $opt = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];

            try {

                static::$connection = new PDO($dsn, $db_user, $db_password, $opt);
                
                error_log(date(DATE_RFC822)." Function: ".__FUNCTION__." User IP: ".$_SERVER['REMOTE_ADDR']." Successful connection to database", 0);
                if (MODE == 'DEVELOPMENT') echo date(DATE_RFC822)." Function: ".__FUNCTION__." User IP: ".$_SERVER['REMOTE_ADDR']." Successful connection to database".'<br>';
    
                return static::$connection;

            } catch(PDOException $e){
                error_log(date(DATE_RFC822)." Function: ".__FUNCTION__." User IP: ".$_SERVER['REMOTE_ADDR']." "."Failed to connect to database", 0);
                if (MODE == 'DEVELOPMENT') echo date(DATE_RFC822)." Function: ".__FUNCTION__." User IP: ".$_SERVER['REMOTE_ADDR']." Failed to connect to database".$e->getMessage().'<br>';
                exit();
            }
        }
    }
}
