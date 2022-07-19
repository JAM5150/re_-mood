<?php
include("DB_connect.php");
$db_song_data = mysqli_query($con,
		"SELECT * FROM survey ");
$song_data = mysqli_fetch_assoc($db_song_data);
echo $song_data['survey_id'];
?>