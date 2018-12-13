<?php

  $connect = mysqli_connect('localhost', 'root', '', 'drunt');

  $output = $connect ? "Yeah!!" : "Nooo!!!";

  
?>
