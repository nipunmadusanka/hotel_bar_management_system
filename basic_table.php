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
                  <h4 class="card-title">Drinks Table</h4>
                  <!-- <p class="card-description">
                    Add class <code>.table</code>
                  </p> -->
                  <div class="table-responsive">
                    <table id="clientTable" class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline collapsed" role="grid" aria-describedby="selection-datatable_info" style="border-collapse: collapse; border-spacing: 0; width: 100%; margin-top: 20px;">
                      <thead>
                        <tr>
                          <th>Index</th>
                          <th>Drink Name</th>
                          <th>Unit Price</th>
                          <th>Full Amount</th>
                          <th>Quantity</th>
                          <th>Total Stock</th>
                          <th>Created</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $bar_inventory = $obj->all("bar_inventory");
                        $i = 1;
                        foreach ($bar_inventory as $inventory) {
                          // $cat_id = $inventory->categoryID;
                          // $dis_id = $inventory->distributorID;
                          // $cat = $obj->find("bar_category","id",$cat_id);
                          // $dis = $obj->find("bar_distributors","id",$dis_id);
                          $stock = $inventory->total_stock;
                          if ($stock > 0) {
                        ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td><?php echo $inventory->drinkName ?></td>
                              <td>Rs: <?php echo number_format($inventory->unit_price, 2, '.', ','); ?></td>
                              <td>Rs: <?php echo number_format($inventory->full_amount, 2, '.', ','); ?></td>
                              <td><?php echo $inventory->quantity ?></td>
                              <td><?php echo $inventory->total_stock ?></td>
                              <td><?php echo $inventory->add_date ?></td>
                            </tr>
                        <?php $i++;
                          }
                        } ?>
                        <!-- <tr>
                        <td>Vine</td>
                          <td>Cherry</td>
                          <td>12</td>
                          <td>Fine Spirits</td>
                          <td>Rockland Distilleries</td>
                          <td>1000</td>
                          <td>1200</td>
                          <td>15 May 2023</td>
                          <td><label class="badge badge-warning">In progress</label></td>
                        </tr> -->
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