<?php include 'adminNavbar.php';
require_once '../db/db.class.php';
$db = new DB();
$count = 0;
$query1 = "SELECT * FROM feedback 
           JOIN cars ON cars.car_id=feedback.vehicle_id 
           JOIN  customer ON  customer.cus_id=feedback.customer_id
           JOIN `owner` ON cars.owner_id=owner.owner_id
           WHERE feedback.vehicle_type=1";

// $query2 = "SELECT * FROM feedback 
//            JOIN bike ON bike.bike_id=feedback.vehicle_id 
//            JOIN customer ON  customer.cus_id=feedback.customer_id
//            JOIN `owner` ON bike.ownerId=owner.owner_id
//            WHERE feedback.vehicle_type=2";
$res1 = $db->executeSelect($query1);
// $res2 = $db->executeSelect($query2);
?>

<div class="row mt-5 mx-2">
    <?php foreach ($res1 as $row1) {
    ?>
        <div class="col-md-3">
            <div class="card mb-4 shadow-sm prperty-item"><!-- HERE -->
                <div class="card-body">
                    <span class="p-0 mb-2">
                        <small class="txt"><?php echo  $row1['cus_email']; ?></small>
                    </span><br>
                    <span class="p-0 mb-2">
                        <span class="text-info">~ <?php echo  $row1['own_name']; ?></span>
                    </span>
                    <span class="p-0 mb-0">
                        <h5 style="font-family:Verdana, Geneva, Tahoma, sans-serif"><?php echo $row1['car_name'] ?></h5>
                    </span>
                    <small class="p-0" style="color: brown;"><?php echo $row1['car_no'] ?></small>
                    <p class="p-0  mb-1">
                        <?php for ($i = 0; $i < $row1['rating']; $i++) { ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill text-warning me-1" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>
                        <?php } ?>
                    </p>

                    <p class="p-0 mb-1" style="font-family: Arial, Helvetica, sans-serif;"><?php echo $row1['message'] ?></p>


                </div>
            </div><!-- /.card -->
        </div>
    <?php  } ?>
    <!-- <?php foreach ($res2 as $row2) {
    ?>
        <div class="col-md-3">
            <div class="card mb-4 shadow-sm prperty-item"><!-- HERE -->
                <div class="card-body">
                    <span class="p-0 mb-2">
                        <small class="txt"><?php echo  $row2['cus_email']; ?></small>
                    </span><br/>
                    <span class="p-0 mb-2">
                        <span class="text-info">~ <?php echo  $row1['own_name']; ?></span>
                    </span>
                    <span class="p-0 mb-0">
                        <h5 style="font-family:Verdana, Geneva, Tahoma, sans-serif"><?php echo $row2['bike_name'] ?></h5>
                    </span>
                    <small class="p-0" style="color: brown;"><?php echo $row2['bike_number'] ?></small>
                    <p class="p-0  mb-1">
                        <?php for ($i = 0; $i < $row2['rating']; $i++) { ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill text-warning me-1" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>
                        <?php } ?>
                    </p>

                    <p class="p-0 mb-1" style="font-family: Arial, Helvetica, sans-serif;"><?php echo $row2['message'] ?></p>


                </div>
            </div><!-- /.card -->
        </div>
    <?php  } ?> -->
</div>



<?php include '../include/footer.php' ?>