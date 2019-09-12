<?php
include ('connect.php');
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
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNnzxae2AewMUN0Tt_fC3gN38goeLVdVE&libraries=drawing"></script>
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
    <script type="text/javascript" src="mapdraw.js"></script>
    <script type="text/javascript">

    var server = "https://gissurya.org/wisatasumbar/";
    </script>
    <style>

  #map{
    height: 580px;
  }
  #map-canvas {
    position:relative;
  }
  #floating-panel {
    position: absolute;
    top: 5px;
    right: 5px;
    z-index: 5;
    background-color: #fff;
    padding: 1px;
    border: 1px solid #999;
    border-radius: 3px;
  }
  #latlng{
    width: 200px;
  }
  .my-btn{
    padding:0px 6px;
    vertical-align: baseline;
  }
  </style>
  </head>
  <body >
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
    <div class="col-lg-12 ds">
                <div class="panel panel-bd " >
      <div class="panel-heading" style="height:45px;">
        <div class="panel-title">
          <h4>Update Infomation</h4>
          
        </div>
      </div>
      <div class="panel-body" style="height:580px;">
        <div class="message_inner" style="height:560px;overflow:auto;">
          <div class="message_widgets">
            <?php if (isset($_GET['id']))
              {
                $id=$_GET['id'];
                $sql = pg_query("SELECT id, name, cp FROM travel where id='$id'" );
                $data =  pg_fetch_array($sql);
              }
              ?>

            <div class="form-group row">
              <form role="form" method="post" action="saveupdatetravel.php" enctype="multipart/form-data">
                <input name="id"class="form-control hidden" type="text" value="<?php echo $id?>" id="id">
              </div>

            <div class="form-group row">
              <label for="name" class="col-sm-2 col-form-label">Nama Travel 
                <span style="color:green">*</span>
              </label>
              <div class="col-sm-5">
                <input name="name" class="form-control" type="text" value="<?php echo $data ['name']?>">
              </div>
            </div>
            </div>

            <div class="form-group row">
              <label for="cp" class="col-sm-2 col-form-label">Contact Person
                <span style="color:green">*</span>
              </label>
              <div class="col-sm-5">
                <input name="cp" class="form-control" type="text" value="<?php echo $data ['cp']?>">
              </div>
            </div>
            
           <button type="submit" class="btn btn-success">Save</button>
           <!-- <a href="travel.php" class="btn btn-default"><i class="fa fa-plus"></i> Save</a> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

    <div class="panel-body text-center" style="height:450px">
      <div class="col-md-20 padding-0">
        <div class="col-md-12 padding-0">
          <div class="panel box-v1">
            <div class="panel-heading bg-white border-none">
              <div class="col-md-6 col-sm-6 col-xs-6 text-right">
              </div>
            </div>
          </div>
        </div>
      </div> 
    </div>
    </div>
                  
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
  <div class="col-lg-5 ds">
    
  </div>
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
<script src="assets/js/sparkline-chart.js"></script>    
<script src="assets/js/zabuto_calendar.js"></script>  
<script type="application/javascript"></script>
  </body>
</html>

