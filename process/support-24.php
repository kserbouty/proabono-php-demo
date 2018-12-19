<?php

//////// REQUIRE //////////////

require_once( __DIR__ . '/../config.php' );

///////// PARAMETERS //////////

$user = User::getCurrentUser();
$refCustomer = $user->getId();

$validate = ((isset($_POST['validate']) ? $_POST['validate'] : 'false') == 'true');
$refFeature = FEATURE_SUPPORT_24;
$is_enabled = isset($_POST['is_enabled']) ? $_POST['is_enabled'] : 'false';

$dateStamp = date(DATE_ISO8601);

//////// PROCESS //////////////

// if confirmed
if ($validate) {

    $usage = new Usage();
    $usage->refCustomer = $refCustomer;
    $usage->refFeature = $refFeature;
    $usage->is_enabled = ($is_enabled == 'true');
    $usage->dateStamp = $dateStamp;

    // If validate return true, save usage
    $response = $usage->save($dateStamp);
}

//////// VIEW //////////////

// If not confirmed yet, redirect to the confirmation page
if (!$validate) {
    header('Location:../page/home-auth/support-24-validate.php?is_enabled=' . $is_enabled);
}
else {
    if ($response->is_success()) {
        header('Location:../page/home-auth.php');
    } else {
        include __DIR__ . '/../view/error.php';
    }
}




