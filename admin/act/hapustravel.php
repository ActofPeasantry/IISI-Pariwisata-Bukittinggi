<?php
  include ('../inc/connect.php');
    
      $id=$_GET['id'];
      //echo "id = $id";

$sql3 = "DELETE from travel_gallery where id_travel='$id'";
$delete3 = pg_query($sql3);

$id_package = "SELECT id from package where id_travel='$id'";
$result = pg_query($id_package);
while ($rows = pg_fetch_array($result)) 
{
  $idpkg = $rows['id'];
  $sql4 = "DELETE from booking where id_package='$idpkg'";
  $delete4 = pg_query($sql4);
}


  $sql5 = "DELETE from review where id_travel='$id'";
  $delete5 = pg_query($sql5);


$sql2 = "DELETE from package where id_travel='$id'";
$delete2 = pg_query($sql2);


$sql1 = "DELETE from administrator where travel_id='$id'";
$delete1 = pg_query($sql1);


$sql="DELETE from travel where id= '$id' ";

      if(pg_query($sql))
      {
        echo"<script>
        alert ('Data Deleted!');
        eval(\"parent.location='../?page=travel'\");
        </script>";  
        // header("location:../?page=travel");  
      }
      else
      {
        echo"<script>alert ('Failed to Delete Data!');</script>";
      }
   
  // echo "<script>document.location='../?pages=travel.php'</script>";
?>