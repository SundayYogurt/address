<?php

include "./model/Address.php";
include "./model/Person.php";
require_once "connect.php"
// สร้าง instance ของ Address
// $address = new Address('123 Main St', 'Springfield', 'IL', '62701');

// สร้าง instance ของ Person โดยใช้ address ที่สร้างไว้
// $person = new Person('John Doe', 30, $address);

// echo $person;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css">
    <link rel="stylesheet" href="css/style.css">
    <title>รายการ</title>

    <style>
        .cl-h{
            text-decoration: none;
            color: #FF1805;
            transition: .3s;
        }

        .cl-h:hover{
            color: #fff;
            border-bottom: 1px solid red;
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12"> <br>
                <h2><a class="cl-h" href="index.php">Home</a></h2>
                <h3>เมนู <a href="create.php" class="btn btn-info float-end">+เพิ่มข้อมูล</a> </h3> <br/>
                <!-- <table class="table table-striped  table-hover table-responsive table-bordered"> -->
                <table id="customerTable" class="display table table-striped  table-hover table-responsive table-bordered ">

                    <thead align="center">
                        <tr>
                            <th width="10%">Name</th>
                            <th width="20%">Age</th>
                            <th width="10%">Street</th>
                            <th width="20%">City</th>
                            <th width="10%">State</th>
                            <th width="10%">Postal Code</th>
                            <th width="10%">Update</th>
                            <th width="10%">Delete</th>
                        </tr>

                    </thead>
                    <tbody align="center">
                        

                        <?php

                            $result = 'SELECT * FROM addresses';
                            $stmt = $conn->prepare($result);
                            $stmt->execute();
                            $results = $stmt->fetchAll();
                            
                            foreach ($results as $row) { ?>
                            <tr>
                                <td><?= $row['name'] ?></td>
                                <td><?= $row['age'] ?></td>
                                <td><?= $row['street'] ?></td>
                                <td><?= $row['city'] ?></td>
                                <td><?= $row['state'] ?></td>
                                <td><?= $row['postalCode'] ?></td>
                                <td><a href="updateAddressForm.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">แก้ไข</a></td>
                                <td><a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('ยืนยันการลบข้อมูล !!');">ลบ</a></td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('customerTable').DataTable();
        });
    </script>
    

</body>

</html>