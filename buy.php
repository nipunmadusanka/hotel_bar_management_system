<?php require_once('header.php');
if (isset($_POST['buy_product'])) {
    $hotelId = 1;
    $drink_category = $_POST['drink_category'];
    $drink_brand = $_POST['drink_brand'];
    $drink_name = $_POST['drink_name'];
    $drink_cap = $_POST['drink_cap'];
    $room_no = $_POST['room_no'];
    $customer_name = "nipun";
    $unit_price = $_POST['unit_price'];
    $requiredQty = $_POST['requiredQty'];
    $quantity = $_POST['quantity'];
    $total_amount = $_POST['total_amount'];
    $price = floatval(str_replace(['Rs:', ','], '', $total_amount));
    echo $price;
    $bill_pay = $_POST['paying_Type'];
    $addby = $_SESSION['user_id'];
    $date = @date('Y-m-d');
    if (!empty($drink_category)) {
        $query = array(
            'hotelID' => $hotelId,
            'categoryID' => $drink_category,
            'brandID' => $drink_brand,
            'drinkID' => $drink_name,
            'bottleSizeID' => $drink_cap,
            'roomID' => $room_no,
            'customerID' => 3,
            'unit_price' => $unit_price,
            'quantity' => $requiredQty,
            'total' => $price,
            'payingTypeID' => $bill_pay,
            'addBy' => $addby,
            'add_date' => $date
        );
        $newQTY = $quantity - $requiredQty;
        $res = $obj->create('bar_selldrinks', $query);
        if ($res) {
            $update_query = array(
                'quantity' => $newQTY
            );
            $product_update_res = $obj->update('bar_inventory', 'id', $drink_name, $update_query);
        } else {
            echo "Failed to add";
        }
    } else {
        echo "Brand Name field required";
    }
}
?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">

            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Buy drinks</h4>

                        <form class="form-sample" method="post" enctype="multipart/form-data">
                            <!-- Drink Category -->
                            <div class="row">
                                <div class="col-md-6" bis_skin_checked="1">
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
                                </div>

                                <!-- Drink Name -->
                                <div class="col-md-6" bis_skin_checked="1">
                                    <div class="form-group row" bis_skin_checked="1">
                                        <label class="col-sm-4 col-form-label text-sm-right ttl-hover" data-gloss="enter the category of the drink">Drink Brand
                                        </label>

                                        <div class="col-sm-8" bis_skin_checked="1">
                                            <select id="drinkBrand" name="drink_brand" class="form-control mt-1 shadow bg-white rounded">
                                                <!-- Add options for drink categories here -->
                                                <option selected>Open this select menu</option>
                                                <?php
                                                $bar_brand = $obj->all("bar_brands");
                                                $i = 1;
                                                foreach ($bar_brand as $brand) {
                                                ?>
                                                    <option value=<?php echo $brand->id ?>><?php echo $brand->name ?></option>
                                                <?php $i++;
                                                } ?>
                                                <!-- Add more options as needed -->
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Capacity -->
                            <div class="row">
                                <div class="col-md-6" bis_skin_checked="1">
                                    <div class="form-group row" bis_skin_checked="1">
                                        <label class="col-sm-4 col-form-label text-sm-right ttl-hover" data-gloss="enter the category of the drink">Drink
                                        </label>

                                        <div class="col-sm-8" bis_skin_checked="1">
                                            <select id="drinkName" name="drink_name" class="form-control mt-1 shadow bg-white rounded">
                                                <!-- Add options for drink categories here -->
                                                <option selected>Open this select menu</option>
                                                <?php
                                                $bar_inventory = $obj->all("bar_inventory");
                                                foreach ($bar_inventory as $drinks) {
                                                ?>
                                                    <option value=<?php echo $drinks->id ?>><?php echo $drinks->drinkName ?></option>
                                                <?php $i++;
                                                } ?>
                                                <!-- Add more options as needed -->
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Quantity -->
                                <div class="col-md-6" bis_skin_checked="1">
                                    <div class="form-group row" bis_skin_checked="1">
                                        <label class="col-sm-4 col-form-label text-sm-right ttl-hover" data-gloss="enter the category of the drink">Drink Capacity
                                        </label>

                                        <div class="col-sm-8" bis_skin_checked="1">
                                            <select id="drinkCap" name="drink_cap" class="form-control mt-1 shadow bg-white rounded">
                                                <!-- Add options for drink categories here -->
                                                <option selected>Open this select menu</option>
                                                <?php
                                                $bar_bottlesize = $obj->all("bar_bottlesize");
                                                $i = 1;
                                                foreach ($bar_bottlesize as $sizes) {
                                                ?>
                                                    <option value=<?php echo $sizes->id ?>><?php echo $sizes->name ?></option>
                                                <?php $i++;
                                                } ?>
                                                <!-- Add more options as needed -->
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Brand -->
                            <div class="row">
                                <div class="col-md-6" bis_skin_checked="1">
                                    <div class="form-group row" bis_skin_checked="1">
                                        <label class="col-sm-4 col-form-label text-sm-right ttl-hover" data-gloss="enter the room no">Select Room No</label>
                                        <div class="col-sm-8" bis_skin_checked="1">
                                            <select id="roomNo" name="room_no" class="form-control mt-1 shadow bg-white rounded">
                                                <!-- Add options for room numbers here -->
                                                <option selected>Open this select menu</option>
                                                <option value="1">Room 101</option>
                                                <option value="2">Room 102</option>
                                                <!-- Add more options as needed -->
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Stock Bring Date -->
                                <div class="col-md-6" bis_skin_checked="1">
                                    <div class="form-group row" bis_skin_checked="1">
                                        <label class="col-sm-4 col-form-label text-sm-right ttl-hover" data-gloss="customer name">Customer Name</label>
                                        <div class="col-sm-8" bis_skin_checked="1">
                                            <input type="text" name="customer_name" id="customerName" value="2" class="form-control mt-1 shadow bg-white rounded">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Distributor -->
                            <div class="row">
                                <div class="col-md-6" bis_skin_checked="1">
                                    <div class="form-group row" bis_skin_checked="1">
                                        <label class="col-sm-4 col-form-label text-sm-right ttl-hover" data-gloss="unit price">Unit Price</label>
                                        <div class="col-sm-8" bis_skin_checked="1">

                                            <input type="text" name="unit_price" id="unitPrice" class="form-control mt-1 shadow bg-white rounded">

                                        </div>
                                    </div>
                                </div>

                                <!-- Authorized By -->
                                <div class="col-md-6" bis_skin_checked="1">
                                    <div class="form-group row" bis_skin_checked="1">
                                        <label class="col-sm-4 col-form-label text-sm-right ttl-hover" data-gloss="available quantity">Available Quantity</label>
                                        <div class="col-sm-8" bis_skin_checked="1">
                                            <input type="text" name="quantity" id="quantity" class="form-control mt-1 shadow bg-white rounded">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Unit Price -->
                            <div class="row">
                                <div class="col-md-6" bis_skin_checked="1">
                                    <div class="form-group row" bis_skin_checked="1">
                                        <label class="col-sm-4 col-form-label text-sm-right ttl-hover" data-gloss="required Qty">Required Quantity
                                        </label>
                                        <div class="col-sm-8" bis_skin_checked="1">
                                            <input type="text" name="requiredQty" id="required_Qty" class="form-control mt-1 shadow bg-white rounded" placeholder="Required Quantity">
                                        </div>
                                    </div>
                                </div>

                                <!-- Full Amount -->
                                <div class="col-md-6" bis_skin_checked="1">
                                    <div class="form-group row" bis_skin_checked="1">
                                        <label class="col-sm-4 col-form-label text-sm-right ttl-hover" data-gloss="discount">Discount
                                        </label>
                                        <div class="col-sm-8" bis_skin_checked="1">
                                            <input type="text" name="discountBarSell" id="discountBarSell" class="form-control mt-1 shadow bg-white rounded" placeholder="Discount" disabled>
                                            <input type="text" name="discountBar" id="discountBar" class="form-control mt-1 shadow bg-white rounded" hidden>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Discounted Price -->
                            <div class="row">
                                <div class="col-md-6" bis_skin_checked="1">
                                    <div class="form-group row" bis_skin_checked="1">
                                        <label class="col-sm-4 col-form-label text-sm-right ttl-hover" data-gloss="total amount">Paying Type</label>
                                        <div class="col-sm-8" bis_skin_checked="1">
                                            <select class="form-control mt-1 shadow bg-white rounded" id="payingType" name="paying_Type">
                                            <option selected>Open this select menu</option>
                                                <option value="1">Room Bill</option>
                                                <option value="2">Card</option>
                                                <option value="3">Cash</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6" bis_skin_checked="1">
                                    <div class="form-group row" bis_skin_checked="1">
                                        <label class="col-sm-4 col-form-label text-sm-right ttl-hover" data-gloss="total amount">Total Amount
                                        </label>
                                        <div class="col-sm-8" bis_skin_checked="1">
                                            <input type="text" name="total_amount" id="totalAmount" class="form-control mt-1 shadow bg-white rounded" placeholder="Total Amount">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" name="buy_product" class="btn btn-primary mr-2">Submit</button>
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