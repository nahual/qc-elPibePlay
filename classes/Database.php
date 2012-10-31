<?php
/**
 * User: Proyecto Nahual
 * Date: 30/10/12
 * Time: 13:46
 *
 * Cualquier inquietud, enviar un mail a sumate@nahual.com.ar
 *
 */
class Database
{
    private static $instance = null;

    private static function getDatabase() {
         if (Database::$instance == null) {
            Database::$instance = new PDO("mysql:host=".DB_HOST.";dbname=".DB_SCHEMA_NAME, DB_USER, DB_PASS);
         }
        return Database::$instance;
    }

    public function query($sql) {
        return Database::getDatabase()->query($sql);
    }

}
