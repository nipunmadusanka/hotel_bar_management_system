<?php
require_once('header.php');
include('conn.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $matirial_name = $_POST['matirial_name'];
    $Categoty = $_POST['Category'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];
    $total_price = $_POST['total_price'];
    $type = $_POST['type'];
    $stock = $_POST['stock'];
    $date = $_POST['date'];
    
    

    // Remove number formatting and "Rs:" prefix
    $price = floatval(str_replace(['Rs:', ','], '', $price));
    $discount = floatval(str_replace(['Rs:', ','], '', $discount));
    $total_price = floatval(str_replace(['Rs:', ','], '', $total_price));

    // Insert into sell_matirial table
    $query = "INSERT INTO sell_matirial (matirial_name, Category, price, discount, total_price, type, stock) 
              VALUES ('$matirial_name','$Categoty','$price','$discount','$total_price','$type','$stock')";
    $result = mysqli_query($connect, $query);

    if ($result) {
if ($type === '1') {
    // Retrieve stock value from material table
    $getStockQuery = "SELECT stock, price, Date, type FROM matirial WHERE matirial_name = '$matirial_name'";
    $resultStock = mysqli_query($connect, $getStockQuery);
    $row = mysqli_fetch_assoc($resultStock);
    $materialStock = $row['stock'];
    $newprice = $row['price'];

    // Calculate new stock value
    $newMaterialStock = $materialStock - $stock;
    $eachprice = $newprice - $total_price;

    // Get the current date in the desired format
    $currentDate = date('Y-m-d'); // Adjust the format as needed

    // Update material table
    $updateMaterialQuery = "UPDATE matirial SET stock = $newMaterialStock, each_price = $price, price = $eachprice, Date = '$date', type = '$type' WHERE matirial_name = '$matirial_name'";
    mysqli_query($connect, $updateMaterialQuery);

    // Insert data into matirial_sold table
    $insertMatirialSoldQuery = "INSERT INTO matirial_sold (matirial_name, stock, Categoty, each_price, price, Date, type, discount) 
                               VALUES ('$matirial_name', '$stock', '$Categoty', '$price', '$total_price', '$date', '$type', '$discount')";
    mysqli_query($connect, $insertMatirialSoldQuery);

    // Insert data into other_expences table
            $other = "INSERT INTO other_expences (expense1, payments, date) 
            VALUES ('$matirial_name', '$total_price', '$date')";
    $resultt = mysqli_query($connect, $other);
}
 elseif ($type === '2') {
    // Retrieve stock value from material table
    $getStockQuery = "SELECT stock, price, Date FROM matirial WHERE matirial_name = '$matirial_name'";
    $resultStock = mysqli_query($connect, $getStockQuery);
    $row = mysqli_fetch_assoc($resultStock);
    $materialStock = $row['stock'];
    $newprice = $row['price'];

    // Calculate new stock value
    $newMaterialStock = $materialStock - $stock;
    $eachprice = $newprice - $total_price;
    $currentDate = date('Y-m-d');

    // Update material table
    $updateMaterialQuery = "UPDATE matirial SET stock = $newMaterialStock, each_price = $price, price = $eachprice, Date = '$date', type = '$type' WHERE matirial_name = '$matirial_name'";
    mysqli_query($connect, $updateMaterialQuery);

    // Insert data into matirial_purchase table


}


        // Display a success message
        echo "Data inserted successfully!";
    } else {
        echo "Error inserting data. Please try again.";
    }
}
?>

<html>
<head>
    <style>
        /* Custom styles for the beautiful label */
        .label {
            font-size: 18px;
            font-weight: 500;
            color: #333;
            margin-bottom: 5px;
        }
    </style>
