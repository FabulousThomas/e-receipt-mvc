<?php
class Page
{
   private $db;
   private $conn = '';

   public function __construct()
   {
      $this->db = new Database;
      $this->conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   }

   public function getReceiptLimit()
   {
      $this->db->query('SELECT * FROM e_receipt ORDER BY id DESC LIMIT 6');

      return $this->db->resultSet();
   }

   public function addReceipts($data)
   {
      $user_id = random_num(10);
      $serial_no = random_num(10);

      $this->db->query('INSERT INTO e_receipt (user_id, serial_no, date, estate, received_from, sum_of, payment_mode, payment_for, payment_figure, no_unit, amount_paid, outstanding, balance) VALUES (:user_id, :serial_no, :date, :estate, :received_from, :sum_of, :payment_mode, :payment_for, :payment_figure, :no_unit, :amount_paid, :outstanding, :balance)');

      // Bind values
      $this->db->bind(':user_id', $user_id);
      $this->db->bind(':serial_no', $serial_no);
      $this->db->bind(':date', $data['date']);
      $this->db->bind(':estate', $data['estate']);
      $this->db->bind(':received_from', $data['received_from']);
      $this->db->bind(':sum_of', $data['sum_of']);
      $this->db->bind(':payment_figure', $data['payment_figure']);
      $this->db->bind(':payment_mode', $data['payment_mode']);
      $this->db->bind(':payment_for', $data['payment_for']);
      $this->db->bind(':no_unit', $data['no_unit']);
      $this->db->bind(':amount_paid', $data['amount_paid']);
      $this->db->bind(':outstanding', $data['outstanding']);
      $this->db->bind(':balance', $data['balance']);

      // Execute Query
      if ($this->db->execute()) {
         return true;
      } else {
         return false;
      }
   }

      // Get Receipt by ID
      public function getReceiptId($id)
      {
         $this->db->query('SELECT * FROM e_receipt WHERE id = :id');
         $this->db->bind(':id', $id);
   
         $row = $this->db->singleSet();
   
         return $row;
      }

   public function updateReceipts($data)
   {

      $this->db->query('UPDATE e_receipt SET date = :date, estate = :estate, received_from = :received_from, sum_of = :sum_of, payment_mode = :payment_mode, payment_for = :payment_for, payment_figure = :payment_figure, no_unit = :no_unit, amount_paid = :amount_paid, outstanding = :outstanding, balance = :balance WHERE id = :id');

      // Bind values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':date', $data['date']);
      $this->db->bind(':estate', $data['estate']);
      $this->db->bind(':received_from', $data['received_from']);
      $this->db->bind(':sum_of', $data['sum_of']);
      $this->db->bind(':payment_figure', $data['payment_figure']);
      $this->db->bind(':payment_mode', $data['payment_mode']);
      $this->db->bind(':payment_for', $data['payment_for']);
      $this->db->bind(':no_unit', $data['no_unit']);
      $this->db->bind(':amount_paid', $data['amount_paid']);
      $this->db->bind(':outstanding', $data['outstanding']);
      $this->db->bind(':balance', $data['balance']);

      // Execute Query
      if ($this->db->execute()) {
         return true;
      } else {
         return false;
      }
   }

   public function deleteReceipts($id)
   {
      $this->db->query('DELETE FROM e_receipt WHERE id = :id');

      $this->db->bind(':id', $id);

      if ($this->db->execute()) {
         return true;
      } else {
         return false;
      }
   }
}
