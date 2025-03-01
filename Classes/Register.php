<?php

class Register
{
  private $email;

  public function __construct($email)
  {
    $this->email = $email;
  }

  private function sendEmail()
  {
    header("Location: ../register.php?reg_accepted");
  }

  private function isEmptySubmit()
  {
    if (empty($this->email)) {
      return true;
    } else {
      return false;
    }
  }

  public function registerUser()
  {
    // Error handlers
    if ($this->isEmptySubmit()) {
      header("Location: ../register.php?invalid_email");
    }

    //if no errors, signup user
    $this->sendEmail();
  }
}
