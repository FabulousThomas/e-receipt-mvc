<?php

// $host = "localhost:3306";
// $user = "viewdee1_viewdeep";
// $pass = "viewdeep12345";
// $db = "viewdee1_receipt_db";
$host = "localhost";
$user = "root";
$pass = "";
$db = "receipt_db";
$tbname = "users";
$logintb = "login_sessions";
$e_receipt = "e_receipt";
$id = "";


if (!$con = mysqli_connect($host, $user, $pass)) {
   die("Failed to Connect to Database!");
}

// CREATE DATABASE AND TABLE QUERIES
$createdb = "CREATE DATABASE IF NOT EXISTS $db";
if (mysqli_query($con, $createdb)) {

   $con = mysqli_connect($host, $user, $pass, $db);

   // CREATE TABLE USERS
   $createtb = "CREATE TABLE IF NOT EXISTS $tbname ( 
      `id` INT NOT NULL AUTO_INCREMENT , 
      `user_id` INT NOT NULL , 
      `username` VARCHAR(225) NOT NULL , 
      `email` VARCHAR(225) NOT NULL , 
      `password` VARCHAR(225) NOT NULL ,  
      `date` TIMESTAMP NOT NULL , 
      PRIMARY KEY (`id`)) ENGINE = InnoDB";

   if (!mysqli_query($con, $createtb)) {
      echo "Error creating table USERS: " . mysqli_error($con);
   }

   // // CREATE TABLE LOGIN_SESSIONS
   $createtb = "CREATE TABLE IF NOT EXISTS `login_sessions` ( 
      `id` INT NOT NULL AUTO_INCREMENT , 
      `user_id` INT NOT NULL , 
      `username` VARCHAR(225) NOT NULL , 
      `date` TIMESTAMP NOT NULL , 
      PRIMARY KEY (`id`)) ENGINE = InnoDB";

   if (!mysqli_query($con, $createtb)) {
      echo "Error creating table LOGIN_SESSIONS: " . mysqli_error($con);
   }

   // CREATE TABLE E_RECEIPT
   $createtb = "CREATE TABLE IF NOT EXISTS `e_receipt` (
       `id` INT NOT NULL AUTO_INCREMENT , 
       `user_id` INT NOT NULL ,
       `serial_no` INT NOT NULL , 
       `date` DATE NOT NULL , 
       `estate` VARCHAR(50) NOT NULL , 
       `received_from` VARCHAR(225) NOT NULL , 
       `sum_of` VARCHAR(225) NOT NULL , 
       `payment_mode` VARCHAR(50) NOT NULL , 
       `payment_for` VARCHAR(225) NOT NULL , 
       `payment_figure` FLOAT NOT NULL , 
       `no_unit` VARCHAR(50) NOT NULL , 
       `amount_paid` FLOAT NOT NULL , 
       `outstanding` FLOAT NOT NULL , 
       `balance` FLOAT NOT NULL , 
       PRIMARY KEY (`id`)) ENGINE = InnoDB";

   if (!mysqli_query($con, $createtb)) {
      echo "Error creating table E_RECEIPT: " . mysqli_error($con);
   }

   // CREATE TABLE SHARING
   $createtb = "CREATE TABLE IF NOT EXISTS `sharing` (
         `id` INT NOT NULL AUTO_INCREMENT , 
         `date` TIMESTAMP NOT NULL , 
         `share_id` INT NOT NULL , 
         `amount` VARCHAR(225) NOT NULL , 
         `direct_com` VARCHAR(225) NOT NULL , 
         `level_one` VARCHAR(225) NOT NULL , 
         `level_two` VARCHAR(225) NOT NULL , 
         `business_invest` VARCHAR(225) NOT NULL , 
         `office_cost` VARCHAR(225) NOT NULL , 
         `business_savings` VARCHAR(225) NOT NULL , 
         `director_share` VARCHAR(225) NOT NULL , 
         `ceo` VARCHAR(225) NOT NULL , 
         `general_man` VARCHAR(225) NOT NULL , 
         `managing_direct` VARCHAR(225) NOT NULL , 
         PRIMARY KEY (`id`)) ENGINE = InnoDB";

   if (!mysqli_query($con, $createtb)) {
      echo "Error creating table SHARING: " . mysqli_error($con);
   }
}
// --------------------------------------------------------- //

// INSERT INTO E_RECEIPT
if (isset($_POST['submit_form'])) {

   $date = $_POST['date'];
   $estate = $_POST['estate'];
   $received_from = $_POST['received_from'];
   $sum_of = $_POST['sum_of'];
   $payment_mode = $_POST['payment_mode'];
   $payment_for = $_POST['payment_for'];
   $payment_figure = $_POST['payment_figure'];
   $no_unit = $_POST['no_unit'];
   $amount_paid = $_POST['amount_paid'];
   $total_outstanding = $_POST['total_outstanding'];
   $balance = $_POST['balance'];

   $serial_no = random_num(10);
   $user_id = random_num(10);
   $query = "INSERT INTO e_receipt (user_id, serial_no, date, estate, received_from, sum_of, payment_mode, payment_for, payment_figure, no_unit, amount_paid, outstanding, balance) VALUES ('$user_id', '$serial_no', '$date', '$estate', '$received_from', '$sum_of', '$payment_mode', '$payment_for', '$payment_figure', '$no_unit', '$amount_paid', '$total_outstanding', '$balance')";

   if (!mysqli_query($con, $query)) {
      echo "Error inserting table E_RECEIPT:) " . mysqli_error($con);
   } else {
      header("Location: ./dashbord.php");
   }

   $query = "SELECT * FROM e_receipt";
   $result = mysqli_query($con, $query);

   if ($result && mysqli_num_rows($result) > 0) {
      $rows = mysqli_fetch_assoc($result);
      $customer = $rows['received_from'];
      $user_id = $rows['user_id'];

      if ($rows['received_from'] === $customer) {
         $update = "UPDATE e_receipt SET user_id = '$user_id' WHERE received_from = '$customer'";
         mysqli_query($con, $update);
      }
   }
}

