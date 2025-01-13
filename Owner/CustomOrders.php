<?php
require_once '../db/db.class.php';
$db = new DB();
session_start();
$count = 0;
if (!isset($_SESSION['own_id'])) {
    header('Location:../index.php');
}
$type = $_GET['Vehicle'];
$own_id = $_SESSION['own_id'];
if ($type == 1) {
    $query = "SELECT * FROM bookings JOIN cars ON cars.car_id=bookings.vehicle_id JOIN customer ON customer.cus_id=bookings.customer_id WHERE vehicleType=1 AND cars.owner_id=$own_id";
} 
$res = $db->executeSelect($query);

?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Vehicle Name</th>
            <th scope="col">Vehicle Number</th>
            <th scope="col">Customer Name</th>
            <th scope="col">Customer Contact</th>
            <th scope="col">Rent</th>
            <th scope="col">From Date</th>
            <th scope="col">To Date</th>
            <th scope="col">Status</th>
        </tr>
    </thead>
    <tbody>
        <?php if (count($res) > 0) {
            foreach ($res as $row) {
                $count++;
                if ($type == 1) {
                    $ImagePath = "../Media/Cars/" . $row['image'];
                    $vehicleName = $row['car_name'];
                    $vehicleNo = $row['car_no'];
                    $rent = $row['rent'];
                } else {
                    $ImagePath = "../Media/Bikes/" . $row['imagefile'];
                    $vehicleName = $row['bike_name'];
                    $vehicleNo = $row['bike_number'];
                    $rent = $row['rent'];
                }

        ?>
                <tr>
                    <th scope="row"><?php echo $count ?></th>
                    <td><img src="<?php echo $ImagePath  ?>" alt="Avatar" class="img" width="50" height="50"></td>
                    <td><?php echo  $vehicleName ?></td>
                    <td><?php echo  $vehicleNo ?></td>
                    <td><?php echo  $row['cus_name'] ?></td>
                    <td><?php echo  $row['cus_contact'] ?></td>
                    <td>₹<?php echo $rent ?>.00</td>
                    <td><?php echo  $row['from_date'] ?></td>
                    <td><?php echo  $row['too_date'] ?></td>
                    <td><?php if ($row['book_status'] == 3) { ?>
                            <span class="text-danger">Cancelled..</span>
                        <?php } elseif ($row['book_status'] == 2) { ?>
                            <span class="text-success">Success..</span>
                        <?php } elseif ($row['book_status'] == 0) { ?>
                            <span class="text-info">Not Checked..</span>
                        <?php } else { ?>
                            <span class="text-warning">Pending..</span>

                        <?php } ?>
                    </td>
                </tr>


                <?php }
        } else{?>
         <tr>
                    <td colspan="12" class="text-center text-danger py-4">
                        <b> No Records Found</b>
                    </td>
                </tr>
        <?php }?>
    </tbody>
</table>