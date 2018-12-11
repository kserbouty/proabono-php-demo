<?php

//////// REQUIRE //////////////

require_once( __DIR__ . '/../config.php' );

///////// PARAMETERS //////////

$user = User::getCurrentUser();
$refCustomer = $user->getId();

//////// VARIABLES ////////////

$customer = new Customer();
$usages = new UsageList();
$displayErrorName = null;

//////// FETCH //////////////

// Save Customer into ProAbono while the first connexion.
$customer->name = $user->getName();
$customer->refCustomer = $user->getId();
$customer->email = $user->getEmail();
$response = $customer->save();

// If Customer's save is success, fetch usages.
if ($response->is_success()) {
    $usages->fetch(null, $refCustomer, null);
} else {
    $displayErrorName = 'Home Authentication';
    include '../view/error.php';
}

//////// VIEW //////////////

if ($response->is_success()) {
include __DIR__ . '/../view/home-auth.php';
} else {
    $displayErrorName = 'Home Authentication';
    include __DIR__ . '/../view/error.php';
}


