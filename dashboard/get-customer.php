<?php

include('./../dbConnection.php');

if (isset($_POST)) {

    try{
        $customerIdNo = $_POST['customerIdNo'];
        $query = "SELECT * FROM customer WHERE id_no = '$customerIdNo'";
        $result = mysqli_query($con, $query);
    
   
        $result = [
            'customer' => mysqli_fetch_assoc($result),
        ];
    
        echo json_encode($result);
        exit();
    } catch (Exception $e) {
        echo json_decode(0);
        exit();
    }

} else {

    echo json_decode(0);
    exit();
}
?>
