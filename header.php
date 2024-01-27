<?php require_once('header.php');
include "config/init.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    /* Set the same height for form-control and custom-select */
    .form-group.row .form-control,
    .form-group.row .custom-select {
      height: 38px;
      /* Adjust the height as needed */
    }

    /* Reduce gaps between rows */
    .form-group.row {
      margin-bottom: 10px;
      /* Adjust as needed */
    }

    /* Center align labels */
    .form-group.row label {
      text-align: right;
      padding-right: 15px;
      /* Adjust as needed for additional spacing */
    }

    .custom-small-font {
      font-size: 14px;
      /* Adjust the size as needed */
    }

    .ttl-hover:hover:after {
      background: #000000;
      border-radius: 5px;
      bottom: -34px;
      font-weight: bold;
      color: #fff;
      text-align: center;
      content: attr(data-gloss);
      left: 20%;
      padding: 5px 15px;
      position: absolute;
      z-index: 98;
      width: 250px;
    }

    .ttl-hover:hover:before {
      border: solid;
      border-color: #333 transparent;
      border-width: 0 6px 6px 6px;
      bottom: -4px;
      content: "";
      left: 50%;
      position: absolute;
      z-index: 99;
    }

    .inpt-form {
      height: 42px;
      line-height: 42px;
      background: #ffffff;
      border: 1px solid #E1E4EAD1;
      font-size: 14px;
      color: #676E8A;
      border-radius: 7px;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
    }

    .lbl-65 {
      width: 150px;
      font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;
      color: black;
      margin-top: 10px;
    }

    .form-control {
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      /* Adjust the values as needed */
    }

    .brandname {
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      /* Adjust the values as needed */
    }
  </style>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.3.2/css/fixedHeader.bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap.min.css" />
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $Company_name; ?></title>
  <!-- base:css -->
  <link rel="stylesheet" href="vendors/typicons.font/font/typicons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="img/logo.png" />

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script>
    $(document).ready(function() {
      // Attach change event listener to the Drink dropdown

      function updateFields(selectedDrinkID) {
        // Make an AJAX request to fetch the unit price based on the selected drink ID
        $.ajax({
          type: 'POST',
          url: 'get_unit_price.php', // Replace with your PHP script to fetch unit price
          data: {
            drinkID: selectedDrinkID
          },
          success: function(response) {
            // Update the Unit Price input field with the fetched unit price
            var data = JSON.parse(response);
            // $('#quantity').val(response);
            $('#unitPrice').val(data.unit_price);
            $('#quantity').val(data.available_quantity);
            var final = data.discount_price + '%';
            $('#discountBarSell').val(final);
            $('#discountBar').val(data.discount_price);
          }
        });
      };

      function updateFields2(selectedDrinkID) {
        // Make an AJAX request to fetch the unit price based on the selected drink ID
        $.ajax({
          type: 'POST',
          url: 'restaurant_food_get_unit_price.php', // Replace with your PHP script to fetch unit price
          data: {
            foodID: selectedDrinkID
          },
          success: function(response) {
            // Update the Unit Price input field with the fetched unit price
            var data = JSON.parse(response);
            // $('#quantity').val(response);
            $('#unitPrice').val(data.unit_price);
            $('#quantity').val(data.available_quantity);
          }
        });
      };

      function addPrice(qty) {
        var myQty = parseInt(qty)
        var default_value = 0;
        var unitPrice = $('#unitPrice').val();
        var discount = $('#discountBar').val();
        default_value = myQty * unitPrice;
        var totalValue = default_value *(discount/100);
        var finalTotalValue = default_value - totalValue;
        var final = "Rs: " + finalTotalValue.toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        console.log(final);
        $('#totalAmount').val(final);
      }

      $('#required_Qty').change(function() {
        var qty = $(this).val();
        var available_quantity = $('#quantity').val();
        if (available_quantity > qty) {
          $('#required_Qty').val(qty);
          addPrice(qty);
        }else {$('#required_Qty').val(available_quantity);}
        
      });

      $('#drinkName').change(function() {
        var selectedDrinkID = $(this).val();
        updateFields(selectedDrinkID);
      });

      $('#unitPrice').change(function() {
        var selectedDrinkID = $('#drinkName').val();
        updateFields(selectedDrinkID);
      });

      $('#quantity').change(function() {
        var selectedDrinkID = $('#drinkName').val();
        updateFields(selectedDrinkID);
      });

      $('#totalAmount').change(function() {
        var r_quantity = $('#required_Qty').val();
        addPrice(r_quantity);
      });

      var defaultID = $('#drinkName').val();
      updateFields(defaultID);

    });

    document.addEventListener("DOMContentLoaded", function() {
      var moneyInput = document.getElementById("money");

      moneyInput.addEventListener("input", function() {
        // Remove non-numeric and non-decimal characters
        var cleanedValue = moneyInput.value.replace(/[^\d.]/g, '');

        // Format the number as currency
        var formattedValue = formatAsCurrency(cleanedValue);

        // Update the input field with the formatted value
        moneyInput.value = formattedValue;
      });

      function formatAsCurrency(value) {
        // Convert to number and format as currency
        var numberValue = parseFloat(value);
        if (!isNaN(numberValue)) {
          return numberValue.toLocaleString('en-US', {
            style: 'currency',
            currency: 'LKR'
          });
        }
        return '';
      }
    });

    function formatAmount(input) {
      // Remove non-numeric characters
      let value = input.value.replace(/[^0-9]/g, '');

      // Format the number with "Rs:"
      value = "Rs: " + Number(value).toLocaleString();

      // Update the input value
      input.value = value;
    }
  </script>
</head>

