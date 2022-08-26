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

   
}
