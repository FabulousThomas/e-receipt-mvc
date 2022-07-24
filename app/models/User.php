<?php
class User
{
   private $db;
   function __construct()
   {
      $this->db = new Database;
   }

   // Register user
   public function register($data)
   {
      $user_id = random_num(10);
      $this->db->query('INSERT INTO users (user_id, username, email, password) VALUES (:user_id, :username, :email, :password)');
      // Bind values
      $this->db->bind(':user_id', $user_id);
      $this->db->bind(':username', $data['username']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':password', $data['password']);

      // Execute query
      if ($this->db->execute()) {
         return true;
      } else {
         return false;
      }
   }

   // Login user
   public function login($username, $password)
   {
      $this->db->query('SELECT * FROM users WHERE username = :username');
      $this->db->bind(':username', $username);

      $row = $this->db->singleSet();

      $hashed_password = $row->password;
      if (password_verify($password, $hashed_password)) {
         return $row;
      } else {
         return false;
      }
   }

   // Check email
   public function checkEmail($email)
   {
      $this->db->query('SELECT * FROM users WHERE email = :email');
      $this->db->bind(':email', $email);
      $row = $this->db->singleSet();

      // Check row for data
      if ($this->db->rowCount() > 0) {
         return true;
      } else {
         return false;
      }
   }

   // Check username
   public function checkUsername($username)
   {
      $this->db->query('SELECT * FROM users WHERE username = :username');
      $this->db->bind(':username', $username);
      $row = $this->db->singleSet();

      // Check row for data
      if ($this->db->rowCount() > 0) {
         return true;
      } else {
         return false;
      }
   }
}
