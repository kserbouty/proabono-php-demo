<?php include 'layout/header.php'; ?>

<div class="card m-auto text-center" style="width: 45%;">

    <div class="card-header text-white bg-dark">
        <h4>Validation Quantity Team Members</h4>
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
            <form action="/process/team-members-by-quantity.php" method="post">

                <input type="hidden" name="quantity" value="<?= $quantity ?>" />
                <input type="hidden" name="validate" value="true" />

                <div class="mr-3 ml-3 p-3">
                    <button type="submit" class="btn btn-block btn-outline-success">
                        Validate
                    </button>
                </div>

            </form>
        </div>

    </div>

</div>

<?php include 'layout/footer.php'; ?>
