<?php
//signup controller
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  //sanitizes inputs
  $email = filter_input(
    INPUT_POST,
    "email",
    FILTER_SANITIZE_FULL_SPECIAL_CHARS
  );
  //check if both inputs are set
  if (isset($email)) {
    //check for valid email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      require_once "../Classes/Dbh.php";
      require_once "../Classes/Register.php";

      //hash the pwd
      $hash = password_hash($pwd, PASSWORD_DEFAULT);

      //signup the user
      $signup = new Signup($email, $hash);
      $signup->registerUser();
    } else {
      echo "Invalid username.";
    }
  } else {
    echo "<br>Enter a valid email and password.";
  }
}