<?php
require_once '../db/db.class.php';
$db = new DB();
session_start();
if (isset($_POST['command'])) {
    $command = $_POST['command'];
    if ($command == "UpdateOwnerStatus") {
        $id = $_POST['id'];
        $flag = $_POST['flag'];
        $query = "UPDATE `owner` SET is_enabled = '$flag' WHERE owner_id = '$id'";
        $res = $db->executeUpdate($query);
    } elseif ($command == "UpdateCustomerStatus") {
        $id = $_POST['id'];
        $flag = $_POST['flag'];
        $query = "UPDATE customer SET is_enabled = '$flag' WHERE cus_id = '$id'";
        $res = $db->executeUpdate($query);
    }
} elseif (isset($_GET['command'])) {
    $command = $_GET['command'];
    if ($command == "AdminLogin") {
        $username = $_GET['username'];
        $password = $_GET['password'];
        if ($username == "Admin" && $password == "Admin") {
            header("location:../Admin/home.php");
        } else {
            echo "<script>alert('Invalid Credentials'); window.location.href='../Admin/index.php'</script>";
        }
    }
}
