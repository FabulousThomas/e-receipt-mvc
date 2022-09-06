<?php 
class Settings extends Controller {
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