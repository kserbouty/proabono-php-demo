<?php

//////// REQUIRE //////////////

require_once( __DIR__ . '/../../config.php' );

///////// PARAMETERS //////////

$user = User::getCurrentUser();
$refCustomer = $user->getId();
$refFeature = FEATURE_SUPPORT_24;

//////// VARIABLES ////////////

$usage = new Usage();
$displayErrorName = null;

//////// FETCH //////////////

$response = $usage->fetch($refFeature, $refCustomer);

//////// VIEW //////////////

if ($response->is_success()
    && $response->has_data()) {
    $is_enabled = $usage->is_enabled;
    include '../../view/support-24.php';
}
else {
    include __DIR__ . '/../../error/feature_update.php';
}
