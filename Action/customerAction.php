<?php
require_once '../db/db.class.php';
$db = new DB();
session_start();
$customerId = $_SESSION['cus_id'];
if (isset($_POST['command'])) {
    $command = $_POST['command'];
    if ($command == "registration") {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $password = $_POST['password'];
        $confirmPass = $_POST['con_password'];
        if ($password != $confirmPass) {
            echo '<script>alert("Password Not matches to the confirm Password.."); window.location="../Owner/register.php";</script>';
        } else {
            $Email = "SELECT * FROM `customer` WHERE cus_email='$email'";
            $Phone = "SELECT * FROM `customer` WHERE cus_contact='$contact'";

            $res1 = $db->executeSelect($Email);
            $res2 = $db->executeSelect($Phone);

            if (count($res2) > 0) {
                echo '<script>alert("Phone number Already Exist.."); window.location="../Customer/register.php";</script>';
                // echo 'Phone number Already Exist';
            } elseif (count($res1) > 0) {
                // echo 'Email Id Already Exist';
                echo '<script>alert("Email Id Already Exist.."); window.location="../Customer/register.php";</script>';
            } else {
                $insert = "INSERT INTO `customer`(cus_name,cus_age,cus_contact,cus_email,cus_address,cus_password)";
                $values = " VALUES('$name','$age','$contact','$email','$address','$password')";

                $sql = $insert . $values;
                $res = $db->executeInsertAndGetId($sql);
                if ($res > 0) {
                    echo "<script>alert('Successfully Registered'); window.location.href='../Customer/login.php'</script>";
                } else {
                    // echo 'Something went wrong. Try again';
                    echo "<script>alert('Something went wrong. Try again'); window.location.href='../Customer/register.php'</script>";
                }
            }
        }
    } else if ($command == "bookVehicle") {
        $vehicleid = $_POST['vehicleid'];
        $from = $_POST['from'];
        $too = $_POST['too'];
        $description = $_POST['description'];
        $type = $_POST['type']; //means Vehicle type car
        $file = $_FILES["image"];

        $randomNumber = rand(10, 9999);
        $filename = "Dl-" . $randomNumber . $file["name"];
        $targetFilePath = "../Media/Dl/" . $filename;
        $tempFilePath = $file["tmp_name"];

        $insert = "INSERT INTO `bookings`(vehicle_id,customer_id,vehicleType,from_date,too_date,description,dl)";
        $values = " VALUES('$vehicleid','$customerId','$type','$from','$too','$description','$filename')";
        $sql = $insert . $values;
        $res = $db->executeInsertAndGetId($sql);
        if ($res > 0) {
            move_uploaded_file($tempFilePath, $targetFilePath);
            echo "<script>alert('Successfully Booked'); window.location.href='../Customer/viewCar.php'</script>";
        } else {
            // echo 'Something went wrong. Try again';
            echo "<script>alert('Something went wrong. Try again'); window.location.href='../Customer/viewCar.php'</script>";
        }
    } else if ($command == "saveFeedback") {
        $vehicleid = $_POST['vehicleid'];
        $rating = $_POST['rating'];
        $description = $_POST['description'];
        $type = $_POST['type'];
        $insert = "INSERT INTO `feedback`(vehicle_id,customer_id,vehicle_type,rating,message)";
        $values = " VALUES('$vehicleid','$customerId','$type','$rating','$description')";
        $sql = $insert . $values;
        $res = $db->executeInsertAndGetId($sql);
        if ($res > 0) {
            echo "<script>alert('Successfully Saved'); window.location.href='../Customer/myBookings.php'</script>";
        } else {
            // echo 'Something went wrong. Try again';
            echo "<script>alert('Something went wrong. Try again'); window.location.href='../Customer/myBookings.php'</script>";
        }
    }
} elseif (isset($_GET['command'])) {
    $command = $_GET['command'];
    if ($command == "Login") {
        $email = $_GET['email'];
        $password = $_GET['password'];
        $Query = "SELECT * FROM  `customer` WHERE cus_email='$email' AND cus_password='$password' AND is_enabled=1";
        $res = $db->executeSelect($Query);
        if (count($res) > 0) {
            $_SESSION['cus_id'] = $res[0]['cus_id'];
            header('Location:../Customer/cusHome.php');
        } else {
            echo "<script>alert('Invalid Credentials'); window.location.href='../Customer/login.php'</script>";
        }
    } elseif ($command == "checkAvailability") {
        $stardate = $_GET['stardate'];
        $enddate = $_GET['enddate'];
        $vehicleid = $_GET['vehicleid'];
        $type = $_GET['type'];
        $sql = "SELECT * FROM bookings WHERE vehicleType=$type AND vehicle_id=$vehicleid AND book_status IN(1,2,0)";
        $res = $db->executeSelect($sql);
        $flag = 0;
        $temp = 1;
        if (count($res) > 0) {
            foreach ($res as $row) {
                if ($stardate >= $row['from_date'] && $stardate <= $row['too_date']) {
                    $flag = 1;
                } elseif ($enddate >= $row['from_date'] && $enddate <= $row['too_date']) {
                    $flag = 1;
                } else if ($stardate >= $row['too_date'] && $stardate <= $row['from_date']) {
                    $flag = 1;
                } elseif ($enddate >= $row['too_date'] && $enddate <= $row['from_date']) {
                    $flag = 1;
                } else {
                    $temp = 0;
                }
            }
        } else {
            $temp = 0;
        }

        if ($flag == 1) {
            echo 'Not Available';
        } else {
            echo 'Available';
        }
    }
}
