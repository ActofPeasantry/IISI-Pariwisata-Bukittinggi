<?php
  include 'connect.php';
    if(isset($_GET['id']))
    {
      $id=$_GET["id"];
      $sql="DELETE from souvenir where id= '$id' ";
      if(pg_query($sql))
      {
        echo"<script>alert ('Data Deleted!');</script>";  
      }
      else
      {
        echo"<script>alert ('Failed to Delete Data!');</script>";
      }
    }
  echo "<script>document.location='industri.php'</script>";
?>