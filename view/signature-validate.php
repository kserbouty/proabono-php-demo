<?php include 'layout/header.php'; ?>

<div class="card m-auto text-center" style="width: 45%;">

    <div class="card-header text-white bg-dark">
        <h4>Validation Signature</h4>
    </div>

    <div class="card-body">

        <div>
            <h5>
                <?php if (isset($pricing->nextTerm)
                && ($pricing->amountTotal !== 0)) { ?>
                    <?= $pricing->nextTerm->labelLocalized ?> : <?= $pricing->nextTerm->pricingLocalized ?>
                <?php } ?>
            </h5>
            <h5>
                <?php if ($pricing->amountTotal === 0) { ?>
                    <p>You will not be charged for this operation.</p>
                <?php } else { ?>
                    <?= $pricing->labelLocalized ?> : <?= $pricing->pricingLocalized ?>
                <?php } ?>
            </h5>
        </div>

        <div>
            <form class="text-center" action="/process/signature.php" method="post">

                <input type="hidden" name="increment" value="<?= $increment ?>" />
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
