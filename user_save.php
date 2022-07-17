<?php
include("DB_connect.php");
$uid = $_SESSION['user_email_address'];
$userdata_save_sql_result = mysqli_query($con, "INSERT INTO user (
		uid,
		is_noti
		) VALUES (
		'$uid',
		false
		)");
if($userdata_save_sql_result) {
	echo "<br />user INSERT success<br />";
} else {
	echo "<br />user INSERT fail : ";
	echo("Errormessage:". $con -> error);
}

?>