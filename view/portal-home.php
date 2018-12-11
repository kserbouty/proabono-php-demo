<?php include 'layout/top.php'; ?>

<h1>My Subscription:</h1>

<iframe id="myClientPortal"
        width="1000"
        height="1000"
        src="<?= $customer->links['hosted-home'] ?>">
</iframe>

<?php include 'layout/bottom.php'; ?>
