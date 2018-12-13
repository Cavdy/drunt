<?php
  session_start();

  function ErrorMessage() {
    if(isset($_SESSION['ErrorMessage'])) {
      $output = "<div class=\"sufee-alert alert with-close alert-danger alert-dismissible fade show\">";
      $output.= htmlentities($_SESSION['ErrorMessage']);
      $output.= "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">";
      $output.= "<span aria-hidden=\"true\">&times;</span>";
      $output.= "</button> </div>";
      $_SESSION['ErrorMessage'] = null;
      return $output;
    }
  }

  function SuccessMessage() {
    if(isset($_SESSION['SuccessMessage'])) {
      $output = "<div class=\"sufee-alert alert with-close alert-success alert-dismissible fade show\">";
      $output.= htmlentities($_SESSION['SuccessMessage']);
      $output.= "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">";
      $output.= "<span aria-hidden=\"true\">&times;</span>";
      $output.= "</button> </div>";
      $_SESSION['SuccessMessage'] = null;
      return $output;
    }
  }
?>
