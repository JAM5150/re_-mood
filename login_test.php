<?php
if(!session_id()) {
	// id가 없을 경우 세션 시작
	session_start();
}
include("logout_test.php");
include("DB_connect.php");
$post_email = $_POST['email'];
$_SESSION['uid'] = $post_email;
$db_user_data = mysqli_query($con,
		"SELECT uid FROM user WHERE uid= '$post_email'");
$user_data = mysqli_fetch_assoc($db_user_data);
// printf($user_data['uid']);

if($user_data == NULL) {
	 echo "if> success";
	include("user_save.php");
}

else {

	 echo "else > success";
}

?>
