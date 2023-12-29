<?php

$connection = mysqli_connect('localhost', 'root', '', 'oop');

if ($connection) {
   // echo "We are connected";
} else{
 die("Database connection failed");
}

?>