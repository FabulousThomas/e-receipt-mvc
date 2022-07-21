<?php
class User
{
   private $db;
   function __construct()
   {
      $this->db = new Database;
   }

   function checkEmail($email)
   {
      $this->db->querry('SELECT * FROM users WHERE email = :email');
      $this->db->bind(':email', $email);
      $row = $this->db->singletSet();

      // Check row for data
      if ($this->db->rowCount() > 0) {
         return true;
      } else {
         return false;
      }
   }
}
