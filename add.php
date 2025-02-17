<?php

include('./config/db_connect.php');
// if (isset($_GET['submit'])) {
//   echo $_GET['email'];
//   echo $_GET['title'];
//   echo $_GET['ingredients'];
// }
$email = $title = $ingredients = '';
$errors = ['email' => '', 'title' => '', 'ingredients' => ''];

if (isset($_POST['submit'])) {
  // * Check email
  if (empty($_POST['email'])) {
    $errors['email'] = "Email is required.";
  } else {
    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = "Email must be a valid email address.";
    }
  }
  // * Check title
  if (empty($_POST['title'])) {
    $errors['title'] = "Title is required.";
  } else {
    $title = $_POST['title'];
    if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
      $errors['title'] = "Title must be letters and spaces only.";
    }
  }
  // * Check ingredients
  if (empty($_POST['ingredients'])) {
    $errors['ingredients'] = "At least one ingredient is required.";
  } else {
    $ingredients = $_POST['ingredients'];
    if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
      $errors['ingredients'] = "Ingredients must be a comma seperated list.";
    }
  }

  if (array_filter($errors)) {
    // Errors in form
  } else {
    // Form is valid
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);

    $sql = "INSERT INTO pizza (title, email, ingredients) VALUES ('$title', '$email', '$ingredients');";
    if (mysqli_query($conn, $sql)) {
      header('Location: index.php');
    } else {
      echo 'query error: ' . mysqli_error($conn);
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('./templates/header.php'); ?>
</head>

<body class="grey lighten-4">
  <?php include('./templates/navbar.php'); ?>

  <section class="container grey-text">
    <h4 class="center">Add a Pizza</h4>
    <!-- <form action="add.php" method="GET" class="white"> -->
    <form action="add.php" method="POST" class="white">
      <label>Your Email:</label>
      <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>">
      <div class="red-text"><?php echo $errors['email'] ?></div>
      <label>Pizza Title:</label>
      <input type="text" name="title" value="<?php echo htmlspecialchars($title); ?>">
      <div class="red-text"><?php echo $errors['title'] ?></div>
      <label>Ingredients (comma seperated):</label>
      <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients); ?>">
      <div class="red-text"><?php echo $errors['ingredients'] ?></div>
      <div class="center">
        <input type="submit" value="submit" name="submit" class="btn brand z-depth-0">
      </div>
    </form>
  </section>

  <?php include('./templates/footer.php'); ?>

</body>

</html>