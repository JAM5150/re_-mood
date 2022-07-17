<?php

//index.php

//Include Configuration File
include('config.php');
include("DB_connect.php");
$login_button = '';

//This $_GET["code"] variable value received after user has login into their Google Account redirct to PHP script then this variable value has been received
if(isset($_GET["code"]))
{
	//It will Attempt to exchange a code for an valid authentication token.
	$token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
	
	//This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
	if(!isset($token['error']))
	{
		//Set the access token used for requests
		$google_client->setAccessToken($token['access_token']);
		
		//Store "access_token" value in $_SESSION variable for future use.
		$_SESSION['access_token'] = $token['access_token'];
		
		//Create Object of Google Service OAuth 2 class
		$google_service = new Google_Service_Oauth2($google_client);
		
		//Get user profile data from google
		$data = $google_service->userinfo->get();
		
		//Below you can find Get profile data and store into $_SESSION variable
		if(!empty($data['given_name']))
		{
			$_SESSION['user_first_name'] = $data['given_name'];
		}
		
		if(!empty($data['family_name']))
		{
			$_SESSION['user_last_name'] = $data['family_name'];
		}
		
		if(!empty($data['email']))
		{
			$_SESSION['user_email_address'] = $data['email'];
		}
		
		if(!empty($data['gender']))
		{
			$_SESSION['user_gender'] = $data['gender'];
		}
		
		if(!empty($data['picture']))
		{
			$_SESSION['user_image'] = $data['picture'];
		}
	}
}

$user_data = mysqli_fetch_assoc($db_user_data);
//This is for check user has login into system by using Google account, if User not login into system then it will execute if block of code and make code for display Login link for Login using Google account.
if(!isset($_SESSION['access_token']))
{
	//Create a URL to obtain user authorization
	$login_button = '<a href="'.$google_client->createAuthUrl().'"><img src="css\Google_login.png" /></a>';
}else{
	//�������� ��� �˻�
	$post_email = $_SESSION['user_email_address'];
	$db_user_data = mysqli_query($con,
			"SELECT uid FROM survey WHERE uid= '$post_email'");
	$user_data = mysqli_num_rows($db_user_data);
	if($user_data < 5) {
		header('Location: survey_html.php');
	}
	else if($user_date == 5){
	header('Location: old_diary_test.php');
	}
}

?>
<html lang="ko">
<head>
  <meta charset="utf-8">
	<title>Login to #MOOD</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1' name='viewport'/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/login.css">
</head>
<body>
<!-- <form action="login_test.php" method="post"> -->

<div class="container">
  <button id="login_button" type="button" class="login">Sign with Google</button>
  <img src="css\Google_Logo.png" alt="Google">
  <?php
   if($login_button == '')
   {
    echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
    echo '<img src="'.$_SESSION["user_image"].'" class="img-responsive img-circle img-thumbnail" />';
    echo '<h3><b>Name :</b> '.$_SESSION['user_first_name'].' '.$_SESSION['user_last_name'].'</h3>';
    echo '<h3><b>Email :</b> '.$_SESSION['user_email_address'].'</h3>';
    echo '<h3><a href="logout.php">Logout</h3></div>';
   }
   else
   {
    echo '<div align="center">'.$login_button . '</div>';
   }
   ?>
</div>


<!-- </form> -->

</body>
</html>