<?php include 'layout/top.php'; ?>

<div class="text-center">
    <h1> Electronic Signature </h1>

    <p>
        Vous avez actuellement <?= $usage->quantityCurrent ?> signatures consommé.
    </p>

</div>

<div class="container">

    <hr>

    <form class="text-center" action="/process/signature.php" method="post">

        <input type="hidden" name="refCustomer" value="<?= $user->getId(); ?>" />

        <label for="add-signature">Document(s) à signer:</label>

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

        <input type="submit" value="OK">

    </form>

</div>

<?php include 'layout/bottom.php'; ?>