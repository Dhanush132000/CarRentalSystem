<?php 
$navname="Admin";
include '../include/tempNavbar.php';
?>

<div class="container">
    <div class="card w-50 container my-5">
        <div class="card-body">
            <div style="height: 10%; width:10%" class="text-center mx-auto mt-4">
                <p style="color: goldenrod;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                    </svg>
                </p>
            </div>
            <div class="text-center">
                <h3 style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">Admin Login</h3>
            </div>
            <form method="get" action="../Action/adminAction.php">
                <input type="text" value="AdminLogin" name="command" id="command" hidden>
                <div class="mb-3 mx-3">
                    <label for="exampleInputEmail1" class="form-label">
                        <b class="txt">Username</b></label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" required oninvalid="this.setCustomValidity('Username is required')" oninput="setCustomValidity('')">
                    <div class="invalid-feedback">
                        Please choose a username.
                    </div>
                    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                </div>
                <div class="mb-5 mx-3">
                    <label for="exampleInputPassword1" class="form-label"><b class="txt">Password</b></label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required oninvalid="this.setCustomValidity('Please Enter the password')" oninput="setCustomValidity('')">
                </div>
                <div class="mb-5 mx-3 ">
                    <button type="submit" class="btn btn-dark w-100 py-2">Login</button>
                </div>
            </form>
        </div>
    </div>






<?php include '../include/footer.php' ?>