<?php

//////// REQUIRE //////////////

require_once( __DIR__ . '/../config.php' );

///////// PARAMETERS //////////

$user = User::getCurrentUser();
$refCustomer = $user->getId();

//////// VARIABLES ////////////

$usages = new UsageList();
$displayErrorName = null;

//////// FETCH //////////////

// If Customer's save is success, fetch usages.
$response = $usages->fetch(null, $refCustomer, null);

//////// VIEW //////////////

if ($response->is_success()) {
include __DIR__ . '/../view/home-auth.php';
} else {
    $displayErrorName = 'Home Authentication';
    include __DIR__ . '/../view/error.php';
}


