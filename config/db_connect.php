<?php
$conn = mysqli_connect('localhost', 'ninjapizza', 'password', 'ninja_pizza');

if (!$conn) {
  echo 'Connection error: ' . mysqli_connect_error();
}
