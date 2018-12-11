<?php include 'layout/top.php';

// invert the current status
$value = $is_enabled ? 'false' : 'true';

$labelButton = $is_enabled
    ? 'Confirmer la désactivation ?'
    : 'Réactiver l\'option ?';
?>
<div class="text-center">
    <h1> Validation Support24 </h1>
</div>

<div class="container">

    <div class="text-center">
        <h5>
            <?= $pricing->nextTerm->labelLocalized ?> : <?= $pricing->nextTerm->pricingLocalized ?>
        </h5>
        <h5>
            <?php if ($pricing->amountTotal === 0) { ?>
                <p>La modification n'aura aucun coût à la facturation.</p>
            <?php } else { ?>
                <?= $pricing->labelLocalized ?> : <?= $pricing->pricingLocalized ?>
            <?php } ?>
        </h5>
    </div>

    <form class="text-center" action="/process/support-24.php" method="post">
        <input type="hidden" name="is_enabled" value="<?= $value ?>" />
        <input type="hidden" name="validate" value="true" />
        <input type="submit" value="<?= $labelButton ?>">

    </form>
</div>



<?php include 'layout/bottom.php'; ?>
