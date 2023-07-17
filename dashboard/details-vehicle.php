<?php require_once('../dbConnection.php'); ?>

<?php

   $query = "select * from vehicle";
   $result = mysqli_query($con, $query);

?>

<?php 

   if (isset($_GET['id'])) {

      $vehicNo = $_GET['id'];

      $query = "DELETE FROM vehicle WHERE vehicle_id='{$vehicNo}'";
      $results = mysqli_query($con, $query);
      
      header('location:details-vehicle.php');
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

      <link rel="stylesheet" href="css/Custormer.css" />

      <style type="text/css">
         .btndelet {
            color: #990000;
         }
         .btndelet:hover {
            color: #ff1a1a;
         }
         .btnedit {
            color: #008000;
         }
         .btnedit:hover {
            color: #00cc00;
         }
      </style>

   
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
                              <h2>Vehicle Details</h2>
                           </div>
                        </div>
                     </div>
                     <a href="./add-vehicle.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Add</a><br><br>
                     <table class="table" >
                     <table class="table table-hover">
                       <thead class="thead-dark">
                         <tr>
                              <th>vehicle No</th>
                              <th>Engine No</th>
                              <th>Chasse No</th>
                              <th>vehicle Type</th>
                              <th>vehicle Model</th>
                              <th>vehicle Color</th>
                              <th>Rental Price</th>
                              <th>Cost Extra Km</th>
                              <th colspan="2" >Actions</th>
                         </tr>
                      </thead>
                            <tr>
                           <?php

                           while($row = mysqli_fetch_assoc($result))
                                 {
                                    $vehicle_id = $row['vehicle_id'];
                                 ?>
                                 <td><?php echo $row['vehicle_no']; ?></td>
                                 <td><?php echo $row['engine_no']; ?></td>
                                 <td><?php echo $row['chassis_no']; ?></td>
                                 <td><?php echo $row['vehicle_type']; ?></td>
                                 <td><?php echo $row['vehicle_model']; ?></td>
                                 <td><?php echo $row['vehicle_color']; ?></td>
                                 <td><?php echo $row['rental_price']; ?></td>
                                 <td><?php echo $row['cost_aditional']; ?></td>
                                 <td><a class="btnedit" href="add-vehicle.php?id=<?php echo $row['vehicle_id']; ?>">Edit</a></td>
                                 <td><a class="btndelet" href="details-vehicle.php?id=<?php echo $row['vehicle_id']; ?>">Delete</a></td>
                           </tr>
                            <?php
                                 }
                            ?> 
                              </table>
                              </table>
                              

      <script>
         function deletafun(vno) {
           if (confirm("This record will be permanently deleted, Are you sure to delete it?") == true) {
             let url = "details-vehicle.php?id="+vno;
               alert("Vehicle No "+vno);          
           } else {
               
           }
         }
      </script>
            
      <script src="js/jquery.min.js"></script>
      <script src="js/custom.js"></script>

      
     
   </body>
</html>