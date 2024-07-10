<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Update</title>
  </head>
  <body>

<?php

    require 'connect.php';

    $sql_select = 'select * from addresses';
    $stmt_s = $conn->prepare($sql_select);
    $stmt_s->execute();
    // echo "FoodId = ".$_GET['FoodId'];

    if (isset($_GET['id'])) {
        $sql_select_customer = 'SELECT * FROM addresses WHERE id=?';
        $stmt = $conn->prepare($sql_select_customer);
        $stmt->execute([$_GET['id']]);
        // echo "get = ".$_GET['FoodId'];
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    }

?>

    
<div class="container">
      <div class="row">
        <div class="col-md-4"> <br>
          <h3>ฟอร์มแก้ไขข้อมูลอาหาร</h3>
          <form action="updateAddress.php" method="POST">
           <input type="hidden" name="id" value="<?= $result['id'];?>">
            
                <label for="name" class="col-sm-2 col-form-label">Name :  </label>
                <input type="text" name="name" class="form-control" required value="<?php echo $result["name"]; ?>">           
            
                <label for="name" class="col-sm-2 col-form-label">Age :  </label>
                <input type="number" name="age" class="form-control" required value="<?php echo $result["age"] ?>">
                <br>

                <label for="name" class="col-sm-2 col-form-label">Age :  </label>
                <input type="text" name="street" class="form-control" required value="<?php echo $result["street"] ?>">
                <br>

                <label for="name" class="col-sm-2 col-form-label">Age :  </label>
                <input type="text" name="city" class="form-control" required value="<?php echo $result["city"] ?>">
                <br>

                <label for="name" class="col-sm-2 col-form-label">Age :  </label>
                <input type="text" name="state" class="form-control" required value="<?php echo $result["state"] ?>">
                <br>

                <label for="name" class="col-sm-2 col-form-label">Age :  </label>
                <input type="text" name="postalCode" class="form-control" required value="<?php echo $result["postalCode"] ?>">
                <br>
                
                
                <br>
            <br> <button type="submit" class="btn btn-primary">แก้ไขข้อมูล</button>
          </form>
        </div>
      </div>
    </div>

  </body>
</html>