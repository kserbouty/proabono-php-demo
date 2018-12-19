<?php

//////// REQUIRE //////////////

require_once( __DIR__ . '/../../config.php' );

///////// PARAMETERS //////////

$user = User::getCurrentUser();
$increment = isset($_GET['increment']) ? $_GET['increment'] : null;
$refCustomer = $user->getId();
$refFeature = FEATURE_TEAM_MEMBERS;

//////// VARIABLES ////////////

$usage = new Usage();
$pricing = new Pricing();
$customer = new Customer();
$url = null;
$labelUrl = null;

//////// FETCH //////////////

$usage->refCustomer = $refCustomer;
$usage->refFeature = $refFeature;
$usage->increment = $increment;

$response = $pricing->computeForUsage($usage);

//////// VIEW //////////////

// IS SUCCESS
if ($response->is_success()) {
    include __DIR__ . '/../../view/team-members-validate-increment.php';
}
else {
    include __DIR__ . '/../../error/feature-unavailable.php';
}





