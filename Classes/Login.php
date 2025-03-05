<?php
session_start();
class Login extends Dbh
{
  private $username;
  private $password;

  public function __construct($username, $password)
  {
    $this->username = $username;
    $this->password = $password;
  }

  private function loginUser()
  {
    $sqlQuery = "SELECT * FROM users WHERE username = :username;";
    $stmt = parent::connect()->prepare($sqlQuery);
    // $data = [
    //   'username' => $this->username,
    //   'pwd' => $this->password
    // ];
    $stmt->bindParam(":username", $this->username);
    // $statement->execute($data);
    $stmt->execute();
    $userData = $stmt->fetch();
    if ($userData) {
      if (password_verify($this->username, $userData["password"])) {
        echo "CHANGE PWD";
        //redirect: password page
      } elseif (password_verify($this->password, $userData["password"])) {
        $_SESSION["logged_in"] = 1;
        $_SESSION["username"] = $this->username;
        header("Location: ../loot.php");
      } else {
        echo "INVALID PWD";
        //increase invalid attempts
      }
    } else {
      echo "INVALID USERNAME";
    }
    unset($pdo);
    unset($stmt);
  }

  private function isEmptySubmit()
  {
    if (empty($this->username) || empty($this->password)) {
      return true;
    } else {
      return false;
    }
  }

  public function loginRequest()
  {
    // Error handlers
    if ($this->isEmptySubmit()) {
      header("Location: ../index.php?login_failed=true");
      die();
    }

    //if no errors, signup user
    $this->loginUser();
  }
}
