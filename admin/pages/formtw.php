<div class="col-sm-6"> <!-- menampilkan peta-->
  <section class="panel">
      <header class="panel-heading">
          <h3>                    
          <input id="latlng" type="text" class="form-control" style="width:200px" value="" placeholder="Latitude, Longitude">
          <button class="btn btn-default my-btn" id="btnlatlng" type="button" title="Geocode"><i class="fa fa-search"></i></button>
          <button class="btn btn-default my-btn" id="delete-button" type="button" title="Remove shape"><i class="fa fa-trash"></i></button> </h3>
      </header>
      <div class="panel-body">
          <div id="map" style="width:100%;height:420px; z-index:50"></div>
      </div>
  </section>
</div>
                  
 <div class="col-sm-6"> <!-- menampilkan form add mosque-->
    <section class="panel">
      <div class="panel-body">
          <a class="btn btn-compose">Add Tourism's Information</a>
          <div class="box-body">

            <div class="form-group row">
              <form  name = "form_input" action="act/simpantwbaru.php" enctype="multipart/form-data" method="POST">
                <?php
                include '../connect.php';
                    $query = pg_query("SELECT MAX(id) AS id FROM tourism");
                    $result = pg_fetch_array($query);
                    $idmax = $result['id'];
                    if ($idmax==null) {$idmax=1;}
                    else {$idmax++;}
                ?>
            </div>

            <input type="text" class="form-control hidden" id="id" name="id" value="<?php echo $idmax;?>">
            <div class="form-group">
              <label for="geom">Coordinat</label>
              <textarea class="form-control" id="geom" name="geom" readonly required><?php echo $data['geom'] ?></textarea>
            </div> 
             <div class="form-group">
              <label for="nama">Name</label>
              <input type="text" class="form-control" name="name" value="<?php echo $data['name'] ?>">
            </div>
            <div class="form-group">
              <label for="alamat">Address</label>
              <input type="text" class="form-control" name="address" value="<?php echo $data['address'] ?>">
            </div>

           <!--   <div class="form-group">
              <label for="id_kota">City</label>
                <select required name="city" id="id_city" class="form-control" onchange="">
                  <?php
                    $sql = pg_query("select * from city");
                    while($row1 = pg_fetch_array($sql)){
                      echo "<option value=\"$row1[id]\">$row1[name]</option>";}
                  ?>
                </select>
              </div> -->

               <div class="form-group">
              <label for="open">Open Hour</label>
              <input type="time" class="form-control" name="open" value="<?php echo $data['open'] ?>">
            </div>
            <div class="form-group">
              <label for="close">Close Hour</label>
              <input type="time" class="form-control" name="close" value="<?php echo $data['close'] ?>">
            </div>
            <div class="form-group">
              <label for="ticket">Ticket</label>
              <input type="text" class="form-control" name="ticket" value="<?php echo $data['ticket'] ?>">
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <input type="text" class="form-control" name="description" value="<?php echo $data['description'] ?>">
            </div>


              <!-- <div class="form-group">
                  <label for="file">Upload Foto</label>
                  <input type="file" class="" style="background:none;border:none; width:1000px; " name="image" required>
              </div> -->
              <button type="submit" class="btn btn-primary pull-center">Save <i class="fa fa-floppy-o"></i></button> 
              <!-- <input name="simpan" class="btn btn-default" type="submit" value="save"><a href = "pages/tempatwisata.php"></a>
              </input> -->
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>