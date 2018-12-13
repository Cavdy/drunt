<?php
  include('classes/db.php');
  include('classes/function.php');
  include('classes/session.php');

  global $value;

  $drunt = new Drunt($value);

  define("BASE_URL", "http://localhost/drunt/");
?>
