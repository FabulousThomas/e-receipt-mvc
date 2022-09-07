<?php 
class Settings extends Controller {

   public function __construct()
   {
      if(!isLoggedIn()) {
         redirect('users/login');
      }
   }
   public function setting() {
      $data = [
         'title' => 'Settings',
         'content' => 'Settings page',
      ];

      $this->view('settings/setting', $data);
   }

   public function profile() {
      $data = [
         'title' => 'Profile',
         'content' => 'Profile page',
      ];

      $this->view('settings/profile', $data);
   }
}