<?php require_once('header.php');

if (isset($_POST['add_category'])) {

  $hotelId = 1;
  $category_name = $_POST['category'];
  $addby = $_SESSION['user_id'];
  $date = $date = @date('Y-m-d H:i:s');

  if (!empty($category_name)) {
    $query = array(
      'hotelID' => $hotelId,
      'name' => $category_name,
      'addBy' => $addby,
      'add_date' => $date
    );

    $res = $obj->create('bar_category', $query);
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
                  <h4 class="card-title">Add Drink Category</h4>
                  <form class="form-sample" method="post" enctype="multipart/form-data">
                    <!-- Brand name -->
                    <div class="row">
                      <div class="col-md-6" bis_skin_checked="1">
                        <div class="form-group row" bis_skin_checked="1">
                          <label class="col-sm-4 col-form-label">Drink Category</label>
                          <div class="col-sm-8" bis_skin_checked="1">
                            <input type="text" name="category" id="brandname" class="form-control mt-2 shadow p-3 mb-5 bg-white rounded" placeholder="Drink Category name">
                          </div>
                        </div>
                      </div>
                    </div>

                    <button type="submit" name="add_category" class="btn btn-primary mr-2">Submit</button>
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