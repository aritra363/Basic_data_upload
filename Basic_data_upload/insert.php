<?php
    require "dbconnection.php";
?>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<div style='margin:0 auto;width:fit-content;'>
    <form method="POST" action="#">
        <div class="form-group">
        <label for="exampleInputText1">Name</label>
        <input type="text" class="form-control" name="name" id="exampleInputText1" required>
        </div>
        <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" class="form-control" name="email" id="exampleInputEmail1" required>
        </div>
        <div class="form-group">
        <label for="exampleInputMobile1">Mobile</label>
        <input type="number" class="form-control" name="mobile" id="exampleInputMobile1" required>
        </div>
        <div class="form-group">
        <label for="exampleInputText2">Country</label>
        <input type="text" class="form-control" name="country" id="exampleInputText2" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $country = $_POST['country'];
        $insertData = "insert into empdetails (Name, Email,Mobile,Country) VALUES ('".$name."','".$email."','".$mobile."','".$country."')";
        $result = mysqli_query($connection,$insertData);
        if ($result) {
            header("Location: index.php");
            exit;
        } else {
            echo mysqli_error($connection);
        }
    }
?>