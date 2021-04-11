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

<?php include("includes/header.html") ?>

<main>
    <h1 class="title">Productivity</h1>

    <section class="auth__container">
        <h2 class="subtitle">Login</h2>

        <?php if(!empty($message)): ?>
            <p><?= $message ?></p>
        <?php endif; ?>

        <form action="login.php" method="post">
            <input class="form__input" type="text" name="email" placeholder="Enter your email"><br>
            <input class="form__input" type="password" name="password" placeholder="Enter your password"><br>
            <input class="form__button" type="submit" value="Send"><br>
            <span>If you don't have an account, <a class="links" href="signup.php">SignUp</a></span>
        </form>
    </section>
</main>

<?php include("includes/footer.html") ?>    
