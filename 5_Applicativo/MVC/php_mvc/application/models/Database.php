<?php

class Database{
    private static $username = "root";
    private static $password = "";
    private static $hostname = "localhost";
    private static $database = "dattiloking";

    private static $_connection = null;

    private function __construct(){

    }

    public static function getConnection() {
        if (self::$_connection === null) {
            try {
                self::$_connection = new PDO(
                    "mysql:host=" . self::$hostname . ";dbname=" . self::$database . ";charset=utf8",
                    self::$username,
                    self::$password
                );
            } catch (PDOException $e) {
                die('Errore di connessione: ' . $e->getMessage());
            }
        }
        return self::$_connection;
    }
}