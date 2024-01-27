
<?php
include "config/init.php";
// get_unit_price.php

// Include your database connection or any necessary configurations
// ...

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the selected drink ID from the AJAX request
    $selectedDrinkID = $_POST["drinkID"];

    // Fetch the unit price from the database based on the selected drink ID
    $inv_data = $obj->find('bar_inventory', 'id', $selectedDrinkID);

    // Return the unit price as the AJAX response
    echo json_encode(array(
        'unit_price' => $inv_data->unit_price,
        'available_quantity' => $inv_data->quantity,
        'discount_price' => $inv_data->discount_price
    ));
}
?>