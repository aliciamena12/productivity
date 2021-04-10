<?php
    require 'database.php';

    $message = '';

    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $password);

        if ($stmt->execute()) {
            $message = "successfully created new user";
            header('Location: /login.php');
        } else {
            $message = "Sorry there must have been an issue.";
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

    <h1>SignUp</h1>
    
    <?php if(!empty($message)): ?>
        <p><?= $message ?></p>
    <?php endif; ?>
    
    <form action="signup.php" method="post">
        <input type="text" name="email" placeholder="Enter your email" required><br>
        <input type="password" name="password" placeholder="Enter your password" required><br>
        <input type="password" name="Confirm password" placeholder="Confirm your password"><br>

        <input type="submit" value="Send"><br>
        <span>If you already have an account, <a href="login.php">Login</a></span>
    </form>
</body>
</html>