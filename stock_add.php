<?php require_once('header.php');

if (isset($_POST['add_product'])) {
  $hotelId = 1;
  $drink_category = $_POST['drink_category'];
  $dist = $_POST['dist'];
  $brand_id = $_POST['brand_id'];
  $name = $_POST['name'];
  $bottlesize = 1;
  $quantity = $_POST['quantity'];
  $stock_date = $_POST['stock_date'];
  $full_amount = $_POST['full_amount'];
  $total_amount = $_POST['stockunitPrice'];
  $unit_price = floatval(str_replace(['Rs:', ','], '', $total_amount));
  $dis_amount = $_POST['discountedPriceStock'];
  $discount = (int)$dis_amount;
  $dis_price = floatval(str_replace(['Rs:', ','], '', $discount));
  $total_stock = 10;
  $authorized = $_POST['authorized'];
  $addby = $_SESSION['user_id'];
  $date = @date('Y-m-d');

  if (!empty($drink_category)) {
    $query = array(
      'hotelID' => $hotelId,
      'categoryID' => $drink_category,
      'distributorID' => $dist,
      'brandID' => $brand_id,
      'drinkName' => $name,
      'bottleSizeID' => $bottlesize,
      'quantity' => $quantity,
      'stockDate' => $stock_date,
      'unit_price' => $unit_price,
      'full_amount' => $full_amount,
      'discount_price' => $dis_price,
      'total_stock' => $total_stock,
      'authorizedBy' => $authorized,
      'addBy' => $addby,
      'add_date' => $date
    );
    $res = $obj->create('bar_inventory', $query);
    if ($res) {
      echo "yes";
    } else {
      echo "Failed to add catagory";
    }
  } else {
    echo "Brand Name field required";
  }
}
?>
<script>
 $(document).ready(function() {
      // Attach change event listener to the Drink dropdown
      // $('#stockunitPrice').change(function() {
      //   var price =  $('#stockunitPrice').val();
      //   var pp = parseInt(price)
      //   var final = "Rs: " + pp.toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      //    $('#stockunitPrice').val(final);
      // });
 });

</script>

