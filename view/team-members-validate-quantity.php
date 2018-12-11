<?php include 'layout/top.php'; ?>

<div class="text-center">
    <h1> Validation Quantity Team Members </h1>
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

    <form class="text-center" action="/process/team-members-by-quantity.php" method="post">

        <input type="hidden" name="quantity" value="<?= $quantity ?>" />
        <input type="hidden" name="validate" value="true" />
        <input type="submit" value="Confirmer">

    </form>

</div>

<?php include 'layout/bottom.php'; ?>
