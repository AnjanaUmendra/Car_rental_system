<?php

include '../dbConnection.php';


    $cusId = '';
    $cusName = '';
    $cusAddress = '';
    $cusContactNo = '';
    $vehiId = '';
    $vehiNo = '';
    $engNo = '';
    $chasNo = '';
    $idNo = '';
    $startMeter = '';
    $endMeter = '';
    $Sdate = '';
    $Edate = '';
    $excost = 0;
    $amountPaid = 0;
    $advancePyd = 0;
    $totprice = 0;

   

    if (isset($_GET['id'])) {

        $contractId = $_GET["id"];
        
        $sql = "SELECT * FROM contract  
           WHERE contract_id='{$contractId}'";

            $result = mysqli_query($con,$sql); 
            if($result){
                while ($row =mysqli_fetch_assoc($result))
                {
                    
                    $vehiId = $row['vehicle_id'];
                    $cusId = $row['customer_id'];
                    $endMeter = $row['end_meter'];
                    $startMeter = $row['start_meter'];
                    $Sdate = $row['start_date'];
                    $Edate = $row['end_date'];
                    $days = $row['days'];
                    $advancePyd = $row['Advance_pyd'];

                    $sql = "SELECT * FROM customer  
                    WHERE customer_id='{$cusId}'";

                    $result = mysqli_query($con,$sql);
                    $row =mysqli_fetch_assoc($result);
                    $cusNic = $row['id_no'];
                    $cusName = $row['customer_name'];
                    $cusAddress = $row['address'];
                    $cusContactNo = $row['phone_no'];

                    $sql = "SELECT * FROM vehicle  
                    WHERE vehicle_id='{$vehiId}'";

                    $result = mysqli_query($con,$sql);
                    $row =mysqli_fetch_assoc($result);

                    $vehiNo = $row['vehicle_no'];
                    $engNo = $row['engine_no'];
                    $chasNo = $row['chassis_no'];
                    $rentalprice = $row['rental_price'];
                    $excost = $row['cost_aditional'];
                    
                    
                     $totprice = $days * $rentalprice;
                     $returnMeter = $startMeter + ($days * 250);

                    
                }

            } else {
            
            //     $sql = "INSERT INTO contract (endMeter)
            // values('$endMeter')";
            }
    
            $result = mysqli_query($con,$sql); 
            if($result){
    
    //  header("location:details-contract.php");
    //  echo "<script>'Data Inserted'</script>";
  }
  else{
     echo "<script>'Data Not Inserted'</script>";
  }   
}

?>

