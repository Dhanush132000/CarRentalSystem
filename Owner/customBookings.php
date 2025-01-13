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
    $query = "SELECT * FROM bookings JOIN cars ON cars.car_id=bookings.vehicle_id JOIN customer ON customer.cus_id=bookings.customer_id WHERE vehicleType=1 AND cars.owner_id=$own_id AND bookings.book_status=0";
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
            <th scope="col">DL Image</th>
            <th scope="col">From Date</th>
            <th scope="col">To Date</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php if (count($res) > 0) {
            foreach ($res as $row) {
                $count++;
                if ($type == 1) {
                    $ImagePath = "../Media/Cars/" . $row['image'];
                    $ImageDl = "../Media/Dl/" . $row['dl'];
                    $vehicleName = $row['car_name'];
                    $vehicleNo = $row['car_no'];
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
                    <td>₹ <?php echo $rent ?>.00</td>
                    <td><img src="<?php echo $ImagePath  ?>" alt="Avatar" class="img" width="150" height="150"></td>
                    <td><?php echo  $row['from_date'] ?></td>
                    <td><?php echo  $row['too_date'] ?></td>
                    <td><?php if ($row['book_status'] == 0) { ?>
                            <button type="button" class="btn btn-success" onclick="BookingStatus(<?php echo $row['bookId']?>,'1');">Accept</button>
                            <button type="button" class="btn btn-warning text-dark px-3" onclick="BookingStatus(<?php echo $row['bookId']?>,'3');">Deny</button>
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