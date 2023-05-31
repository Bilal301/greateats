<?php
$username = 'root';
$password = '';
$dbname = 'greateats';

$pdo = new PDO("mysql:host=localhost;dbname=$dbname", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$id = $_POST['id'];

$sql = "DELETE FROM menu WHERE id = :id";
$statement = $pdo->prepare($sql);
$statement->bindValue(':id', $id);
$statement->execute();

header('Location: menu-table.php');
