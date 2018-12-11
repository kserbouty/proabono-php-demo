<?php

require_once( __DIR__ . '/../../config.php' );

// Navbar need $user to works, else create the user here.
$user = isset($user) ? $user : User::getCurrentUser(false);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/assets/style.css">
    <title>E-Corporation</title>
</head>

<nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar-top">

    <div class="container">

        <?php if (empty($user)) {?>

        <a class="navbar-brand" href="/index.php">
            <img src="../../assets/img/e_logo_white.png" id="img-brand" >
        </a>

        <?php } else { ?>

        <a class="navbar-brand" href="/index.php">
            <img src="../../assets/img/e_logo_white.png" id="img-brand" >
        </a>

        <?php } ?>

        <ul class="navbar-nav" id="nav-center">

        <?php if (empty($user)) {?>

            <li class="nav-item active pl-3">
                <a class="nav-link" href="/page/pricing.php">Pricing</a>
            </li>

        <?php } else { ?>

            <li class="nav-item active">
                <a class="nav-link" href="/page/home-auth.php">Home</a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="/page/home-auth/team-members.php">Team Members</a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="/page/home-auth/signature.php">Sign Document</a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="/page/home-auth/support-24.php">Support 24</a>
            </li>

        <?php } ?>

        </ul>

        <ul class="navbar-nav" id="nav-right">

        <?php if(empty($user)) { ?>

        <div class="flex-row ml-2">
            <a href="/page/home-auth.php">
                <button type="button" class="btn btn-outline-success btn-sm">
                    <img src="../../assets/img/icon_padlock.png" width="20" height="20" class="d-inline-block align-top mr-1" alt="">
                    Connexion
                </button>
            </a>
        </div>

        <?php } else { ?>

            <div class="flex-row ml-2">

                <p class="text-center">Welcome <span><?= ucfirst($user->getName()); ?></span> !</p>

                <a href="/logout.php">
                    <button type="button" class="btn btn-outline-dark btn-sm">
                        <img src="../../assets/img/icon_padlock.png" width="20" height="20" class="d-inline-block align-top mr-1" alt="">
                        Logout
                    </button>
                </a>

                <a href="../../page/portal-home.php">
                    <button type="button" class="btn btn-outline-success btn-sm ml-2">
                        My Subscription
                    </button>
                </a>

            </div>

        <?php } ?>

        <div>
    </div>
</nav>

<body>