<?php include 'layout/top.php'; ?>

<div id="title-page">
    <div class="container">
        <div class="mr-auto ml-auto m-5 text-center" style="width: 50%;">
            <h1 class="m-3">Authentication Home</h1>
        </div>
    </div>
</div>

<div class="container">
    <div class="jumbotron">
        <div class="container">


            <?php if($usages->page != null) {

                foreach ($usages as $usage) {



                    // Case Feature Team Members available:
                    if ($usage->refFeature === 'team-members') { ?>


                        Team members :<br>

                        <?php
                        // If
                        if (($usage->quantityIncluded >= 0)
                            && ($usage->quantityCurrent >= 0)) { ?>

                            Vous avez <?= $usage->quantityIncluded ?> membres inclus dans votre offre.
                            <br>
                            Vous avez actuellement <?= $usage->quantityCurrent ?> membres.
                            <br>
                            <a href="../page/home-auth/team-members.php?refCustomer=<?= $user->getId(); ?>&refFeature=<?= $usage->refFeature ?>">
                                Gerer mes Team Members.
                            </a>
                            <br><br>

                        <?php } else { ?>

                            Votre offre vous donne accès à une quantitée illimitée de membres.
                            <br>
                            Vous avez actuellement <?= $usage->quantityCurrent ?> membres.
                            <br>
                            <a href="../page/home-auth/team-members.php?refCustomer=<?= $user->getId(); ?>&refFeature=<?= $usage->refFeature ?>">
                                Gerer mes Team Members.
                            </a>
                            <br><br>

                        <?php } ?>

                    <?php }
                    // Case Feature Signature available:
                    if ($usage->refFeature === 'signature') {

                        ?>



                        Signature :<br>

                        <?php
                        if (($usage->quantityIncluded >= 0)
                            && ($usage->quantityCurrent >= 0)) { ?>

                            Vous avez <?= $usage->quantityIncluded ?> signatures électronique inclus dans votre offre.
                            <br>
                            Vous avez actuellement <?= $usage->quantityCurrent ?> signatures consommé.
                            <br>
                            <a href="../page/home-auth/signature.php?refCustomer=<?= $user->getId(); ?>&refFeature=<?= $usage->refFeature ?>">
                                Signer un document.
                            </a>
                            <br><br>

                        <?php } else { ?>

                            Votre abonnement vous donne accès à une quantité illimitée de signatures.
                            <br>
                            Vous avez actuellement <?= $usage->quantityCurrent ?> signatures consommé.
                            <br>
                            <a href="../page/home-auth/signature.php?refCustomer=<?= $user->getId(); ?>&refFeature=<?= $usage->refFeature ?>">
                                Signer un document.
                            </a>
                            <br><br>

                        <?php }
                    }

                    // Case Support-24:
                    if ($usage->refFeature === 'support-24') { ?>


                        Support 24h/24 :<br>

                        <?php

                        // If is enabled:
                        if ($usage->is_enabled) { ?>

                            Statut : Activé<br>
                            <a href="../page/home-auth/support-24.php?refCustomer=<?= $user->getId(); ?>&refFeature=<?= $usage->refFeature ?>">
                                Désactiver.
                            </a>
                            <br><br>


                        <?php }

                        // If not enabled:
                        else { ?>

                            Vous n'avez pas souscris à l'option.<br>
                            <a href="../page/home-auth/support-24.php?refCustomer=<?= $user->getId(); ?>&refFeature=<?= $usage->refFeature ?>">
                                Activer.
                            </a>
                            <br><br>

                        <?php }
                    }
                }
            }

            // If not suscribed
            else { ?>

            Vous n'avez pas souscris à d'offre pour le moment.<br><br>

                <iframe id="myClientPortal"
                        width="1000"
                        height="500"
                        src="<?= $customer->links['hosted-home'] ?>">
                </iframe>

            <?php } ?>

        </div>
    </div>
</div>

<?php include 'layout/bottom.php'; ?>
