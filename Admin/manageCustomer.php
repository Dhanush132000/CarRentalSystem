<?php include './adminNavbar.php'; 
?>

<div class="ms-5 mt-5">
    <h2 class="text-dark" style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">Customer Management</h2>
</div>
<div class="card container my-5">
    <table class="table mt-4">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Contact</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php require_once '../db/db.class.php';
            $db = new DB();
            $count = 0;
            $res = [];
            $query = "SELECT * FROM `customer`";
            $res = $db->executeSelect($query);
            if (count($res) > 0) {
                foreach ($res as $row) {
                    $count++;
            ?>
            <tr>
                    <th scope="row"><?php echo $count ?></th>
                    <td><?php echo $row['cus_name'] ?></td>
                    <td><?php echo $row['cus_age'] ?></td>
                    <td><?php echo $row['cus_contact'] ?></td>
                    <td><?php echo $row['cus_email'] ?></td>
                    <td><?php echo $row['cus_address'] ?></td>
                    <td><?php if ($row['is_enabled'] == 1) { ?>
                            <span class="text-success">Active</span>
                        <?php } else { ?>
                            <span class="text-danger">Deactive</span>
                        <?php } ?>
                    </td>
                    <td><?php if ($row['is_enabled'] == 1) { ?>
                            <button type="button" class="btn btn-warning" onclick="UpdateStatus(<?php echo $row['cus_id'] ?>,'0','UpdateCustomerStatus')">Disable</button>
                        <?php
                        } else {
                        ?>
                            <button type="button" class="btn btn-success" onclick="UpdateStatus(<?php echo $row['cus_id'] ?>,'1','UpdateCustomerStatus')">Enable</button>
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




<?php include '../include/footer.php'?>