<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">

      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Add Stock</h4>
            <!-- <p class="card-description">
              Horizontal form layout
            </p> -->
            <form class="forms-sample" method="post" enctype="multipart/form-data">
              <div class="form-group row" bis_skin_checked="1">
                <label class="col-sm-4 col-form-label text-sm-right ttl-hover" data-gloss="enter the category of the drink">Drink Category
                </label>

                <div class="col-sm-8" bis_skin_checked="1">
                  <select id="drinkCategory" name="drink_category" class="form-control mt-1 shadow bg-white rounded">
                    <!-- Add options for drink categories here -->
                    <option selected>Open this select menu</option>
                    <?php
                    $bar_category = $obj->all("bar_category");
                    $i = 1;
                    foreach ($bar_category as $category) {
                    ?>
                      <option value=<?php echo $category->id ?>><?php echo $category->name ?></option>
                    <?php $i++;
                    } ?>
                    <!-- Add more options as needed -->
                  </select>
                </div>
              </div>
              <div class="form-group row" bis_skin_checked="1">
                <label class="col-sm-4 col-form-label text-sm-right ttl-hover" data-gloss="enter the capacity of the drink">Drink Capacity
                </label>
                <div class="col-sm-8" bis_skin_checked="1">
                  <select id="Capacity" name="capacity" class="form-control mt-1 shadow bg-white rounded">
                    <!-- Add options for drink categories here -->
                    <option selected>Open this select menu</option>
                    <?php
                    $bar_capacity = $obj->all("bar_bottlesize");
                    $i = 1;
                    foreach ($bar_capacity as $capacity) {
                    ?>
                      <option value=<?php echo $capacity->id ?>><?php echo $capacity->name ?></option>
                    <?php $i++;
                    } ?>
                    <!-- Add more options as needed -->
                  </select>
                </div>
              </div>
              <div class="form-group row" bis_skin_checked="1">
                <label class="col-sm-4 col-form-label text-sm-right ttl-hover" data-gloss="enter the brand of the drink">Brand</label>
                <div class="col-sm-8" bis_skin_checked="1">
                  <select id="brand" name="brand_id" class="form-control mt-1 shadow bg-white rounded">
                    <!-- Add options for brands here -->
                    <option selected>Open this select menu</option>
                    <?php
                    $bar_brands = $obj->all("bar_brands");
                    $i = 1;
                    foreach ($bar_brands as $brands) {
                    ?>
                      <option value=<?php echo $brands->id ?>><?php echo $brands->name ?></option>
                    <?php $i++;
                    } ?>
                    <!-- Add more options as needed -->
                  </select>
                </div>
              </div>
              <div class="form-group row" bis_skin_checked="1">
                <label class="col-sm-4 col-form-label text-sm-right ttl-hover" data-gloss="drink supplier">Distributor</label>
                <div class="col-sm-8" bis_skin_checked="1">
                  <select id="distributor" name="dist" class="form-control mt-1 shadow bg-white rounded">
                    <!-- Add options for distributors here -->
                    <option selected>Open this select menu</option>
                    <?php
                    $bar_distributors = $obj->all("bar_distributors");
                    $i = 1;
                    foreach ($bar_distributors as $distributors) {
                    ?>
                      <option value=<?php echo $distributors->id ?>><?php echo $distributors->name ?></option>
                    <?php $i++;
                    } ?>
                    <!-- Add more options as needed -->
                  </select>
                </div>
              </div>
              <div class="form-group row" bis_skin_checked="1">
                <label class="col-sm-4 col-form-label text-sm-right ttl-hover" data-gloss="enter the drink name">Drink Name</label>
                <div class="col-sm-8" bis_skin_checked="1">
                  <input type="text" name="name" id="drinkName" class="form-control mt-1 shadow bg-white rounded" placeholder="Drink Name" required>
                </div>
              </div>
              <div class="form-group row" bis_skin_checked="1">
                <label class="col-sm-4 col-form-label text-sm-right ttl-hover" data-gloss="enter the category of the drink">Quantity</label>
                <div class="col-sm-8" bis_skin_checked="1">
                  <input type="text" name="quantity" id="quantity" class="form-control mt-1 shadow bg-white rounded" placeholder="Quantity" required>
                </div>
              </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="form-group row" bis_skin_checked="1">
              <label class="col-sm-4 col-form-label text-sm-right ttl-hover" data-gloss="full amount=unit price X quantity">Full Amount
              </label>
              <div class="col-sm-8" bis_skin_checked="1">
                <input type="text" name="full_amount" id="fullAmount" class="form-control mt-1 shadow bg-white rounded" placeholder="Full Amount" required>
              </div>
            </div>
            <div class="form-group row" bis_skin_checked="1">
              <label class="col-sm-4 col-form-label text-sm-right ttl-hover" data-gloss="date of stock arrival">Stock Bring Date</label>
              <div class="col-sm-8" bis_skin_checked="1">
                <input type="date" name="stock_date" id="stockBringDate" class="form-control mt-1 shadow bg-white rounded" required>
              </div>
            </div>
            <div class="form-group row" bis_skin_checked="1">
              <label class="col-sm-4 col-form-label text-sm-right ttl-hover" data-gloss="approver of a transaction">Authorized By</label>
              <div class="col-sm-8" bis_skin_checked="1">
                <select id="distributor" name="authorized" class="form-control mt-1 shadow bg-white rounded">
                  <!-- Add options for distributors here -->
                  <option selected>Open this select menu</option>
                  <option value="Authorized1">Authorized 1</option>
                  <option value="Authorized2">Authorized 2</option>
                  <!-- Add more options as needed -->
                </select>
              </div>
            </div>
            <div class="form-group row" bis_skin_checked="1">
              <label class="col-sm-4 col-form-label text-sm-right ttl-hover" data-gloss="cost of one individual unit of a drink">Unit Price
              </label>
              <div class="col-sm-8" bis_skin_checked="1">
                <input type="text" name="stockunitPrice" id="stockunitPrice" class="form-control mt-1 shadow bg-white rounded" placeholder="Unit Price" oninput="formatAmount(this)" required>
              </div>
            </div>
            <div class="form-group row" bis_skin_checked="1">
              <label class="col-sm-4 col-form-label text-sm-right ttl-hover" data-gloss="reduced cost of the drink">Discounted Percentage</label>
              <div class="col-sm-8" bis_skin_checked="1">
                <!-- <input type="text" name="discountedPriceStock" id="discountedPriceStock" class="form-control mt-1 shadow bg-white rounded" placeholder="Discounted Price" oninput="formatAmount(this)" required> -->
                <select id="discountedPriceStock" name="discountedPriceStock" class="form-control mt-1 shadow bg-white rounded">
                  <!-- Add options for distributors here -->
                  <option selected>Open this select menu</option>
                  <option value="5">5%</option>
                  <option value="10">10%</option>
                  <option value="15">15%</option>
                  <option value="20">20%</option>
                  <option value="25">25%</option>
                  <option value="30">30%</option>
                  <option value="35">35%</option>
                  <option value="40">40%</option>
                  <option value="45">45%</option>
                  <option value="50">50%</option>
                  <!-- Add more options as needed -->
                </select>
              </div>
            </div>
            <button type="submit" name="add_product" class="btn btn-primary mr-2">Submit</button>
            <button class="btn btn-light">Cancel</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>

<?php require_once('footer.php'); ?>