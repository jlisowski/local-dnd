<?php
//login controller
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  //sanitizes inputs
  $username = filter_input(
    INPUT_POST,
    "user",
    FILTER_SANITIZE_FULL_SPECIAL_CHARS
  );
  $password = filter_input(
    INPUT_POST,
    "pwd",
    FILTER_SANITIZE_FULL_SPECIAL_CHARS
  );
  //check if both inputs are set
  if (isset($username) && isset($password)) {
    //check for valid email

    require_once "../Classes/Dbh.php";
    require_once "../Classes/Login.php";

    //login the user
    $login = new Login($username, $password);
    $login->loginRequest();
  } else {
    echo "<br>Enter a valid username and password.";
  }
}
