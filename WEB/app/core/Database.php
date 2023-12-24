<?php 
class Database{
    private static array $conf;
    private static $connection = null;
    public static $query = null;
    public static function __constructStatic(){
        static::$conf = json_decode(file_get_contents(__DIR__ . '/../conf/database.json'),true);
    }
    private static function connect(){
        if(!self::$connection){
            self::$connection = new PDO(
                "mysql:host".self::$conf["host"].";port=".self::$conf["port"].";dbname=".self::$conf["database"].";charset=".self::$conf["charset"],
                self::$conf["user"],
                self::$conf["password"]
            );
        }
        return self::$connection;
    }
    public static function getRow($sql, $params){
        self::$query = self::connect()->prepare($sql);
        self::$query->execute($params);
        return self::$query->fetch(PDO::FETCH_ASSOC);
    }
    
    public static function getAll($sql, $params){
        self::$query = self::connect()->prepare($sql);
        self::$query->execute($params);
        return self::$query->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function insert($sql, $params){
        self::$query = self::connect()->prepare($sql);
        return (self::$query->execute($params)) ? self::connect()->lastInsertId() : -1;
    }

    public static function rowCount($sql, $params){
        self::$query = self::connect()->prepare($sql);
        self::$query->execute($params);
        return self::$query->rowCount();
    }

    public static function voidQuery($sql, $params){
        self::$query = self::connect()->prepare($sql);
        self::$query->execute($params);
    }
}
Database::__constructStatic();
?>