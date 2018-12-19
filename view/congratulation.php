<?php include 'layout/header.php'; ?>

<div class="card m-auto text-center" style="width: 45%;">

    <div class="card-header text-white bg-dark">
        <h4>Congratulation</h4>
    </div>

    <div class="card-body">
        <h4>You subscribed to <?= $subscription->titleLocalized ?></h4><br>
        <h5>Which grant you :</h5>
        <?php include '../view/partial/overview.php' ?>
    </div>

    <div class="card-footer">
        <a class="nav-link" href="/page/home-auth.php">Continue</a>
    </div>

</div>


<?php include 'layout/footer.php'; ?>
