<?php

//logout.php

include('config.php');

//Reset OAuth access token
$google_client->revokeToken();

//Destroy entire session data.
session_unset();

//redirect page to index.php
header('location:index.php');

?>