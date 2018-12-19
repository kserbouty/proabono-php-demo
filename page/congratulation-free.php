<?php

//////// REQUIRE //////////////

require_once( __DIR__ . '/../config.php' );

///////// PARAMETERS //////////

$user = User::getCurrentUser();
$refCustomer = $user->getId();

//////// VARIABLES ////////////

$subscription = new Subscription();
$usages = new UsageList();

//////// FETCH //////////////

$response = $usages->fetchByCustomer($refCustomer);

if ($response->is_success()) {
    $response = $subscription->fetchByCustomer($refCustomer);
}

//////// VIEW //////////////

if ($response->is_success()) {
    include __DIR__ . '/../view/congratulation-free.php';
} else {
    include __DIR__ . '/../view/error.php';
}


