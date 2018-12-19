<?php

//////// REQUIRE //////////////

require_once( __DIR__ . '/../config.php' );

///////// PARAMETERS //////////

$user = User::getCurrentUser();
$refCustomer = $user->getId();

$refOffer = isset($_GET['refo']) ? $_GET['refo'] : null;
$idSubscription = isset($_GET['idsu']) ? $_GET['idsu'] : null;
$idCustomer = isset($_GET['idc']) ? $_GET['idc'] : null;

//////// VARIABLES ////////////

$subscription = new Subscription();
$usages = new UsageList();

//////// FETCH //////////////

$response = $usages->validateSubscription($refCustomer, $idCustomer, $idSubscription);

if ($response->is_success()) {
    $response = $subscription->fetchById($idSubscription);
}

//////// VIEW //////////////

if ($response->is_success()) {
    include __DIR__ . '/../view/congratulation.php';
} else {
    include __DIR__ . '/../view/error.php';
}