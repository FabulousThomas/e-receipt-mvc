<?php
class Users extends Controller
{

   public function __construct()
   {
      // echo 'HELLO FROM USERS';
      $this->userModel = $this->model('User');
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
            'login_err' => '',
         ];

         // Validate Username
         if (empty($data['username'])) {
            $data['username_err'] = 'Please enter username';
         }

         // Validate password
         if (empty($data['password'])) {
            $data['password_err'] = 'Please enter password';
         }

         // Check for user/email
         if ($this->userModel->checkUsername($data['username'])) {
            // User is found
         } else {
            // No user is found
            $data['username_err'] = 'No user found';
         }

         // Make sure errors are empty
         if (empty($data['username_err']) && empty($data['password_err'])) {
            // Validate (passed)
            // die('SUCCESS');
            $loginUser = $this->userModel->login($data['username'], $data['password']);

            if ($loginUser) {
               // Create login session
               $this->createLogInSession($loginUser);
            } else {
               $data['password_err'] = 'Incorrect password';
               $this->view('users/login', $data);
            }
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
            'login_err' => '',
         ];
         // Load View
         $this->view('users/login', $data);
      }
   }

   // Load Register view
   public function register()
   {
      // Check for Request
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         // Process form
         // Sanitize form inputs
         $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
         // Init data
         $data = [
            'email' => trim($_POST['email']),
            'username' => trim($_POST['username']),
            'password' => trim($_POST['password']),
            'email_err' => '',
            'username_err' => '',
            'password_err' => '',
         ];

         // Validate Username
         if (empty($data['username'])) {
            $data['username_err'] = 'Please enter username';
         } else {
            if ($this->userModel->checkUsername($data['username'])) {
               $data['username_err'] = 'username is already taken';
            }
         }

         // Validate Email
         if (empty($data['email'])) {
            $data['email_err'] = 'Please enter email';
         } else {
            if ($this->userModel->checkEmail($data['email'])) {
               $data['email_err'] = 'email already exists';
            }
         }

         // Validate password
         if (empty($data['password'])) {
            $data['password_err'] = 'Please enter password';
         }

         // Make sure errors are empty
         if (empty($data['username_err']) && empty($data['email_err']) && empty($data['password_err'])) {
            // Validate (passed)
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            if ($this->userModel->register($data)) {
               // redirect user
               flashMsg('register_success', '<strong>Congratulations, ' . $data['username'] . '!' . ' </strong> Proceed to login');
               redirect('users/login');
            } else {
               die('Something went wrong');
            }
         } else {
            // Load views with errors
            $this->view('users/register', $data);
         }
      } else {
         // Init data
         $data = [
            'email' => '',
            'username' => '',
            'password' => '',
            'email_err' => '',
            'username_err' => '',
            'password_err' => '',
         ];
         // Load View
         $this->view('users/register', $data);
      }
   }

   // Create login session
   public function createLogInSession($user)
   {
      $_SESSION['user_id'] = $user->id;
      $_SESSION['user_email'] = $user->email;
      $_SESSION['user_username'] = $user->username;
      redirect('pages/index');
   }

   // Create logout session
   public function logout()
   {
      unset($_SESSION['user_id']);
      unset($_SESSION['user_email']);
      unset($_SESSION['user_username']);
      redirect('users/login');
      die;
   }
}
