<?php

//////// REQUIRE //////////////

require_once( __DIR__ . '/../../config.php' );

///////// PARAMETERS //////////

$user = User::getCurrentUser();
$refCustomer = $user->getId();
$refFeature = FEATURE_SIGNATURE;

//////// VARIABLES ////////////

$usage = new Usage();
$messageError = null;

//////// FETCH //////////////

$response = $usage->fetch($refFeature, $refCustomer);

//////// VIEW //////////////

if ($response->is_success()
    && $response->has_data()) {
    include __DIR__ . '/../../view/signature.php';
}
else {
    include __DIR__ . '/../../error/feature_update.php';
}