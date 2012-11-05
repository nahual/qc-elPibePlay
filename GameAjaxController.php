<?php
/**
 * User: Proyecto Nahual
 * Date: 30/10/12
 * Time: 13:46
 *
 * Cualquier inquietud, enviar un mail a sumate@nahual.com.ar
 *
 */

include_once("config/includes.php");
include_once("classes/Game.php");
include_once("classes/GameTable.php");


const ACTION_SAVE = "save";
const ACTION_DELETE = "delete";
const ACTION_MODIFY = "modify";

if (isset($_POST['action'])) {

  $action = $_POST['action'];

  $return = true;

  switch ($action) {
    case ACTION_SAVE:
      $name = $_POST['name'];
      $gameType = $_POST['gameType'];
      $year = $_POST['year'];
      $rating = $_POST['rating'];
      $company = $_POST['company'];
      try {
        $game = new Game(null, $gameType, $name, $rating, $year);
        $game->save();
      } catch (PDOException $exception) {
        $return = false;
      }
      break;
    case ACTION_DELETE:
      $id = $_POST['id'];
      try {
        $game = new Game($id, null, null, null, null);
        $game->delete();
      } catch (PDOException $exception) {
        $return = false;
      }
      break;
    case ACTION_MODIFY:
      $name = $_POST['name'];
      $gameType = $_POST['gameType'];
      $year = $_POST['year'];
      $rating = $_POST['rating'];
      $gameTable = new GameTable();
      $game =  $gameTable->getById($_POST['id']);
      $game->modify($gameType, $name, $rating, $year);
      $game->save();
      break;
    default:
      return false;
  }
  echo json_encode($return);
}
