<?php include 'layout/top.php';

// invert the current status
$value = $is_enabled ? 'false' : 'true';

$labelButton = $is_enabled
    ? 'Désactiver'
    : 'Activer'
?>

<div class="text-center">
    <h1> Gestion Support24 </h1>

</div>


<div class="container">
    <form class="text-center" action="/process/support-24.php" method="post">
        <input type="hidden" name="is_enabled" value="<?= $value ?>" />
        <input type="submit" value="<?= $labelButton ?>">
    </form>
</div>

<?php include 'layout/bottom.php'; ?>