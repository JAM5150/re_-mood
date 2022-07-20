<?php
include("DB_connect.php");

$delete_table = 'survey';
$result = mysqli_query($con, "DELETE FROM $delete_table WHERE uid = 'hellom2023@gmail.com' AND analystic = 'angry' AND track_id = 'DTJqDCMHOTmMBukznE'");
if($result) {
	echo "<br />DELETE success<br />";
} else {
	echo "<br />DELETE fail : ";
	echo("Errormessage:". $con -> error);
}
?>