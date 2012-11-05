<?php
/**
 * User: Proyecto Nahual
 * Date: 04/11/12
 *
 * Cualquier inquietud, enviar un mail a sumate@nahual.com.ar
 *
 */
class GameType
{

  public static $PS = "PlayStation";
  public static $PS2 = "PlayStation2";
  public static $PS3 = "PlayStation3";
  public static $NINTENDO = "Nintendo";
  public static $XBOX = "Xbox";
  public static $PC = "PC";
  public static $SEGA = "Sega";
  public static $WII = "Wii";


  public static function  getValues() {
    $arrayToSort = array(self::$PS, self::$NINTENDO, self::$PC,
      self::$PS2, self::$PS3, self::$XBOX, self::$SEGA, self::$WII);
    sort($arrayToSort);
    return $arrayToSort;
  }

  public static function getIcon(GameType $type) {
    switch ($type) {
      case GameType::$PS:
        break;
      case GameType::$PS2:
        break;
      case GameType::$PS3:
        break;
      case GameType::$NINTENDO:
        break;
      case GameType::$XBOX:
        break;
      case GameType::$PC:
        break;
      case GameType::$SEGA:
        break;
    }
  }
}
