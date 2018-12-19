<?php

//////// REQUIRE //////////////

require_once( __DIR__ . '/../config.php' );

///////// PARAMETERS //////////

$user = User::getCurrentUser();
$validate = ((isset($_POST['validate']) ? $_POST['validate'] : 'false') == 'true');
$refCustomer = $user->getId();
$refFeature = FEATURE_TEAM_MEMBERS;
$increment = isset($_POST['increment']) ? $_POST['increment'] : null;
$remove = isset($_POST['remove']) ? $_POST['remove'] : null;

// If the remove button has been clicked, then the quantity is substracted.
if (isset($remove)) {
    $increment = -$increment;
}

//////// PROCESS //////////////

if ($validate) {
    $usage = new Usage();

    $usage->refCustomer = $refCustomer;
    $usage->refFeature = $refFeature;
    $usage->increment = $increment;

    $response = $usage->save(null);
}

//////// VIEW //////////////

// If not confirmed yet, redirect to the confirmation page
if (!$validate) {
    header('Location:../page/home-auth/team-members-validate-increment.php?increment=' . $increment);
}
else {
    if ($response->is_success()) {
        header('Location:../page/home-auth.php');
    } else {
        include '../view/error.php';
    }
}