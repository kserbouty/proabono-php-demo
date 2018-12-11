<?php

//////// REQUIRE //////////////

require_once( __DIR__ . '/../config.php' );

///////// PARAMETERS //////////

$user = User::getCurrentUser();
$validate = ((isset($_POST['validate']) ? $_POST['validate'] : 'false') == 'true');
$refCustomer = $user->getId();
$refFeature = FEATURE_TEAM_MEMBERS;
$quantity = isset($_POST['quantity']) ? $_POST['quantity'] : null;
$displayError = null;

//////// PROCESS //////////////

if ($validate) {
    $usage = new Usage();
    $usage->refCustomer = $refCustomer;
    $usage->refFeature = $refFeature;

    // Verify if the string contain only an integer
    if ((ctype_digit($quantity))) {
        $usage->quantityCurrent = $quantity;
    }

    // Verify if the string contain only an integer
    if ((!ctype_digit($quantity))) {
        $displayError = ': Text input not allowed';
        include '../view/error.php';
    }

    $response = $usage->save(null);
}

//////// VIEW //////////////

// If not confirmed yet, redirect to the confirmation page
if (!$validate) {
    header('Location:../page/home-auth/team-members-validate-quantity.php?quantity=' . $quantity);
}
else {
    if ($response->is_success()) {
        header('Location:../page/home-auth.php');
    } else {
        $displayError = 'to fetch for Team-Members';
        include '../view/error.php';
    }
}