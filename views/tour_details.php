<div class="ponuda-div">
    <img src="img/logo-green-small-2x.png" alt="natours" class="ponuda-logo"/>
</div>
<section class="tour_details">
    <div class="u-center-text u-margin-bottom-big">
        <h2 class="heading-secondary">
            <?= $tura->naziv ?>
        </h2>
    </div>
    <div class="row">
        <div class="col-1-of-2">
            <h3 class="heading-tertiary u-margin-bottom-small u-center-text">
                you're going to fall in love with nature
            </h3>
            <div class="tour">
            <p class="paragraph">
                <?= $tura->opis ?>
            </p>
            </div>
            <h3 class="heading-tertiary u-margin-bottom-small price">
                <?= $tura->cena ?>&dollar;
            </h3>

            <a href="booking.php?id=<?= $tura->id ?>" class="button-text"> Book now &rarr;  </a>
        </div>
        <div class="col-1-of-2">
            <div class="composition">
                <img src="img/nat-1.jpg" alt="Photo1" class="composition__photo composition__photo--p1">
                <img src="img/nat-2.jpg" alt="Photo2" class="composition__photo composition__photo--p2">
                <img src="img/nat-3.jpg" alt="Photo3" class="composition__photo composition__photo--p3">
            </div>
        </div>
    </div>

</section>