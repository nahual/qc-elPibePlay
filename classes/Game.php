<?php
/**
 * User: Proyecto Nahual
 * Date: 04/11/12
 *
 * Cualquier inquietud, enviar un mail a sumate@nahual.com.ar
 *
 */

include_once("ActiveRecordEntity.php");

class Game extends ActiveRecordEntity
{

  private static $table = "game";

  private $name;
  private $gameType;
  private $rating;
  private $year;
  private $id;
  private $company;

  function __construct($id, $gameType, $name, $rating, $year, $company)
  {
    parent::__construct();
    $this->gameType = $gameType;
    if (isset($_SESSION['v']) && $_SESSION['v'] == "1") {
      $this->name = substr($name, 0, sizeof($name) - 2);
    } else {
      $this->name = $name;
    }

    $this->id = $id;
    $this->rating = $rating;
    $this->year = $year;
    $this->company = $company;
  }

  public function getGameType()
  {
    return $this->gameType;
  }

  public function getName()
  {
    return $this->name;
  }

  public function getId()
  {
    return $this->id;
  }

  public function getRating()
  {
    return $this->rating;
  }

  public function getYear()
  {
    return $this->year;
  }

  public function getCompany()
  {
    return $this->company;
  }

  public function modify($gameType, $name, $rating, $year, $company) {
    $this->gameType = $gameType;
    $this->name = $name;
    $this->rating = $rating;
    $this->year = $year;
    $this->company = $company;
  }

  public function save()
  {
    //si el id es nulo, es nuevo, asi que hacemos un insert
    if ($this->id == null) {
      $this->db->execute("INSERT INTO game (name, game_type, rating, year, company) VALUES (:name, :gameType, :rating, :year, :company)",
        array("name" => $this->name,
          "gameType" => $this->gameType,
          "rating" => $this->rating,
          "year" => $this->year,
          "company" => $this->company));
    } else {
      $this->db->execute("UPDATE game SET
      name= :name,
      rating= :rating,
      year= :year,
      game_type= :gameType,
      company= :company
      WHERE id= :id",
        array("id" => $this->getId(), "rating" => $this->getRating(), "year" => $this->getYear(),
      "name" => $this->getName(), "gameType" => $this->getGameType(), "company" => $this->getCompany()));
    }
  }

  public function delete()
  {
    $this->db->delete(Game::$table, $this->id);
  }
}
