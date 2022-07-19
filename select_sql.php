<?php
include("DB_connect.php");
$uid = 'hyo22that@gmail.com';
$us_data = mysqli_query($con,
		"SELECT * FROM survey WHERE uid = '$uid' AND analystic = 'angry'");
$user_data = mysqli_fetch_assoc($us_data);
echo "uid: ".$uid." survey_id: ".$user_data['survey_id']." track_id: ".$user_data['track_id'];
$msic_data = mysqli_query($con,
		"SELECT * FROM mu WHERE uid = '$uid' AND analystic = 'angry'");
$music_data = mysqli_fetch_assoc($msic_data);
?>