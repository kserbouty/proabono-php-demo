<?php if(isset($usages)
    && ($usages->totalItems > 0)) { ?>

    <?php foreach ($usages as $usage) {

        // Case Feature Team Members available:
        if ($usage->refFeature === FEATURE_TEAM_MEMBERS) { ?>

            <h5>
                Team members:

                <a href="../page/home-auth/team-members.php?refCustomer=<?= $user->getId(); ?>&refFeature=<?= $usage->refFeature ?>">
                    <?= Tools::usageToString($usage) ?>
                </a>
            </h5>

        <?php }

        // Case Feature Signature available:
        if ($usage->refFeature === FEATURE_SIGNATURE) { ?>

            <h5>
                Signature:

                <a href="../page/home-auth/signature.php?refCustomer=<?= $user->getId(); ?>&refFeature=<?= $usage->refFeature ?>">
                    <?= Tools::usageToString($usage) ?>
                </a>
            </h5>

        <?php }

        // Case Support-24:
        if ($usage->refFeature === FEATURE_SUPPORT_24) { ?>

            <h5>
                Support 24h/24:

                <a href="../page/home-auth/support-24.php?refCustomer=<?= $user->getId(); ?>&refFeature=<?= $usage->refFeature ?>">
                    <?= Tools::usageToString($usage) ?>
                </a>
            </h5>

        <?php }
    } ?>

<?php } ?>
