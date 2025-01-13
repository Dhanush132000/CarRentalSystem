<?php include './ownerNavbar.php' ?>

<div class="ms-5 mt-5">
    <h2 class="text-dark" style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">Car Management</h2>
</div>

<div class="container mt-5 d-flex flex-row-reverse">
    <button type="button" class="btn btn-info py-2 px-5" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        <span class="mx-1 my-auto">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
            </svg></span>
        Add Car</button>
</div>
<div class="card container my-4">
    <table class="table mt-4">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Car Number</th>
                <th scope="col">Modal Number</th>
                <th scope="col">Rc</th>
                <th scope="col">Milage</th>
                <th scope="col">Type</th>
                <th scope="col">Capacity</th>
                <th scope="col">Rent</th>
                <th scope="col">Description</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php require_once '../db/db.class.php';
            $db = new DB();
            $count = 0;
            $res = [];
            $ownerid=$_SESSION['own_id'];
            $query = "SELECT * FROM cars WHERE owner_id=$ownerid";
            $res = $db->executeSelect($query);
            if (count($res) > 0) {
                foreach ($res as $row) {
                    $count++;
            ?>
            <tr>
                    <th scope="row"><?php echo $count ?></th>
                    <td><img src="../Media/Cars/<?php echo $row['image'] ?>" alt="Avatar" class="img" width="50" height="50"></td>
                    <td><?php echo $row['car_name'] ?></td>
                    <td><?php echo $row['car_no'] ?></td>
                    <td><?php echo $row['modal_no'] ?></td>
                    <td><img src="../Media/Cars/<?php echo $row['car_rc'] ?>" alt="Avatar" class="img" width="50" height="50"></td>
                    <td><?php echo $row['milage'] ?>/km</td>
                    <td><?php echo $row['car_type'] ?></td>
                    <td><?php echo $row['capacity'] ?></td>
                    <td>₹<?php echo $row['rent'] ?>.00</td>
                    <td><?php echo $row['description'] ?></td>
                    <td><?php if ($row['is_available'] == 1) { ?>
                            <span class="text-success">Available</span>
                        <?php } else { ?>
                            <span class="text-danger">Not Available</span>
                        <?php } ?>
                    </td>
                    <td><?php if ($row['is_available'] == 1) { ?>
                            <button type="button" class="btn btn-warning" onclick="UpdateCarStatus(<?php echo $row['car_id'] ?>,'0')">Disable</button>
                        <?php
                        } else {
                        ?>
                            <button type="button" class="btn btn-success" onclick="UpdateCarStatus(<?php echo $row['car_id'] ?>,'1')">Enable</button>
                        <?php
                        }
                        ?>
                    </td>
            </tr>
                <?php }
            } else { ?>
                <tr>
                    <td colspan="12" class="text-center text-danger py-4">
                        <b> No Records Found</b>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>



<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-group" method="post" action="../Action/ownerAction.php" enctype="multipart/form-data">
                <input type="text" value="AddCar" name="command" id="command" hidden>


                <div class="modal-header">
                    <div class="d-flex flex-grow-1 justify-content-center align-items-center">
                        <h4 class="modal-title " id="staticBackdropLabel">

                            Add Car</h4>

                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body my-2">

                    <div class="mx-2 mb-2">
                        <label for="exampleFormControlInput1" class="form-label text2"><b>Name</b></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                    </div>

                    <div class="mx-2 mb-2">
                        <label for="exampleFormControlInput1" class="form-label text2"><b>Car Number</b></label>
                        <input type="text" class="form-control" id="car_num" name="car_num" placeholder="Car Number" required>
                    </div>

                    <div class="mx-2 mb-2">
                        <label for="exampleFormControlInput1" class="form-label text2"><b>Modal Number</b></label>
                        <input type="text" class="form-control" id="modal" name="modal" placeholder="Modal Number" required>
                    </div>

                
                    <div class="mx-2 mb-2">
                        <label for="exampleFormControlInput1" class="form-label text2"><b>Milage</b></label>
                        <input type="number" class="form-control" id="milage" name="milage" placeholder="In Ltr/Km" required>
                    </div>

                    <div class="mx-2 mb-2">
                        <label for="exampleFormControlInput1" class="form-label text2"><b>Type</b></label>
                        <select class="form-select" aria-label="Default select example" name="type" id="type" required>
                            <option selected>--Select--</option>
                            <option value="Petrol">Petrol</option>
                            <option value="Diesel">Diesel</option>
                            <option value="Electric">Electric</option>
                        </select>
                    </div>

                    <div class="mx-2 mb-2">
                        <label for="exampleFormControlInput1" class="form-label text2"><b>Capacity</b></label>
                        <input type="number" class="form-control" id="capacity" name="capacity" placeholder="Capacity" required>
                    </div>
                    <div class="mx-2 mb-2">
                        <label for="exampleFormControlInput1" class="form-label text2"><b>Rent</b></label>
                        <input type="number" class="form-control" id="rent" name="rent" placeholder="In ₹ " required>
                    </div>
                    <div class="mx-2 mb-2">
                        <label for="exampleFormControlInput1" class="form-label text2"><b>Descripton</b></label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="mx-2 mb-2">
                    <label for="exampleFormControlInput1" class="form-label text2"><b>Rc Image</b></label>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" id="rc_image" name="rc_image" accept=".png,.jpeg,.jpg,.webp" required>
                        </div>
                    </div>
                    <div class="mx-2 mb-2">
                        <label for="exampleFormControlInput1" class="form-label text2"><b>Image</b></label>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" id="image" name="image" accept=".png,.jpeg,.jpg,.webp" required>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn text-light buttons" style="background-color:brown">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>







<?php include '../include/footer.php' ?>