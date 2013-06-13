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

  private static function getDatabase()
  {
    if (Database::$instance == null) {
      Database::$instance = new PDO('sqlite:'.DB_FILE);
      Database::$instance->setAttribute(PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION);
    }
    return Database::$instance;
  }

  public function query($sql, $params = null)
  {

    $stmt = self::getDatabase()->prepare($sql);
    if ($params == null) {
      $stmt->execute();
    } else {
      $stmt->execute($params);
    }
    return $stmt->fetchAll();
  }

  public function execute($sql, $params = null)
  {
    $stmt = self::getDatabase()->prepare($sql);
    if ($params == null) {
      $stmt->execute();
    } else {
      $stmt->execute($params);
    }
  }

  public function delete($tableName, $id)
  {
    $stmt = self::getDatabase()->prepare("DELETE FROM $tableName WHERE id=:id");
    $stmt->execute(array("id" => $id));
  }


}
