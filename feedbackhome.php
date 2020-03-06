<?php

	error_reporting(1);
	include('connect.php');

	if(isset($_POST['submit']))
	{
		$add_date=date("Y-m-d h:i:sa");
		$name = $_POST['name'];
		$contactnumber = $_POST['contactnumber'];
		$email = $_POST['email'];
		$message = $_POST['message'];

			$query = "INSERT INTO feedback (`add_user`,`add_date`,`name`,`contactnumber`,`email`,`message`) VALUES('".$email."','".$add_date."','".$name."','".$contactnumber."','".$email."','".$message."')";
			
			$result = mysqli_query($conn, $query);
			
			if($result)
			{
				echo '<script> alert("Thank You For Your Valuable Feedback."); </script>';
			}
			else
			{
				echo '<script> alert("Error."); </script>';
			}
	}
	mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	 <style type="text/css">
	 	.error
	{
		color: red;
		font-size: 13px;
		font-family: sans-serif;
	}

	 </style>
</head>
<body>
	    <div class="outernav" >
  <a href="index.php" style="margin-left: 500px;">Home</a>
  	<a href="signup.php">Sign-UP</a>
  <a href="contacthome.php">Contact-Us</a>
  <a href="feedbackhome.php">Feedback</a>
  </div>
	<div class="box" style="top:30%;width: 450px;" >
		<h3> Get In Touch </h3>
	<form action="feedbackhome.php" id="myform" method="post" style="width: auto;">
		<span><i class="fa fa-user" aria-hidden="true" style="color:white;"></i></span><input type="text" name="name" placeholder="Name" style="margin-left: 10px;" autocomplete="off"><br>
		<span><i class="fa fa-envelope" aria-hidden="true" style="color:white;"></i></span><input type="text" name="email" placeholder="Email" style="margin-left: 10px;"  autocomplete="off"><br>
		<span><i class="fa fa-phone" aria-hidden="true" style="color:white;"></i></span><input type="number" name="contactnumber" placeholder="Contact number" style="margin-left: 10px;" autocomplete="off"><br>
		<span><i class="fa fa-comments" aria-hidden="true" style="color:white;"></i></span><input type="textarea" name="message" placeholder="Message" style="margin-left: 10px;" autocomplete="off">
		<div class="btn"><input type="submit" name="submit" value="Send"></div>
	</form>
    </div>	
</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js">
	
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/additional-methods.min.js"></script>
<script>
jQuery.validator.addMethod("checkemail", function(value, element) {
  // allow any non-whitespace characters as the host part
  return this.optional( element ) || /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i.test( value );
}, 'Please enter a valid email address.');


$(document).ready(function () {

    $('#myform').validate({ 
        rules: {
            name: {
                required: true,
                whitespace:true,
             	lettersonly:true,
               
            },
           email:{
            	required:true,
            	checkemail:true,
            },
              contactnumber:{
            	required:true,
            	minlength:10,
            	maxlength:10,
            	digits:true,
            },
            message: {

            	required: true,
    
        },
           
        },
        messages:{
        	name:{
        		required:"Name is required",
        		lettersonly:"Enter Letters Only",
        	},
        	email:{
        		required:"Email is required",
        		checkemail:"Enter Proper Email",

        	},
        	contactnumber:{
				required:"Phone Number is required",
				minlength:"Enter Contect-Number 10digits",
				maxlength:"Enter Contect-Number 10digits",
				digits:"Enter 10 digits",
			},
        	message: {

        		required: "Message is required",
        	},
        },
			
        });
    });
</script>

</html>