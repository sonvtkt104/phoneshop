<?php
    $dbhost = 'localhost';  // or 127.0.0.1
    $dbuser = 'root';       // default XAMPP username
    $dbpass = '';          // default XAMPP password is blank
    $dbname = 'greenwichphoneshop';   // your local database name

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    if($conn) {
        $setlang = mysqli_query($conn, "SET NAMES 'utf8'");
    } else {
        die("Connection failed: " . mysqli_connect_error());
    }
?>