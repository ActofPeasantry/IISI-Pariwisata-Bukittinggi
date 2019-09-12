<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Bukittinggi Tourism</title>
    
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    
    
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <script src="assets/js/chart-master/Chart.js"></script>
    <script type="text/javascript">

    var server = "hhttps://gissurya.org/wisatasumbar/";

    function updatetravel()
    {

    }
    </script>
  </head>
  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
<header class="header black-bg">
  <div class="sidebar-toggle-box">
    <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
  </div>
  <a href="index.html" class="logo"><b>BUKITTINGGI TOURISM</b></a>
  <div class="nav notify-row" id="top_menu">
    <ul class="nav top-menu"></ul>   
  </div>

  <div class="btn-group pull-right">                 
                <button class="btn btn-inverse btn-default btn-sm"><a type="button" href="logout.php">Logout</a></button>               
            </div> 

  <div class="top-menu">
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
      <p class="centered"><a href="profile.html"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
        <h5 class="centered">HI, ADMIN!</h5>
        <li class="sub-menu">
          <li><a href="travel.php">MANAGE TRAVEL AGENT</a></li>
        </li>
          
        <li class="sub-menu">
          <a href="javascript:;">
            <span>MANAGE DATA</span></a>
          <ul class="sub">
            <li class="sub-menu">
              <li><a href="tempatwisata.php">TOURISM</a></li>
            </li>
          </ul>
          <ul class="sub">
            <li class="sub-menu">
              <li><a href="rumahmakan.php">RESTAURANT</a></li>
                </li>
          </ul>
          <ul class="sub">
            <li class="sub-menu">
              <li><a href="masjid.php">MOSQUE</a></li>
                </li>
              </ul>
              <ul class="sub">
                <li class="sub-menu">
                    <li><a href="industri.php">SOUVENIR</a></li>
                  </a>
                </li>
              </ul>
          </li>

          <li class="sub-menu">
            <li><a href="event.php">MANAGE EVENT</a></li>
          </li>
    </ul>
              <!-- sidebar menu end-->
  </div>
</aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
     
<section id="main-content">
  <section class="wrapper">
      <h1>Manage Your Data</h1>
      <div class="row">
        <div class="col-xs-12">
        <div class="box">
        <div class="box-header clearfix">
        
        <div class="btn-group pull-left col-md-5">
        <a href="tambahtravel.php" class="btn btn-success"><i class="fa fa-plus"></i> ADD DATA</a>
        </div>

        <div class="box col-md-12">
        <div class="box-body">
          <table id="" class="table table-hover table-bordered table-striped">
            <thead>
              <tr>
                <th> ID </th>
                <th> NAME </th>
                <th> CONTACT PERSON </th>
                <th> ACTION </th>
                </tr>
              </thead>

              <tbody>
                <?php
                  include 'connect.php';
                  $id = $_GET['id'];
                  $querysearch = "SELECT travel.id, travel.name, travel.cp FROM travel order by id ASC";

                  $hasil = pg_query($querysearch);
                  while($baris = pg_fetch_array($hasil))
                  {
                    $id = $baris['id'];
                    $name = $baris['name'];
                    $cp = $baris['cp'];
                    $dataarray[]=array('id'=>$id,'name'=>$name,'cp'=>$cp);
                ?>

              <tr>
                <td><?php echo "$id" ?></td>
                <td><?php echo "$name" ?></td>
                <td><?php echo "$cp" ?></td>
                <td><?php echo "$aksi" ?>
                <a href="formupdatetravel.php?id=<?php echo $id?>" class="btn btn-success"> UPDATE </a>
                <a href="hapustravel.php?id=<?php echo $id; ?>" onclick="return confirm ('delete?')"  class="btn btn-success"> DELETE </a>
              </tr>

            <?php
            }
            ?>

            </tbody>
          </table>
        </div>
      </div>
        <!-- <form method='GET' action=''> -->
</section>
</section>
                  
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                 
                       <!-- USERS ONLINE SECTION -->
            
      <!--main content end-->
      <!--footer start-->
      
    <!-- js placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/jquery-1.8.3.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>
<script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="assets/js/jquery.sparkline.js"></script>

    <!--common script for all pages-->
<script src="assets/js/common-scripts.js"></script> 
<script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
<script type="text/javascript" src="assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    </script>
  </body>
</html>
