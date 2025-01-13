<?php include './ownerNavbar.php' ?>
<div class="ms-5 mt-5">
    <h2 class="text-dark" style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">Bookings Management</h2>
</div>


<div class="card container my-3 rounded-0">
    <div class="my-4 mx-5">
        <label for="exampleFormControlInput1" class="form-label text2"><b>Vehicle Type</b></label>
        <select class="form-select" aria-label="Default select example" onchange="GetMyBookings(this.value);">
            <option selected value="-1">Select Vehicle Type</option>
            <option value="1">Car</option>
        </select>
    </div>

    <div class="my-3" id="myBookings">

    </div>
</div>

<?php include '../include/footer.php' ?>