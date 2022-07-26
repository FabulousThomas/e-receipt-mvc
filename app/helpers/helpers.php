<?php

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
