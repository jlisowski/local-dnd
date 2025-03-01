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
      require_once "../Classes/Register.php";

      //register email
      $register = new Register($email);
      $register->registerUser();
    } else {
      header("Location: ../register.php?invalid_email");
    }
  } else {
    echo "<br>Enter a valid email.";
  }
}
