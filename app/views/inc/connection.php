<?php 

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if(!$conn) {
   die('CONNECTED');
}

$query = "SELECT SUM(amount_paid) AS total FROM e_receipt";
$total = mysqli_query($conn, $query);

$query = "SELECT SUM(outstanding) AS total_out FROM e_receipt";
$outstanding = mysqli_query($conn, $query);

$query = "SELECT  count(id) AS invoice FROM e_receipt";
$invoice = mysqli_query($conn, $query);

$query = "SELECT count(user_id) AS counts FROM users";
$users = mysqli_query($conn, $query);