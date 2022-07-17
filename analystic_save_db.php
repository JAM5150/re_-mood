<?php
include("DB_connect.php");
$emotion_save_sql_result = mysqli_query($con, "INSERT INTO emotion (
		analystic
		) VALUES (
		'soso'
		)");
if($emotion_save_sql_result) {
	echo "<br />analystic INSERT success<br />";
} else {
	echo "<br />analystic INSERT fail : ";
	echo("Errormessage:". $con -> error);
}
?>