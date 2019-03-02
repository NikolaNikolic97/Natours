<?php include "PHP/top3tours.php"?>
<section class="section-tours">
                <div class="u-center-text u-margin-bottom-big">
                    <h2 class="heading-secondary">
                        Most popular tours
                    </h2>
                </div>
            <div class="row">
                <?php foreach ($rez as $r): ?>
                <div class="col-1-of-3">
                    <div class="card">
                        <div class="card__side card__side--front">
                            <div class="card__picture card__picture--2" style="background-image: linear-gradient(to right bottom, rgba(126, 213, 111, 0.5), rgba(40, 180, 133, 0.5)), url(<?= $r->slika ?>)">></div>
                            <h4 class="card__heading">
                                <span class="card__heading--span card__heading--span--2">
                                        <?= $r->naziv ?>
                                </span>
                            </h4>
                            <div class="card__details">
                                <?= $r->opis ?>
                            </div>
                        </div>
                        <div class="card__side card__side--back card__side--back-2">
                            <div class="card__cta">
                               <div class="card__price-box">
                                    <p class="card__price-only">only</p>
                                    <p class="card__price-value">&dollar;<?= $r->cena ?></p>
                               </div>
                                <a href="ponuda.php?p=details&id=<?= $r->id_ture ?>" class="button button--white">Book now</a>
                            </div>
                           
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="u-center-text u-margin-top-big">
                <a href="ponuda.php" class="button button--green">Discover all tours</a>
            </div> 
            </section>