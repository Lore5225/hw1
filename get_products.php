<?php   
     require_once 'dbconfig.php';
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));
      $products = array();
      $res = mysqli_query($conn, "SELECT * FROM prodotti ORDER BY id");
      while($row = mysqli_fetch_assoc($res))
      {
            $products[] = $row;
      }
      mysqli_free_result($res);
      mysqli_close($conn);
      echo json_encode($products);

?>