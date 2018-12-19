<?php

//////// REQUIRE //////////////

require_once( __DIR__ . '/../config.php' );

///////// PARAMETERS //////////

$user = User::getCurrentUser(false);

// if anonymous
if (!$user) {
    $urlGrid = URL_PRICING_PUBLIC;

    include __DIR__ . '/../view/pricing.php';
}
// if authenticated
else {
    $refCustomer = $user->getId();
}

//////// VARIABLES ////////////

$customer = new Customer();

//////// FETCH //////////////

// Enable the client portal link.
$response = $customer->fetch($refCustomer);

//////// VIEW //////////////

if ($response->is_success()) {
    $urlGrid = $customer->links['hosted-collection-offers'];
    include __DIR__ . '/../view/pricing.php';
} else {
    include __DIR__ . '/../view/error.php';
}