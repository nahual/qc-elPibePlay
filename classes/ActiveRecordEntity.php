<?php

include_once("Database.php");

/**
 * User: Proyecto Nahual
 * Date: 04/11/12
 *
 * Cualquier inquietud, enviar un mail a sumate@nahual.com.ar
 *
 */
abstract class ActiveRecordEntity
{

  protected $db;

  function __construct()
  {
    $this->db = new Database();
  }

  public abstract function save();
  public abstract function delete();


}
