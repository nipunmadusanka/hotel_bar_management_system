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
                  <h4 class="card-title">Brand Table</h4>
                  <!-- <p class="card-description">
                    Add class <code>.table</code>
                  </p> -->
                  <div class="table-responsive">
                    <table id="clientTable" class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline collapsed" role="grid" aria-describedby="selection-datatable_info" style="border-collapse: collapse; border-spacing: 0; width: 100%; margin-top: 20px;">
                      <thead>
                        <tr>
                          <th>Index</th>
                          <th>Brand Name</th>
                          <th>Created</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $bar_brand = $obj->all("bar_brands");
                        $i = 1;
                        foreach ($bar_brand as $brand) {
                        ?>
                          <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $brand->name ?></td>
                            <td><?php echo $brand->add_date ?></td>
                            <td><label class="badge badge-success">Completed</label></td>
                          </tr>
                        <?php $i++;
                        } ?>
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