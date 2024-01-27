<?php require_once('header.php'); 
?>

      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row"> 
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  
                <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                <h4 class="card-title">Distributor Table</h4>
                  <!-- <p class="card-description">
                    Add class <code>.table</code>
                  </p> -->
                  <div class="table-responsive">
                    <table id="clientTable" class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline collapsed" role="grid" aria-describedby="selection-datatable_info" style="border-collapse: collapse; border-spacing: 0; width: 100%; margin-top: 20px;">
                      <thead>
                        <tr>
                          <th>Index</th>
                          <th>Distributor Name</th>
                          <th>Contact Number</th>
                          <th>Created</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        $dist = $obj->all("bar_distributors");
                        $i=1;
                        foreach ($dist as $distributor){
                          ?>
                          <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $distributor->name ?></td>
                          <td><?php echo $distributor->contact ?></td>
                          <td><?php echo $distributor->add_date ?></td>
                          <td><label class="badge badge-success">Completed</label></td>
                        </tr>
                        <?php $i++;} ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
                </div>

                </div>
              </div>
            </div>
          </div>
        </div>
 
<?php require_once('footer.php'); ?>