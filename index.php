<?php
require 'config.php';

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
    <div class="container mt-3">
        <h2>TODO Table</h2><br>
        <div>
            <a href="add.php" class="btn btn-primary">Create +</a>
        </div><br>
        <table class="table table-dark table-striped">
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Descripiton</th>
                <th>Action</th>

            </tr>

            <?php
            $i = 1;
            $sql = "SELECT * FROM crud_table ORDER BY id DESC";
            $pdostatment = $pdo->prepare($sql);
            $pdostatment->execute();
            $datas = $pdostatment->fetchAll();
            foreach ($datas as $data) {
            ?>

                <tr>
                    <td><?php echo $i; ?> </td>
                    <td><?php echo $data['title']; ?></td>
                    <td><?php echo $data['description']; ?></td>

                    <td class="border-2 border-white " align="center">
                        <a type="submit" href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-warning ">Edit</a>
                        <a href="delete.php?id=<?php echo $data['id']; ?>" class="btn btn-danger ">Delete</a>
                    </td>
                </tr>

            <?php
                $i++;
            }
            ?>

        </table>
    </div>

</body>

</html>