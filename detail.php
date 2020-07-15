<?php
session_start();
error_reporting(1);
include('includes/config.php');
if(strlen($_SESSION['code'])=="")
{   
    header("Location: login.php"); 
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>APPLICATION< </title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
    </head>
<body class="top-navbar-fixed">
    <div class="container-fluid">                 
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                    <div class="panel-title">
                        <h5 class="text-center">APPLICANT DETAILS</h5>
                    </div>
                    <?php
                        $code = $_SESSION['code']; 
                        $sql ="SELECT * FROM applicant WHERE code=:code";
                        $query= $dbh -> prepare($sql);
                        $query-> bindParam(':code', $code, PDO::PARAM_STR);
                        $query-> execute();
                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                    if($query->rowCount() > 0)
                    {
                        foreach($results as $result)
                        {  ?>
                   <style>
                    table,
                    th,
                    td {
                        padding: 10px;
                        border: 1px solid black;
                        border-collapse: collapse;
                    }
                    </style>
                    <div class="table-responsive text-center" >
                    <table class="table">
                        <thead>
                        <tr>
                        <img src="./images/<?=$result->image?>" class="img-thumbnail" height="250" width="250"><br>
                        Dear   <?=$result->firstname?>  <?=$result->lastname?>, your application details have been received .<br> 
                        Your Access code is <?=$result->code?> . Kindly go through the details .

                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Address</td>
                            <td><?=$result->address?></td>
                        </tr>
                        <tr>
                            <td>Marital Status</td>
                            <td><?=$result->marital_status?></td>
                        </tr>
                        <tr>
                            <td>Educational Background</td>
                            <td><?=$result->education?></td>
                        </tr>
                        <tr>
                            <td>Subject</td>
                            <td><?=$result->subject?></td>
                        </tr>
                        <tr>
                            <td>Religion</td>
                            <td><?=$result->religion?></td>
                        </tr>
                        <tr>
                            <td>State</td>
                            <td><?=$result->state?></td>
                        </tr>
                        <tr>
                            <td>Date of Birth</td>
                            <td><?=$result->date_birth?></td>
                        </tr>
                        </tbody>
                    </table>
                    <button class="btn btn-primary" onclick="window.print()">Print </button>

                    </div>
                   <?php }?>
              </div>
                                     
            </div>
        </div>
    </div>
        <!-- /.main-wrapper -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>
        <script src="js/prism/prism.js"></script>
        <script src="js/select2/select2.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
<?PHP } ?>














