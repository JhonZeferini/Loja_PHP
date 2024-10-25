<?php
require "config.php";
class Conexao
{
  private $connection;

  public function getConnection()
  {
    $connection = new PDO(dsn, user, password);
    return $connection;
  }

}

?>