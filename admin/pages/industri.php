<div class="col-sm-12">  <!-- menampilkan list mosque-->
    <section class="panel">
                    <div class="panel-body">
                        <a href="?page=formindustri" title="Add Industri" class="btn btn-compose"><i class="fa fa-plus"></i>Add Souvenir</a>
                        <div class="box-body">
             
                      <div class="form-group">
                       <table id="example2" class="table table-hover table-bordered table-striped">
            <thead>
              <tr>
                <th> ID </th>
                <th> NAME </th>
                <th> LOCATION </th>
                <th> ACTION </th>
                </tr>
              </thead>

              <tbody>
                <?php
                  include '../connect.php';
                  $id = $_GET['id'];
                  $querysearch = "SELECT souvenir.id, souvenir.name, souvenir.address FROM souvenir order by id ASC";

                  $hasil = pg_query($querysearch);
                  while($baris = pg_fetch_array($hasil))
                  {
                    $id = $baris['id'];
                    $name = $baris['name'];
                    $address = $baris['address'];
                    $dataarray[]=array('id'=>$id,'name'=>$name,'address'=>$address);
                ?>

              <tr>
                <td><?php echo "$id" ?></td>
                <td><?php echo "$name" ?></td>
                <td><?php echo "$address" ?></td>
                <td><?php echo "$aksi" ?>
                <a href="?page=detailindustri&id=<?php echo $id?>" class="btn btn-sm btn-default" title='Detail'><i class="fa fa-list"></i> Detail</a>
                  <a href="act/hapusindustri.php?id=<?php echo $id?>" class="btn btn-sm btn-default" title='Delete'><i class="fa fa-trash-o"></i></a>
               </tr>

            <?php
            }
            ?>

            </tbody>
          </table>
    