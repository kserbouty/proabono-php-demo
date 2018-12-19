<?php

//////// REQUIRE //////////////

require_once( __DIR__ . '/../config.php' );

///////// PARAMETERS //////////

$user = User::getCurrentUser();
$refCustomer = $user->getId();

$refOffer = isset($_GET['refo']) ? $_GET['refo'] : null;

//////// VARIABLES ////////////

$customer = new Customer();

//////// FETCH //////////////

$customer->refCustomer = $refCustomer;

$response = $customer->save($refOffer);

if ($response->is_success()) {
    if ($refOffer) {
        $urlGrid = isset($customer->links['hosted-subscribe'])
            ? $customer->links['hosted-subscribe']
            : $customer->links['hosted-collection-offers'];
    } else {
        $urlGrid = $customer->links['hosted-collection-offers'];
    }
}

//////// VIEW //////////////

if ($response->is_success()) {
    include __DIR__ . '/../view/subscribe.php';
} else {
    include __DIR__ . '/../view/error.php';
}

