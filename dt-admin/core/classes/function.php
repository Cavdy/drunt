<?php
  class Drunt {
    protected $value;

    function __construct($value) {
      $this->mysqli = $value;
    }

    public function checkInput($var) {
      $var = htmlspecialchars($var);
      $var = trim($var);
      $var = stripcslashes($var);
      return $var;
    }

    public function redirect($location) {
      header("location:".$location);
      exit;
    }
  }
?>
