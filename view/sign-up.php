<?php include 'layout/header.php'; ?>

<div class="card m-auto text-center" style="width: 45%;">

    <div class="card-header text-white bg-dark">
        <h4>Welcome</h4>
    </div>

    <div class="card-body">

        <div>
            <form action="/process/subscribe-free.php" method="post">

                <input type="hidden" name="refOffer" value="free" />

                <div class="mr-3 ml-3 p-3">
                    <p>Demonstrates how to create a subscription by API</p>
                    <button type="submit" class="btn btn btn-outline-primary">
                        Try for Free
                    </button>
                </div>

            </form>
        </div>

        <hr>

        <p class="mt-5">Lets the Customer choose its offer</p>

        <a class="btn btn-outline-primary" href="../page/subscribe.php" role="button">Subscribe Now</a>

    </div>

</div>

<?php include 'layout/footer.php'; ?>
