<?php

//////// REQUIRE //////////////

require_once( __DIR__ . '/../config.php' );

///////// PARAMETERS //////////

$user = User::getCurrentUser();
$refCustomer = $user->getId();

//////// VARIABLES ////////////

$usages = new UsageList();

//////// FETCH //////////////

// If Customer's save is success, fetch usages (and ignore if failed)
$usages->fetch(null, $refCustomer, null);

//////// VIEW //////////////

include __DIR__ . '/../view/home-auth.php';



