<?php

//////// REQUIRE //////////////

require_once('../config.php');

///////// PARAMETERS //////////

$user = User::getCurrentUser();
$refCustomer = $user->getId();

//////// VARIABLES ////////////

$customer = new Customer();
$messageError = null;

//////// FETCH //////////////

// Enable the client portal link.
$response = $customer->fetch($refCustomer);

//////// VIEW //////////////

/*
$response = new Response();
$response->status = 403;
$response->error = new ProAbonoError();
$response->error->code = 'code.code';
$response->error->message = ' jesuis une erreur';
*/

if ($response->is_success()) {
    include __DIR__ . '/../view/portal-home.php';
} else {
    $messageError = 'Portal Home'; //TODO: Une erreur est survenue.
    include __DIR__ . '/../view/error.php';
}