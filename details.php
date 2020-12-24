<?php
include('./config/db_connect.php');
// Check query parameter
if (isset($_GET['id'])) {
  $id = mysqli_real_escape_string($conn, $_GET['id']);
  $sql = "SELECT * FROM pizza WHERE id = $id;";
  $result = mysqli_query($conn, $sql);
  $pizza = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  mysqli_close($conn);
}

if (isset($_POST['delete'])) {
  $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
  $sql = "DELETE FROM pizza WHERE id = $id_to_delete";
  if (mysqli_query($conn, $sql)) {
    header('Location: index.php');
  } else {
    echo 'query error: ' . mysqli_error($conn);
  };
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('./templates/header.php'); ?>
</head>

<body class="grey lighten-4">
  <?php include('./templates/navbar.php'); ?>

  <div class="container center">
    <div style="display: flex; justify-content: center;">
      <div class="card" style="width: 80%; margin-top: 4rem;">
        <div class="card-content">
          <?php if ($pizza) : ?>
            <span class="card-title"><?php echo htmlspecialchars($pizza['title']); ?></span>
            <div class="container">
              <p class="left-align">Created by: <?php echo htmlspecialchars($pizza['email']); ?></p>
              <p class="left-align">Created at: <?php echo date($pizza['created_at']); ?></p>
              <p class="left-align"><?php echo htmlspecialchars($pizza['ingredients']) ?></p>
            </div>
            <form action="details.php" method="POST" class="card-action">
              <input type="hidden" name="id_to_delete" value="<?php echo $pizza['id'] ?>">
              <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
            </form>
          <?php else : ?>
            <span class="card-title red-text">This pizza does not exists!</span>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

  <?php include('./templates/footer.php'); ?>
</body>

</html>