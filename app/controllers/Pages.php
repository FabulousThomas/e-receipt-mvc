<?php
class Pages extends Controller
{
   public function __construct()
   {
      // echo 'Page Loaded';
   }

   public function index()
   {
      $data = [
         'title' => 'WELCOME',
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
}
