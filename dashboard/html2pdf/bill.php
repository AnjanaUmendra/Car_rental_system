
<?php include '../../dbConnection.php'; ?>
<?php

$query = "select * from contract";
$result = mysqli_query($con, $query);

?>
 <?php

 $cusName ='';
 $cusAddress='';
 $cusContactNo='';
 $vehiId = '';
 $startMete = '';
 $startMeter = 0;
 $date = date("Y-m-d");
 $rentalPrice = 0;
 $totalPrice = 0;

    if (isset($_GET['id'])) {

      $contractId = $_GET["id"];
      
      $sql = "SELECT * FROM contract  
         WHERE contract_id='{$contractId}'";

          $result = mysqli_query($con,$sql); 
          if($result){
              while ($row =mysqli_fetch_assoc($result))
              {
                  $cusId = $row['customer_id'];
                  $days = $row['days'];
                  $vehiId = $row['vehicle_id'];
                  $Advance_pyd = $row['Advance_pyd'];
                

                  $sqlC = "SELECT * FROM customer  
                  WHERE customer_id='{$cusId}'";

                  $resultC = mysqli_query($con,$sqlC);
                  $rowC =mysqli_fetch_assoc($resultC);

                  $cusName = $rowC['customer_name'];
                  $cusAddress = $rowC['address'];
                  $cusContactNo = $rowC['phone_no'];
                  

                  $sqlV = "SELECT * FROM vehicle  
                  WHERE vehicle_id='{$vehiId}'";

                  $resultV = mysqli_query($con,$sqlV);
                  $rowV =mysqli_fetch_assoc($resultV);
                  
                  $vehiType = $rowV['vehicle_type'];
                  $vehiModel = $rowV['vehicle_model'];  
                  $rentalprice = $rowV['rental_price'];
                  $excost = $rowV['cost_aditional'];
                  
                  
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill</title>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<style>
    /* CSS styles for the invoice */
    body {
      font-family: Arial, sans-serif;
    }
    
    #invoice {
      max-width: 800px;
      margin: 20px auto;
      padding: 20px;
      border: 1px solid #ddd;
      background-color: #fff;
    }
    
    .invoice-header {
      text-align: center;
      margin-bottom: 20px;
    }
    
    .invoice-title {
      font-size: 24px;
      color: #333;
      margin: 0;
    }
    
    .invoice-info {
      text-align: right;
    }
    
    .invoice-details {
      margin-bottom: 20px;
    }
    
    .invoice-details h4 {
      margin: 0 0 10px;
    }
    
    .invoice-details p {
      margin: 0;
    }
    
    .invoice-table {
      width: 100%;
      border-collapse: collapse;
    }
    
    .invoice-table th,
    .invoice-table td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    
    .invoice-table th {
      background-color: #f5f5f5;
      font-weight: bold;
    }
    
    .invoice-summary {
      margin-top: 20px;
      text-align: right;
    }
    
    .invoice-summary h4 {
      margin: 0 0 10px;
    }
    
    .invoice-footer {
      margin-top: 20px;
      text-align: center;
    }
  </style>
   <script>
        function redirectToHomePage() {
            window.location.href = "http://localhost/projectNew/dashboard/dashboard.php";
        }
    </script>
</head>
<body>
  <div align="center">
<button class="btn btn-primary" onclick="window.print()">Print</button>
<button class="btn btn-primary" onclick="redirectToHomePage()">Home</button>
</div>
  <div id="invoice">
    <div class="invoice-header">
      <h1 class="invoice-title">AGRAA Rental</h1>
      <hr>
    </div>
    <div class="invoice-info">
      <p>Invoice No: <?php echo $contractId ?></p>
      <p><?php echo $date ?></p>
    </div>
    <hr>
    <div class="invoice-details">
 
      <table>
        
       <tr>
       <h4>Customer Information:</h4>
       </tr>
       <tr>
      <th>Customer Name : </th>
      
      <td><?php echo $cusName; ?></td>
      </tr>
      <tr>
      <th>Address       : </th>
      <td><?php echo $cusAddress; ?></td>
      </tr>
      <tr>
      <th>Phone          : </th>
      <td><?php echo $cusContactNo; ?></td>
      </tr>
      <!-- <tr>
      <th>Email: </th>
      <td>john.doe@example.com</td>
      </tr> -->
     
    </div>
    <br>
    </table>
    <br>
    <table class="invoice-table">
      <thead>
        <tr>
          <th>Vehicle Type</th>
          <th>Vehicle Model</th>
          <th>Rate</th>
          <th>Extra cost for 1km</th>
          <th>Days</th>
          <th>Amount(Rs.)</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?php echo $vehiType ; ?></td>
          <td><?php echo $vehiModel; ?></td>
          <td><?php echo $rentalprice; ?> per day</td>
          <td><?php echo $excost; ?></td>
          <td><?php echo $days; ?></td>
          <td><?php echo $totprice; ?></td>
          
        <!-- Add more rows for other rented items -->
      </tbody>
    </table>
    <div class="invoice-summary">
      <h4>Summary:</h4>
      <table align="right">
        
        <tr>
       <th>Sub Total : </th>
       
       <td><?php echo $totprice; ?></td>
       </tr>
       <tr>
       <th>Advance Payed      : </th>
       <td><?php echo $Advance_pyd; ?></td>
       </tr>
       <tr>
       <th>Final Total    : </th>
       <td><?php echo $totprice-$Advance_pyd; ?></td>
       </tr>
      
     <br>
     </table>

    </div>
    <div class="invoice-footer">
    <br><br><br><br><br>
      <p>Thank you for choosing our car rental service!</p>
    </div>
  </div>

  
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