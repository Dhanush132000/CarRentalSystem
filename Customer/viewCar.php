<?php include './cusNavbar.php' ?>
<div class="row g-5 row-cols-4 mb-5 mx-4 mt-4">
    <?php

    $res = [];
    $path = "../Media/Cars/";
    $query = "SELECT * FROM cars WHERE is_available=1";
    $res = $db->executeSelect($query);
    $avg =0;
    foreach ($res as $row) {
      $id=$row['car_id'];
      $rating = "SELECT AVG(rating)AS feedback FROM feedback WHERE vehicle_id=$id AND vehicle_type=2";
      $res1 = $db->executeSelect($rating);
      if (count($res1) > 0) {
        $avg = $res1[0]['feedback'];
      } else {
        $avg = "0";
      }
    ?>
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
            <div class="property-item rounded overflow-hidden card">
                <div class="position-relative overflow-hidden mt-auto image-container">
                    <a href=""><img src="<?php echo  $path . $row['image'] ?>" alt="responsive" height="300" class="product-image" alt="..."></a>
                    <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3"><?php echo $row['car_type'] ?></div>
                    <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-0 px-3">
                        <span class="rating"><b class="text-dark"><?php echo intval($avg); ?></b>
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="gold" class="bi bi-star-fill mb-1" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>
                        </span>

                    </div>
                </div>
                <div class="p-4 pb-0">
                    <h5 class="text-primary mb-3">₹ <?php echo  $row['rent'] ?>.00/day</h5>
                    <span class="d-block h5 mb-2 text2" href=""><?php echo $row['car_name'] ?></span>

                    <p class="mb-2 text-danger" href=""><?php echo $row['car_no'] ?></p>
                    <div class="vertical-center">
                        <p class="text-success my-1"><?php echo $row['description'] ?></p>
                    </div>
                </div>
                <div class="mx-2  mt-4 row ">

                    <?php
                    if (isset($_SESSION['cus_id'])) {
                        $url = "../Action/CustomerAction.php?command=addtoCart&userid=" . $_SESSION['cus_id'];

                    ?>
                        <div class="col">
                            <button class="btn btn-dark w-100 rounded-0" type="button" id="order" onclick="myFunction(<?php echo $row['car_id'] ?>);">
                                Book</button>
                        </div>
                    <?php
                    } else {
                        $orderpath = '../Customer/login.php'; ?>
                        <div class="col">
                            <button class="btn btn-dark w-100 rounded-0" type="button" onclick="window.location.href='<?php echo $orderpath ?>'">
                                Book</button>
                        </div>
                    <?php }
                    ?>
                </div>

                <div class="d-flex border-top border mt-4">
                    <small class="flex-fill text-center border-end py-2 text">
                        <?php echo $row['capacity'] ?> Seats</small>
                    <small class="flex-fill text-center border-end py-2 text">
                        <?php echo $row['milage'] ?>/Km</small>
                    <small class="flex-fill text-center py-2 border-end text">
                        <?php echo $row['modal_no'] ?> Modal
                    </small>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>

<!-- data-bs-toggle="modal" data-bs-target="#staticBackdrop" -->
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="form-group" method="post" action="../Action/customerAction.php" enctype="multipart/form-data">
        <input type="text" value="bookVehicle" name="command" hidden>
        <input type="text" name="vehicleid" id="vehicleid" hidden>
        <input type="text"  id="type" name="type" value="1" hidden>
        <div class="modal-header">
          <div class="d-flex flex-grow-1 justify-content-center align-items-center">
            <h4 class="modal-title " id="staticBackdropLabel">Book Car</h5>

          </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body my-2">
          
          <div class="mx-2 mb-2">
            <label for="exampleFormControlInput1" class="form-label txt"><b>From</b></label>

            <input type="date" class="form-control" id="from" name="from" placeholder="Date" required>
          </div>
          <div class="mx-2 mb-2">
            <label for="exampleFormControlInput1" class="form-label txt"><b>Too</b></label>

            <input type="date" class="form-control" id="too" name="too" placeholder="Date" required>
          </div>
          
          <div class="mx-2 mb-2">
            <label for="exampleFormControlInput1" class="form-label txt"><b>Description</b></label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
          </div>
          <div class="mx-2 mb-2">
            <label for="exampleFormControlInput1" class="form-label txt"><b>DL Image</b></label>
            <input type="file" class="form-control" id="image" name="image" accept=".png,.jpeg,.jpg,.webp" required>
          </div>
        </div>
      
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="submit" id="myButton" class="btn text-light homebuttons" style="background-color: brown;">
           
            Book</button>
        </div>
      </form>
    </div>
  </div>
</div>



<?php include '../include/footer.php' ?>