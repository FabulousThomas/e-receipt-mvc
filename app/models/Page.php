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

   // ===========ADD SHARING===================
   public function addSharing($data)
   {
      $share_id = random_num(10);
      $this->db->query('INSERT INTO sharing (share_id, info, amount, direct_com, level_one, level_two, business_invest, office_cost, business_savings, director_share, ceo, general_man, managing_direct) VALUES (:share_id, :info, :amount, :direct_com, :level_one, :level_two, :business_invest, :office_cost, :business_savings, :director_share, :ceo, :general_man, :managing_direct)');

      // Bind values
      $this->db->bind(':share_id', $share_id);
      $this->db->bind(':info', $data['info']);
      $this->db->bind(':amount', $data['amount']);
      $this->db->bind(':direct_com', $data['dircom']);
      $this->db->bind(':level_one', $data['level-one']);
      $this->db->bind(':level_two', $data['level-two']);
      $this->db->bind(':business_invest', $data['business-invest']);
      $this->db->bind(':office_cost', $data['office-cost']);
      $this->db->bind(':business_savings', $data['business-savings']);
      $this->db->bind(':director_share', $data['director-share']);
      $this->db->bind(':ceo', $data['ceo']);
      $this->db->bind(':general_man', $data['gm']);
      $this->db->bind(':managing_direct', $data['md']);

      if ($this->db->execute()) {
         return true;
      } else {
         return false;
      }
   }

   // ============GET SHARING===================
   public function getSharing()
   {
      $this->db->query('SELECT * FROM sharing ORDER BY id DESC');

      return $this->db->resultSet();
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
   public function getLoginSessions()
   {
      $this->db->query('SELECT * FROM login_sessions ORDER BY id DESC');

      return $this->db->resultSet();
   }
}
