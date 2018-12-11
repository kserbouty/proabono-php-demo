<?php

//////// REQUIRE //////////////

require_once( __DIR__ . '/../../config.php' );

///////// PARAMETERS //////////

$user = User::getCurrentUser();
$refCustomer = $user->getId();
$refFeature = FEATURE_SUPPORT_24;
$is_enabled = isset($_GET['is_enabled']) ? $_GET['is_enabled'] : null;

//////// VARIABLES ////////////

$usage = new Usage();
$pricing = new Pricing();
$customer = new Customer();
$url = null;
$labelUrl = null;
$messageError = null;

//////// FETCH //////////////

// useless
$usage = new Usage();

$usage->refCustomer = $refCustomer;
$usage->refFeature = $refFeature;
$usage->is_enabled = ($is_enabled == 'true');

$response = $pricing->computeForUsage($usage);

//////// VIEW //////////////

// IS SUCCESS
if ($response->is_success()) {
    $usage->fetch($refFeature, $refCustomer);
    $is_enabled = $usage->is_enabled;
    include __DIR__ . '/../../view/support-24-validate.php';
}
else {
    include __DIR__ . '/../../error/feature_update.php';
}




