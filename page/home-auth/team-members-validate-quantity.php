<?php

//////// REQUIRE //////////////

require_once( __DIR__ . '/../../config.php' );

///////// PARAMETERS //////////

$user = User::getCurrentUser();
$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : null;
$refCustomer = $user->getId();
$refFeature = FEATURE_TEAM_MEMBERS;

//////// VARIABLES ////////////

$usage = new Usage();
$pricing = new Pricing();
$customer = new Customer();
$url = null;
$labelUrl = null;
$messageError = null;

//////// FETCH //////////////

$usage->fetch($refFeature, $refCustomer);

$usage->refCustomer = $refCustomer;
$usage->refFeature = $refFeature;
$usage->quantityCurrent = $quantity;

$response = $pricing->computeForUsage($usage);

//////// VIEW //////////////

// IS SUCCESS
if ($response->is_success()) {
    include __DIR__ . '/../../view/team-members-validate-quantity.php';
}
else {
    include __DIR__ . '/../../error/feature-unavailable.php';
}

