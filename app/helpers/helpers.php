<?php
// Message function
session_start();
function flashMsg($name = '', $message = '', $class = 'alert alert-success')
{
   if (!empty($name)) {
      if (!empty($message) && empty($_SESSION[$name])) {
         if (!empty($_SESSION[$name])) {
            unset($_SESSION[$name]);
         }

         if (!empty($_SESSION[$name . '_class'])) {
            unset($_SESSION[$name . '_class']);
         }

         $_SESSION[$name] = $message;
         $_SESSION[$name . '_class'] = $class;
      } elseif (empty($message) && !empty($_SESSION[$name])) {
         $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
         echo '<div class="text-center ' . $class . '" id="msg-flash">' . $_SESSION[$name] . '</div>';
         unset($_SESSION[$name]);
         unset($_SESSION[$name . '_class']);
      }
   }
}

// RANDOM NUMBER FUNCTION
function random_num($length)
{
   $text = "";
   if ($length < 5) {
      $length = 5;
   }
   $len = rand(4, $length);

   for ($i = 0; $i < $len; $i++) {
      $text .= rand(0, 9);
   }
   return $text;
}

// Url redirect
function redirect($pages)
{
   header('Location: ' . URLROOT . '/' . $pages);
}
