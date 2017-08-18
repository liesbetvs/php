<?php
abstract class Db {
    private static $conn = NULL;

    public static function getInstance(){
        if (isset(self::$conn)){
            //er is een connectie, geef ze trg
            return self::$conn;
        }else{
            //er is geen connectie, maak er eentje aan
            self::$conn = new PDO('mysql:host=localhost;dbname=deadlines;','root','');
            return self::$conn;
        }
    }
}