// INSERT INTO SHARING
if (isset($_POST['share-btn'])) {
   $amount = $_POST['amount'];
   $dircom = $_POST['dircom'];
   $level_one = $_POST['level-one'];
   $level_two = $_POST['level-two'];
   $business_invest = $_POST['business-invest'];
   $office_cost = $_POST['office-cost'];
   $business_savings = $_POST['business-savings'];
   $director_share = $_POST['director-share'];
   $ceo = $_POST['ceo'];
   $gm = $_POST['gm'];
   $md = $_POST['md'];

   $share_id = random_num(10);
   $query = "INSERT INTO sharing (share_id, amount, direct_com, level_one, level_two, business_invest, office_cost, business_savings, director_share, ceo, general_man, managing_direct) VALUES ('$share_id', '$amount', '$dircom', '$level_one', '$level_two', '$business_invest', '$office_cost', '$business_savings', '$director_share', '$ceo', '$gm', '$md')";

   if (mysqli_query($con, $query)) {
      header("Location: ./sharing.php");
   }
}

$query = "SELECT * FROM sharing ORDER BY id DESC";
$share = mysqli_query($con, $query);

$query = "SELECT * FROM e_receipt LIMIT 7";
$result_limit = mysqli_query($con, $query);

$query = "SELECT * FROM e_receipt ORDER BY id DESC";
$result = mysqli_query($con, $query);

if (isset($_REQUEST['id'])) {
   $id = $_REQUEST['id'];

   $query = "SELECT * FROM e_receipt WHERE id = '$id' LIMIT 1";
   $result = mysqli_query($con, $query);
}

// UPDATE RECORDS FROM e_receipt TABLE
if (isset($_POST['submit_update'])) {
   $date = $_POST['date'];
   $estate = $_POST['estate'];
   $received_from = $_POST['received_from'];
   $sum_of = $_POST['sum_of'];
   $payment_mode = $_POST['payment_mode'];
   $payment_for = $_POST['payment_for'];
   $payment_figure = $_POST['payment_figure'];
   $no_unit = $_POST['no_unit'];
   $amount_paid = $_POST['amount_paid'];
   $outstanding = $_POST['outstanding'];
   $balance = $_POST['balance'];

   $query = "UPDATE e_receipt SET estate = '$estate', received_from = '$received_from', sum_of = '$sum_of', payment_mode = '$payment_mode', payment_for = '$payment_for', payment_figure = '$payment_figure', no_unit = '$no_unit', amount_paid = '$amount_paid', outstanding = '$outstanding', balance = '$balance' WHERE receipt_id = '$id' LIMIT 1";

   if (mysqli_query($con, $query)) {
      echo "<script>alert('Record updated successfully!')</script>";
      header("Location: ./dashbord.php");
   }
}

// DELETE RECORDS
if (isset($_REQUEST['delete_btn'])) {
   $id = $_REQUEST['id'];

   $query = "DELETE FROM e_receipt WHERE receipt_id = '$id' LIMIT 1";
   if (mysqli_query($con, $query)) {
      header("Location: ./dashbord.php");
   }
}

// SEARCH FUNCTION
$searchErr = "";
if (isset($_POST['search-input'])) {
   $term = $_POST['search-input'];
   $term = preg_replace("#[^0-9a-z]#i", "", $term);

   if (!empty($term)) {
      $query = "SELECT * FROM e_receipt WHERE serial_no LIKE '%$term%' OR received_from LIKE '%$term%' OR amount_paid LIKE '%$term%'";
      $result = mysqli_query($con, $query);
   } else {
      echo "<script>alert('Type something to search!')</script>";
   }
   $searchErr = 'Your search result!';
}

// RANDOM NUMBER FUNCTION
// function random_num($length)
// {
//    $text = "";
//    if ($length < 5) {
//       $length = 5;
//    }
//    $len = rand(4, $length);

//    for ($i = 0; $i < $len; $i++) {
//       $text .= rand(0, 9);
//    }
//    return $text;
// }

$query = "SELECT * FROM login_sessions ORDER BY id DESC LIMIT 9";
$session_limit = mysqli_query($con, $query);

$query = "SELECT * FROM login_sessions ORDER BY id DESC";
$session = mysqli_query($con, $query);



$query = "SELECT SUM(amount_paid) AS total FROM e_receipt";
$total = mysqli_query($con, $query);

$query = "SELECT SUM(outstanding) AS total_out FROM e_receipt";
$outstanding = mysqli_query($con, $query);

$query = "SELECT  count(id) AS invoice FROM e_receipt";
$invoice = mysqli_query($con, $query);

// $query = "SELECT count(receipt_id) AS customer FROM e_receipt";
// $customer = mysqli_query($con, $query);

$query = "SELECT count(user_id) AS counts FROM users";
$users = mysqli_query($con, $query);
