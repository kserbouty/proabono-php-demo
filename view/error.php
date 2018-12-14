<?php include 'layout/header.php'; ?>


<div class="card m-auto text-center" style="width: 45%;">

    <div class="card-header bg-warning">
        <div class="d-inline-flex flex-wrap align-items-center">
            <img src="../assets/img/icon_error.png" width="50" height="50" class="mr-2">
            <h4>Une erreur est survenue</h4>
        </div>
    </div>

    <div class="card-body">

        <?php if ($response->status) { ?>
            <div class="d-flex flex-nowrap p-1 align-items-baseline">
                <h4 class="mr-3">Http Status:</h4>
                <p><?= $response->status ?></p>
            </div>
        <?php } ?>

        <?php if ($response->error->code) { ?>
            <div class="d-flex flex-nowrap p-1 align-items-baseline">
                <h4 class="mr-3">Code:</h4>
                <p><?= $response->error->code ?></p>
            </div>
        <?php } ?>

        <?php if ($response->error->target) { ?>
            <div class="d-flex flex-nowrap p-1 align-items-baseline">
                <h4 class="mr-3">Target:</h4>
                <p><?= $response->error->target ?></p>
            </div>
        <?php } ?>

        <?php if ($response->error->message) { ?>
            <div class="d-flex flex-nowrap p-1 align-items-baseline">
                <h4 class="mr-3">Message:</h4>
                <p><?= $response->error->message ?></p>
            </div>
        <?php } ?>


        <?php if ($response->error->exception) { ?>
            <div class="d-flex flex-nowrap p-1 align-items-baseline">
                <h4 class="mr-3">Exception:</h4>
                <p><?= $response->error->exception ?></p>
            </div>
        <?php } ?>


    </div>

</div>

<?php include 'layout/footer.php'; ?>
