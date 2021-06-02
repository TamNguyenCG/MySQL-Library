<?php

use App\Database\Database;
use App\Student;

include_once "../../app/database/Database.php";
include_once "../../app/Student.php";

$database = new Database();
$conn = $database->connect();

$id = $_REQUEST['id'];

$sql = "UPDATE `students` SET name = :name,address = :address,email = :email,phone = :phone WHERE id = :id";
$stmt = $conn->prepare($sql);

if ($_POST) {
    $name = $_POST['name'];
    $add = $_POST['address'];
    $email = $_POST['email'];
    $phone = (int)$_POST['phone'];

    if (empty($name) || empty($add) || empty($email) || empty($phone)) {
        echo "You must fill in all <span>*</span> marked";
    } else {
        $stmt->bindParam(":id",$id);
        $stmt->bindParam(":name",$name);
        $stmt->bindParam(":address",$add);
        $stmt->bindParam(":email",$email);
        $stmt->bindParam(":phone",$phone);
        $stmt->execute();
    }
    header("Location: ../../index.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
            integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT"
            crossorigin="anonymous"></script>
    <style>
        span {
            color: red;
        }
        div{
            width: 25%;
        }
    </style>
</head>
<body>
<form method="post">
    <div class="mb-3">
        <label class="form-label">Fullname<span>*</span></label>
        <input type="text" class="form-control" name="name" value="">
    </div>
    <div class="mb-3">
        <label class="form-label">Address<span>*</span></label>
        <input type="text" class="form-control" name="address">
    </div>
    <div class="mb-3">
        <label class="form-label">Email<span>*</span></label>
        <input type="email" class="form-control" name="email">
    </div>
    <div class="mb-3">
        <label class="form-label">Phone<span>*</span></label>
        <input type="text" class="form-control" name="phone">
    </div>
    <button type="submit" class="btn btn-primary">Edit</button>
    <a href="../../index.php">
        <button type="button" class="btn btn-primary">Back</button>
    </a>
</form>
</body>
</html>