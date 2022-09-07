<?php

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (!$conn) {
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

// ==========UPDATE RECEIPTS===========
if (isset($_POST['btnUpdateReceipt'])) {
   // Bind values
   $id = $_POST['userId'];
   $date = $_POST['date'];
   $estate = $_POST['estate'];
   $received_from = $_POST['received_from'];
   $sum_of = $_POST['sum_of'];
   $payment_figure = $_POST['payment_figure'];
   $payment_mode = $_POST['payment_mode'];
   $payment_for = $_POST['payment_for'];
   $no_unit = $_POST['no_unit'];
   $amount_paid = $_POST['amount_paid'];
   $outstanding = $_POST['outstanding'];
   $balance = $_POST['balance'];

   $sql = "UPDATE e_receipt SET date = '$date', estate = '$estate', received_from = '$received_from', sum_of = '$sum_of', payment_mode = '$payment_mode', payment_for = '$payment_for', payment_figure = '$payment_figure', no_unit = '$no_unit', amount_paid = '$amount_paid', outstanding = '$outstanding', balance = '$balance' WHERE user_id = '$id'";

   if ($conn->query($sql)) {
      flashMsg('msg', 'Receipt updated');
      redirect('pages/index');
   } else {
      die('Unable to update' . mysqli_error($conn));
   }
}

// $sql = "SELECT role FROM login_sessions WHERE role = 'admin'";
// $role = $conn->query($sql);



