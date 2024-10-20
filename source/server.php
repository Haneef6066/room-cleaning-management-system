<?php

session_start();
require("db.php");

$errors = array();

// ========================= LOGIN STUDENT =======================
if(isset($_POST['studentLogin'])){
  $rollnumber = mysqli_real_escape_string($db, $_POST['studentRoll']);
  $password = mysqli_real_escape_string($db, $_POST['studentPass']);
  $rollnumber = (int)$rollnumber;
  $password = md5($password);
  $query_find_student = "select * from students where rollnumber='$rollnumber'";
  $result_find_student = mysqli_query($db,$query_find_student);
  if (mysqli_num_rows($result_find_student) == 1) {
    $row = mysqli_fetch_assoc($result_find_student);
    if($password == $row['password']){
      $_SESSION['rollnumber'] = $rollnumber;
      $_SESSION['student_logged'] = "You are now logged in";
      header("Location: index.php");
    }else{
      array_push($errors, "Wrong password! Please try again.");
    }
  }else {
    array_push($errors, "Student not found!");
  }
}

// ========================= LOGIN ADMIN` =======================
if(isset($_POST['adminLogin'])){
  $adminUsername = mysqli_real_escape_string($db, $_POST['adminUsername']);
  $adminPassword = mysqli_real_escape_string($db, $_POST['adminPassword']);
  
  $adminPassword = md5($adminPassword);
  $query_find_admin = "select * from admin where username='$adminUsername'";
  $result_find_admin = mysqli_query($db,$query_find_admin);
  if (mysqli_num_rows($result_find_admin) == 1) {
    $row = mysqli_fetch_assoc($result_find_admin);
    if($adminPassword == $row['password']){
      $_SESSION['username'] = $adminUsername;
      $_SESSION['admin_logged'] = "You are now logged in";
      header("Location: allot.php");
    }else{
      array_push($errors, "Wrong password! Please try again.");
    }
  }else {
    array_push($errors, "Admin not found!");
  }
}


// session_start();
// require("db.php");

// $errors = array(); // This will store any errors during login

// // ========================= LOGIN STUDENT =======================
// if (isset($_POST['studentLogin'])) {
//     $rollnumber = mysqli_real_escape_string($db, $_POST['studentRoll']);
    
//     // You can add a query to check if the roll number exists in the database (optional but recommended)
//     $query = "SELECT * FROM students WHERE rollnumber='$rollnumber' LIMIT 1";
//     $result = mysqli_query($db, $query);
    
//     if (mysqli_num_rows($result) === 1) {
//         // Bypass password check for students
//         $_SESSION['rollnumber'] = $rollnumber;
//         $_SESSION['student_logged'] = "You are now logged in";
//         header("Location: index.php");
//         exit(); // Ensure the script stops after redirect
//     } else {
//         $errors[] = "Invalid roll number"; // Push an error if roll number is not found
//     }
// }

// // ========================= LOGIN ADMIN =======================
// if (isset($_POST['adminLogin'])) {
//     $adminUsername = mysqli_real_escape_string($db, $_POST['adminUsername']);
    
//     // You can add a query to check if the admin username exists (optional but recommended)
//     $query = "SELECT * FROM admin WHERE username='$adminUsername' LIMIT 1";
//     $result = mysqli_query($db, $query);
    
//     if (mysqli_num_rows($result) === 1) {
//         // Bypass password check for admins
//         $_SESSION['username'] = $adminUsername;
//         $_SESSION['admin_logged'] = "You are now logged in";
//         header("Location: allot.php");
//         exit(); // Ensure the script stops after redirect
//     } else {
//         $errors[] = "Invalid admin username"; // Push an error if admin username is not found
//     }
// }

// // ========================= ERROR HANDLING =======================
// if (!empty($errors)) {
//     foreach ($errors as $error) {
//         echo '<div class="alert alert-danger">' . htmlspecialchars($error) . '</div>';
//     }
// }





?>
