<?php

$firstnameErr = $lastnameErr = $addressErr = $marital_statusErr 
= $educationErr=$subjectErr=$religionErr=$stateErr=$dobErr=$imageErr="";
session_start();
error_reporting(1);
include('includes/config.php');
if(strlen($_SESSION['code'])=="")
    {   
    header("Location: login.php"); 
    }
    else{
if(isset($_POST['submit']))
{

if (empty($_POST["firstname"])) {
    $firstnameErr = "firstname field is required";
} else {
    $firstname=trim(htmlspecialchars($_POST['firstname']));
    if (!preg_match("/^[a-zA-Z ]*$/", $firstname)) {
        $firstnameErr = "Only letters and white space allowed";
    }
}


if (empty($_POST["lastname"])) {
    $lastnameErr = "lastname is required";

} else {
    $lastname=trim(htmlspecialchars($_POST['lastname']));
    if (!preg_match("/^[a-zA-Z ]*$/", $lastname)) {
        $lastnameErr = "Only letters and white space allowed";
    }
}


if (empty($_POST["address"])) {
    $addressErr = "address field is required";
} else {
    $address=trim(htmlspecialchars(strtolower($_POST['address'])));
    if (!preg_match("/^[a-zA-Z ]*$/", $address)) {
        $addressErr = "Only letters and white space allowed";
    }
}

if (empty($_POST["marital_status"])) {
    $marital_statusErr = "marital status field is required";
} else {
    $marital_status=trim(htmlspecialchars(strtolower($_POST['marital_status'])));
}


if (empty($_POST["education"])) {
    $educationErr = "education field is required";
} else {
    $education=trim(htmlspecialchars(strtolower($_POST['education'])));
}


if (empty($_POST["subject"])) {
    $subjectErr = "subject field is required";
} else {  
    $subject = implode(',', $_POST['subject']);    
}

if (empty($_POST["religion"])) {
    $religionErr = "religion field is required";
} else {
    $religion=trim(htmlspecialchars(strtolower($_POST['religion'])));
}


if (empty($_POST["state"])) {
    $stateErr = "state field is required";
} else {
    $state=trim(htmlspecialchars(strtolower($_POST['state'])));
}

if (empty($_POST["dob"])) {
    $dobErr = "date of birth field is required";
} else {
    $dob=trim(htmlspecialchars(strtolower($_POST['dob'])));
}

$code = $_SESSION['code'];  


$file = $_FILES['image'];
$image_name = $_FILES['image']['name'];
/*echo $image_name;*/
$image_temp_location = $_FILES["image"]["tmp_name"];
$move_image = move_uploaded_file($image_temp_location, "./images/$image_name");

if (strlen($image_name)=="")
{
    $imageErr = "Please upload an image";
}


$sql="INSERT INTO  applicant(firstname,lastname,address,marital_status,education,subject,religion,state,date_birth,image,code) VALUES(:firstname,:lastname,:address,:marital_status,:education,:subject,:religion,:state,:dob,:image,:code)";
$query = $dbh->prepare($sql);
$query->bindParam(':firstname',$firstname,PDO::PARAM_STR);
$query->bindParam(':lastname',$lastname,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':marital_status',$marital_status,PDO::PARAM_STR);
$query->bindParam(':education',$education,PDO::PARAM_STR);
$query->bindParam(':subject',$subject,PDO::PARAM_STR);
$query->bindParam(':religion',$religion,PDO::PARAM_STR);
$query->bindParam(':state',$state,PDO::PARAM_STR);
$query->bindParam(':dob',$dob,PDO::PARAM_STR);
$query->bindParam(':image',$image_name,PDO::PARAM_STR);
$query->bindParam(':code',$code,PDO::PARAM_STR);
$query->execute();

$lastInsertId = $dbh->lastInsertId();

if($lastInsertId)
{
    $msg="Your Application was successfully submitted";
    echo "<script type='text/javascript'> document.location = 'confirm.php'; </script>";
}
else 
{
    $error="Something went wrong. Please try again";
}

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
    </head>
<body>
    <div class="container-fluid">                 
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-8 col-md-offset-2"> 
                     <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h2 class="text-center">Fill the Application Information</h2>
                            </div>
                            <?php if($msg){?>
                            <div class="alert alert-success left-icon-alert" role="alert">
                                <strong>Well done!</strong><?php echo htmlentities($msg); ?>
                            </div><?php } 
                            else if($error){?>
                            <div class="alert alert-danger left-icon-alert" role="alert">
                                <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <form  method="post"  enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="firstname">Firstname</label> 
                            <input type="text" name="firstname" class="form-control" id="firstname"  autocomplete="off" required>
                            <?php if($firstnameErr){?>
                            <div class="alert alert-danger left-icon-alert" role="alert">
                            <strong>Oh snap!</strong> <?php echo htmlentities($firstnameErr); ?>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="lastname">Lastname</label>
                            <input type="text" name="lastname" class="form-control" id="lastname" required autocomplete="off">
                            <?php if($lastnameErr){?>
                            <div class="alert alert-danger left-icon-alert" role="alert">
                            <strong>Oh snap!</strong> <?php echo htmlentities($lastnameErr); ?>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control" id="address" required autocomplete="off">
                            <?php if($addressErr){?>
                            <div class="alert alert-danger left-icon-alert" role="alert">
                            <strong>Oh snap!</strong> <?php echo htmlentities($addressErr); ?>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="marital_status">Marital Status</label>
                            <select name="marital_status" class="form-control" id="marital_status" required>
                                <option value="">Select</option>
                                <option value="single">Single</option>
                                <option value="married">Married</option>
                            </select>
                            <?php if($marital_statusErr){?>
                            <div class="alert alert-danger left-icon-alert" role="alert">
                            <strong>Oh snap!</strong> <?php echo htmlentities($marital_statusErr); ?>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="education">Education</label>
                            <select name="education" class="form-control" id="education" required> 
                                <option value="">Select</option>
                                <option value="bsc">BSC</option>
                                <option value="msc">MSC</option>
                                <option value="diploma">Diploma</option>
                                <option value="nce">NCE</option>
                            </select>
                            <?php if($educationErr){?>
                            <div class="alert alert-danger left-icon-alert" role="alert">
                            <strong>Oh snap!</strong> <?php echo htmlentities($educationErr); ?>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="subject" class="form-control">Select Best Subject</label>
                            <input type="checkbox"  name="subject[]" id="mathematics" value="Mathematics">Mathematics
                            <input type="checkbox"  name="subject[]" id="english" value="English"> English
                            <input type="checkbox"  name="subject[]" id="science" value="Science"> Science
                            <input type="checkbox"  name="subject[]" id="goverment" value="Government"> Government
                            <input type="checkbox"  name="subject[]" id="art" value="Art"> Art
                            <input type="checkbox"  name="subject[]" id="civic" value="Civic"> Civic
                            <input type="checkbox"  name="subject[]" id="computer" value="Computer"> Computer
                            <input type="checkbox"  name="subject[]" id="history" value="History"> History
                            <input type="checkbox"  name="subject[]" id="agriculture" value="Agriculture">Agriculture
                            <?php if($subjectErr){?>
                            <div class="alert alert-danger left-icon-alert" role="alert">
                            <strong>Oh snap!</strong> <?php echo htmlentities($subjectErr); ?>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="religion">Religion</label>
                            <input type="radio" name="religion" value="Islam">Islam 
                            <input type="radio" name="religion" value="Christainity">Christainity
                            <input type="radio" name="religion" value="Traditional">Traditional
                            <?php if($religionErr){?>
                            <div class="alert alert-danger left-icon-alert" role="alert">
                            <strong>Oh snap!</strong> <?php echo htmlentities($religionErr); ?>
                            </div>
                            <?php } ?>
                            
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file"  name="image" class="form-control" id="image" required>
                            <?php if($imageErr){?>
                            <div class="alert alert-danger left-icon-alert" role="alert">
                            <strong>Oh snap!</strong> <?php echo htmlentities($imageErr); ?>
                            </div>
                            <?php } ?>
                            
                        </div>
                        <div class="form-group">
                            <label for="state">State</label>
                            <select name="state" class="form-control" id="default" required>
                                <option value="">Select</option>
                                <?php $sql = "SELECT * from states";
                                $query = $dbh->prepare($sql);
                                $query->execute();
                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                if($query->rowCount() > 0)
                                {
                                foreach($results as $result)
                                {   ?>
                                <option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->name); ?></option>
                                <?php }} ?>
                            </select>
                            <?php if($stateErr){?>
                            <div class="alert alert-danger left-icon-alert" role="alert">
                            <strong>Oh snap!</strong> <?php echo htmlentities($stateErr); ?>
                            </div>
                            <?php } ?>
                            
                        </div>
                        <div class="form-group">
                            <label for="date">Date of birth</label>
                            <input type="date"  name="dob" class="form-control" id="date" required>
                            <?php if($dobErr){?>
                            <div class="alert alert-danger left-icon-alert" role="alert">
                            <strong>Oh snap!</strong> <?php echo htmlentities($dobErr); ?>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
            </div>
                                     
                </div>
            </div>
        </div>
        <!-- /.main-wrapper -->
        
        <script src="js/bootstrap/bootstrap.min.js"></script>
        
    </body>
</html>
<?PHP } ?>