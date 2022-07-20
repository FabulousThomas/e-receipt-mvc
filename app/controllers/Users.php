<?php
class Users extends Controller
{
   public function __construct()
   {
      // echo 'HELLO FROM USERS';
   }

   // Load Login view
   public function login()
   {
      // Check for Request
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         // Process form
         // Sanitize form inputs
         $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
         // Init data
         $data = [
            'username' => trim($_POST['username']),
            'password' => trim($_POST['password']),
            'username_err' => '',
            'password_err' => '',
         ];
         // Validate Username
         if(empty($data['username'])) {
            $data['username_err'] = 'Please enter username';
         }
         // Validate password
         if(empty($data['password'])) {
            $data['password_err'] = 'Please enter password';
         }

         // Make sure errors are empty
         if(empty($data['username_err']) && empty($data['password_err'])) {
            // Validate (passed)
            die('SUCCESS');
         } else {
            // Load views with errors
            $this->view('users/login', $data);
         }
      } else {
         // Init data
         $data = [
            'username' => '',
            'password' => '',
            'username_err' => '',
            'password_err' => '',
         ];
         // Load View
         $this->view('users/login', $data);
      }
   }

   // Load Register view
   public function register()
   {
      $data = [
         'title' => 'VIEWDEEP REGISTER PAGE'
      ];
      $this->view('users/register', $data);
   }
}
