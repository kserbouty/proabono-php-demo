<?php

//////// REQUIRE //////////////

require_once( __DIR__ . '/../../config.php' );

///////// PARAMETERS //////////

$user = User::getCurrentUser();
$refCustomer = $user->getId();
$refFeature = 'team-members';

//////// VARIABLES ////////////

$usage = new Usage();
$displayErrorName = null;

//////// FETCH //////////////

$response = $usage->fetch($refFeature, $refCustomer);

//////// VIEW //////////////

if ($response->is_success()
    // If we have data
    && ($usage-> typeFeature)) {
    include __DIR__ . '/../../view/team-members.php';
}
else {
    include __DIR__ . '/../../error/feature-unavailable.php';
}