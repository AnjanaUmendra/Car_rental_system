<?php include '../dbConnection.php'; ?>

<?php

if(isset($_POST['submit'])){

   $vehicle_no = $_POST['vehicle_no'];
   $engine_no = $_POST['engine_no'];
   $chassis_no = $_POST['chassis_no'];
   $vehicle_type = $_POST['vehiclType'];
   $vehicle_model = $_POST['vehicle_model'];
   $vehicle_color = $_POST['vehicle_color'];
   $rental_price = $_POST['rental_price'];
   $cost_aditional = $_POST['cost_aditional'];
   $vehicle_id = $_GET['id'];
 
   if (isset($_GET['id'])) {

            $sql = "UPDATE vehicle SET vehicle_no='{$vehicle_no}', engine_no='{$engine_no}', chassis_no='{$chassis_no}', vehicle_type='{$vehicle_type}', vehicle_model='{$vehicle_model}', vehicle_color='{$vehicle_color}', rental_price='{$rental_price}',cost_aditional='{$cost_aditional}' 
               WHERE vehicle_id='{$vehicle_id}'";

         } else {
         
            $sql = "INSERT INTO vehicle ( vehicle_no, engine_no, chassis_no, vehicle_type, vehicle_model, vehicle_color, rental_price , cost_aditional) 
            values('$vehicle_no', '$engine_no', '$chassis_no', '$vehicle_type', '$vehicle_model', '$vehicle_color', '$rental_price' ,'$cost_aditional' )";
         }
        
      $result = mysqli_query($con,$sql); 
      if($result){
        
         header("location:details-vehicle.php");
      }
      else{
         echo "<script>'Data Not Inserted'</script>";
      }   
}
else{
// echo "<script>alert('Data Not Inserted')</script>";
}
?>

<?php 

$vehiId = '';
$vehiNo = '';
$engiNo = '';
$casiNo = '';
$vehiType = '';
$vehiMod = '';
$color = '';
$price = '';
$costAditional = '';
$car = '';
$bus = '';
$jeep = '';
$van = '';
$addlable = 'Add';
$btnUpdate = 'Submit';

if (isset($_GET['id'])) {

   $addlable = 'Update';
   $btnUpdate = 'Update';

   $vehiId = $_GET['id'];
   $query = "select * from vehicle where vehicle_id='{$vehiId}'";
   $result = mysqli_query($con, $query);

   if ($result) {

      $row = mysqli_fetch_assoc($result);

      $vehiNo = $row['vehicle_no'];
      $engiNo = $row['engine_no'];
      $casiNo = $row['chassis_no'];
      $vehiType = $row['vehicle_type'];
      $vehiMod = $row['vehicle_model'];
      $color = $row['vehicle_color'];
      $price = $row['rental_price'];
      $costAditional = $row['cost_aditional'];

      switch (strtolower($vehiType)) {
         case 'car':
            $car = 'selected';
            break;

         case 'van':
            $van = 'selected';
            break;

         case 'jeep':
            $jeep = 'selected';
            break;

         case 'bus':
            $bus = 'selected';
            break;
         
         default:
            // code...
            break;
      }
   }
   
} else {
   echo "Not Ok";
}

// $errors = array();

// if(isset($_POST['submit'])){
//    //checking required fields
//    if(empty($_POST['vehicle_no'])){
      
//    }
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
            <?php include 'sidebar.php';  ?>
     
            <div id="content">
     
            <?php include 'topbar.php';  ?>
         
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2><?php echo $addlable; ?> vehicle</h2>
                           </div>
                        </div>
                     </div>

 <div class="container"> 


<form class="form-horizontal" class="position-relative" action="#" method="POST" onsubmit="return validateForm()">


<div class="form-group">
    <label class="control-label col-sm-2"  for="vehicle_no">Vehicle No :</label>
    <div class="col-sm-4">
    
      <input required type="text" class="form-control" id="vehicle_no" name="vehicle_no" min="0" value="<?php echo $vehiNo; ?>">
    
  </div>
  </div>
  <div class="form-group">
  <div class="sticky-top">
    <label class="control-label col-sm-2" for="vehiType">Vehicle Type :</label>
    <div class="col-sm-8">
      <select name="vehiclType" id="vehiclType" class="form-select">
        <option value="Car" <?php echo $car; ?>>Car</option>
        <option value="Van" <?php echo $van; ?>>Van</option>
        <option value="Jeep" <?php echo $jeep; ?>>Jeep</option>
        <option value="Bus" <?php echo $bus; ?>>Bus</option>
      </select>
    </div>
  </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="vehicle_model">Vehicle Model:</label>
    <div class="col-sm-8">
      <input required type="text" class="form-control" id="vehicle_model" name="vehicle_model" placeholder="" value="<?php echo $vehiMod; ?>">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="vehicle_color">Vehicle colour :</label>
    <div class="col-sm-4">
    
      <input required type="text" class="form-control" id="vehicle_color" name="vehicle_color" value="<?php echo $color; ?>">
    
  </div>
</div>

  <!-- <div class="form-group">
    <label class="control-label col-sm-2" for="VehiReg">vehicle Registration No:</label>
    <div class="col-sm-4">
    
      <input type="text" class="form-control" id="VehiReg" name="VehiReg">
    
  </div>
  </div> -->
  <div class="form-group">
    <label class="control-label col-sm-2" for="engine_no">Engine No:</label>
    <div class="col-sm-4">
    
      <input required type="text" class="form-control" id="engine_no" name="engine_no" value="<?php echo $engiNo; ?>">
    
  </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="chassis_no">Chassis No:</label>
    <div class="col-sm-4">
    
      <input required type="text" class="form-control" id="chassis_no" name="chassis_no" value="<?php echo $casiNo; ?>">
    
  </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="rental_price">Rental price :</label>
    <div class="col-sm-4">  
      <input required type="number" class="form-control" id="rental_price" name="rental_price" value="<?php echo $price; ?>">  
  </div>
   </div>
   <div class="form-group">
      <label class="control-label col-sm-2" for="cost_aditional">Cost extra KM :</label>
      <div class="col-sm-4">  
         <input required type="number" class="form-control" id="cost_aditional" name="cost_aditional" value="<?php echo $costAditional; ?>">  
   </div>
   </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-1">
        <button type="submit" class="btn btn-info" name="submit"><?php echo $btnUpdate ?></button>
      </div>
    </div> 
</form> 
</div>
                   
      <script src="js/jquery.min.js"></script>
      <script src="js/custom.js"></script>

      <script>
      function validateForm() {

      var rentalPrice = document.getElementById('rental_price').value;
      var costAditional = document.getElementById('cost_aditional').value;


      if (Number(rentalPrice) < 0 || Number(costAditional) < 0) {
         alert('Negative numbers are not allowed');
         return false;
      } else {
         return true;
      }
   }
</script>

   </body>
</html>


