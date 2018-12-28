<?php

//////// REQUIRE //////////////

require_once('config.php');

// If the user is not connected, redirect to the login page.
$user = User::getCurrentUser(false);

///////// PARAMETERS //////////

$urlSuccess = isset($_GET['state']) ? $_GET['state'] : '/';

//////// VARIABLES ///////////

//////// FETCH /////////////

/////////// CACHING STRATEGY ///////////

if (ProAbono::$useCaching) {

    // Save Customer into ProAbono while the first connexion.
    $customer = new Customer();
    $customer->name = $user->getName();
    $customer->refCustomer = $user->getId();
    $customer->email = $user->getEmail();
    $response = $customer->save();

    // load its usages to have them cached
    $usages = new UsageList();
    $usages->fetchByCustomer($customer->refCustomer, true);
}
//////// VIEW //////////////

if ($response->is_success()) {
    header('Location: '. $urlSuccess);
} else {
    include __DIR__ . '/view/error.php';
}