<body>
  <div class="row" id="proBanner">
    <!---div class="col-12">
        <span class="d-flex align-items-center purchase-popup">
          <p>Get tons of UI components, Plugins, multiple layouts, 20+ sample pages, and more!</p>
          <a href="https://www.bootstrapdash.com/product/celestial-admin-template/?utm_source=organic&utm_medium=banner&utm_campaign=free-preview" target="_blank" class="btn download-button purchase-button ml-auto">Upgrade To Pro</a>
          <i class="typcn typcn-delete-outline" id="bannerClose"></i>
        </span>
      </div-->
  </div>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="index.php"><img src="img/logo2.png" alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="index.php"><img src="images/logo-mini.svg" alt="logo" /></a>
        <button class="navbar-toggler navbar-toggler align-self-center d-none d-lg-flex" type="button" data-toggle="minimize">
          <span class="typcn typcn-th-menu"></span>
        </button>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav navbar-nav-right">
          <!-- <li class="nav-item d-none d-lg-flex  mr-2">
              <a class="nav-link" target="_blank" href="asiald.lk">
                Help
              </a>
            </li> -->
          <li class="nav-item dropdown d-flex">
            <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
              <i class="typcn typcn-message-typing"></i>
              <span class="count bg-success">2</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="images/faces/face4.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-normal">David Grey
                  </h6>
                  <p class="font-weight-light small-text mb-0">
                    The meeting is cancelled
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="images/faces/face2.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-normal">Tim Cook
                  </h6>
                  <p class="font-weight-light small-text mb-0">
                    New product launch
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="images/faces/face3.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-normal"> Johnson
                  </h6>
                  <p class="font-weight-light small-text mb-0">
                    Upcoming board meeting
                  </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item dropdown  d-flex">
            <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="typcn typcn-bell mr-0"></i>
              <span class="count bg-danger">2</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="typcn typcn-info-large mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Application Error</h6>
                  <p class="font-weight-light small-text mb-0">
                    Just now
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="typcn typcn-cog mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Settings</h6>
                  <p class="font-weight-light small-text mb-0">
                    Private message
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="typcn typcn-user-outline mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">New user registration</h6>
                  <p class="font-weight-light small-text mb-0">
                    2 days ago
                  </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle  pl-0 pr-0" href="#" data-toggle="dropdown" id="profileDropdown">
              <i class="typcn typcn-user-outline mr-0"></i>
              <span class="nav-profile-name">
                <?php echo $_SESSION['user_name'] ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="typcn typcn-cog text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item">
                <i class="typcn typcn-power text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="typcn typcn-th-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="typcn typcn-cog-outline"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close typcn typcn-delete-outline"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options" id="sidebar-light-theme">
            <div class="img-ss rounded-circle bg-light border mr-3"></div>
            Light
          </div>
          <div class="sidebar-bg-options selected" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border mr-3"></div>
            Dark
          </div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles primary"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default border"></div>
          </div>
        </div>
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <div class="d-flex sidebar-profile">
              <div class="sidebar-profile-image">
                <img src="images/faces/face29.png" alt="image">
                <span class="sidebar-status-indicator"></span>
              </div>
              <div class="sidebar-profile-name">
                <p class="sidebar-name">
                  <?php
                  echo $_SESSION['user_name']
                  ?>
                </p>
                <p class="sidebar-designation">
                  Welcome
                </p>
              </div>
            </div>
            <!--div class="nav-search">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Type to search..." aria-label="search" aria-describedby="search">
                <div class="input-group-append">
                  <span class="input-group-text" id="search">
                    <i class="typcn typcn-zoom"></i>
                  </span>
                </div>
              </div>
            </div-->
            <p class="sidebar-menu-title">Dash menu</p>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
              <i class="typcn typcn-device-desktop menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="buy.php">
              <i class="typcn typcn-document-text menu-icon"></i>
              <span class="menu-title">Buy Drink</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
              <i class="typcn typcn-wine menu-icon"></i>
              <span class="menu-title">Stock</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="basic_table.php">Stock</a></li>
                <li class="nav-item"> <a class="nav-link" href="stock_add.php">Add New Stock</a></li>
                <li class="nav-item"> <a class="nav-link" href="bottleSize_add.php">Add New Bottle Size</a></li>
              </ul>
            </div>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="add_drinks.php">
              <i class="typcn typcn-wine menu-icon"></i>
              <span class="menu-title">Add Drinks <span class="badge badge-primary ml-3">New</span></span>
            </a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#brand" aria-expanded="false" aria-controls="brand">
              <i class="typcn typcn-folder-add menu-icon"></i>
              <span class="menu-title">Brand</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="brand">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="brand_table.php">Brands</a></li>
                <li class="nav-item"> <a class="nav-link" href="brand_add.php">Add Brand</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#distributor" aria-expanded="false" aria-controls="distributor">
              <i class="typcn typcn-user-add menu-icon"></i>
              <span class="menu-title">Distributor</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="distributor">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="distributor_table.php">Distributors</a></li>
                <li class="nav-item"> <a class="nav-link" href="distributors_add.php">Add Distributor</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#category" aria-expanded="false" aria-controls="category">
              <i class="typcn typcn-th-small menu-icon"></i>
              <span class="menu-title">Category</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="category">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="category_table.php">Categories</a></li>
                <li class="nav-item"> <a class="nav-link" href="category_add.php">Add Drink Category</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
      <style type="text/css">
        .card {
          box-shadow: 0 .3125rem .3125rem 0 rgba(82, 63, 105, .05);
          transition: all .5s ease-in-out;
          background-color: #fff;
          border: 0 solid transparent;
          border-radius: .25rem;
        }

        a {
          text-decoration: none !important;
        }
      </style>