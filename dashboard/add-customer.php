<?php include '../dbConnection.php'; ?>

<?php

if (isset($_POST['submit'])) {

    $id_no = $_POST['id_no'];
    $customer_name = $_POST['customer_name'];
    $address = $_POST['address'];
    $phone_no = $_POST['phone_no'];
    $customer_id = $_GET['id'];

    if (isset($_GET['id'])) {
        $sql = "UPDATE customer SET id_no='{$id_no}', customer_name='{$customer_name}', address='{$address}', phone_no='{$phone_no}' 
                 WHERE customer_id ='{$customer_id}'";
    } else {

        
        $sql = "INSERT INTO customer (customer_name, id_no, address, phone_no) 
                 VALUES ('$customer_name', '$id_no', '$address', '$phone_no')";
    }

    $result = mysqli_query($con, $sql);
    if ($result) {
        header("location:customer.php");
    } else {
        echo "<script>alert('Data Not Inserted');</script>";
    }
}

?>

<?php

$cusId = '';
$idNo = '';
$cusName = '';
$cusAddress = '';
$phoneNumber = '';

$addLabel = 'Add';
$btnUpdate = 'Submit';

if (isset($_GET['id'])) {

    $addLabel = 'Update';
    $btnUpdate = 'Update';

    $cusId = $_GET['id'];
    $query = "SELECT * FROM customer WHERE customer_id='{$cusId}'";
    $result = mysqli_query($con, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        $idNo = $row['id_no'];
        $cusName = $row['customer_name'];
        $cusAddress = $row['address'];
        $phoneNumber = $row['phone_no'];
    }
} else {
    echo "Not Ok";
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

    <script>
        function validateForm() {
            var idNo = document.getElementById('id_no').value;
            var customerName = document.getElementById('customer_name').value;
            var address = document.getElementById('address').value;
            var phoneNo = document.getElementById('phone_no').value;

            if (idNo.trim() === '') {
                alert('ID No is required');
                return false;
            }

            if (!/^(\d{9}[V|X])$/.test(idNo)) {
                alert('Invalid ID No. Please enter a valid NIC num');
                return false;
            }

            if (customerName.trim() === '') {
                alert('Name is required');
                return false;
            }

            if (!/^[A-Za-z\s]+$/.test(customerName)) {
                alert('Name cannot contain numbers');
                return false;
            }

            if (address.trim() === '') {
                alert('Address is required');
                return false;
            }

            if (phoneNo.trim() === '') {
                alert('Contact No is required');
                return false;
            }
            if (phoneNo.length !== 10) {
                alert('Phone No should have exactly 10 characters');
                return false;
            }

            return true;
        }
    </script>

 <?php include 'hide-up-down-arrows.php'; ?>
 
</head>

<body class="dashboard dashboard_1">
    <div class="full_container">
        <div class="inner_container">
            <!-- Sidebar  -->
            <?php include 'sidebar.php'; ?>

            <div id="content">
                <?php include 'topbar.php'; ?>

                <div class="midde_cont">
                    <div class="container-fluid">
                        <div class="row column_title">
                            <div class="col-md-12">
                                <div class="page_title">
                                    <h2>Customer <?php echo $addLabel; ?></h2>
                                </div>
                            </div>
                        </div>

                        <div class="container">
                            <form class="form-horizontal position-relative" action="#" method="POST" onsubmit="return validateForm()">
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="id_no">ID No:</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="id_no" name="id_no" placeholder="" value="<?php echo $idNo; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="customer_name">Name:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Enter Name" value="<?php echo $cusName; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="address">Address:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" value="<?php echo $cusAddress; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="phone_no">Contact No:</label>
                                    <div class="col-sm-3">
                                        <input type="number" class="form-control" id="phone_no" name="phone_no" placeholder="" min="0" required value="<?php echo $phoneNumber; ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-1">
                                        <button type="submit" name="submit" class="btn btn-info"><?php echo $btnUpdate ?></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

