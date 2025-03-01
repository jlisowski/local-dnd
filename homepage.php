<?php
session_start();
//verify user is logged in
if (!isset($_SESSION["logged_in"])) {
  session_destroy();
  header("Location: ./index.php");
}
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="./index.css">
  <title>Campaign List</title>
</head>

<body>
  <div class="text-success text-start">[<?php echo $_SESSION["username"] ?>]</div>
  <p>:LOOT:</p>
  <div class="d-flex justify-content-center">
    <div class="w-50 border border-primary d-flex text-start">
      <img class="campaign-cover-art m-3" src="./assets/yawning_portal.webp" alt="Tales of the Yawning Portal Cover Art">
      <div class="m-3">
        <label for="character-list">Characters:</label>
        <ul>
          <li>Alice</li>
          <li>Besha</li>
          <li>D'Hy'Cee</li>
          <li>Krittlestiks</li>
          <li>Onikaan Syn</li>
          <li>Sylas Fellspark</li>
          <li>Wylie Snare</li>
        </ul>
      </div>
    </div>
  </div>
</body>

</html>