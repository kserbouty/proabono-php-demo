<?php include 'layout/header.php';

// invert the current status
$value = $is_enabled ? 'false' : 'true';

$label = $is_enabled
    ? 'Désactiver'
    : 'Activer'
?>

<div class="card m-auto text-center" style="width: 45%;">

    <div class="card-header text-white bg-dark">
        <h4>Gestion Support24</h4>
    </div>

    <div class="card-body">

        <div class="pt-2">
            <h4>Status: <?= Tools::usageToString($usage) ?></h4>
        </div>

        <div>
            <form action="/process/support-24.php" method="post">

                <input type="hidden" name="is_enabled" value="<?= $value ?>" />

                <div class="mr-3 ml-3 p-3">
                    <button type="submit" class="btn btn-block btn-outline-success">
                        <?= $label ?>
                    </button>
                </div>

            </form>
        </div>

    </div>

</div>

<?php include 'layout/footer.php'; ?>