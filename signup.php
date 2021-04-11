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

<?php include("includes/header.html") ?>

<main>
    <h1 class="title">Productivity</h1>

    <section class="auth__container">
        <h2 class="subtitle">Signup</h2>

        <?php if(!empty($message)): ?>
            <p><?= $message ?></p>
        <?php endif; ?>
        
        <form action="signup.php" method="post">
            <input class="form__input" type="text" name="email" placeholder="Enter your email" required><br>
            <input class="form__input" type="password" name="password" placeholder="Enter your password" required><br>
            <input class="form__input" type="password" name="Confirm password" placeholder="Confirm your password"><br>

            <input class="form__button" type="submit" value="Send"><br>
            <span>If you already have an account, <a class="links" href="login.php">Login</a></span>
        </form>
    </section>
</main>

<?php include("includes/footer.html") ?>

