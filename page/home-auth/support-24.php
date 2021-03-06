<?php

//////// REQUIRE //////////////

require_once( __DIR__ . '/../../config.php' );

///////// PARAMETERS //////////

$user = User::getCurrentUser();
$refCustomer = $user->getId();
$refFeature = FEATURE_SUPPORT_24;

//////// VARIABLES ////////////

$usage = new Usage();

//////// FETCH //////////////

$response = $usage->fetch($refFeature, $refCustomer);

//////// VIEW //////////////

if ($response->is_success()
    // if we have data
    && ($usage-> typeFeature)) {
    $is_enabled = $usage->is_enabled;
    include __DIR__ . '/../../view/support-24.php';
}
else {
    include __DIR__ . '/../../error/feature-unavailable.php';
}
