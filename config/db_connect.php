<?php
$conn = mysqli_connect('localhost', 'mysql', 'mysql', 'ninja_pizza');

if (!$conn) {
  echo 'Connection error: ' . mysqli_connect_error();
}
