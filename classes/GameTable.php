<?php
/**
 * User: Proyecto Nahual
 * Date: 04/11/12
 *
 * Cualquier inquietud, enviar un mail a sumate@nahual.com.ar
 *
 */

include_once("Game.php");

class GameTable
{

  private $db;

  public function __construct() {
    $this->db = new Database();
  }

  public function getAllGames() {
    return $this->queryAndTransformGames("SELECT * FROM game");
  }

  private function queryAndTransformGames($sql, $onlyImportantColumns = false) {
    $rs = $this->db->query($sql);
    $games = array();
    if ($rs) {
      foreach ($rs as $row) {
        if ($onlyImportantColumns) {
          $game = new Game($row['id'], $row['game_type'], $row['name'], $row['rating'], null, null);
        } else {
          $game = new Game($row['id'], $row['game_type'], $row['name'], $row['rating'], $row['year'], $row['company']);
        }
        array_push($games, $game);
      }
    }
    return $games;
  }

  public function getGames($onlyImportantColumns, $gameTypeFilter) {
    $sql = $this->buildFilterQuery($onlyImportantColumns, $gameTypeFilter);
    return $this->queryAndTransformGames($sql, $onlyImportantColumns);
  }

  public function buildFilterQuery($onlyImportantColumns, $gameTypeFilter)
  {
    $sql = "SELECT";
    if ($onlyImportantColumns) {
      $sql .= " id, name, game_type, rating ";
    } else {
      $sql .= " * ";
    }
    $sql .= " FROM game";
    if ($gameTypeFilter != "todos") {
      $sql .= " WHERE game_type='$gameTypeFilter'";
    }
    $sql .= " ORDER BY rating ASC";
    return $sql;
  }

  public function getById($id) {
    $rs = $this->db->query("SELECT * FROM game WHERE id=:id", array("id" => $id));
    $row = $rs[0];
    $game = new Game($row['id'], $row['game_type'], $row['name'], $row['rating'], $row['year'], $row['company']);
    return $game;
  }

}
