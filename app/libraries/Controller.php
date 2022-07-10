<?php
class Controller
{
   // Load Models
   public function model($model)
   {
      require_once '../app/models/' . $model . '.php';
      // Instantiate Model
      return new $model;
   }

   // Load views file
   public function view($view, $data = [])
   {
      // Checks if view file exists
      if (file_exists('../app/views/' . $view . '.php')) {
         require_once '../app/views/' . $view . '.php';
      } else {
         die('View does not exists');
      }
   }
}
