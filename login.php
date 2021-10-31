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
   }
   // else {
   //    echo "<code>...Connection successful</code> <br>";
   // }
   
   //Select Database
   $mysqli->select_db($dbName) or die($mysqli->error);
   
   // $sql = "CREATE TABLE users (
   // username VARCHAR(30), 
   // password  VARCHAR(30),
   // fname VARCHAR(30),
   // lname  VARCHAR(30), 
   // email VARCHAR(30),
   // PRIMARY KEY (username)
   // )";
   // $result = $mysqli->query($sql);

   $username = $_POST['user'];
   $password = $_POST['pwd'];
   // $fname = $_POST['fname'];
   // $lname = $_POST['lname'];
   // $email = $_POST['email']

   // Escape User Input to help prevent SQL Injection
   // $lastName = $mysqli->real_escape_string($lastName);
   // $firstName = $mysqli->real_escape_string($firstName);

   //build query
   // echo "<code>...Building query</code><br>";
   // $query = "INSERT INTO users VALUES('aa','b', 'maryam', 'hussaini', 'ds@c.com')";  
   // $result = $mysqli->query($query) or die($mysqli->error);


   $result = $mysqli->query("SELECT * FROM users WHERE username = \"$username\" AND password = \"$password\"") or die($mysqli->error);
   // $result = $mysqli->query("SELECT * FROM users") or die($mysqli->error);
   // echo "hi";mysqli_fetch_array($result)
   if (mysqli_num_rows($result)==0) {

      echo "username not in dbase";
   }else{
      //echo "logged in";
      session_start();
      $_SESSION["username"] = $username;
      header("Location: mainPage.html");
   };
   

   // Insert a new row in the table for each person returned
   // while($row = $result->fetch_array(MYSQLI_ASSOC)) {
   //    echo "$row[0], $row[1]";
   // }
   //echo "Query: <code>" . $query . "</code> <br><br>";
   
   // 

?>