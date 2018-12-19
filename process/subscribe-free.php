<?php

//////// REQUIRE //////////////

require_once( __DIR__ . '/../config.php' );

///////// PARAMETERS //////////

$user = User::getCurrentUser();
$refCustomer = $user->getId();

$refOffer = isset($_POST['refOffer']) ? $_POST['refOffer'] : null;

//////// PROCESS //////////////

$subscription = new Subscription();

$data = array(
    'ReferenceCustomer' => $refCustomer,
    'ReferenceOffer' => $refOffer
);

$response = $subscription->save($data);

//////// VIEW //////////////

if ($response->is_success()) {
    header('Location:../page/congratulation-free.php');
}else {
    include __DIR__ . '/../view/error.php';
}