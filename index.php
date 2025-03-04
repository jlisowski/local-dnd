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
  <title>BRDNST</title>

</head>

<body>
  <div class="login-container">
    <div class="slide-top mb-3">
      <?php if (isset($_GET["login_failed"])) {
        echo '<h4 class="login-console text-danger">Invalid Credentials</h4>';
      } else {
        echo "<h4>:login:</h4>";
      }
      ?>
    </div>
    <form class="login-form" action="./includes/login.inc.php" method="post">
      <div class="form-floating mb-3">
        <input type="text" name="user" id="user" placeholder="username" class="form-control" autofocus>
        <label for="user" class="form-label">usr ></label>
      </div>
      <div class="form-floating mb-3">
        <input type="password" name="pwd" id="pwd" placeholder="password" class="form-control">
        <label for="pwd" class="form-label">pwd ></label>
      </div>
      <input type="submit" value="submit">
    </form>
  </div>
  <div class="mt-3">
    <a href="./register.php">register</a>
  </div>
</body>

</html>