<?php
require 'config.php';
$pdostatement = $pdo->prepare("DELETE FROM crud_table WHERE id=" . $_GET['id']);
$pdostatement->execute();
header("Location: index.php");
