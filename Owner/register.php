<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../Static/css/style.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Car Rental</title>
</head>

<body class="background">

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
                <h3 style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">Registration</h3>
            </div>
            <form method="post" action="../Action/ownerAction.php">
                <input type="text" value="registration" name="command" id="command" hidden>
                <div class="mb-3 mx-3">
                    <label for="exampleInputEmail1" class="form-label">
                        <b class="txt">Name</b></label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" required oninvalid="this.setCustomValidity('Name is required')" oninput="setCustomValidity('')">
                    <div class="invalid-feedback">
                        Please enter a name.
                    </div>
                </div>
                <!-- <div class="mb-3 mx-3">
                        <label for="exampleInputEmail1" class="form-label">
                            <b class="txt">Username</b></label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" required oninvalid="this.setCustomValidity('Username is required')" oninput="setCustomValidity('')">

                    </div> -->
                <div class="mb-3 mx-3">
                    <label for="exampleInputEmail1" class="form-label">
                        <b class="txt">Age</b></label>
                    <input type="text" class="form-control" id="age" name="age" placeholder="Age" required oninvalid="this.setCustomValidity('Age is required')" oninput="setCustomValidity('')">

                </div>
               
                <div class="mb-3 mx-3">
                    <label for="exampleInputEmail1" class="form-label">
                        <b class="txt">Email</b></label>
                    <input type="text" class="form-control" id="emali" name="email" placeholder="Email" required oninvalid="this.setCustomValidity('Email is required')" oninput="setCustomValidity('')">

                </div>
                <div class="mb-3 mx-3">
                    <label for="exampleInputEmail1" class="form-label">
                        <b class="txt">Contact</b></label>
                    <input type="tel" class="form-control" id="contact" name="contact" placeholder="Contact" minlength="10" maxlength="10" required oninvalid="this.setCustomValidity('licence no is required')" oninput="setCustomValidity('')">

                </div>
                <div class="mb-3 mx-3">
                    <label for="exampleInputEmail1" class="form-label">
                        <b class="txt">Address</b></label>
                    <textarea class="form-control" id="address" name="address" rows="3" required oninvalid="this.setCustomValidity('Address  is required')" oninput="setCustomValidity('')"></textarea>

                </div>

                <div class="mb-3 mx-3">
                    <label for="exampleInputEmail1" class="form-label">
                        <b class="txt">Licence Number</b></label>
                    <input type="text" class="form-control" id="licence" name="licence" placeholder="Licence No." required oninvalid="this.setCustomValidity('Contact no is required')" oninput="setCustomValidity('')">

                </div>
                <div class="mb-3 mx-3">
                    <label for="exampleInputPassword1" class="form-label"><b class="txt">Password</b></label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required oninvalid="this.setCustomValidity('Please Enter the password')" oninput="setCustomValidity('')">
                </div>
                <div class="mb-5 mx-3">
                    <label for="exampleInputPassword1" class="form-label"><b class="txt">Confirm Password</b></label>
                    <input type="password" class="form-control" id="con_password" name="con_password" placeholder="Confirm Password" required oninvalid="this.setCustomValidity('Please Enter the password')" oninput="setCustomValidity('')">
                </div>
                <div class="mb-4 mx-3 ">
                <button type="submit" class="btn btn-dark w-100 py-2" onclick="return Validation('owner');">SignUp</button>
                </div>
                <div class="mb-5 text-center">
                    <span>Already have an Account?</span><br>
                    <a href="./login.php">SignIn from here</a><br>
                </div>
            </form>
        </div>
    </div>


    <?php include '../include/footer.php' ?>