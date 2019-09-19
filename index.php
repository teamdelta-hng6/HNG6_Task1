<?php



include ('connection.php');
if (isset($_POST['signup'])) {
    $error = array();//Declare An Array to store any error message  
    if (empty($_POST['fullname'])) {//if no name has been supplied 
        $error[] = 'Please Enter a Full Name ';//add to array "error"
    } else {
        $fullname = $_POST['fullname'];//else assign it a variable
    }
	 if (empty($_POST['username'])) {//if no username has been supplied 
        $error[] = 'Please Enter a Username ';//add to array "error"
    } else {
        $username = $_POST['username'];//else assign it a variable
    }

    if (empty($_POST['email'])) {
        $error[] = 'Please Enter your Email ';
    } else {


        if (preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $_POST['email'])) {
           //regular expression for email validation
            $email = $_POST['email'];
        } else {
             $error[] = 'Your EMail Address is invalid  ';
        }


    }


    if (empty($_POST['password'])) {
        $error[] = 'Please Enter Your Password ';
    } else {
        $password = $_POST['password'];
    }


    if (empty($error)) //send to Database if there's no error '

    { // If everything's OK...

        // Make sure the email address is available:
        $query_verify_email = "SELECT * FROM users  WHERE Email ='$email'";
        $result_verify_email = mysqli_query($dbc, $query_verify_email);
        if (!$result_verify_email) {//if the Query Failed ,similar to if($result_verify_email==false)
            echo ' Database Error Occured ';
        }

        if (mysqli_num_rows($result_verify_email) == 0) { // IF no previous user is using this email .


            // Create a unique  activation code:
            //$activation = md5(uniqid(rand(), true));


            $query_insert_user = "INSERT INTO `users` ( `Fullname`, `Username`, `Email`, `Password` ) VALUES ( '$fullname', '$username', '$email', '$password')";


            $result_insert_user = mysqli_query($dbc, $query_insert_user);
            if (!$result_insert_user) {
                echo 'Query Failed ';
            }

            if (mysqli_affected_rows($dbc) == 1) { //If the Insert Query was successfull.


                // Send the email:
                // $message = " To activate your account, please click on this link:\n\n";
               //  $message .= WEBSITE_URL . '/activate.php?email=' . urlencode($Email) . "&key=$activation";
                // mail($Email, 'Registration Confirmation', $message, 'From: ismaakeel@gmail.com');

                // Flush the buffered output.


                // Finish the page:
                echo '<div class="success">Thank you '.$fullname.' For Sign Up with us </div>';


            } else { // If it did not run OK.
                echo '<div class="errormsgbox">You could not be registered due to a system
error. We apologize for any
inconvenience.</div>';
            }

        } else { // The email address is not available.
            echo '<div class="errormsgbox" >That email
address has already been registered.
</div>';
        }

    } else {//If the "error" array contains error msg , display them
        
        

echo '<div class="errormsgbox"> <ol>';
        foreach ($error as $key => $values) {
            
            echo '	<li>'.$values.'</li>';


       
        }
        echo '</ol></div>';

    }
  
    mysqli_close($dbc);//Close the DB Connection

} // End of the main Submit conditional.



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Team Delta Login Page</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="container">

    <div class="signup-container">
      <div class="message padding">
        <h2 class="text"> Get Started</h2>
        <hr>
      </div>
        <form action="index.php" method="POST" class="signup padding width">

        <h2 class="account">Create an account</h2>
		<div class="form-group">
          <label for="Full Name"></label>
          <input type="text" class="input fullname" name="fullname" placeholder="Full Name" value="" required />
        </div>
        <div class="form-group">
          <label for="username"></label>
          <input type="text" class="input username" name="username" placeholder="Username" value="" required />
        </div>
        <div class="form-group">
          <label for="email"></label>
          <input type="email" class="input email" name="email" placeholder="Email" value="" required />
        </div>
        <div class="form-group">
          <label for="password"></label>
          <input type="password" class="input password" name="password" autocomplete placeholder="Password" value="" required />
        </div>
        <div class="form-group">
          <p class="question"> By clicking the Sign Up button, you agree to Team Delta's Terms and Privacy Policy</p>
        </div>
        <div class="form-group">
          <input type="submit" id="signup" class="btn" name="signup" value="Sign Up">
        </div>
        <div>
          <p class="question">Already have an acount?
            <small class="arrow">&rarr;</small>
            <span class="login"> <a href="login.php">Login</a> </span>
          </p>
        </div>
      </form>
    </div>
	
  <style type="text/css">
body {
	font-family:"Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif;
	font-size:12px;
}
.registration_form {
	margin:0 auto;
	width:500px;
	padding:14px;
}
label {
	width: 10em;
	float: left;
	margin-right: 0.5em;
	display: block
}
.submit {
	float:right;
}
fieldset {
	background:#EBF4FB none repeat scroll 0 0;
	border:2px solid #B7DDF2;
	width: 500px;
}
legend {
	color: #fff;
	background: #80D3E2;
	border: 1px solid #781351;
	padding: 2px 6px
}
.elements {
	padding:10px;
}
p {
	border-bottom:1px solid #B7DDF2;
	color:#666666;
	font-size:11px;
	margin-bottom:20px;
	padding-bottom:10px;
}
a{
    color:#0099FF;
font-weight:bold;
}

/* Box Style */


 .success, .warning, .errormsgbox, .validation {
	border: 1px solid;
	margin: 0 auto;
	padding:10px 5px 10px 50px;
	background-repeat: no-repeat;
	background-position: 10px center;
     font-weight:bold;
     width:450px;
     
}

.success {
   
	color: #4F8A10;
	background-color: #DFF2BF;
	background-image:url('images/success.png');
}
.warning {

	color: #9F6000;
	background-color: #FEEFB3;
	background-image: url('images/warning.png');
}
.errormsgbox {
 
	color: #D8000C;
	background-color: #FFBABA;
	background-image: url('images/error.png');
	
}
.validation {
 
	color: #D63301;
	background-color: #FFCCBA;
	background-image: url('images/error.png');
}



</style>
  <script src="js/validate.js"></script>
 
</body>

</html>