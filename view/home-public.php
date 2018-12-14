<?php include 'layout/header.php'; ?>

<div class="mr-auto ml-auto p-5 text-center">

    <img src="../assets/img/e_logo_white.png" width="70" height="70" >
    <h1 class="m-3">Example Website</h1>
    <h4 class="m-3">Because Nostradamus knows the answer was 42.</h4>
    <p>Or anything else, cause of 'The Ultimate Question of Life' was'nt released</p>

</div>

<div class="jumbotron jumbotron-fluid p-5">

    <div class="d-flex flex-nowrap justify-content-around">

        <div class="p-5">
            <p class="lead">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Sed non condimentum ex. Donec sed suscipit leo.
                Aenean accumsan nibh ac justo laoreet convallis.
                Curabitur suscipit gravida turpis a fringilla.
                Praesent tortor sapien, fringilla sit amet ex sed,
                tempor viverra augue.
                Phasellus facilisis pulvinar nisi, at auctor nulla vehicula sit amet.
                Vestibulum lacinia non augue condimentum varius.
                Donec eu gravida ligula.
                Nullam efficitur, arcu vitae mattis tempus, ligula dui
                tristique orci, non ultricies quam erat lobortis nisi.
            </p>
        </div>

    </div>

</div>


<div style="width: 80%; height: 600px">
    <h3 class="text-center">Pricing:</h3>
    <iframe frameBorder="0"
            width=100%
            height=100%
            src="<?= URL_PRICING_PUBLIC ?>">
    </iframe>
</div>


<?php include 'partial/faq-grid.php'; ?>

<?php include 'layout/footer.php'; ?>
