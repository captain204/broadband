<?php
session_start();
error_reporting(0);
include('includes/config.php');
if($_SESSION['code']!=''){
$_SESSION['code']='';
}
if(isset($_POST['login']))
{
    $user_code=$_POST['access_code'];
    $sql ="SELECT access_code FROM code WHERE access_code=:user_code";
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':user_code', $user_code, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
    {
        $sql ="SELECT * FROM applicant WHERE code=:code";
        $query= $dbh -> prepare($sql);
        $query-> bindParam(':code', $user_code, PDO::PARAM_STR);
        $query-> execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        if($query->rowCount() > 0)
        {
            $_SESSION['code']=$_POST['access_code'];
            echo "<script type='text/javascript'> document.location = 'confirm.php'; </script>";    
        }

        $_SESSION['code']=$_POST['access_code'];
        echo "<script type='text/javascript'> document.location = 'apply.php'; </script>";
    } else{
    
        echo "<script>alert('Invalid Access Code');</script>";

    }

}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" >    
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
    </head>
    <body class="">
        <div class="main-wrapper">
              <div class="row">
                    <h1 align="center">APPLICATION</h1>
             <div class="panel-title text-center">
                <h4>Start Application</h4>
            </div>
                                            
             <div class="panel-body p-20">

                <div class="section-title">
                     <p class="sub-title text-center">Enter Your Access code </p>
                </div>
                <form class="form-horizontal" method="post">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label"></label>
                            <div class="col-sm-4 col-sm-offset-2">
                                <input type="text" name="access_code" class="form-control" id="inputEmail3" placeholder="Access Code">
                                <button type="submit" name="login" class="btn btn-success btn-labeled pull-right">Sign in<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                            </div>
                    </div>
               </form>
            </div>
            </div>
             <!-- /.panel -->
                <p class="text-muted text-center"><small>Copyright © Nurudeen Akindele</small></p>
            </div>                         
        </section>

                    </div>
                
                </div>
              
        </div>
        <!-- /.main-wrapper -->

        <script src="js/bootstrap/bootstrap.min.js"></script>
        
    </body>
</html>
