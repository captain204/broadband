
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>APPLICATION< </title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" >
        <link rel="stylesheet" href="css/select2/select2.min.css" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
    </head>
<body class="top-navbar-fixed">
    <div class="container-fluid">                 
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                    <div class="panel-title">
                        <h5>Fill the Application info</h5>
                    </div>
              </div>
            <form class="form-horizontal" method="post">
                <div class="form-group">
                    <label for="default" class="col-sm-2 control-label">Firstname</label>
    <div class="col-sm-10">
    <input type="text" name="firstname" class="form-control" id="firstname" required="required" autocomplete="off">
    </div>
    </div>
    <div class="form-group">
    <label for="default" class="col-sm-2 control-label">Lastname</label>
    <div class="col-sm-10">
    <input type="text" name="lastname" class="form-control" id="lastname" required="required" autocomplete="off">
    </div>
    </div>
    <div class="form-group">
    <label for="default" class="col-sm-2 control-label">Address</label>
    <div class="col-sm-10">
    <input type="text" name="address" class="form-control" id="address" required="required" autocomplete="off">
    </div>
    </div>


<div class="form-group">
<label for="default" class="col-sm-2 control-label">Marital Status</label>
<div class="col-sm-10">
 <select name="class" class="form-control" id="default" required="required">
    <option value="">Single</option>
    <option value="">Married</option>
 </select>
</div>
</div>
<div class="form-group">
    <label for="default" class="col-sm-2 control-label">Education</label>
    <div class="col-sm-10">
    <input type="text" name="education" class="form-control" id="educaton" required="required" autocomplete="off">
    </div>
</div>


<div class="form-group">
    <label for="default" class="col-sm-2 control-label">Select Best Subject</label>
    <div class="col-sm-10">
    <input type="checkbox"  name="subject" id="mathematics" value="Mathematics">
    <input type="checkbox"  name="subject" id="english" value="English">
    <input type="checkbox"  name="subject" id="science" value="Science">
    <input type="checkbox"  name="subject" id="goverment" value="Government">
    <input type="checkbox"  name="subject" id="art" value="Art">
    <input type="checkbox"  name="subject" id="civic" value="Civic">
    <input type="checkbox"  name="subject" id="computer" value="Computer">
    <input type="checkbox"  name="subject" id="history" value="History">
    <input type="checkbox"  name="subject" id="history" value="History">
    <input type="checkbox"  name="subject" id="agriculture" value="Agriculture">
    </div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Religion</label>
<div class="col-sm-10">
    <input type="radio" name="gend" value="Male" required="required" checked="">Islam 
    <input type="radio" name="gender" value="Female" required="required">Christainity
    <input type="radio" name="gender" value="Other" required="required">Traditional
</div>
</div>



<div class="form-group">
<label for="default" class="col-sm-2 control-label">State</label>
<div class="col-sm-10">
 <select name="class" class="form-control" id="default" required="required">
    <option value="">SELECT</option>
 </select>
</div>
</div>

<div class="form-group">
<label for="date" class="col-sm-2 control-label">DOB</label>
<div class="col-sm-10">
    <input type="date"  name="dob" class="form-control" id="date">
 </div>
</div>

 <div class="form-group">
 <div class="col-sm-offset-2 col-sm-10">
<button type="submit" name="submit" class="btn btn-primary">Submit</button>
</div>
</div>
</form>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-12 -->
                                </div>
                    </div>
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->
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
        <script>
            $(function($) {
                $(".js-states").select2();
                $(".js-states-limit").select2({
                    maximumSelectionLength: 2
                });
                $(".js-states-hide").select2({
                    minimumResultsForSearch: Infinity
                });
            });
        </script>
    </body>
</html>
<?PHP } ?>
