<?php
require_once '../db/db.class.php';
$db = new DB();
session_start();
$count = 0;
if (!isset($_SESSION['cus_id'])) {
  header('Location:../index.php');
}
$type = $_GET['Vehicle'];
$customerid = $_SESSION['cus_id'];
if ($type == 1) {
  $query = "SELECT * FROM bookings JOIN cars ON cars.car_id=bookings.vehicle_id WHERE vehicleType=1";
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
      <th scope="col">Rent</th>
      <th scope="col">From Date</th>
      <th scope="col">Too Date</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
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
        } 

    ?>
        <tr>
          <th scope="row"><?php echo $count ?></th>
          <td><img src="<?php echo $ImagePath  ?>" alt="Avatar" class="img" width="50" height="50"></td>
          <td><?php echo  $vehicleName ?></td>
          <td><?php echo  $vehicleNo ?></td>
          <td>₹ <?php echo $rent ?>.00</td>
          <td><?php echo  $row['from_date'] ?></td>
          <td><?php echo  $row['too_date'] ?></td>
          <td><?php if ($row['book_status'] == 3) { ?>
              <span class="text-danger">Cancelled..</span>
            <?php } elseif ($row['book_status'] == 2) { ?>
              <span class="text-success">Success..</span>
            <?php } else { ?>
              <span class="text-warning">Pending..</span>

            <?php } ?>
          </td>
          <td><?php if ($row['book_status'] == 3) { ?>
              <button type="button" class="btn btn-secondary">Cancelled</button>
            <?php } elseif ($row['book_status'] == 2) { ?>
              <button type="button" class="btn btn-dark">Success</button>
              <button type="button" class="btn btn-info" onclick="Feedback(<?php echo $row['vehicle_id'] ?>,<?php echo $row['vehicleType'] ?>);">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-right-text" viewBox="0 0 16 16">
                  <path d="M2 1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h9.586a2 2 0 0 1 1.414.586l2 2V2a1 1 0 0 0-1-1H2zm12-1a2 2 0 0 1 2 2v12.793a.5.5 0 0 1-.854.353l-2.853-2.853a1 1 0 0 0-.707-.293H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12z" />
                  <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                </svg>

              </button>
            <?php } elseif ($row['book_status'] == 1) { ?>
              <button type="button" class="btn btn-success" onclick="MakePayment(<?php echo $row['bookId'] ?>,'2');">Pay</button>
            <?php } else { ?>
              <button type="button" class="btn btn-warning text-dark">Pending</button>

            <?php } ?>
          </td>

        </tr>


    <?php }
    } ?>
  </tbody>
</table>


<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="form-group" method="post" action="../Action/customerAction.php">
        <input type="text" value="saveFeedback" name="command" hidden>
        <input type="text" name="vehicleid" id="vehicleid" hidden>
        <input type="text" id="type" name="type" hidden>
        <div class="modal-header">
          <div class="d-flex flex-grow-1 justify-content-center align-items-center">
            <h4 class="modal-title " id="staticBackdropLabel">Feedback</h5>

          </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body my-2">
          <div class="mx-2 mb-2">
            <label for="exampleFormControlInput1" class="form-label txt"><b>Rating</b></label>
            <select class="form-select" aria-label="Default select example" id="rating" name="rating">
              <option value="5">5</option>
              <option value="4">4</option>
              <option value="3">3</option>
              <option value="2">2</option>
              <option value="1">1</option>
            </select>
          </div>
          <div class="mx-2 mb-2">
            <label for="exampleFormControlInput1" class="form-label txt"><b>Description</b></label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="submit" id="myButton" class="btn text-light homebuttons" style="background-color: brown;">
            Save</button>
        </div>
      </form>
    </div>
  </div>
</div>