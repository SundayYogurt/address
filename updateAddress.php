<?php


if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['age']) && isset($_POST['street'])) {
    require_once "connect.php";

    $Id = $_POST['id'];
    $Name = $_POST['name'];
    $Age = $_POST['age'];
    $Street = $_POST['street'];
    $City = $_POST['city'];
    $State = $_POST['state'];
    $PostalCode = $_POST['postalCode'];
    

    echo 'ID = ' . $Id;
    echo 'Name = ' . $Name;
    echo 'Age = ' . $Age;
    echo 'Street = ' . $Street;
    echo 'City = ' . $City;
    echo 'State = ' . $State;
    echo 'PostalCode = ' . $PostalCode;

    $sql = "UPDATE addresses SET name = :name, age = :age, street = :street, city = :city, state = :state, postalCode = :postalCode WHERE id = :id";
    $stmt = $conn->prepare($sql);
    
    $stmt->bindParam(":name", $_POST["name"]);
    $stmt->bindParam(":age", $_POST["age"]);
    $stmt->bindParam(":street", $_POST["street"]);
    $stmt->bindParam(":city", $_POST["city"]);
    $stmt->bindParam(":state", $_POST["state"]);
    $stmt->bindParam(":postalCode", $_POST["postalCode"]);
    $stmt->bindParam(":id", $_POST["id"]);
    $stmt->execute();
    

    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    if ($stmt) {
        echo '
        <script type="text/javascript">
        
        $(document).ready(function(){
        
            swal({
                title: "Success!",
                text: "Successfuly update customer information",
                type: "success",
                timer: 2500,
                showConfirmButton: false
              }, function(){
                    window.location.href = "index.php";
              });
        });
        
        </script>
        ';
    }
    $conn = null;
}
