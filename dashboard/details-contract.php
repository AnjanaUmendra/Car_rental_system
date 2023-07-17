<?php include '../dbConnection.php'; ?>

<?php

$query = "select * from contract";
$result = mysqli_query($con, $query);

?>
<?php 

// if (isset($_GET['id'])) {

//    $cus_id = $_GET['id'];

//    $query = "DELETE FROM customer WHERE customer_id='{$cus_id}'";
//    $results = mysqli_query($con, $query);
   
//    header('location:customer.php');
// }

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
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
   
      <link rel="stylesheet" href="css/bootstrap.min.css" />
  
      <link rel="stylesheet" href="style.css" />
      
      <link rel="stylesheet" href="css/responsive.css" />

      <link rel="stylesheet" href="css/color_2.css" />

      <link rel="stylesheet" href="css/Customer.css" />

   
   </head>
   <body class="dashboard dashboard_1">

      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            <?php include 'sidebar.php';  ?>
     
            <div id="content">
     
            <?php include 'topbar.php';  ?>
         
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Contract Details</h2>
                           </div>
                        </div>
                     </div>
                     <!-- <a href="contract.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Add</a><br><br> -->
                     <table class="table" >
                     <table class="table table-hover">
                       <thead class="thead-dark">
                         <tr>
                              <th>Name  </th>
                              <th>NIC No  </th>
                              <th>Vehicle No </th>
                              <th>Strating Meter </th>
                              <th>Starting Date </th>
                              <th>Return Date </th>
                              <th>Agreement</th>
                              <th>Rental Price</th>
                              <th>Total Payement</th>
                              <!-- <th>Remain Payement</th> -->
                              <th>Final</th>

                              
                         </tr>
                      </thead>
                            <tr>
                           <?php

                           while($row = mysqli_fetch_assoc($result))
                                 {
                                    $queryV = "select * from vehicle WHERE vehicle_id='{$row['vehicle_id']}'";
                                    $resultV = mysqli_query($con, $queryV);
                                    $rowV = mysqli_fetch_assoc($resultV);

                                    $queryC = "select * from customer WHERE customer_id='{$row['customer_id']}'";
                                    $resultC = mysqli_query($con, $queryC);
                                    $rowC = mysqli_fetch_assoc($resultC);
                                 ?>
                                 <td><?php echo $rowC['customer_name']; ?></td>
                                 <td><?php echo $rowC['id_no']; ?></td>
                                 <td><?php echo $rowV['vehicle_no']; ?></td>
                                 <td><?php echo $row['start_meter']; ?></td>
                                 <td><?php echo $row['start_date']; ?></td>
                                 <td><?php echo $row['end_date']; ?></td>
                                 <?php 

                                 $days = $row['days'];
                                 $rentalPrice = $rowV['rental_price'];

                                 $totalPrice = $days * $rentalPrice;

                                  ?>
                                 <td></td>
                                 <td><?php echo $rowV['rental_price']; ?></td>
                                 <td><?php echo $totalPrice ?></td>
                                 <!-- <?php

                                 $advancePay = $row['Advance_pyd'];
                                 $rentalPrice = $rowV['rental_price'];
                                 $remainAmount = $totalPrice - $advancePay;
                                 ?> -->
                                 <!-- <td><?php echo $remainAmount ?></td> -->
                                 <td><a class="btnFinal" href="./create-bill.php?id=<?php echo $row['contract_id']; ?>">Final</a></td>

                           </tr>
                            <?php
                                 }
                            ?> 
                              </table>
                              </table>
                     
            
      <script src="js/jquery.min.js"></script>
      <script src="js/custom.js"></script>

      
     
   </body>



</html>
