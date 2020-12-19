<?php
namespace App\DAO;

use Exception;
use PDO;
use PDOException;

require_once 'env.php';

class DB
{
    private static $instance;

    public static function getInstance()
    {
        if (!isset(self::$instance))
        {
            $host = getenv('MB_MYSQL_HOST');
            $port = getenv('MB_MYSQL_PORT');
            $user = getenv('MB_MYSQL_USER');
            $pass = getenv('MB_MYSQL_PASSWORD');
            $dbname = getenv('MB_MYSQL_DBNAME');

            try
            {
                // self::$instance = new PDO('mysql:host=' . $host. ';dbname=' . $dbname, $user, $pass,
                //     array(
                //         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
                //         PDO::ATTR_PERSISTENT => false,
                //         PDO::ATTR_EMULATE_PREPARES => false,
                //         PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                //     ));

                self::$instance = new PDO('mysql:host=' . $host. ';dbname=' . $dbname, $user, $pass);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            }
            catch(PDOException $ex)
            {
                echo $ex->getMessage();
            }
        }
        return self::$instance;
    }

    public static function prepare($sql)
    {
        return self::getInstance()->prepare($sql);
    }
}

