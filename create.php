<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Add Food</title>
    <style type="text/css">
        img {
            transition: fransform 0.25s ease;
        }

        img:hover {
            -webkit-transform: scale(1.5);
            transform: scale(1.5);
        }

        body{
            color: #FF1805;
            background-image: url(./image/bg-index1.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }

    </style>
</head>
<body>
    
    <?php
    
    require_once "connect.php";

    $sql_select = "SELECT * FROM addresses";
    $stmt_s = $conn->prepare($sql_select);
    $stmt_s->execute();

    if (isset($_POST["submit"])) {
        if (!empty($_POST['name'])) {

            $sql = "INSERT INTO addresses (id, name, age, street, city, state, postalCode) VALUES (:id, :name, :age, :street, :city, :state, :postalCode)";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":id", $_POST["id"]);
            $stmt->bindParam(":name", $_POST["name"]);
            $stmt->bindParam(":age", $_POST["age"]);
            $stmt->bindParam(":street", $_POST["street"]);
            $stmt->bindParam(":city", $_POST["city"]);
            $stmt->bindParam(":state", $_POST["state"]);
            $stmt->bindParam(":postalCode", $_POST["postalCode"]);
            
            echo '
            <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
            ';

            try {
                if ($stmt->execute()) :
                    echo '
                    <script type="text/javascript">        
                        $(document).ready(function(){
                    
                            swal({
                                title: "Success!",
                                text: "Successfuly add food",
                                type: "success",
                                timer: 2500,
                                showConfirmButton: false
                            }, function(){
                                    window.location.href = "index.php";
                            });
                        });                    
                        </script>
                    ';
                else :
                    $message = "Fail to add new Food";
                endif;
            }catch (PDOException $e) {
                echo "Fail!" . $e;
            }
            $conn = null;
        }
    }
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h3>Form add Food</h3>
                <form action="create.php" method="POST" enctype="multipart/form-data">
                    <input type="text" placeholder="ID" name="id" required>
                    <br><br>
                    <input type="text" placeholder="NAME" name="name" required>
                    <br><br>
                    <input type="text" placeholder="AGE" name="age" required>
                    <br><br>
                    <input type="text" placeholder="STREET" name="street" required>
                    <br><br>
                    <input type="text" placeholder="CITY" name="city" required>
                    <br><br>
                    <input type="text" placeholder="STATE" name="state" required>
                    <br><br>
                    <input type="text" placeholder="POSTAL CODE" name="postalCode" required>
                    <br><br>
                    <br><br>
                    <input type="submit" value="Submit" name="submit">
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#customerTable').DataTable();
        });
    </script>


</body>
</html>