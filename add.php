<?php
require 'config.php';

if ($_POST) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $sql = "INSERT INTO crud_table(title,description) VALUES (:title, :description)";
    $pdostatment = $pdo->prepare($sql);
    $result = $pdostatment->execute(
        array(
            ':title' => $title,
            ':description' => $description
        )
    );

    if ($result) {
        echo "<script>alert('New todo is add!');window.location.href='index.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center">Create Page</h1>
    <div class="container">
        <form action="" method="POST">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" placeholder="TITLE" required>

            <label for="description">Description</label>
            <textarea name="description" class="form-control" placeholder="DESCRIPTION" required></textarea>

            <button class="btn btn-primary">Submit</button>
            <a href="index.php" class="btn btn-warning">Back</a>
        </form>
    </div>
</body>

</html>