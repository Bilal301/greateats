<?php
// $username = 'root';
// $password = '';
// $dbname = 'greateats';

// $pdo = new PDO("mysql:host=localhost;dbname=$dbname", $username, $password);
// $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// $sql = "SELECT * FROM menu";
// $statement = $pdo->prepare($sql);
// $statement->execute();
// $products = $statement->fetch(PDO::FETCH_ASSOC);



?>
<!-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="./../css/style.css">
  <title>Document</title>
</head> -->

<!-- <body>
  <table class="m-5 table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Dish</th>
        <th scope="col">Price</th>
      </tr>
    </thead>
    <?
    //php foreach ($products as  $product) : 
    ?>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td><?
              //php echo $product['price']; 
              ?></td>
          <td>2</td>
        </tr>
      </tbody>
    <?php
    //endforeach; 
    ?>
  </table>
</body>-->

<?php

$username = 'root';
$password = '';
$dbname = 'greateats';

$pdo = new PDO("mysql:host=localhost;dbname=$dbname", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT * FROM menu";
$statement = $pdo->prepare($sql);
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Our Menu</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/style.css">
  <script src="https://kit.fontawesome.com/2e5be4f347.js" crossorigin="anonymous"></script>
</head>



<body>
  <table class="m-5 table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Dish</th>
        <th scope="col">Price</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <?php foreach ($products as $i => $product) :
    ?>
      <tbody>
        <tr>
          <th scope="row"><?php echo $i + 1; ?></th>
          <td><?php echo $product['title']; ?></td>
          <td><?php echo '$ ' . $product['price']; ?></td>
          <td><button type="button" class="btn btn-outline-success">Edit</button></td>
          <td><button type="button" class="btn btn-outline-danger">Delete</button></td>
        </tr>
      </tbody>
    <?php endforeach; ?>
  </table>
</body>

</html>