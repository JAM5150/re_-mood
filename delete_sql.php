<?php
include("DB_connect.php");

$delete_table = 'survey';
$result = mysqli_query($con, "DELETE FROM $delete_table WHERE uid = 'hellom2023@gmail.com'");
if($result) {
	echo "<br />DELETE success<br />";
} else {
	echo "<br />DELETE fail : ";
	echo("Errormessage:". $con -> error);
}
?>