<?php include 'layout/header.php';

// invert the current status
$value = $is_enabled ? 'false' : 'true';

$label = $is_enabled
    ? 'Confirmer la désactivation ?'
    : 'Réactiver l\'option ?';
?>

<div class="card m-auto text-center" style="width: 45%;">

    <div class="card-header text-white bg-dark">
        <h4>Validate Update Support24</h4>
    </div>

    <div class="card-body">

        <div class="pt-2">
            <h5>
                <?php if ($pricing->nextTerm) { ?>
                    <?= $pricing->nextTerm->labelLocalized ?> : <?= $pricing->nextTerm->pricingLocalized ?>
                <?php } else { ?>
                    <?= $pricing->labelLocalized ?> : <?= $pricing->pricingLocalized ?>
                <?php } ?>
            </h5>
            <h5>
                <?php if ($pricing->amountTotal === 0) { ?>
                    <p>La modification n'aura aucun coût à la facturation.</p>
                <?php } else { ?>
                    <?= $pricing->labelLocalized ?> : <?= $pricing->pricingLocalized ?>
                <?php } ?>
            </h5>
        </div>

        <div>
            <form action="/process/support-24.php" method="post">

                <input type="hidden" name="is_enabled" value="<?= $value ?>" />
                <input type="hidden" name="validate" value="true" />

                <input type="hidden" name="is_enabled" value="<?= $value ?>" />

                <div class="mr-3 ml-3 p-3">
                    <button type="submit" class="btn btn-block btn-outline-success">
                        <?= $label ?>
                    </button>
                </div>

            </form>
        </div>

    </div>

</div>



<?php include 'layout/footer.php'; ?>