</head>
<body style="background-color: #f0f2f8 !important;">
<div class="pc-container" style="z-index: 5;">
    <div class="pcoded-content" style="z-index: 5;">
        <!-- [ breadcrumb ] start -->
        <div class="row">
            <div class="col-12 card px-3">
                <div class="page-header-title pb-4" style="z-index: 5;">
                    <h2 class="m-b-10" style="z-index: 5; font-weight: 700; color: blue; margin-left: 20px;">Sell Matirial</h2>
                </div>
                <!-- [ breadcrumb ] end -->
                <!-- [ Main Content ] start -->
                <div class="row px-4">
                    <div class="col-12 card" style="background-color: #fff;">
                        <div class="row px-4">
                            <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                    <label><h5 class="label">Matirial Name</h5></label>
                    <label style="margin-left: 37%;"><h5 class="label">Number Of Quentities</h5></label>
                    <div style="display: flex;">
                        <select id="matirial_name" name="matirial_name" class="form-control">
                        <?php
        include('conn.php');
        
        $query = "SELECT matirial_name FROM matirial"; // Replace "matirial" with your actual table name
        $result = mysqli_query($connect, $query);
        
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $material_name = $row['matirial_name'];
                echo '<option value="' . $material_name . '">' . $material_name . '</option>';
            }
        } else {
            echo '<option value="">Error fetching data</option>';
        }
        ?>
                        </select>
                        <input type="text" style="margin-left: 10px;" id="stock" name="stock" class="form-control" placeholder="Quantities" />
                    </div>
                </div>



                                <div class="form-group">
                                    <label><h5 class="label">Material Category</h5></label>
                                    <label style="margin-left: 33%;"><h5 class="label">Price</h5></label>
                                    <div style="display: flex;">
                                        <select name="Category" required="required" class="form-control">
                                            <option value="0">SELECT</option>
                                            <option value="1">Aluminium frame</option>
                                            <option value="2">Tempered Glass</option>
                                            <option value="3">Silicon cells</option>
                                            <option value="4">Back sheet</option>
                                        </select>
                                        <input type="text" style="margin-left: 10px;" id="price" name="price" class="form-control" placeholder="Enter Price" oninput="calculateTotalPrice()" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label><h5 class="label">Discount</h5></label>
                                    <label style="margin-left: 41.5%;"><h5 class="label">Total Price</h5></label>
                                    <div style="display: flex;">
                                        <input type="text" id="discount" name="discount" class="form-control" placeholder="Enter Discount" oninput="calculateTotalPrice()" />
                                        <input type="text" style="margin-left: 10px;" id="total_price" name="total_price" class="form-control" placeholder="Total Price" readonly />
                                    </div>
                                </div>
                                
                                
                                <div class="form-group">
                                    <label><h5 class="label">Type</h5></label>
                                    <label style="margin-left: 45.5%;"><h5 class="label">Date</h5></label>
                                    <div style="display: flex;">
                                    <select name="type" id="type" required="required" class="form-control">
                                        <option >Select</option>
                                        <option value="1">Sell</option>
                                        <option value="2">Took</option>
                                    </select>
                                         <input type="date" style="margin-left: 10px;" id="date" name="date" class="form-control" required="required" placeholder="date">
                                    </div>
                                </div>                                

                              

                                <input type="submit" style="float: right;" class="btn btn-primary" value="Submit">
                            </form>
                        </div>
                    </div>
                </div>
                <!-- [ Main Content ] end -->
            </div>
        </div>
    </div>
</div>

<style>
    .px-4 {
        padding-left: 1.5rem !important;
    }
</style>
<script>
function calculateTotalPrice() {
    var priceInput = document.getElementById("price");
    var discountInput = document.getElementById("discount");
    var stockInput = document.getElementById("stock");
    var totalPriceInput = document.getElementById("total_price");

    var priceValue = parseFloat(priceInput.value.replace('Rs: ', '').replace(/,/g, '')) || 0; // Remove commas and parse as float
    var discountValue = parseFloat(discountInput.value.replace('Rs: ', '').replace(/,/g, '')) || 0; // Remove commas and parse as float
    var stockValue = parseInt(stockInput.value.replace(/,/g, '')) || 0; // Remove commas and parse as integer

    var total = (stockValue * priceValue) - discountValue;

    totalPriceInput.value = "Rs: " + total.toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ",");

    // Only update the "price" input if it's not NaN
    if (!isNaN(priceValue)) {
        priceInput.value = "Rs: " + priceValue.toLocaleString();
    }

    // Only update the "discount" input if it's not NaN
    if (!isNaN(discountValue)) {
        discountInput.value = "Rs: " + discountValue.toLocaleString();
    } else {
        discountInput.value = "Rs: ";
    }
}

// Add event listeners to the "price" and "stock" inputs
document.getElementById("price").addEventListener("input", calculateTotalPrice);
document.getElementById("stock").addEventListener("input", calculateTotalPrice);

// Initial calculation
calculateTotalPrice();
</script>



<?php require_once('footer.php'); ?>
</body>
</html>
