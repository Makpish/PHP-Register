<?php
  if($_POST['id']){
    $id=$_POST['id'];
    error_reporting(0);
    $connect = mysqli_connect("localhost", "root","", "legalraasta");
    if($connect){
      $QUERY="SELECT * FROM users where id=".$_POST["id"]." LIMIT 1;";
      //$result=$connect->query($QUERY);
      $resul = mysqli_query($connect, $QUERY);
      $resul = mysqli_fetch_array($resul);
      echo json_encode($resul);
      mysqli_close($connect);
    }
    else {
      echo "unable to connect";
    }
  }
?>
