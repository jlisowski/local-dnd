<?php
class Dbh
{
  private $host = "localhost";
  private $dbname = "dnd";
  private $dbuser = "dnd";
  private $dbpass = "qsWB!yK5wGMuuMyL";

  protected function connect()
  {
    try {
      $pdo = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->dbuser, $this->dbpass);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //make sure to return the pdo
      return $pdo;
    } catch (PDOException $e) {
      die("Connection failed: " . $e->getMessage());
    }
  }
}
