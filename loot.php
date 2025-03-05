<?php
session_start();
//verify user is logged in
if (!isset($_SESSION["logged_in"])) {
  session_destroy();
  header("Location: ./index.php");
}
if(isset($_GET["campaign"])) {
  $campaign = $_GET["campaign"];
} else {
  echo "no campaign detected, default selected";
  header("Location: ./loot.php?campaign=Sunless%20Citadel");
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
  <title>Campaign Loot</title>
</head>

<body>
  <div class="text-success text-start">[<?php echo $_SESSION["username"] ?>]</div>
  <div class="d-flex justify-content-center">
    <div class="w-50 d-flex text-start">
      <img class="campaign-cover-art m-3" src="./assets/yawning_portal.webp" alt="Tales of the Yawning Portal Cover Art">
        <ul class="m-3">
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
  <button class="btn btn-primary">Add Item</button>
  <div class="loot-container pt-4">
    <table class="w-50 mx-auto table table-sm table-striped text-start">
      <thead>
        <th>Quantity</th>
        <th>Name</th>
        <th>$GP</th>
        <th>$SP</th>
        <th></th>
      </thead>
      <tbody>
        <?php 
        include_once("./Classes/Dbh.php");
        include_once("./Classes/GroupLoot.php");
        $groupLoot = new GroupLoot;
        $lootTable = $groupLoot->getLoot();
        $totalGp = 0;
        $totalSp = 0;
        foreach ($lootTable as $item) {
          if ($item["item_name"] != "currency") {
            echo "<tr>" . 
            "<td>" . $item["quantity"] . "</td>" .
            "<td>" . $item["item_name"] . "</td>" .
            "<td class='text-warning'>" . $item["value_gp"] . "</td>" . 
            "<td>" . $item["value_sp"] . "</td>" . 
            "<td></td>" .
            // "<td>" . "<input class='btn btn-warning' type='submit' name='itemEdit({$item["id"]})' value='edit'> <button class='btn btn-danger'>X</button>" . "</td>" .  
            "</tr>";
            $totalGp += $item["value_gp"] * $item["quantity"];
            $totalSp += $item["value_sp"] * $item["quantity"];
          } else {
            $gold = $item["value_gp"];
            $silver = $item["value_sp"];            
          }
        }
        echo "<tfoot class='table-group-divider'><tr>" . "<td class='text-primary'>TOTAL</td>" . "<td></td>" . "<td class='text-warning'>" . $totalGp . "</td>" . "<td>" . $totalSp . "</td>" . "<td></td></tr></tfoot>";
        ?>
      </tbody>
    </table>
    <div class="currency-container w-50 mx-auto text-start">
      <ul class="list-group" id="group-currency">
        <li class="list-group text-success">Group Currency:</li>
        <li class="list-group text-warning">GP:<?php echo $gold; ?></li>
        <li class="list-group">SP:<?php echo $silver; ?></li>
      </ul>
    </div>
  </div>
</body>
<footer>
  <p class="text-start mt-4 p-4"></p>
</footer>

</html>