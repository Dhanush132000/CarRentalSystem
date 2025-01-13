<?php include './adminNavbar.php' ?>

<div class="ms-5 mt-5">
    <h2 class="text-dark" style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">Vehicle Management</h2>
</div>
        <?php require_once '../db/db.class.php';
        $db = new DB();
        $count = 0;
        $res = [];
        $query = "SELECT * FROM cars where is_available=1";
        $res = $db->executeSelect($query); 
        ?>

        <div class="row row-pb-md container my-5 ms-5">
            <?php foreach ($res as $row) { ?>
                <div class="col-lg-3 mb-4 text-center">
                    <div class="product-entry border">

                        <div class="image-containe prod-img">
                            <img src="../Media/Cars/<?php echo $row['image'] ?>" class="img-fluid zoom-image" height="200" alt="">
                        </div>
                        <div class="desc">
                            <h2><a href="#"><?php echo $row['car_name'] ?></a></h2>
                            <span class="price">₹ <?php echo $row['rent'] ?>.00/day</span>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
       



<?php include '../include/footer.php'?>