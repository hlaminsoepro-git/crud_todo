<?php
require 'config.php';
if ($_POST) {
    // DATA SET FROM INPUT
    $title = $_POST['title'];
    $description = $_POST['description'];

    $id = $_POST['id'];
    $pdostatment = $pdo->prepare("UPDATE crud_table SET title=:title, description=:description WHERE id =
    '$id'");
    $result = $pdostatment->execute(
        array(
            // DATA FETCH FROM INPUT VARIABLE
            ':title' => $title,
            ':description' => $description
        )
    );
    if ($result) {
        echo "<script>alert('New Todo is Update!'); window.location.href='index.php';</script>";
    }
}
$pdostatment = $pdo->prepare("SELECT * FROM crud_table WHERE id =" . $_GET['id']);
$pdostatment->execute();
$data = $pdostatment->fetchAll();

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
    <h1 class="text-center">Edit Page</h1>
    <div class="container">
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $data[0]['id']; ?>">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" placeholder="TITLE" value="<?php echo $data[0]['title'] ?>" required>

            <label for="description">Description</label>
            <textarea name="description" class="form-control" placeholder="DESCRIPTION" value="<?php echo $data[0]['description'] ?>" required></textarea>

            <button class="btn btn-primary">Submit</button>
            <a href="index.php" class="btn btn-warning">Back</a>
        </form>
    </div>
</body>

</html>