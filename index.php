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

<?php include("includes/header.html") ?>

    <?php if(!empty($user)): ?>
        <?= header('Location: /dashboard.php'); ?>

    <?php else: ?>
        <main>
            <h1 class="title">Home</h1>
            <p class="page__description">Ready to be productive? <br>
                Start now to be organized <br>
                and you won't regret it.</p>
            <h2>Please <a class="links" href="login.php">Login</a> or <a class="links" href="signup.php">SignUp</a></h2>
        </main>    
        <?php include("includes/footer.html") ?>    

    <?php endif; ?>


