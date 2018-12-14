<?php include 'layout/header.php'; ?>

<div class="container m-auto">

    <div class="d-flex justify-content-between" >

        <div class="p-4 jumbotron" style="width: 60%">

            <div class="p-2">
                <h2 class="text-center">
                    About us
                </h2>
            </div>

            <div class="p-2">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Nulla mattis ex enim, at dignissim nunc auctor ac.
                    Ut commodo et ex sed vestibulum. Fusce sit amet mollis ligula, nec dignissim mi.
                    Praesent egestas et lacus nec placerat.
                    Quisque pretium, sem sit amet lacinia egestas, arcu ex vehicula elit, ac vestibulum
                    ipsum est quis diam. Vestibulum quis scelerisque justo. Sed dictum sem eros,
                    a sagittis elit dapibus eu. Nulla porta enim sed nunc laoreet, eu condimentum felis tristique.
                    Cras non dignissim nunc.
                </p>
            </div>

        </div>

        <div class="p-5 jumbotron" style="width: 30%">

            <h4 class="text-center pb-2">Overview</h4>

            <hr>

            <?php if(isset($usages)
                && ($usages->totalItems > 0)) {

                foreach ($usages as $usage) {

                    // Case Feature Team Members available:
                    if ($usage->refFeature === 'team-members') { ?>

                        <h5>
                            Team members:

                            <a href="../page/home-auth/team-members.php?refCustomer=<?= $user->getId(); ?>&refFeature=<?= $usage->refFeature ?>">
                                <?= Tools::usageToString($usage) ?>
                            </a>
                        </h5>

                    <?php }

                    // Case Feature Signature available:
                    if ($usage->refFeature === 'signature') { ?>

                        <h5>
                            Signature:

                            <a href="../page/home-auth/signature.php?refCustomer=<?= $user->getId(); ?>&refFeature=<?= $usage->refFeature ?>">
                                <?= Tools::usageToString($usage) ?>
                            </a>
                        </h5>

                    <?php }

                    // Case Support-24:
                    if ($usage->refFeature === 'support-24') { ?>

                        <h5>
                            Support 24h/24:

                            <a href="../page/home-auth/support-24.php?refCustomer=<?= $user->getId(); ?>&refFeature=<?= $usage->refFeature ?>">
                                <?= Tools::usageToString($usage) ?>
                            </a>
                        </h5>

                    <?php }
                }
            }

            // If not suscribed
            else { ?>

                Vous n'avez pas souscrit à d'offre pour le moment.<br><br>

                <a href="/page/pricing.php">Souscrire</a>

            <?php } ?>

        </div>

    </div>
</div>

<?php include 'layout/footer.php'; ?>
