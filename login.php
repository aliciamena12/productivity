<?php
    
    session_start();

    if (isset($_SESSION['user_id'])) {
      header('Location: /index.php');
    }
    
    require 'database.php';

    $message = '';

    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $records = $conn->prepare('SELECT id, email, password FROM users WHERE email=:email');
        $records->bindParam(':email', $_POST['email']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $message = '';

        if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
            $_SESSION['user_id'] = $results['id'];
            header('Location: /dashboard.php');
        } else {
            $message = "Sorry, the credentials do not match.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <meta name="description" content="Practice of Drag and Drop">
    <link rel="stylesheet" href="styles.css">
    <!-- <link rel="icon" href="images\logo.png" type="image/png" sizes="16x16"> -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Raleway&display=swap" rel="stylesheet">
   </head>
<body>

    <?php require 'partials/header.html' ?>

    <h1>Login</h1>

    <?php if(!empty($message)): ?>
        <p><?= $message ?></p>
    <?php endif; ?>

    <form action="login.php" method="post">
        <input type="text" name="email" placeholder="Enter your email"><br>
        <input type="password" name="password" placeholder="Enter your password"><br>
        <input type="submit" value="Send"><br>
        <span>If you don't have an account, <a href="signup.php">SignUp</a></span>



    </form>
</body>
</html>