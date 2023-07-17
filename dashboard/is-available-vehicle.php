<?php

include('./../dbConnection.php');

if (isset($_POST)) {

    try{
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
        $vehiId = $_POST['vehiId'];

        $query_contract = "SELECT vehicle_id FROM contract WHERE start_date >= '$startDate' AND end_date <= '$endDate' AND vehicle_id=$vehiId";
        $result_contract = mysqli_query($con, $query_contract);

        $query_booking = "SELECT booking_id FROM booking WHERE start_date >= '$startDate' AND end_date <= '$endDate' AND vehicle_id=$vehiId";
        $result_booking = mysqli_query($con, $query_booking);
    
        $query_availableS = "SELECT * FROM `contract` WHERE '$startDate' BETWEEN start_date AND end_date ";
        $result_availableS = mysqli_query($con, $query_availableS);

        $query_availableE = "SELECT * FROM `contract` WHERE '$endDate' BETWEEN start_date AND end_date ";
        $result_availableE = mysqli_query($con, $query_availableE);

        $query_availableSb = "SELECT * FROM `booking` WHERE '$startDate' BETWEEN start_date AND end_date ";
        $result_availableSb = mysqli_query($con, $query_availableSb);

        $query_availableEb = "SELECT * FROM `booking` WHERE '$endDate' BETWEEN start_date AND end_date ";
        $result_availableEb = mysqli_query($con, $query_availableEb);


        $result = [
            'contract' => mysqli_fetch_assoc($result_contract) ? true : false,
            'booking' => mysqli_fetch_assoc($result_booking) ? true : false,
            'availableS' => mysqli_fetch_assoc($result_availableS) ? true : false,
            'availableE' => mysqli_fetch_assoc($result_availableE) ? true : false,
            'availableSb' => mysqli_fetch_assoc($result_availableSb) ? true : false,
            'availableEb' => mysqli_fetch_assoc($result_availableEb) ? true : false,
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
