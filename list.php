<?php
  error_reporting(0);
  $connect = mysqli_connect("localhost", "root","", "legalraasta");
  if($connect){
    $QUERY="select * from users";
    //$result=$connect->query($QUERY);
    $resul = mysqli_query($connect, $QUERY);
    if ($resul && $resul->num_rows > 0) {
      // output data of each row
      //$resul->setFetchMode(PDO::FETCH_ASSOC);
      $i=1;
      while($row = mysqli_fetch_array($resul)) {
          echo "<tr id='list".$row["id"]."'><td>".$i."</td>";
          echo "<td>".$row["name"]."</td>";
          echo "<td>".$row["email"]."</td>";
          echo "<td>".$row["dob"]."</td>";
          echo "<td><button onclick='editFunc(".$row["id"].")'>Edit</button>/<button onclick='deleteFunc(".$row["id"].")'>Delete</button></td></tr>";
          $i=$i+1;
    }
  }
    mysqli_close($connect);
  }
  else {
    echo "unable to connect";
  }
?>
