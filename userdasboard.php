<?php
	ob_start();
    session_start();
    if(!isset($_SESSION['Username'])){
         header("Location: login.php");
    }
    
    
?>
 
<html
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>User Dashboard Page</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
<style type="text/css">
 .success {
	border: 1px solid;
	margin: 0 auto;
	padding:10px 5px 10px 60px;
	background-repeat: no-repeat;
	background-position: 10px center;
     font-weight:bold;
     width:450px;
     color: #4F8A10;
	background-color: #DFF2BF;
	background-image:url('images/success.png');
     
}



</style>
</head>

<body>
<div class="success">Welcome , <?php echo $_SESSION['Fullname']	; ?><span class="login"> <a href="login.php">Log Out</a> </span></div>

</body>
</html>
