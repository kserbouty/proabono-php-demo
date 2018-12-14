<?php

//////// REQUIRE //////////////

require_once( __DIR__ . '/../../config.php' );

///////// PARAMETERS //////////

$user = User::getCurrentUser();
$refCustomer = $user->getId();
$refFeature = FEATURE_SIGNATURE;
$increment = isset($_GET['increment']) ? $_GET['increment'] : null;

//////// VARIABLES ////////////

$pricing = new Pricing();
$usage = new Usage();
$customer = new Customer();
$url = null;
$labelUrl = null;
$messageError = null;

//////// FETCH //////////////

$usage->refCustomer = $refCustomer;
$usage->refFeature = $refFeature;
$usage->increment = $increment;

$response = $pricing->computeForUsage($usage);

//////// VIEW //////////////

// IS SUCCESS
if ($response->is_success()) {
    include __DIR__ . '/../../view/signature-validate.php';
}
else {
    include __DIR__ . '/../../error/feature-unavailable.php';
}