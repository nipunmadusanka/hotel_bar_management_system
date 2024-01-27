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
                  <h4 class="card-title">Add drinks</h4>
                  
                  <form class="form-sample">
                        <!-- Drink Category -->
                        <div class="row">
                          <div class="col-md-6" bis_skin_checked="1">
                              <div class="form-group row" bis_skin_checked="1">
                                  <label class="col-sm-3 col-form-label text-sm-right">Drink Category</label>
                                  <div class="col-sm-9" bis_skin_checked="1">
                                      <select id="drinkCategory" class="form-control mt-3">
                                          <!-- Add options for drink categories here -->
                                          <option value="Beer">Beer</option>
                                          <option value="Wine">Wine</option>
                                          <option value="Spirits_or_Liquor">Spirits or Liquor</option>
                                          <option value="Cocktails">Cocktails</option>
                                          <option value="Liqueurs">Liqueurs</option>
                                          <option value="Fortified_Wines">Fortified Wines</option>
                                          <option value="Fortified_Wines">Fortified Wines</option>
                                          <option value="Cider_and_Perry">Cider and Perry</option>
                                          <!-- Add more options as needed -->
                                      </select>
                                  </div>
                              </div>
                          </div>

                          <!-- Drink Name -->
                          <div class="col-md-6" bis_skin_checked="1">
                              <div class="form-group row" bis_skin_checked="1">
                                  <label class="col-sm-3 col-form-label text-sm-right">Drink Name</label>
                                  <div class="col-sm-9" bis_skin_checked="1">
                                      <input type="text" id="drinkName" class="form-control mt-3" placeholder="Drink Name">
                                  </div>
                              </div>
                          </div>
                        </div>

                        <!-- Capacity -->
                        <div class="row">
                          <div class="col-md-6" bis_skin_checked="1">
                              <div class="form-group row" bis_skin_checked="1">
                                  <label class="col-sm-3 col-form-label text-sm-right">Capacity</label>
                                  <div class="col-sm-9" bis_skin_checked="1">
                                      <input type="text" id="capacity" class="form-control mt-3" placeholder="Capacity">
                                  </div>
                              </div>
                          </div>

                          <!-- Quantity -->
                          <div class="col-md-6" bis_skin_checked="1">
                              <div class="form-group row" bis_skin_checked="1">
                                  <label class="col-sm-3 col-form-label text-sm-right">Quantity</label>
                                  <div class="col-sm-9" bis_skin_checked="1">
                                      <input type="text" id="quantity" class="form-control mt-3" placeholder="Quantity">
                                  </div>
                              </div>
                          </div>
                        </div>

                        <!-- Brand -->
                        <div class="row">
                          <div class="col-md-6" bis_skin_checked="1">
                              <div class="form-group row" bis_skin_checked="1">
                                  <label class="col-sm-3 col-form-label text-sm-right">Brand</label>
                                  <div class="col-sm-9" bis_skin_checked="1">
                                      <select id="brand" class="form-control mt-3">
                                          <!-- Add options for brands here -->
                                          <option value="brand1">Anheuser-Busch InBev</option>
                                          <option value="brand2">Heineken International</option>
                                          <option value="brand3">SABMiller </option>
                                          <option value="brand4">E. & J. Gallo Winery</option>
                                          <option value="brand5">Constellation Brands</option>
                                          <option value="brand6">LVMH Moët Hennessy Louis Vuitton SE</option>
                                          <option value="brand7">Diageo</option>
                                          <option value="brand8">Pernod Ricard</option>
                                          <option value="brand9">PepsiCo</option>
                                          <!-- Add more options as needed -->
                                      </select>
                                  </div>
                              </div>
                          </div>

                          <!-- Stock Bring Date -->
                          <div class="col-md-6" bis_skin_checked="1">
                              <div class="form-group row" bis_skin_checked="1">
                                  <label class="col-sm-3 col-form-label text-sm-right">Stock Bring Date</label>
                                  <div class="col-sm-9" bis_skin_checked="1">
                                      <input type="date" id="stockBringDate" class="form-control mt-3">
                                  </div>
                              </div>
                          </div>
                        </div>

                        <!-- Distributor -->
                        <div class="row">
                          <div class="col-md-6" bis_skin_checked="1">
                              <div class="form-group row" bis_skin_checked="1">
                                  <label class="col-sm-3 col-form-label text-sm-right">Distributor</label>
                                  <div class="col-sm-9" bis_skin_checked="1">
                                      <select id="distributor" class="form-control mt-3">
                                          <!-- Add options for distributors here -->
                                          <option value="distributor1">Distributor 1</option>
                                          <option value="distributor2">Distributor 2</option>
                                          <!-- Add more options as needed -->
                                      </select>
                                  </div>
                              </div>
                          </div>

                          <!-- Authorized By -->
                          <div class="col-md-6" bis_skin_checked="1">
                              <div class="form-group row" bis_skin_checked="1">
                                  <label class="col-sm-3 col-form-label text-sm-right">Authorized By</label>
                                  <div class="col-sm-9" bis_skin_checked="1">
                                      <select id="distributor" class="form-control mt-3">
                                          <!-- Add options for distributors here -->
                                          <option value="Authorized1">Authorized 1</option>
                                          <option value="Authorized2">Authorized 2</option>
                                          <!-- Add more options as needed -->
                                      </select>
                                  </div>
                              </div>
                          </div>
                        </div>

                        <!-- Unit Price -->
                        <div class="row">
                          <div class="col-md-6" bis_skin_checked="1">
                              <div class="form-group row" bis_skin_checked="1">
                                  <label class="col-sm-3 col-form-label text-sm-right">Unit Price</label>
                                  <div class="col-sm-9" bis_skin_checked="1">
                                      <input type="text" id="unitPrice" class="form-control mt-3" placeholder="Unit Price">
                                  </div>
                              </div>
                          </div>

                          <!-- Full Amount -->
                          <div class="col-md-6" bis_skin_checked="1">
                              <div class="form-group row" bis_skin_checked="1">
                                  <label class="col-sm-3 col-form-label text-sm-right">Full Amount</label>
                                  <div class="col-sm-9" bis_skin_checked="1">
                                      <input type="text" id="fullAmount" class="form-control mt-3" placeholder="Full Amount">
                                  </div>
                              </div>
                          </div>
                        </div>

                        <!-- Discounted Price -->
                        <div class="row">
                          <div class="col-md-6" bis_skin_checked="1">
                              <div class="form-group row" bis_skin_checked="1">
                                  <label class="col-sm-3 col-form-label text-sm-right">Discounted Price</label>
                                  <div class="col-sm-9" bis_skin_checked="1">
                                      <input type="text" id="discountedPrice" class="form-control mt-3" placeholder="Discounted Price">
                                  </div>
                              </div>
                          </div>
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
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