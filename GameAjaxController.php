<?php
/**
 * User: Proyecto Nahual
 * Date: 30/10/12
 * Time: 13:46
 *
 * Cualquier inquietud, enviar un mail a sumate@nahual.com.ar
 *
 */

include_once("includes.php");
include_once("classes/Game.php");
include_once("classes/GameTable.php");
include_once("classes/ActionType.php");



if (isset($_POST['action'])) {

  $action = $_POST['action'];

  $return = true;

  switch ($action) {
    case ActionType::ACTION_SAVE:
      $name = $_POST['name'];
      $gameType = $_POST['gameType'];
      $year = $_POST['year'];
      $rating = $_POST['rating'];
      $company = $_POST['company'];
      try {
        $game = new Game(null, $gameType, $name, $rating, $year, $company);
        $game->save();
      } catch (PDOException $exception) {
        $return = false;
      }
      break;
    case ActionType::ACTION_DELETE:
      $id = $_POST['id'];
      try {
        $game = new Game($id, null, null, null, null, null);
        $game->delete();
      } catch (PDOException $exception) {
        $return = false;
      }
      break;
    case ActionType::ACTION_MODIFY:
      $name = $_POST['name'];
      $gameType = $_POST['gameType'];
      $year = $_POST['year'];
      $rating = $_POST['rating'];
      $company = $_POST['company'];
      $gameTable = new GameTable();
      $game =  $gameTable->getById($_POST['id']);
      $game->modify($gameType, $name, $rating, $year, $company);
      $game->save();
      break;
    default:
      return false;
  }
  echo json_encode($return);
}
