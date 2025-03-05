<?php
class GroupLoot extends Dbh
{
  private $loot;
  public function getLoot()
  {
    $sqlQuery = "SELECT * FROM group_loot";
    $stmt = parent::connect()->prepare($sqlQuery);
    $stmt->execute();
    $this->loot = $stmt->fetchAll();
    unset($pdo);
    unset($stmt);
    return $this->loot;
  }
}