<?php
class Page
{
   private $db;

   // ============CONSTRUCTOR=============
   public function __construct()
   {
      $this->db = new Database;
   }

   // ============GET RECEIPTS WITH LIMIT==========
   public function getReceiptLimit()
   {
      $this->db->query('SELECT * FROM e_receipt ORDER BY id DESC LIMIT 6');

      return $this->db->resultSet();
   }

   // ============GET ALL RECEIPTS==========
   public function getAllReceipt()
   {
      $this->db->query('SELECT * FROM e_receipt ORDER BY id DESC');

      return $this->db->resultSet();
   }

   // =============ADD RECEIPTS==============
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

   // ==============GET RECEIPT BY ID==============
   public function getReceiptId($id)
   {
      $this->db->query('SELECT * FROM e_receipt WHERE id = :id');
      $this->db->bind(':id', $id);

      $row = $this->db->singleSet();

      return $row;
   }

   // =============DELETE RECEIPTS================
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

     // =============DELETE LOGIN SESSIONS================
     public function deleteSession($id)
     {
        $this->db->query('DELETE FROM login_sessions WHERE id = :id');
  
        $this->db->bind(':id', $id);
  
        if ($this->db->execute()) {
           return true;
        } else {
           return false;
        }
     }

   // ===========GET LOGIN SESSIONS=======
   public function getLoginSessions() {
      $this->db->query('SELECT * FROM login_sessions ORDER BY id DESC');

      return $this->db->resultSet();
   }
}
