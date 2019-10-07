<?php

class DB {

    private const dbname = '/home/users.db';

    private static $db = null;

    public static function getDB(){

        if(!isset(self::$db))
            self::$db = new SQLite3(self::dbname);

        return self::$db;

    }//getDB

    public static function exec($query) {

        return self::getDB()->exec($query);
        
    }//exec

    public static function query($query) {

        return self::getDB()->query($query);
        
    }//query

    public static function querySingle($query) {

        return self::getDB()->querySingle($query);
        
    }//querySingle

}//DB