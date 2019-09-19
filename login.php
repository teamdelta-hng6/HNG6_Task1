<?php



include ('connection.php');
if (isset($_POST['login'])) {
    // Initialize a session:
session_start();
    $error = array();//this aaray will store all error messages
  

    if (empty($_POST['email'])) {//if the email supplied is empty 
        $error[] = 'You forgot to enter  your Email ';
    } else {


        if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST['email'])) {
           
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


       if (empty($error))//if the array is empty , it means no error found
    { 

       

        $query_check_credentials = "SELECT * FROM users WHERE (Email='$email' AND Password='$password')";
   
        

        $result_check_credentials = mysqli_query($dbc, $query_check_credentials);
        if(!$result_check_credentials){//If the QUery Failed 
            echo 'Query Failed ';
        }

        if (@mysqli_num_rows($result_check_credentials) == 1)//if Query is successfull 
        { // A match was made.

           


            $_SESSION = mysqli_fetch_array($result_check_credentials, MYSQLI_ASSOC);//Assign the result of this query to SESSION Global Variable
           
            header("Location: userdasboard.php");
          

        }else
        { 
            
            $msg_error= 'Either Your Account is inactive or Email address /Password is Incorrect';
        }

    }  else {
        
        

echo '<div class="errormsgbox"> <ol>';
        foreach ($error as $key => $values) {
            
            echo '	<li>'.$values.'</li>';


       
        }
        echo '</ol></div>';

    }
    
    
    if(isset($msg_error)){
        
        echo '<div class="warning">'.$msg_error.' </div>';
    }
    /// var_dump($error);
    mysqli_close($dbc);

} // End of the main Submit conditional.



?>
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
	<div class="signin-container">
      <div class="message padding">
        <h2 class="text"> TEAM DELTA</h2>
        <hr>
      </div>
      <form action="login.php" method="POST" class="signin padding width">

        <h2 class="account">Sign in</h2>
        <div class="form-group">
          <label for="email"></label>
          <input type="email" class="input email" name="email" placeholder="Email" value="" required />
        </div>
        <div class="form-group">
          <label for="password"></label>
          <label for="password"></label>
          <input type="password" class="input password" name="password" autocomplete placeholder="Password" value="" required />
        </div>
        <div class="form-group">
        </div>
        <div class="form-group">
          <input type="submit" id="login" class="btn" name="login" value="Login">
        </div>
        <div class="form-group inline">
          <input type="checkbox" name="check" id="checkbox">
          <label for='checkbox'>Remember Me</label>
        </div>
        <div class="form-group">
          <p class="question">
            <small class="arrow">&rarr;</small>
            <span class="create"><a href="index.php">Create new account</a></span>
          </p>
        </div>
      </form>
    </div>

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
  <script src="js/plugin.js"></script>
</body>

</html>