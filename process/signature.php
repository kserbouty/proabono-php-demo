<?php

//////// REQUIRE //////////////

require_once( __DIR__ . '/../config.php' );

///////// PARAMETERS //////////

$user = User::getCurrentUser();
$validate = ((isset($_POST['validate']) ? $_POST['validate'] : 'false') == 'true');
$refCustomer = $user->getId();
$refFeature = FEATURE_SIGNATURE;
$increment = isset($_POST['increment']) ? $_POST['increment'] : null;

//////// PROCESS //////////////

$usage = new Usage();

// if confirmed
if ($validate) {

    $usage->refCustomer = $refCustomer;
    $usage->refFeature = $refFeature;
    $usage->increment = $increment;

    // If validate return true, save usage
    $response = $usage->save(null);

}

//////// VIEW //////////////

// If not confirmed yet, redirect to the confirmation page
if (!$validate) {
    header('Location:../page/home-auth/signature-validate.php?increment=' . $increment);
}
else {
    if ($response->is_success()) {
        header('Location:../page/home-auth.php');
    } else {
        include '../view/error.php';
    }
}





