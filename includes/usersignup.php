
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>log in</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/log in.css"/>
	<script>
        function validateForm() {
            var first = document.forms['myForm']['first'].value;
            if (first == null || first == "") {
                alert("First Name must be filled !!");
                return false;
            }
            
			 var last = document.forms['myForm']['last'].value;
            if (last == null || last == "") {
                alert("last Name must be filled !!");
                return false;
            }
            var password = document.forms['myForm']['password'].value;
            if (password == null || password == "") {
                alert("Password must be filled !!");
                return false;
            }
            
        }
    </script>
</head>
<body>


    <div class="container">
            <div class="Back">
                <i class="fa fa-arrow-left" onclick="Back()"></i>
            </div>
            <p class="h2 text-center">Log in credentials</p>
<form  action = "includes/user.inc.php" method = "POST" name="myForm" onsubmit="return validateForm()">
                <div class="form-group">
                   <label for="ha">First Name:<input class="form-control" id="ha" type="text" name="first" placeholder="First Name"><br />
                    <span class="Error"></span>
                </div>
				 <div class="form-group">
<label for="hb">Last Name:<input class="form-control" id="ha" type="text" name="last" placeholder="Last Name"><br />
                    <span class="Error"></span>
                </div>
								 <div class="form-group">
<label for="hd">Contact:<input id="hd" type="text" name="contact" placeholder="Enter User Name"><br />
                    <span class="Error"></span>
                </div>			
				<div class="form-group">
<label for="hf">Email: <input id="hf" type="email" name="email" placeholder="Enter E-mail" min='10'><br />
                    <span class="Error"></span>
                </div>
<div class="form-group">
                    <label for="hf">Password: <input class="form-control" id="hf" type="password" name="password" placeholder="Enter new password" min='8'><br />

                    <span class="Error"></span>
                </div>				
				<div class="form-group">
<label for="hg">Confirm Password: <input id="hg" type="password" name="confirm" placeholder="Confirm password"><br /> </div>
                    <span class="Error"></span>
                </div>				 <div class="form-group">
<label for="ha">Last Name:<input class="form-control" id="ha" type="text" name="last" placeholder="Last Name"><br />
                    <span class="Error"></span>
                </div>
				                <div class="form-group">
                <input id="hh" type="checkbox" > <label for="hh" class="label">Remember Password for this site.</label><br />
<input id="hi" type="checkbox" required="required"> <label for="hi" class="label">Confirm that you are not a robot.</label><br />
Or do you already have an account? <a href="ARYENSIGNIN.html">Login Here</a><br />
				<button class= "btn btn-primary btn-block" type="submit" name="submit">SUBMIT</button>

                </div>
            </form>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
        
        function Back()
        {
            window.history.back();
        }
        </script>
</body>
</html>

