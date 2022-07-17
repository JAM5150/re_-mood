<?php
include("DB_connect.php");

$delete_table = 'diary';
$result = mysqli_query($con, "DELETE FROM $delete_table WHERE diary_date = '2022-07-16'");
if($result) {
	echo "<br />DELETE success<br />";
} else {
	echo "<br />DELETE fail : ";
	echo("Errormessage:". $con -> error);
}
?>