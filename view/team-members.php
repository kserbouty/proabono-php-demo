<?php include 'layout/top.php'; ?>

<div class="text-center">
    <h1> Hello Team Members </h1>
    <p >
        Vous avez actuellement <?= $usage->quantityCurrent ?> membres.
    </p>
</div>

<div class="container">

    <hr>

    <p class="text-center">Add by increment:</p>

    <form class="text-center" action="/process/team-members-by-increment.php" method="post">

        <input type="hidden" name="refCustomer" value="<?= $user->getId(); ?>" />
        <input type="hidden" name="refFeature" value="support-24" />

        <input type="submit" value="Enlever" name="remove">

        <select id="add-member" name="increment">
            <option selected value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>

        <input type="submit" value="Ajouter">

    </form>

    <hr>

    <p class="text-center">Set by quantity:</p>

    <form class="text-center" action="/process/team-members-by-quantity.php" method="post">

        <input type="hidden" name="refCustomer" value="<?= $user->getId(); ?>" />

        <input type="text" name="quantity" placeholder="1">

        <input type="submit" value="Set">

    </form>

</div>

<?php include 'layout/bottom.php'; ?>