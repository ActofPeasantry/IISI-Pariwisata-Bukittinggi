<?php 
session_start();

 ?>
<!DOCTYPE html>
<html lang="en">
  
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <title>Bukittinggi Tourism</title>

    <link href="assets/css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link href="assets/js/fancybox/jquery.fancybox.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <!--<script type="text/javascript" src="html5gallery/html5gallery.js"></script>-->
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

  <script src="../config_public.js"></script>
    <script src="_map.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNnzxae2AewMUN0Tt_fC3gN38goeLVdVE&sensor=true"></script>

      <!--LOADER-->
    <style>
    #loader {
      border: 16px solid #f3f3f3;
      border-radius: 50%;
      border-top: 16px solid #3498db;
      width: 40px;
      margin: 5px;
      height: 40px;
      -webkit-animation: spin 2s linear infinite;
      animation: spin 2s linear infinite;
    }

    @-webkit-keyframes spin {
      0% { -webkit-transform: rotate(0deg); }
      100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
    </style>
  
  </head>

  <body onload="init();">



    <!--header start-->
<header class="header black-bg">
  <div class="sidebar-toggle-box">
    <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
  </div>
  <a href="indexes.php" class="logo"><b>BUKITTINGGI TOURISM</b></a>
  <div class="nav notify-row" id="top_menu">
    <ul class="nav top-menu"></ul>   
  </div>

  <div class="btn-group pull-right">                 
    <!-- <button class="btn btn-inverse btn-default btn-sm"><a type="button" href="logout.php">Login</a></button>     -->
  <!--   <a href="login.php" class="logo1" title="Login" style="margin-top: 10px"><img src="assets/img/login.png"></a>  -->
    <!-- <td>
      <a href="register.php" class="logo1" title="Registration" style="margin-top: 10px"><img src="assets/img/register.png"></a>
    </td> -->
  </div> 
  <div class="top-menu">
  
  </ul>
  </div>
</header>
      <!--header end-->
      <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
<aside>
  <div id="sidebar"  class="nav-collapse ">
  <!-- sidebar menu start-->
    <ul class="sidebar-menu" id="nav-accordion">
      <p class="centered"><a href="indexes.php"><img src="assets/img/jalan.png" class="img-circle" width="60"></a></p>
        <h5 class="centered">VISITOR</h5>

        <li class="sub-menu">
                      <a class="active" href="indexes.php">
                          <i class="fa fa-hand-o-left"></i>
                          <span>Back</span>
                      </a>
                  </li>


				</ul>
          </div>
      </aside>

       <section id="main-content">
        <section class="wrapper site-min-height">
          <div class="row">
          <div class="col-lg-12 main-chart"> 
           <div class="col-sm-12">
              <div class="col-sm-6"> <!-- information -->
                  <section class="panel">

                    <header class="panel-heading">
                      <h2 class="box-title" style="text-transform:capitalize;"><b> Detail Informasi</b></h2>
                    </header>

                    <div class="panel-body">
               
                     <?php
include 'connect.php';
$id = $_GET["id_travel"];
$query = "SELECT 
travel.id, 
travel.name as name, 
travel.cp as cp, 
travel.address, 
travel.website, 
travel.open, 
travel.close, 
travel.description, 
travel.email, 
travel.fullname,
city.name as city_name,
ST_X(ST_Centroid(travel.geom)) AS longitude, 
ST_Y(ST_CENTROID(travel.geom)) As latitude
FROM travel, city
where st_contains(city.geom, travel.geom) and travel.id='$id'";
//echo "id = $id";

$hasil=pg_query($query);
while($row = pg_fetch_array($hasil)){
  $id_travel=$row['id'];
  $fullname=$row['fullname'];
  $cp=$row['cp'];
  $city_name=$row['city_name'];
  $address=$row['address'];
  $website=$row['website'];
  $open=$row['open'];
  $close=$row['close'];
  $description=$row['description'];
  $email=$row['email'];

}
//echo "$id_travel,$name,$cp,$address";
  ?>


          <table id="detgal" class="table">
          <tbody  style='vertical-align:top;'>
            <tr><td width="150px"><b>Travel Agent Name</b></td><td> :&nbsp; </td><td style='text-transform:capitalize;'><?php echo $fullname ?></td></tr>                
            <tr><td width="150px"><b>Contact Person</b></td><td> :&nbsp; </td><td style='text-transform:capitalize;'><?php echo $cp ?></td></tr>  
            <tr><td width="150px"><b>Address</b></td><td> :&nbsp; </td><td style='text-transform:capitalize;'><?php echo $address ?></td></tr>  
               <tr><td><b>City<b> </td><td>: </td><td><?php echo $city_name?></td></tr>
            <tr><td width="150px"><b>Open Hour</b></td><td> :&nbsp; </td><td style='text-transform:capitalize;'><?php echo $open ?></td></tr>  
            <tr><td width="150px"><b>Close Hour</b></td><td> :&nbsp; </td><td style='text-transform:capitalize;'><?php echo $close ?></td></tr>
            <tr><td width="150px"><b>Website</b></td><td> :&nbsp; </td><td style='text-transform:capitalize;'> 
            <?php echo $website ?></td></tr>   
            
            <tr><td width="150px"><b>Email</b></td><td> :&nbsp; </td><td style='text-transform:capitalize;'><?php echo $email ?></td></tr>    
            <tr><td width="150px"><b>Description</b></td><td> :&nbsp; </td><td style='text-transform:capitalize;'><?php echo $description ?></td></tr>  
                     

                        </tbody>          
                      </table>

                      
                    </div>
                  </section>

  <section class="panel">

                    <header class="panel-heading">
                      <h2 class="box-title" style="text-transform:capitalize;"><b> Info</b></h2>
                    </header>

                    <?php 
                       require 'connect.php';
                        $id = $_GET["id_travel"];
                 //       echo "ini : packet $id";

                       
                          $sqlreview = "SELECT * from info where id_travel = '$id'";
                                                 
                        $result = pg_query($sqlreview);
                      ?>
                      <table class="table">
                        <thead><th>Date</th><th class="centered">Info</th></thead>
                      <?php  
                        while ($rows = pg_fetch_array($result)) 
                          {
                            $tgl = $rows['tanggal'];
                            $info = $rows['info'];
                            $id_info =$rows['id_info'];
                            echo "<tr><td>$tgl</td><td>$info</td></tr>";
                          }
                      

                         ?>  

                     
                    </table>

                      <div class="panel-body">
                        <table id="" class="table">
                          <tbody  style='vertical-align:top;'>

                            
                          </tbody>          
                        </table></div>
            
                    
                  </section>                 

                
                 <section class="panel" id="review">
                      <header class="panel-heading">
                        <h2 class="box-title" style="text-transform:capitalize;"><b> Customer's Reviews</b></h2>
                      </header>

                      <div class="panel-body">
                      <form method="POST" action="insertcomment2.php">
                        <input type="hidden" name="id" value="<?php echo $_GET['id_travel']?>" >
                        <table id="" class="table">
                          <tbody  style='vertical-align:top;'>



<?php
  //$u = $_SESSION['username'];
                    //echo "username $u";
                    if($_SESSION['c'] == true)
                    {
                        $username = $_SESSION['username'];
                        //echo "nama $username";
                          echo "
                            <tr>
                              <td>Comment</td>
                              <td>:</td>
                              <td><textarea cols='30' rows='5' name='comment'></textarea></td>
                            </tr>
                            <tr>
                              <td><input type='submit' name='' value='send'></td><td><input name='nama' value='$username' hidden></td>
                            </tr>";
                      }
                      else{
                        echo "
                            <tr>
                              <td>Comment</td>
                              <td>:</td>
                              <td><textarea cols='30' rows='5' name='comment'></textarea></td>
                            </tr>
                            <tr>
                              <td><input type='submit' name='' value='send'></td><td><input name='nama' value='' hidden></td>
                            </tr>";
                      }
  ?>


</tbody>          
                        </table>
                        </form>

                        <?php 
 $id = $_GET["id_travel"];

                          $sqlreview = "SELECT * from review where id_travel = '$id'";

                          
                        $result = pg_query($sqlreview);
                      ?>
                      <table class="table">
                      <?php  
                        while ($rows = pg_fetch_array($result)) 
                          {
                            $nama = $rows['name'];
                            $komen = $rows['comment'];
                            echo "<tr><td>Name</td><td>:</td><td>$nama</td></tr><tr><td>Comment</td><td>:</td><td>$komen</td></tr>";
                          }
                      //   echo "$nama";
                      // echo "$komen";


                         ?>

                     

                           </table>
                    <tr colspan></tr>

                    </section>
              </div>

    
<div class="col-sm-6">
  <div class="row">
    <div class="col-sm-12" >
    <section class="panel">
      <div class="panel-body">
      <a class="btn btn-compose">Gallery</a>
      <div class="content" style="text-align:center;">
      <div class="content" style="text-align:center;">
      <div class="html5gallery" style="max-height:700px; overflow:auto;" data-skin="horizontal" data-width="350" data-height="200" data-resizemode="fit">    
<?php
include 'connect.php';

$id = $_GET["id_travel"];
// echo "$id";


    $querysearch = "SELECT gallery_travel FROM travel_gallery where id_travel='$id'";
    // echo "$querysearch1";
    $hasil=pg_query($querysearch);
    while($baris = pg_fetch_assoc($hasil))
      {
        if(($baris1['gallery_travel']=='-')||($baris['gallery_travel']==''))
        {
            echo "<a href='foto/foto.jpg'><img src='foto/foto.jpg' ></a>";
        }
        else
        {
                echo "<a href='foto/".$baris['gallery_travel']."'><img src='foto/".$baris['gallery_travel']."'></a>";
        }
      }
  
?>
</div>
</div>
</div>
</div>
</section>
</div>
</div>
</div>

<section class="panel">
<div class="col-sm-6"> <!-- peta -->
  <div class="white-panel pns">
    <header class="panel-heading" style="float:left">
      <label style="color: black; margin-right:20px">Google Map with Location List</label>


      <button type="button" onclick="posisisekarang()" class="btn btn-default " data-toggle="tooltip" id="posisinow" title="Posisi Saya" style="margin-right: 7px;" ><i class="fa fa-location-arrow" > </i>
      </button>

      <button type="button" onclick="lokasimanual()" class="btn btn-default"  data-toggle="tooltip" id="posmanual" title="Posisi Manual" style="margin-right: 7px;"><i class="fa fa-map-marker" ></i>
      </button>
                                            
                       <label id="tombol">
                       <a type="button" onclick="legenda()" id="showlegenda" class="btn btn-default" data-toggle="tooltip" title="Legenda" style="margin-right: 7px;"><i class="fa fa-eye"></i>
                       </a>
                       </label>
    </header>
        <div class="row">
           <div class="col-sm-6 col-xs-6"></div>
        </div>                        
        <div id="map" class="centered" style="height:260px"></div>
  </div>                  





      <footer class="site-footer">
          <div class="text-center">
              1411522009 - Ugi Meiliya Eka Putri
              <a href="index.php" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>

      </div>
  </section>


    <!-- js placed at the end of the document so the pages load faster -->

    <script src="assets/js/jquery.js"></script>
    
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
  <script src="assets/js/fancybox/jquery.fancybox.js"></script>    
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>
    <script src="script.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>
     
	  <script type="text/javascript">
      $(function() {
        //    fancybox
          jQuery(".fancybox").fancybox();
      });

  </script>
   <script src="assets/bootstrap/js/bootstrap.min.js"></script>
   <script type="text/javascript">
   tampilkantravel('<?php echo $_GET["id_travel"]; ?>')
   </script>
  </body>
</html>
