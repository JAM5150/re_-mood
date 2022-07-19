<?php
include("DB_connect.php");
$uid = 'hyo22that@gmail.com';
$us_data = mysqli_query($con,
		"SELECT * FROM survey WHERE uid = '$uid' AND analystic = 'angry'");
$user_data = mysqli_fetch_assoc($us_data);
echo "uid: ".$uid." survey_id: ".$user_data['survey_id']." track_id: ".$user_data['track_id'];
$survey_update_sql_result = mysqli_query($con, "UPDATE survey SET track_id = '$track_id' WHERE uid = '$uid' AND analystic = '$analystic'");
?>