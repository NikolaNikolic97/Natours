<div class="ponuda-div">
    <img src="img/logo-green-small-2x.png" alt="natours" class="ponuda-logo"/>
</div>
<section class="section-tours">
    <div class="u-center-text u-margin-bottom-big">
        <h2 class="heading-secondary">
            All tours
        </h2>
    </div>
    <?php $br=0;
    foreach ($tours as $red): ?>
    <?php if ($br%3 == 0) echo "<div class=\"row\">";?>
        <div class="col-1-of-3">
            <div class="card">
                <div class="card__side card__side--front" ;">
                    <div class="card__picture card__picture--2" style="background-image: linear-gradient(to right bottom, rgba(126, 213, 111, 0.5), rgba(40, 180, 133, 0.5)), url(<?= $red->slika ?>)"></div>
                    <h4 class="card__heading">
                                <span class="card__heading--span  card__heading--span--2">
                                        <?= $red->naziv ?>
                                </span>
                    </h4>
                    <div class="card__details">
                        <?= $red->opis ?>
                    </div>
                </div>
                <div class="card__side card__side--back card__side--back-2">
                    <div class="card__cta">
                        <div class="card__price-box">
                            <p class="card__price-only">only</p>
                            <p class="card__price-value">$<?=$red->cena?></p>
                        </div>
                        <a href="ponuda.php?p=details&id=<?= $red->id ?>" class="button button--white">Book now</a>
                    </div>
                </div>
            </div>
        </div>
    <?php $br++;
    if ($br%3 == 0) echo"</div>";
    ?>

    <?php endforeach; ?>
</section>
    <ul class="pagination" >
        <?php for($i=1;$i<=$linksNumber;$i++): ?>
        <li><a href="ponuda.php?page=<?= $i; ?>"><?= $i; ?></a></li>
        <?php endfor; ?>
    </ul>

<script src="js/sort.js" type="application/javascript"></script>