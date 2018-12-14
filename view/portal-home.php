<?php include 'layout/header.php'; ?>

<div class="card m-auto text-center" style="width: 70%;">

    <div class="card-header">
        <h5>My Subscription:</h5>
    </div>

    <div class="card-body" style="height: 600px;">
        <iframe frameBorder="0"
                width="100%"
                height="100%"
                src="<?= $customer->links['hosted-home'] ?>">
        </iframe>
    </div>

</div>

<?php include 'partial/faq-portal.php'; ?>

<?php include 'layout/footer.php'; ?>
