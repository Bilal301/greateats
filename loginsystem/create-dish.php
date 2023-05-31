<?php

$username = 'root';
$password = '';
$dbname = 'greateats';

$pdo = new PDO("mysql:host=localhost;dbname=$dbname", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$errMsg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $title = $_POST['name'];
  $description = $_POST['description'];
  $price = $_POST['price'];

  if (isset($_POST['submit'])) {
    if (empty($title || $price)) {
      $errMsg = 'Name and Price of dish are necessary';
    } else {

      $sql = "INSERT INTO menu (title,description,price) VALUES (:title,:description,:price)";
      $statement = $pdo->prepare($sql);
      $statement->bindValue(":title", $title);
      $statement->bindValue(":description", $description);
      $statement->bindValue(":price", $price);
      $statement->execute();
    }
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/style.css">
  <script src="https://kit.fontawesome.com/2e5be4f347.js" crossorigin="anonymous"></script>
  <title>Add a Dish</title>
</head>

<body>
  <a href="./menu-table.php">Back to Menu</a>
  <h1 class="text-center mt-4">Add a Dish</h1>
  <form class="m-5" method="POST">
    <p><?php echo $errMsg; ?></p>
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <input type="text" class="form-control" id="description" name="description">
    </div>
    <div class="mb-3">
      <label for="price" class="form-label">Price</label>
      <input type="number" step="0.01" class="form-control" id="price" name="price">
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Add to Menu</button>
  </form>
</body>

</html>