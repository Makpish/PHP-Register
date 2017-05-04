<?php
  if($_POST['id']) {
    error_reporting(0);
    $connect = mysqli_connect("localhost", "root","", "legalraasta");
    if($connect){
      $QUERY="DELETE FROM `users` WHERE id=".$_POST["id"].";";
      //$result=$connect->query($QUERY);
      $resul = mysqli_query($connect, $QUERY);
      mysqli_close($connect);
    }
  }
?>
