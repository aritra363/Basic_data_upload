<?php
  require "dbConnection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css">
    <title>BlueStack</title>
</head>
<body>
    <h2 class="heading">BlueStack</h2>
    <div class="container-fluid">
        <table class="table table-stripped table-dark">
            <thead>
              <tr>
                <th scope="col">Serial No.</th>
                <th scope="col">Name</th>
                <th scope="col">Email Id</th>
                <th scope="col">Mobile</th>
                <th scope="col">Country</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <?php
            $selectData = "select * from EmpDetails";
            $result = mysqli_query($connection,$selectData);
            if (!$result) {
              echo mysqli_error($connection);
            } else {
              $count = 0;
              echo "<tbody>";
              while($row = mysqli_fetch_assoc($result)) {
                $count++;
              echo "<tr>"; 
              echo "<th scope='row'>".$count."</th>";
              echo "<form method='POST' action='#'>";
              echo "<td><input type='text' class='form-control'  name='name' value='".$row['Name']."'></td>";
              echo "<td><input type='text' class='form-control' name='email' value='".$row['Email']."'></td>";
              echo "<td><input type='number' class='form-control' name='mobile' value='".$row['Mobile']."'></td>";
              echo "<td><input type='text' class='form-control' name='country' value='".$row['Country']."'></td>";
              echo "<input type='text' name='id' class='form-control' value='".$row['id']."' hidden>";
              echo "<td><input type='submit' name='edit' class='btn btn-primary' value='Edit'>&nbsp;&nbsp;<input type='submit' name='delete' class='btn btn-primary' value='Delete'></td>";
              echo "</form>";
              echo "</tr>";
      }
      echo "</tbody>";
    }
            ?>
            </table>    
    </div>
    <div class="new-button">
        <form action="insert.php" method="POST">
          <input type="submit" class="btn btn-info" value="New Insert"/>
        </form>
    </div>
</body>
</html>
<?php
  if (isset($_POST['delete'])) {
    $deleteId = $_POST['id'];
    $deleteData = "delete from EmpDetails where id=".$deleteId;
    $result2 = mysqli_query($connection,$deleteData);
    if (!$result2) {
      echo mysqli_error($connection);
    } else {
      header("Location:index.php");
      exit;
    }
  }
  if (isset($_POST['edit'])) {
    $editId = $_POST['id'];
    $editData = "update empDetails set Name = '".$_POST['name']."',Email = '".$_POST['email']."',Mobile = '".$_POST['mobile']."',Country = '".$_POST['country']."' where id=".$editId;
    $result3 = mysqli_query($connection,$editData);
    if (!$result3) {
      echo mysqli_error($connection);
    } else {
      header("Location:index.php");
      exit;
    }
  }
?>