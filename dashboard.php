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
	<?= $user['email']; ?>
	<a class="links" href="logout.php">Logout</a>

<main>
	<h1 class="title">Productivity</h1>

	<section class="list__container" id="list__container">
		<div class="listbox">
			<div class="list__name" contenteditable="true">
				<p id="listname" onkeyup="edit()">List 1</p>
			</div>                
			<ul class="list" id="list1">
				<li class="list__element">Element 1</li>
				<li class="list__element">Element 2</li>
			</ul>
			<form action="save_task.php" method="POST" class="element__add">
				<input class="task__add" type="text" name="title" placeholder="Add">
				<input class="add__button" type="submit" name="save_task" value="+">
			</form>
		</div>

		<div class="listbox">
			<div class="list__name" contenteditable="true">
				<p>List 2</p>
			</div>                
			<ul class="list" id="list2">
				<li class="list__element">Element 1</li>
				<li class="list__element">Element 2</li>
			</ul> 
			<form action="save_task.php" method="POST" class="element__add">
				<input class="task__add" type="text" name="title" placeholder="Add">
				<input class="add__button" type="submit" name="save_task" value="+">
			</form>
		</div>

		<div class="listbox">
			<div class="list__name" contenteditable="true">
				<p>List 3</p>
			</div>                
			<ul class="list" id="list3">
				<li class="list__element">Element 1</li>
				<li class="list__element">Element 2</li>
			</ul>
			<form action="save_task.php" method="POST" class="element__add">
				<input class="task__add" type="text" name="title" placeholder="Add">
				<input class="add__button" type="submit" name="save_task" value="+">
			</form>
		</div>

		<div class="listbox">
			<div class="list__name" contenteditable="true">
				<p>List 4</p>
			</div>                
			<ul class="list" id="list4">
				<li class="list__element">Element 1</li>
				<li class="list__element">Element 2</li>
			</ul>
			<form action="save_task.php" method="POST" class="element__add">
				<input class="task__add" type="text" name="title" placeholder="Add">
				<input class="add__button" type="submit" name="save_task" value="+">
			</form>
		</div>
	</section>
</main>

<?php include("includes/footer.html") ?>

