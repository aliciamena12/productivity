<?php

include("database.php");

// if (isset($_POST['save_task'])) {
//     $title = $_POST['title'];

//     $query = "INSERT INTO task(title) VALUES ($title)";
//     $result = mysqli_query($conn, $query);

//     if (!$result) {
//         die("Query failed");
//     } else {
//         echo "saved";
//     }

// }


if (isset($_POST['save_task']))  {
    $title = $_POST['title'];
    $query = "INSERT INTO task (title) VALUES ($title)";
    $result = $conn -> query("SELECT title FROM task");

    if ($result) {
        echo "successfully created new user";
    } else {
        echo "Sorry there must have been an issue.";
    }
}