<?php
include("DB_connect.php");
$uid = 'hellom2023@gmail.com';
$us_data = mysqli_query($con,
		"SELECT * FROM playlist WHERE uid = '$uid'");
$user_data = mysqli_fetch_assoc($us_data);
echo "uid: ".$uid." analystic: ".$user_data['analystic']." track_id: ".$user_data['track_id'];

?>