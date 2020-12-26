<?php

$file = __DIR__ . '/quotes.txt';
echo $file;

if (file_exists($file)) {
  // Opening a file for reading
  // $handle = fopen($file, 'r');

  // Read file
  // echo fread($handle, filesize($file));
  // echo fread($handle, 100);

  // Read single line
  // echo fgets($handle), "<br>\n";
  // echo fgets($handle), "<br>\n";

  // Read single character
  // echo fgetc($handle);
  // echo fgetc($handle);

  // * ------------------- *//
  // $handle = fopen($file, 'r+');
  // $handle = fopen($file, 'a+');

  // Writing to a file
  // fwrite($handle, "\nEverything popular is wrong");

  // Close a file
  // fclose($handle);

  // Delete a file
  // unlink($file);

}
