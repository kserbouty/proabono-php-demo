<?php

//////// REQUIRE //////////////
require_once('config.php');

// If the user is not connected, redirect to the login page.
$user = User::getCurrentUser(false);

///////// PARAMETERS //////////
$urlSuccess = isset($_GET['state']) ? $_GET['state'] : '/';

//////// VARIABLES ///////////

$customer = new Customer();

//////// FETCH /////////////

// Save Customer into ProAbono while the first connexion.

$customer->name = $user->getName();
$customer->refCustomer = $user->getId();
$customer->email = $user->getEmail();
$response = $customer->save();

//////// VIEW //////////////

if ($response->is_success()) {
    header('Location: '. $urlSuccess);
} else {
    include __DIR__ . '/../view/error.php';
}

