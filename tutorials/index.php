<?php

// * SESSION
session_start();

// if (!isset($_SESSION['name'])) {
//   $name = $_SESSION['name'];
// }

if ($_SERVER['QUERY_STRING'] === 'guest') {
  unset($_SESSION['name']);
  // session_unset();
}

$name = $_SESSION['name'] ?? 'Guest';

// * GET COOKIE
$gender = $_COOKIE['gender'] ?? 'Unknown';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1>TUTORIAL INDEX</h1>
  <p>Hello name: <?php echo $name; ?></p>
  <p>Gender: <?php echo $gender; ?></p>

</body>

</html>