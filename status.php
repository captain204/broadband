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
        
    </head>
<body class="top-navbar-fixed">
    <div class="container-fluid">                 
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
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
                    <div class="panel-title">
                        <h5 class="text-center">APPLICANT STATUS</h5>
                    </div>
                                            
                    <p class="text-center">
                        <img src="./images/<?=$result->image?>" class="img-thumbnail" height="250" width="250"><br>
                        I  <?=$result->firstname?> <?=$result->lastname?>  , applied  with the application  code .<?=$result->code?><br>
                        I live at <?=$result->address?> and I was born on <?=$result->date_birth?>
                        My favourite subjects are <?=$result->subject?>.<br>
                        <a href="confirm.php" class="btn btn-info"> Back </a>
                    </p>
                   <?php }?>
              </div>
                                     
            </div>
        </div>
    </div>
        <!-- /.main-wrapper -->
        <script src="js/bootstrap/bootstrap.min.js"></script>
    </body>
</html>
<?PHP } ?>