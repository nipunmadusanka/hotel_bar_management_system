<?php require_once('header.php'); 

if (isset($_POST['add_dist'])){
  $var0 = 1;
  $var1 = $_POST['dist_name'];
  $var2 = $_POST['dist_contact'];
  $var3 = $_SESSION['user_id'];
  $var4 = $date=@date('Y-m-d H:i:s');
  if (!empty($var1)) {
    $query = array(
     'hotelID' => $var0 , 
     'name' => $var1,
     'contact' => $var2,
     'addBy' => $var3,
     'add_date' => $var4
      );

    $res = $obj->create('bar_distributors' , $query);
    if ($res) {
      echo "yes";
    }else{
      echo "Failed to add catagory";
    }
    }else{
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
                        <h4 class="card-title">Add Distributor</h4>
                        <form class="form-sample" method="post" enctype="multipart/form-data">
                            <!-- Brand name -->
                            <div class="row">
                                <div class="col-md-6" bis_skin_checked="1">
                                    <div class="form-group row" bis_skin_checked="1">
                                        <label class="col-sm-4 col-form-label">Distributor Name</label>
                                        <div class="col-sm-8" bis_skin_checked="1">
                                            <input type="text" name="dist_name" id="brandname" class="form-control mt-2 shadow p-3 mb-5 bg-white rounded" placeholder="Distributor Name">
                                        </div>
                                    </div>
                                </div>
                                <div class=col-md-6 bis_skin_checked="1">
                                    <div class="form-group row" bis_skin_checked="1">
                                        <label class="col-sm-4 col-form-label">Contact</label>
                                        <div class="col-sm-8" bis_skin_checked="1">
                                            <input type="text" name="dist_contact" id="contact" class="form-control mt-2 shadow p-3 mb-5 bg-white rounded" placeholder="Contact Number">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" name="add_dist" class="btn btn-primary mr-2">Submit</button>
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