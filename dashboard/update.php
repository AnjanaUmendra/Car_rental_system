<?php
include '../dbConnection.php';
if(isset($_POST['vehicalNo']))
{

    $vehilceNo = $_POST['vehicalNo'];
    $EngineNo = $_POST['EngineNo'];
    $ChasseNo = $_POST['ChasseNo'];
    // $vehicalType = $_POST['vehiclType'];
    $vehicalModel = $_POST['vehicalModel'];
    $vehicalColor = $_POST['vehicalColor'];
    $rentalPrice = $_POST['rentalPrice'];
    
    $sql = "UPDATE vehical SET vehicalNo='".$vehilceNo."', EngineNo = '".$EngineNo."' where vehicalNo='".$vehilceNo."";
    $result = mysqli_query($con,$sql);
    if($result)
    {
        header("location:VehicalDet.php");
    }
    else{
        echo 'Error';
    }
}
else{
    echo 'Èrror';
}
?>