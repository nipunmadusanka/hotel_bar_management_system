<?php require_once('header.php');


$table = 'bar_selldrinks';  // Replace with your actual table name
$todayDateTime = date("Y-m-d H:i:s");  // Replace with the date you want to retrieve
$columnToTotal = 'total'; // Replace with the column you want to calculate the total for
$columnQTY = 'quantity';
$today = date("Y-m-d");
$thisMonth = date("y-m"); // Replace with the date you want
$totalColumn = 'total'; // Replace with the column you want to calculate the total for

$total = $obj->calculateTotal($table, $columnToTotal);
$totalStock = $obj->calculateTotal('bar_inventory', 'total_stock');
$totalsellQTY = $obj->calculateTotal($table, $columnQTY);
$todaySales = $obj->getTotalByDate($table, $totalColumn, 'add_date', $today);

$monthSales = $obj->getTotalByMonth();
$start_data = date('Y-m-01-');
$end_date =   date('Y-m-t');
$currentMonth = date('F');

?>

<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <!-- <div class="row">
      <div class="col-lg-12 grid-margin">
        <div class="card">
          <div class="card-body"> -->
    <div class="container-fluid">
      <h4 class="card-title">Welcome to Dashboard</h4>
      <div class="row mb-3 mt-2">
        <div class="col-xl-3 col-xxl-6 col-sm-6">
          <div class="info-box-content">
            <div class="cols" style="width: 18rem;">
              <div class="m-2 p-4 rounded" style="background: linear-gradient(to bottom right, #78C1F3, #FFC7EA);">
                <div class="text-info mb-1">
                  Total Earning
                </div>
                <h2 class="mb-2 mt-2 font-weight-bold">Rs: <?php echo number_format($total, 2, '.', ',');
                                                            $total; ?></h2>
                <div class="font-weight-bold">
                  <?php echo "Total for $todayDateTime"; ?>
                </div>
              </div>
            </div>
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-xl-3 col-xxl-6 col-sm-6">
          <div class="info-box-content">
            <div class="cols" style="width: 18rem;">
              <div class="m-2 p-4 rounded" style="background: linear-gradient(to bottom right, #EEF296, #9ADE7B);">
                <div class="text-info mb-1">
                  Today Total Earning
                </div>
                <h2 class="mb-2 mt-2 font-weight-bold">Rs: <?php echo number_format($todaySales, 2, '.', ',');
                                                            $todaySales; ?></h2>
                <div class="font-weight-bold">
                  <?php echo $today; ?>
                </div>
              </div>
            </div>
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-xl-3 col-xxl-6 col-sm-6">
          <div class="info-box-content">
            <div class="cols" style="width: 18rem;">
              <div class="m-2 p-4 rounded" style="background: linear-gradient(to bottom right, #F4F27E, #E48F45);">
                <div class="text-info mb-1">
                  Total Earning This Month
                </div>
                <h2 class="mb-2 mt-2 font-weight-bold">Rs:
                  <?php
                  $stmt = $pdo->prepare("SELECT SUM(`total`) FROM `bar_selldrinks` WHERE `add_date` BETWEEN '$start_data' AND  '$end_date' ");
                  $stmt->execute();
                  $res = $stmt->fetch(PDO::FETCH_NUM);
                  echo number_format($res[0], 2, '.', ',');
                  $res[0];
                  ?>
                </h2>
                <div class="font-weight-bold">
                  <?php
                  echo "The current month is: $currentMonth";
                  ?>
                </div>
              </div>
            </div>
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-xl-3 col-xxl-6 col-sm-6">
          <div class="info-box-content">
            <div class="cols" style="width: 18rem;">
              <div class="m-2 p-4 rounded" style="background: linear-gradient(to bottom right, #F4F27E, #E48F45);">
                <div class="text-info mb-1">
                  Total Earning Last Three Month
                </div>
                <h2 class="mb-2 mt-2 font-weight-bold">Rs:
                  <?php
                  $endDate = date('Y-m-d');  // Current date
                  $startDate = date('Y-m-d', strtotime('-3 months'));
                  $stmt = $pdo->prepare("SELECT SUM(`total`) FROM `bar_selldrinks` WHERE `add_date` BETWEEN :start_date AND :end_date");
                  $stmt->bindParam(':start_date', $startDate);
                  $stmt->bindParam(':end_date', $endDate);
                  $stmt->execute();
                  $res = $stmt->fetch(PDO::FETCH_NUM);
                  $totalEarning = number_format($res[0], 2, '.', ',');
                  
                  echo $totalEarning;                  
                  ?>
                </h2>
                <div class="font-weight-bold">
                  <?php
                  echo "The current month is: $currentMonth";
                  ?>
                </div>
              </div>
            </div>
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-xl-3 col-xxl-6 col-sm-6">
          <div class="info-box-content">
            <div class="cols" style="width: 18rem;">
              <div class="m-2 p-4 rounded" style="background: linear-gradient(to bottom right, #DCBFFF, #FFEBD8);">
                <div class="text-info mb-1">
                  Total Selling Quantity
                </div>
                <h2 class="mb-2 mt-2 font-weight-bold"><?php echo $totalsellQTY; ?></h2>
                <div class="font-weight-bold">
                  <?php echo "Total for $todayDateTime"; ?>
                </div>
              </div>
            </div>
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-xl-3 col-xxl-6 col-sm-6">
          <div class="info-box-content">
            <div class="cols" style="width: 18rem;">
              <div class="m-2 p-4 rounded" style="background: linear-gradient(to bottom right, #FF78F0, #FEFAE0);">
                <div class="text-info mb-1">
                  Today Stock
                </div>
                <h2 class="mb-2 mt-2 font-weight-bold"><?php echo $totalStock; ?></h2>
                <div class="font-weight-bold">
                  <?php echo "Total for $today"; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-xxl-6 col-sm-6">
          <div class="info-box-content">
            <div class="cols" style="width: 18rem;">
              <div class="m-2 p-4 rounded" style="background: linear-gradient(to bottom right, #A0C334, #FEFAE0);">
                <div class="text-info mb-1">
                  Total Products
                </div>
                <h2 class="mb-2 mt-2 font-weight-bold">
                  <?php
                  $stmt = $pdo->prepare("SELECT COUNT(*) as row_count FROM `bar_inventory` ");
                  $stmt->execute();
                  $res = $stmt->fetch(PDO::FETCH_ASSOC);
                  echo $res['row_count'];
                  ?>
                </h2>
                <div class="font-weight-bold">
                  Total Products
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-xxl-6 col-sm-6">
          <div class="info-box-content">
            <div class="cols" style="width: 18rem;">
              <div class="m-2 p-4 rounded" style="background: linear-gradient(to bottom right, #A8A4CE, #FEFAE0);">
                <div class="text-info mb-1">
                  Total Suppliers
                </div>
                <h2 class="mb-2 mt-2 font-weight-bold">
                  <?php
                  $stmt = $pdo->prepare("SELECT COUNT(*) as row_count FROM `bar_distributors` ");
                  $stmt->execute();
                  $res = $stmt->fetch(PDO::FETCH_ASSOC);
                  echo $res['row_count'];
                  ?>
                </h2>
                <div class="font-weight-bold">
                  Total Suppliers
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-xxl-6 col-sm-6">
          <div class="info-box-content">
            <div class="cols" style="width: 18rem;">
              <div class="m-2 p-4 rounded" style="background: linear-gradient(to bottom right, #FA7070, #FEFAE0);">
                <div class="text-info mb-1">
                  Total Brands
                </div>
                <h2 class="mb-2 mt-2 font-weight-bold">
                  <?php
                  $stmt = $pdo->prepare("SELECT COUNT(*) as row_count FROM `bar_brands` ");
                  $stmt->execute();
                  $res = $stmt->fetch(PDO::FETCH_ASSOC);
                  echo $res['row_count'];
                  ?>
                </h2>
                <div class="font-weight-bold">
                  Total Brands
                </div>
              </div>
            </div>
          </div>
        </div>


        <!-- <div class="col-xl-3 col-xxl-6 col-sm-6">
            <div class="info-box bg-secondary ">

              <div class="info-box-content">
                <span class="info-box-text">Total purchase</span>
                <span class="info-box-number">
                  565656
                </span>
              </div>
              <span class="info-box-icon elevation-1"><i class="material-symbols-outlined">payments</i></span>
            </div>
          </div> -->

        <div class="clearfix hidden-md-up"></div>
      </div>

      <div class="row mb-4">
        <div class="col-md-6 col-lg-6">
          <div class="card">
            <div class="card-header">
              <b>Low Stock Alert (Bar)</b>
            </div>
            <div class="card-body">
              <div class="responsive">
                <table class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline collapsed" role="grid" aria-describedby="selection-datatable_info" style="border-collapse: collapse; border-spacing: 0; width: 100%; margin-top: 20px;">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Unit Price</th>
                      <th>Quantity</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $stmt = $pdo->prepare("SELECT * FROM `bar_inventory` WHERE `quantity` <= 20 ; ");
                    $stmt->execute();
                    $res = $stmt->fetchAll(PDO::FETCH_OBJ);
                    $no = 1;
                    foreach ($res as $product) {
                    ?>
                      <tr>
                        <td><?php echo $no ?></td>
                        <td><?= $product->drinkName; ?></td>
                        <td><?= $product->unit_price; ?></td>
                        <td><?= $product->quantity; ?></td>
                      </tr>
                    <?php
                      $no++;
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="col-md-6 col-lg-6">
          <div class="card">
            <div class="card-header">
              <b>Stock Alert</b>
            </div>
            <div class="card-body">
              <div class="responsive">
                <table class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline collapsed" role="grid" aria-describedby="selection-datatable_info" style="border-collapse: collapse; border-spacing: 0; width: 100%; margin-top: 20px;">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>ID</th>
                      <th>name</th>
                      <th>Quantity</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>gg</td>
                      <td>gg</td>
                      <td>gg</td>
                    </tr>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div> -->
      </div>

    </div>
    <!-- </div> -->

    <!-- </div>
        </div>
      </div>
    </div> -->
  </div>

  <?php require_once('footer.php'); ?>