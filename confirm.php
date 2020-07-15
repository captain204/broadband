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
                        <h5 class="text-center">Congratulations</h5>
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
                        
                    <p class="text-center">Dear  <?=$result->firstname?>  <?=$result->lastname?>” ,<br>
                    Your application with the access code   <?=$result->code?> is successful.<br>
                    Kindly print Application status and Application Details by clicking the buttons below.<br>
                        <a href="status.php" class="btn btn-danger"> Aplication Status </a>
                        <a href="detail.php" class="btn btn-info"> Aplication Detail</a>
                    </p>
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