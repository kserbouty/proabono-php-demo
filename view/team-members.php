<?php include 'layout/header.php'; ?>

<div class="card m-auto text-center" style="width: 45%;">

    <div class="card-header text-white bg-dark">
        <h4>Team Members</h4>
    </div>

    <div class="card-body">

        <div>
            <h7>Available: <?= Tools::usageToString($usage) ?>.</h7>
        </div>

        <hr>

        <form class="text-center" action="/process/team-members-by-increment.php" method="post">

            <input type="hidden" name="refCustomer" value="<?= $user->getId(); ?>" />
            <input type="hidden" name="refFeature" value="support-24" />

            <div class="d-inline-flex justify-content-between ">

                <div>
                    <button type="submit" class="btn btn-outline-danger" name="remove">
                        Enlever
                    </button>
                </div>

                <div class="d-flex align-items-center ml-4 mr-4">

                    <select id="add-member" name="increment">
                        <option selected value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>

                </div>

                <div>
                    <button type="submit" class="btn btn-outline-success">
                        Ajouter
                    </button>
                </div>

            </div>

        </form>

        <hr>

        <p>Set by quantity (number only):</p>

        <form class="d-inline-flex flex-row" action="/process/team-members-by-quantity.php" method="post">

            <input type="hidden" name="refCustomer" value="<?= $user->getId(); ?>" />

            <div class="col-xs-2 mr-4">
                <input type="text" name="quantity" placeholder="Enter quantity...">
            </div>

            <div>
                <button type="submit" class="btn btn-outline-success">
                    Set
                </button>
            </div>

        </form>

    </div>

</div>

<?php include 'layout/footer.php'; ?>