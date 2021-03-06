<?php

//////// REQUIRE //////////////

require_once( __DIR__ . '/../config.php');

///////// PARAMETERS //////////

$user = User::getCurrentUser();
$refCustomer = $user->getId();

//////// VARIABLES ////////////

$customer = new Customer();

//////// FETCH //////////////

// Enable the client portal link.
$response = $customer->fetch($refCustomer);

//////// VIEW //////////////

if ($response->is_success()) {
    include __DIR__ . '/../view/portal-register.php';
} else {
    include __DIR__ . '/../view/error.php';
}