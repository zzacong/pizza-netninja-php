<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <?php

  $file = 'readme.txt';
  if (file_exists($file)) {
    // Read file
    // echo readfile($file);

    // Copy file
    // copy($file, 'quotes.txt');

    // Absolute path
    // echo realpath($file);

    // File size
    // echo filesize($file);

    // Rename file
    // rename($file, 'test.txt');
  } else {
    echo 'File does not exist';
  }

  // Make directory
  mkdir('quotes');

  ?>

</body>

</html>