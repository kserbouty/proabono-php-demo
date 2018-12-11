<?php include 'layout/top.php'; ?>

<h1>Error
    <?php

    if (isset($messageError)) {
        echo $messageError;
    }

    ?>
</h1>
<br><br>

<hr>
<?php var_dump($response); ?>
<hr>

<?php include 'layout/bottom.php'; ?>
