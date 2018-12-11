<?php

//////// REQUIRE //////////////
require_once('config.php');

// If the user is not connect, redirect to the login page.
$user = User::getCurrentUser(false);

///////// PARAMETERS //////////
$url = isset($_GET['state']) ? $_GET['state'] : '/';

//////// VARIABLES ///////////


//////// FETCH /////////////


//////// VIEW //////////////

header('Location: '. $url);
