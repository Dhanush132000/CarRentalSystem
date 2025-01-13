<?php
require_once '../db/db.class.php';
$db = new DB();
session_start();
$ownerid = $_SESSION['own_id'];

if (isset($_POST['command'])) {
    $command = $_POST['command'];
    if ($command == "registration") {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $licence = $_POST['licence'];
        $password = $_POST['password'];
        $confirmPass = $_POST['con_password'];
        if ($password != $confirmPass) {
            echo '<script>alert("Password Not matches to the confirm Password.."); window.location="../Owner/register.php";</script>';
        } else {
            $Email = "SELECT * FROM `owner` WHERE own_email='$email'";
            $Phone = "SELECT * FROM `owner` WHERE own_contact='$contact'";

            $res1 = $db->executeSelect($Email);
            $res2 = $db->executeSelect($Phone);

            if (count($res2) > 0) {
                echo '<script>alert("Phone number Already Exist.."); window.location="../Owner/register.php";</script>';
                // echo 'Phone number Already Exist';
            } elseif (count($res1) > 0) {
                // echo 'Email Id Already Exist';
                echo '<script>alert("Email Id Already Exist.."); window.location="../Owner/register.php";</script>';
            } else {
                $insert = "INSERT INTO `owner`(own_name,own_age,own_contact,own_email,own_address,own_password,own_licenceno)";
                $values = " VALUES('$name','$age','$contact','$email','$address','$password','$licence')";

                $sql = $insert . $values;
                $res = $db->executeInsertAndGetId($sql);
                if ($res > 0) {
                    echo "<script>alert('Successfully Registered'); window.location.href='../Owner/login.php'</script>";
                } else {
                    // echo 'Something went wrong. Try again';
                    echo "<script>alert('Something went wrong. Try again'); window.location.href='../Owner/register.php'</script>";
                }
            }
        }
    } elseif ($command == "AddCar") {
        $name = $_POST['name'];
        $car_num = $_POST['car_num'];
        $modal = $_POST['modal'];
        $milage = $_POST['milage'];
        $capacity = $_POST['capacity'];
        $rent = $_POST['rent'];
        $description = $_POST['description'];
        // $cost = $_POST['cost'];
        $type = $_POST['type'];
        $file = $_FILES["image"];
        $rcfile = $_FILES["rc_image"];

        $randomNumber = rand(10, 9999);
        $filename = "Car-" . $randomNumber . $file["name"];
        $targetFilePath = "../Media/Cars/" . $filename;
        $tempFilePath = $file["tmp_name"];

        $rcname = "Rc-" . $randomNumber . $rcfile["name"];
        $targetPath = "../Media/Cars/" . $rcname;
        $tempPath = $rcfile["tmp_name"];


        $insert = "INSERT INTO cars(car_name,car_no,modal_no,car_rc,milage,capacity,rent,image,description,car_type,owner_id)";
        $values = " VALUES('$name','$car_num','$modal','$rcname','$milage','$capacity','$rent','$filename','$description','$type','$ownerid')";

        $sql = $insert . $values;
        $res = $db->executeInsertAndGetId($sql);
        if ($res > 0) {
            move_uploaded_file($tempFilePath, $targetFilePath);
            move_uploaded_file($tempPath, $targetPath);
            echo "<script>alert('Successfully Added'); window.location.href='../Owner/manageCars.php'</script>";
        } else {
            // echo 'Something went wrong. Try again';
            echo "<script>alert('Something went wrong. Try again'); window.location.href='../Owner/manageCars.php'</script>";
        }
    }  elseif ($command == "updateCarStatus") {
        $id = $_POST['id'];
        $flag = $_POST['flag'];
        $query = "UPDATE cars SET is_available = '$flag' WHERE car_id = '$id'";
        $res = $db->executeUpdate($query);
    } elseif ($command == "updateBikeStatus") {
        $id = $_POST['id'];
        $flag = $_POST['flag'];
        $query = "UPDATE bike SET is_available = '$flag' WHERE bike_id = '$id'";
        $res = $db->executeUpdate($query);
    } elseif ($command == "updateBookingStatus") {
        $id = $_POST['id'];
        $flag = $_POST['flag'];
        $query = "UPDATE bookings SET book_status = '$flag' WHERE bookId = '$id'";
        $res = $db->executeUpdate($query);
    }
} elseif (isset($_GET['command'])) {
    $command = $_GET['command'];
    if ($command == "Login") {
        $email = $_GET['email'];
        $password = $_GET['password'];
        $Query = "SELECT * FROM  `owner` WHERE own_email='$email' AND own_password='$password' AND is_enabled=1";
        $res = $db->executeSelect($Query);
        if (count($res) > 0) {
            $_SESSION['own_id'] = $res[0]['owner_id'];
            header('Location:../Owner/home.php');
        } else {
            echo "<script>alert('Invalid Credentials'); window.location.href='../Owner/login.php'</script>";
        }
    }
}
