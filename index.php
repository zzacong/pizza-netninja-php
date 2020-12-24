<?php

include('./config/db_connect.php');

$sql = 'SELECT id, title, ingredients FROM pizza ORDER BY created_at';
$result = mysqli_query($conn, $sql);
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);
// Free result from memory
mysqli_free_result($result);
// Close connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('./templates/header.php'); ?>
</head>

<body class="grey lighten-4">

  <?php include('./templates/navbar.php'); ?>

  <h4 class="center grey-text">Ultimate Pizzas!</h4>

  <div class="container">
    <div class="row">
      <?php foreach ($pizzas as $pizza) : ?>
        <div class="col s6 md3" style="margin-top: 2rem !important;">
          <div class="card z-depth-0">
            <img src="image/pizza.svg" alt="pizza" class="pizza">
            <div class="card-content center">
              <h6 class="card-title"><?php echo htmlspecialchars($pizza['title']); ?></h6>
              <ul class="collection">
                <?php foreach (explode(',', $pizza['ingredients']) as $ing) : ?>
                  <li class="collection-item left-align">
                    <?php echo htmlspecialchars($ing); ?>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
            <div class="card-action right-align">
              <a href="details.php?id=<?php echo $pizza['id']; ?>" class="brand-text">more info</a>
            </div>
          </div>
        </div>

      <?php endforeach; ?>

      <?php if (count($pizzas) >= 2) : ?>
      <?php else : ?>
      <?php endif; ?>
    </div>
  </div>

  <?php include('./templates/footer.php'); ?>

</body>

</html>