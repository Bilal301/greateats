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
  <a href="create-dish.php" class="m-5 btn btn-info">Add a Dish</a>
  <a href="logout.php" class="m-5 float-end btn btn-warning">Logout</a>
  <h1 class="text-center">Current Menu Items</h1>
  <table class="m-5 table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Dish</th>
        <th scope="col">Price</th>
        <th scope="col" colspan="2">Action</th>
      </tr>
    </thead>
    <?php foreach ($products as $i => $product) :
    ?>
      <tbody>
        <tr>
          <th scope="row"><?php echo $i + 1; ?></th>
          <td><?php echo $product['title']; ?></td>
          <td><?php echo '$ ' . $product['price']; ?></td>
          <td>
            <a href="./edit-dish.php?id=<?php echo $product['id']; ?>" type="button" class="btn btn-outline-success">Edit</a>

            <form action="delete-dish.php" style="display: inline-block;" method="post">
              <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
              <button type="submit" class="btn btn-outline-danger">Delete</a>
            </form>
          </td>
        </tr>
      </tbody>
    <?php endforeach; ?>
  </table>
</body>

</html>