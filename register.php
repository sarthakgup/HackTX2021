<?php

   error_reporting(E_ALL);
   ini_set("display_errors", "on");
   $server = "34.134.223.163";
   $user = "root";
   $pwd = "xcElm987";
   $dbName = "hukausers";


   $mysqli = new mysqli($server, $user, $pwd, $dbName);

   if ($mysqli->connect_errno) {
      die('Connect Error: ' . $mysqli->connect_errno . ": " .  $mysqli->connect_error);
   } else {
      echo "<code>...Connection successful</code> <br>";
   }

   //Select Database
   $mysqli->select_db($dbName) or die($mysqli->error);

   $username = $_POST['user'];
   $password = $_POST['pwd'];
   $fname = $_POST['fname'];
   $lname = $_POST['lname'];
   $email = $_POST['email'];


   $query = "INSERT INTO users (username, password, firstName, lastName, email) VALUES(\"$username\",\"$password\", \"$fname\", \"$lname\", \"$email\")";
   $result = $mysqli->query($query) or die($mysqli->error);

   session_start();
   $_SESSION["username"] = $username;
   header("Location: home.html");


?>