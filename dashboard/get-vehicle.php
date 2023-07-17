<?php

include('./../dbConnection.php');

if (isset($_POST)) {

    try{
        $vehicleRegistrationNo = $_POST['vehicleRegistrationNo'];
        $query = "SELECT * FROM vehicle WHERE vehicle_no = '$vehicleRegistrationNo'";
        $result = mysqli_query($con, $query);
    
   
        $result = [
            'vehicle' => mysqli_fetch_assoc($result),
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

