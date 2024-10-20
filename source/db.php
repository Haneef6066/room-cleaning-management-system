<?php
  //   // Create Database Connection
  //  $dbhost = "localhost" ;
  //  $dbuser = "root" ;
  //  $dbpass = "" ;
  //  $dbname = "housekeeping" ;
  //  $db = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
   
  //   // Check Database Connection
  //   if (!$db) {
  //     die("Connection failed: " . mysqli_connect_error());
  //   }
  // // echo "Connected successfully";
  
// // Create Database Connection
// $dbhost = "localhost";
// $dbuser = "root";
// $dbpass = "";
// $dbname = "housekeeping";
// $db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// // Check Database Connection
// if (!$db) {
//     die("Connection failed: " . mysqli_connect_error());
// }

// // Set character set to avoid encoding issues
// mysqli_set_charset($db, "utf8mb4");

// // Optional: success message for testing (remove in production)
// // echo "Connected successfully";

// Use environment variables for sensitive information
// $dbhost = getenv('DB_HOST') ?: "localhost";
// $dbuser = getenv('DB_USER') ?: "root";
// $dbpass = getenv('DB_PASS') ?: "";
// $dbname = getenv('DB_NAME') ?: "housekeeping";

// $db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// // Check Database Connection
// if (!$db) {
//     die("Connection failed: " . mysqli_connect_error());
// }

// // Set character set to avoid encoding issues
// mysqli_set_charset($db, "utf8mb4");

// Use environment variables for sensitive information
// $dbhost = getenv('DB_HOST') ?: "localhost";
// $dbuser = getenv('DB_USER') ?: "root";
// $dbpass = getenv('DB_PASS') ?: "";
// $dbname = getenv('DB_NAME') ?: "housekeeping";

// $db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// // Check Database Connection
// if (!$db) {
//     error_log("Database connection failed: " . mysqli_connect_error(), 3, 'error_log.txt');
//     die("Database connection error. Please try again later.");
// }

// // Set character set to avoid encoding issues
// mysqli_set_charset($db, "utf8mb4");

// // Optional: Close the database connection when done
// // mysqli_close($db);


// Get environment variables for database credentials or use default values
$dbhost = getenv('DB_HOST') ?: "localhost";
$dbuser = getenv('DB_USER') ?: "root";
$dbpass = getenv('DB_PASS') ?: "";
$dbname = getenv('DB_NAME') ?: "housekeeping";

// Establish the database connection
$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check Database Connection
if (!$db) {
    // Log the database connection error to a file
    error_log("Database connection failed: " . mysqli_connect_error(), 3, 'error_log.txt');
    die("Database connection error. Please try again later.");
}

// Set the character set to avoid encoding issues (e.g., handling special characters properly)
if (!mysqli_set_charset($db, "utf8mb4")) {
    error_log("Error loading character set utf8mb4: " . mysqli_error($db), 3, 'error_log.txt');
    die("Character set error. Please try again later.");
}

// Optionally, you can close the database connection manually at the end of the script if necessary.
// Avoid closing the connection prematurely in the middle of your code.
// mysqli_close($db);




?>