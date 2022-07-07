<?php
class Pages extends Controller
{
   public function __construct()
   {
      // echo 'Page Loaded';
   }

   public function index()
   {
      $this->view('pages/index');
   }

   public function about()
   {
      echo 'About Page Loaded';
   }
}
