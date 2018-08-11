<?php
  /*
  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: /php-login');
  }
  require '../controller/database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    
    
    $query = "SELECT id, email, password FROM USERS WHERE email = :email";
    $consul = mysqli_query($conn, $query);
    $results = mysqli_fetch_array($consul);
    
    #$records = $conn->prepare('SELECT id, email, password FROM USERS WHERE email = :email');    
    #$records->bindParam(':email', $_POST['email']);
    #$records->execute();
    #$results = $records->fetch(PDO::FETCH_ASSOC);
    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: /php-login");
    } else {
      $message = 'Sorry, those credentials do not match';
    }
  }

  */


  require '../controller/database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {    
    
    $query = "SELECT id FROM USERS WHERE email ='".$_POST['email']."'AND password = '".$_POST['password']."'";
    $consul = mysqli_query($conn, $query);
    $results = mysqli_fetch_array($consul);
    
    $message = '';

    if (count($results) >0) {
      header("Location: /php-login");
    } else {
      $message = 'Sorry, those credentials do not match';
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="../controller/assets/css/style.css">
  </head>
  <body>
    <?php require '../controller/partials/header.php' ?>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Login</h1>
    <span>or <a href="signup.php">SignUp</a></span>

    <form action="login.php" method="POST">
      <input name="email" type="text" placeholder="Enter your email">
      <input name="password" type="password" placeholder="Enter your Password">
      <input type="submit" value="Submit">
    </form>
  </body>
</html>