<?php 

      if(isset($_POST['submit'])) 
      {
         $EdateNew = $_POST['endDate'];
         $updateQuery = "UPDATE contract SET end_date = '{$EdateNew}' WHERE contract_id='{$contractId}'";
         $updateResult = mysqli_query($con, $updateQuery);

         if ($updateResult) {
             echo "Contract record updated successfully!";
             header("Location: http://localhost/projectNew/dashboard/html2pdf/bill.php?id=$contractId");
             exit();
         } else {
             echo "<script>'Data Not Inserted'</script>";
         }
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
                              <h2>Create Bill</h2>
                           </div>
                        </div>
                     </div>

                     <div class="container">
                        <div class="shadow-lg p-3 mb-5 bg-body rounded">
                        <span class="border-0">

                        <!-- <?php echo $cusId;
                        echo $idNo;
                        ?> -->
                         <button class="btn btn-primary" onclick="window.print()">Print</button>
                           <form class="form-horizontal" class="position-relative" action="#" method="POST" ><br>

                                 <div align="center"><h4>Personal Info</h4></div><br>

                                 <div class="form-group">
                                 <div class="sticky-top">
                                    <label class="control-label col-sm-4" for="customerIdNo">ID No :</label>
                                    <div class="col-sm-6">
                                          <input type="text" placeholder="Enter Cutomer ID Number" class="form-control" id="customerIdNo" name="customerIdNo" value="<?php echo $cusNic; ?>" disabled>
                                    </div>
                                 </div>
                                 </div>

                                 <div class="form-group">
                                    <label class="control-label col-sm-4" for="name">Name :</label>
                                    <div class="col-sm-8">
                                       <input type="text" class="form-control" id="name" name="name" value="<?php echo $cusName; ?>" disabled>
                                    </div>

                                 </div>
                                 <div class="form-group">
                                    <label class="control-label col-sm-4" for="address">Address :</label>
                                    <div class="col-sm-8">
                                       <input type="text" class="form-control" id="address" name="address" value="<?php echo $cusAddress; ?>"disabled>
                                    </div>
                                 </div>

                                 <div class="form-group">
                                    <label class="control-label col-sm-4" for="contactNo">Contact No :</label>
                                    <div class="col-sm-4">
                                       <input type="text" class="form-control" id="contactNo" name="contactNo" value="<?php echo $cusContactNo; ?>" disabled>
                                 </div>
                                 </div>

                                 <div align="center"><h4>Vehicle Info</h4></div><br>

                                 <div class="form-group">
                                    <label class="control-label col-sm-4" for="vehicleRegistrationNo">Vehicle Registration No :</label>
                                    <div class="col-sm-5">
                                       <input type="text" placeholder="Enter Vehicle Number" class="form-control" id="vehicleRegistrationNo" name="vehicleRegistrationNo" value="<?php echo $vehiNo; ?>" disabled>
                                 </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label col-sm-4" for="engNo">Engine No :</label>
                                    <div class="col-sm-6">
                                       <input type="text" class="form-control" id="engNo" name="engNo" value="<?php echo $engNo; ?>" disabled>
                                 </div>
                                 </div>

                                 <div class="form-group">
                                    <label class="control-label col-sm-4" for="chasNo">Chassis No :</label>
                                    <div class="col-sm-6">
                                       <input type="text" class="form-control" id="chasNo" name="chasNo" value="<?php echo $chasNo; ?>" disabled>

                                 </div>
                                 </div>

                                 <div class="form-group">
                                    <label class="control-label col-sm-4" for="startMeter">Starting Meter :</label>
                                    <div class="col-sm-6">
                                       <input type="number" placeholder="Enter Meter" class="form-control" id="startMeter" name="startMeter" value="<?php echo $startMeter; ?>" disabled>

                                 </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label col-sm-4" for="returntMeter">Return Meter :</label>
                                    <div class="col-sm-6">
                                       <input type="number" placeholder="Enter Meter" class="form-control" id="returnMeter" name="returnMeter" value="<?php echo $returnMeter; ?>" pattern="[0-9]">

                                 </div>
                                 </div>
                                 <div class="form-group">
                                 <!-- <div class="col-md-4 mb-3"> -->
                                    <label class="control-label col-sm-4" for="startDate">Start Date :</label>
                                    <div class="col-sm-4">
                                       <input type="date" class="form-control" id="startDate" name="startDate" value="<?php echo $Sdate; ?>" disabled>
                                 </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label col-sm-4" for="endDate">Return Date :</label>
                                    <div class="col-sm-4">
                                       <input type="date" class="form-control" id="endDate" name="endDate" value="<?php echo $Edate; ?>" >
                                 </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label col-sm-4" for="numOfDays">Number of Days :</label>
                                    <div class="col-sm-3">
                                       <input type="text" class="form-control" id="days" name="days" value="<?php echo $days; ?>" disabled>
                                 </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label col-sm-4" for="exCost">Extra cost for Aditional KMs :</label>
                                    <div class="col-sm-3">
                                       <input type="text" class="form-control" id="exCost" name="exCost" value="<?php echo $excost; ?>" disabled>
                                 </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label col-sm-4" for="totPay">Total Pay :</label>
                                    <div class="col-sm-3">
                                       <input type="number" class="form-control" id="totPay" name="totPay" placeholder="Rs:" value="<?php echo $totprice; ?>" disabled>
                                 </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label col-sm-4" for="advancePyd">Advance Payed :</label>
                                    <div class="col-sm-3">
                                       <input type="number" class="form-control" id="advancePyd" name="advancePyd" placeholder="Rs:" value="<?php echo $advancePyd; ?>" disabled>
                                 </div>
                                 </div>
                                 <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-1">
                                       <button type="submit" class="btn btn-info" name="submit" >Submit</button>
                                       </div>
                                    </div>

                                    <input type="text" style="display: none;" id="idNo" name="idNo" >
                                    <input type="text" style="display: none;" id="vehiId" name="vehiId" >
                                    <input type="text" style="display: none;" id="rentalprice" name="rentalprice" value="<?php echo $rentalprice; ?>">
                                    <input type="text" style="display: none;" id="excost" name="excost" value="<?php echo $excost; ?>">
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
                $("#rentalprice").val(data.vehicle ? data.vehicle.rental_price : '');
                $("#costAditional").val(data.vehicle ? data.vehicle.cost_aditional : '');
                calTotal();
            }
        });
    });

    $('#startDate, #endDate').on('change', function(e) {

      var startDate = $("#startDate").val();
      var endDate = $("#endDate").val();

         if ((startDate == "") || (endDate == "")) {
         $('#days').val(0);
         return false
         }

         var dt1 = new Date(startDate);
         var dt2 = new Date(endDate);

         var time_difference = dt2.getTime() - dt1.getTime();
         var days = time_difference / (1000 * 60 * 60 * 24);

         $('#days').val(days);

         calTotal();


});


    $('#returnMeter').on('keyup', function(e) {

         calTotal();
});
    
</script>


<script type="text/javascript">
   function calTotal() {

      let totalPrice = 0;

      let days = document.getElementById("days").value;
      let rentalprice = document.getElementById("rentalprice").value;
      let startMeter = document.getElementById("startMeter").value;
      let returnMeter = document.getElementById("returnMeter").value;
      let excost = document.getElementById("excost").value;

      let wentfar = returnMeter - startMeter;

      if (wentfar > days * 250) {
         wentfar = wentfar - (days * 250);
         totalPrice = (days * rentalprice) + (excost * wentfar);
      } else {
         totalPrice = days * rentalprice;
      }

      document.getElementById("totPay").value = totalPrice;
}
</script>

   </body>
</html>