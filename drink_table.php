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
                    <h4 class="card-title">Drinks Table</h4>
                    <!-- <p class="card-description">
                    Add class <code>.table</code>
                  </p> -->
                    <div class="table-responsive">
                      <table id="clientTable" class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline collapsed" role="grid" aria-describedby="selection-datatable_info" style="border-collapse: collapse; border-spacing: 0; width: 100%; margin-top: 20px;">
                        <thead>
                          <tr>
                            <th>Drink Category</th>
                            <th>Drink Name</th>
                            <th>Quantity</th>
                            <th>Distributor</th>
                            <th>Authorized By</th>
                            <th>Unit Price</th>
                            <th>Full Amount</th>
                            <th>Created</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $bar_inventory = $obj->all("bar_inventory");
                          $i = 1;
                          foreach ($bar_inventory as $inventory) {
                          ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td><?php echo $inventory->categoryID ?></td>
                              <td><?php echo $inventory->distributorID ?></td>
                              <td><?php echo $inventory->brandID ?></td>
                              <td><?php echo $inventory->drinkName ?></td>
                              <td><?php echo $inventory->bottleSizeID ?></td>
                              <td><?php echo $inventory->quantity ?></td>
                              <td><?php echo $inventory->stockDate ?></td>
                              <td><?php echo $inventory->unit_price ?></td>
                              <td><?php echo $inventory->full_amount ?></td>
                              <td><?php echo $inventory->discount_price ?></td>
                              <td><?php echo $inventory->total_stock ?></td>
                              <td><label class="badge badge-success">Completed</label></td>
                            </tr>
                          <?php $i++;
                          } ?>
                          <tr>
                            <td>Vine</td>
                            <td>Cherry</td>
                            <td>12</td>
                            <td>Fine Spirits</td>
                            <td>Rockland Distilleries</td>
                            <td>1000</td>
                            <td>1200</td>
                            <td>15 May 2023</td>
                            <td><label class="badge badge-warning">In progress</label></td>
                          </tr>
                          <tr>
                            <td>Vine</td>
                            <td>Cherry</td>
                            <td>12</td>
                            <td>Fine Spirits</td>
                            <td>Rockland Distilleries</td>
                            <td>1000</td>
                            <td>1200</td>
                            <td>15 May 2023</td>
                            <td><label class="badge badge-info">Fixed</label></td>
                          </tr>
                          <tr>
                            <td>Vine</td>
                            <td>Cherry</td>
                            <td>12</td>
                            <td>Fine Spirits</td>
                            <td>Rockland Distilleries</td>
                            <td>1000</td>
                            <td>1200</td>
                            <td>15 May 2023</td>
                            <td><label class="badge badge-success">Completed</label></td>
                          </tr>
                          <tr>
                            <td>Vine</td>
                            <td>Cherry</td>
                            <td>12</td>
                            <td>Fine Spirits</td>
                            <td>Rockland Distilleries</td>
                            <td>1000</td>
                            <td>1200</td>
                            <td>15 May 2023</td>
                            <td><label class="badge badge-warning">In progress</label></td>
                          </tr>
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