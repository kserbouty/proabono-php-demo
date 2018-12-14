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

    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Mako" />

    <title>Sample SaaS</title>
</head>

<body class="d-flex flex-column">

    <div class="flex-grow-0 flex-shrink-0">

        <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between">

            <div>
                <a class="navbar-brand" href="/index.php">
                    <img src="../../assets/img/e_logo_white.png" id="img-brand" >
                </a>
            </div>

            <div>
                <ul class="navbar-nav flex-row flex-nowrap">

            <?php if (empty($user)) {?>

                    <li class="nav-item active">
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
            </div>

            <div class="flex-row flex-nowrap">

            <?php if(empty($user)) { ?>

                <div class="flex-row">
                    <a href="/page/home-auth.php">
                        <button type="button" class="btn btn-outline-success btn-sm">
                            <img src="../../assets/img/icon_padlock.png" width="20" height="20" class="d-inline-block align-top mr-1" alt="">
                            Connexion
                        </button>
                    </a>
                </div>

            <?php } else { ?>

                <div>

                    <div class="text-center">
                        <h7>Welcome <span><?= ucfirst($user->getName()); ?></span> !</h7>
                    </div>

                    <div>
                        <a href="/logout.php">
                            <button type="button" class="d-inline-flex btn btn-outline-dark btn-sm mr-2 ">
                                <img src="../../assets/img/icon_padlock.png" width="20" height="20" class="d-inline-block align-top mr-1" alt="">
                                Logout
                            </button>
                        </a>

                        <a href="../../page/portal-home.php">
                            <button type="button" class="btn btn-outline-success btn-sm">
                                My Subscription
                            </button>
                        </a>
                    </div>

                </div>

            <?php } ?>

            </div>

        </nav>

    </div>

    <div id="page" class="d-flex flex-column flex-grow-1 align-items-center">
