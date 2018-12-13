<?php include 'layout/header.php'; ?>

<div class="card m-auto text-center" style="width: 45%;">

    <div class="card-header text-white bg-dark">
        <h4>Electronic Signature</h4>
    </div>

    <div class="card-body">

            <div>
                <h5>Available: <?= Tools::usageToString($usage) ?></h5>
            </div>

            <hr>

            <form action="/process/signature.php" method="post">

                <input type="hidden" name="refCustomer" value="<?= $user->getId(); ?>" />

                <div>

                    <div>
                        <label for="add-signature">Selectionner le nombre de signatures:</label>
                    </div>

                    <div class="d-inline-flex p-4">

                        <div>
                            <select id="add-signature" name="increment">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                            </select>
                        </div>

                    </div>

                    <div class="mr-3 ml-3">
                        <button type="submit" class="btn btn-block btn-outline-success">
                            Valider
                        </button>
                    </div>

                </div>

            </form>


        </div>

</div>

<?php include 'layout/footer.php'; ?>