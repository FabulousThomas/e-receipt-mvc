<?php
class Pages extends Controller
{
   public function __construct()
   {
      // Redirects to login page if user is not logged in
      // if(!isset($_SESSION['user_id'])) {
      //    redirect('users/login');
      // }
      if(!isLoggedIn()) {
         redirect('users/login');
      }
   }

   public function index()
   {
      $data = [
         'title' => 'WELCOME TO THE INDEX PAGE',
         'description' => 'Home Page',
      ];
      $this->view('pages/index', $data);
   }

   public function about()
   {
      $data = [
         'title' => 'WELCOME TO ABOUT PAGE',
      ];
      $this->view('pages/about', $data);
   }

   public function invoice()
   {
      $data = [
         'title' => 'WELCOME TO INVOICE PAGE',
         'description' => 'Invoice Page',
      ];
      $this->view('pages/invoice', $data);
   }
   public function profile()
   {
      $data = [
         'title' => 'WELCOME TO PROFILE PAGE',
         'description' => 'Profile Page',
      ];
      $this->view('pages/profile', $data);
   }

   public function sessions()
   {
      $data = [
         'title' => 'WELCOME TO SESSIONS PAGE',
         'description' => 'Sessions Page',
      ];
      $this->view('pages/sessions', $data);
   }

   public function sharing()
   {
      $data = [
         'title' => 'WELCOME TO SHARING PAGE',
         'description' => 'Sharing Page',
      ];
      $this->view('pages/sharing', $data);
   }
}
