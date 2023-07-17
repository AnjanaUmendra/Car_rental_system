
<?php

include '../dbConnection.php';

// $idNo='';
// $vehiId='';

if (isset($_POST['submit'])) {
   
    $idNo = $_POST['idNo'];
    $cusId = $_POST['customerId'];
    $VehiReg = $_POST['vehicleRegistrationNo'];
    $vehiId =$_POST['vehiId'];
    $Sdate = $_POST['startDate'];
    $Edate = $_POST['endDate'];
    $bookingPay = $_POST['bookingPay'];
    $date = date("Y/m/d");

    // $time = $_POST['time'];

    $sql = "INSERT INTO booking (customer_id, vehicle_id, start_date, end_date, booking_pyd, created_at, updated_at)
      values('$cusId', '$vehiId', '$Sdate', '$Edate','$bookingPay', '2023-07-01 16:46:04', '2023-07-01 11:15:19')";

    $result = mysqli_query($con, $sql);
    if ($result) {
        echo '<script>alert("Data Inserted");</script>';
    } else {
        echo '<script>alert("Data Inserted");</script>';
    }
} else {
    echo "<script>'Data Not Inserted'</script>";
}
?>


<!DOCTYPE html>
<html lang="en">
   <head>

      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">

      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">

      <title>dashboard</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

      <link rel="stylesheet" href="css/bootstrap.min.css" />

      <link rel="stylesheet" href="style.css" />

      <link rel="stylesheet" href="css/responsive.css" />

      <link rel="stylesheet" href="css/color_2.css" />
      
      <?php include 'hide-up-down-arrows.php'; ?>


   </head>
   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            <?php include 'sidebar.php';?>

            <div id="content">

            <?php include 'topbar.php';?>

               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Booking</h2>
                           </div>
                        </div>
                     </div>

                     <div class="container">
                        <div class="shadow-lg p-3 mb-5 bg-body rounded">
                        <span class="border-0">

                        <?php 
                        
                        ?>
                           <form class="form-horizontal" class="position-relative" action="booking.php" method="POST" onsubmit="return checkErrorDay()"><br>

                                 <div align="center"><h4>Personal Info</h4></div><br>

                                 <div class="form-group">
                                 <div class="sticky-top">
                                    <label class="control-label col-sm-4" for="customerIdNo">ID No :</label>
                                    <div class="col-sm-6">
                                          <input type="text" placeholder="Enter Cutomer ID Number" class="form-control" id="customerIdNo" name="customerIdNo">
                                    </div>
                                 </div>
                                 </div>

                                 <div class="form-group">
                                    <label class="control-label col-sm-4" for="name">Name :</label>
                                    <div class="col-sm-8">
                                       <input type="text" class="form-control" id="name" name="name" disabled>
                                    </div>

                                 </div>
                                 <div class="form-group">
                                    <label class="control-label col-sm-4" for="address">Address :</label>
                                    <div class="col-sm-8">
                                       <input type="text" class="form-control" id="address" name="address" disabled>
                                    </div>
                                 </div>

                                 <div class="form-group">
                                    <label class="control-label col-sm-4" for="contactNo">Contact No :</label>
                                    <div class="col-sm-4">
                                       <input type="text" class="form-control" id="contactNo" name="contactNo" disabled>
                                 </div>
                                 </div>
                                 <input class="form-control" type="hidden" id="customerId" name="customerId" >
                                 <!-- <div class="form-group">
                                    <label class="control-label col-sm-4" for="email">Email :</label>
                                    <div class="col-sm-4">

                                       <input type="email" class="form-control" id="email" name="email" >

                                 </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label col-sm-4" for="drivingLisen">Driving Licence No :</label>
                                    <div class="col-sm-4">

                                       <input type="text" class="form-control" id="drivingLisen" name="drivingLisen">

                                 </div>
                                 </div> -->

                                 <div align="center"><h4>Vehicle Info</h4></div><br>

                                 <div class="form-group">
                                    <label class="control-label col-sm-4" for="vehicleRegistrationNo">Vehicle Registration No :</label>
                                    <div class="col-sm-5">
                                       <input type="text" placeholder="Enter Vehicle Number" class="form-control" id="vehicleRegistrationNo" name="vehicleRegistrationNo">
                                 </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label col-sm-4" for="engNo">Engine No :</label>
                                    <div class="col-sm-6">
                                       <input type="text" class="form-control" id="engNo" name="engNo" disabled>
                                 </div>
                                 </div>

                                 <div class="form-group">
                                    <label class="control-label col-sm-4" for="chasNo">Chassis No :</label>
                                    <div class="col-sm-6">
                                       <input type="text" class="form-control" id="chasNo" name="chasNo" disabled>
                                 </div>
                                 </div>

                                 <div class="form-group">
                                    <label class="control-label col-sm-4" for="startDate">Start Date :</label>
                                    <div class="col-sm-4">
                                       <input type="date" class="form-control" id="startDate" name="startDate">
                                 </div>
                                 </div>

                                 <div class="form-group">
                                    <label class="control-label col-sm-4" for="endDate">Return Date :</label>
                                    <div class="col-sm-4">
                                       <input type="date" class="form-control" id="endDate" name="endDate" >
                                 </div>
                                 </div>

                                 <p id="message" class="text-danger fw-bold hidden"></p>
                                 
                                 <div class="form-group">
                                    <label class="control-label col-sm-4" for="bookingPay">Booking Payment :</label>
                                    <div class="col-sm-3">
                                       <input type="float" class="form-control" id="bookingPay" name="bookingPay" placeholder="Rs:">
                                 </div>
                                 </div>
                                 <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-1">
                                       <button type="submit" class="btn btn-info" name="submit">Submit</button>
                                       </div>
                                    </div>

                                    <input type="text" style="display: none;" id="idNo" name="idNo" >
                                    <input type="text" style="display: none;" id="vehiId" name="vehiId" >
                           </form>
                        </span>
                     </div>


      <!-- <script src="js/jquery.min.js"></script> -->
      <script src="js/custom.js"></script>
      <script>
       $('#customerIdNo').on('keyup', function(e) {
        e.preventDefault();

        var customerIdNo = $(this).val();
        $.ajax({
            type: "POST",
            url: 'get-customer.php',
            data: {customerIdNo: customerIdNo},
            dataType: "JSON",
            success: function(data) {
                $("#name").val(data.customer ? data.customer.customer_name : '');
                $("#address").val(data.customer ? data.customer.address : '');
                $("#contactNo").val(data.customer ? data.customer.phone_no : '');
                $("#idNo").val(data.customer ? data.customer.id_no : '');
                $("#customerId").val(data.customer ? data.customer.customer_id : '');
            }
        });
    });

    $('#vehicleRegistrationNo').on('keyup', function(e) {
        e.preventDefault();

        var vehicleRegistrationNo = $(this).val();
        $.ajax({
            type: "POST",
            url: 'get-vehicle.php',
            data: {vehicleRegistrationNo: vehicleRegistrationNo},
            dataType: "JSON",
            success: function(data) {
                $("#engNo").val(data.vehicle ? data.vehicle.engine_no : '');
                $("#chasNo").val(data.vehicle ? data.vehicle.chassis_no : '');
                $("#vehiId").val(data.vehicle ? data.vehicle.vehicle_id : '');
            }
        });
    });

    $('#startDate, #endDate').on('change', function(e) {

         var startDate = $("#startDate").val();
         var endDate = $("#endDate").val();

            if ((startDate == "") || (endDate == "")) {
               $('#days').val(0);
               return false
            } else {
               $.ajax({
               type: "POST",
               url: 'is-available-vehicle.php',
               data: {startDate: startDate, endDate: endDate, vehiId: $('#vehiId').val()},
               dataType: "JSON",
               success: function(data) {
                  if(data.contract || data.booking || data.availableS || data.availableE  || data.availableSb || data.availableEb) {
                     $('#message').removeClass('hidden');
                     $('#message').html('Sorry. This vehicle is not available for these days.!');
                  } else {
                     $('#message').html('');
                  }
                  console.log(data);
               }
         });
            }

            var dt1 = new Date(startDate);
            var dt2 = new Date(endDate);

            var time_difference = dt2.getTime() - dt1.getTime();
            var days = time_difference / (1000 * 60 * 60 * 24);

            $('#days').val(days);

});    
</script>
<script>
   function checkErrorDay() {
   let errorday = document.getElementById("message").innerHTML;
   if (errorday == '') {
      return true;
   } else {
      return false;
   }
}
</script>
   </body>
</html>