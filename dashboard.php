<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
        $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <meta name="description" content="Practice of Drag and Drop">
    <link rel="stylesheet" href="styles.css">
    <!-- <link rel="icon" href="images\logo.png" type="image/png" sizes="16x16"> -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Raleway&display=swap" rel="stylesheet">
   
</head>
<body>

    <?php require 'partials/header.html' ?>
        <br> Welcome. <?= $user['email']; ?>
        <br>You are successfully Logged In.
        <a href="logout.php">Logout</a>

</body>
</html>