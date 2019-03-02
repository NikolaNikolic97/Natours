<section class="section-stories">
                <div class="u-center-text u-margin-bottom-big">
                    <h2 class="heading-secondary">
                        we make people genuinely happy 
                    </h2>
                </div>

    <?php foreach ($item as $i):?>
    <form action="PHP/anketa.php" method="post">
                <div class="row">
                    <div class="story">
                        <div class="story__text">
                             <h3 class="heading-tertiary u-margin-bottom-small">
                                    <?= $i->pitanje ?>
                            </h3>
                            <input type="hidden" value="<?=$i->id?>" id="id"/>
                                <?php foreach ($odg as $o):
                                    if ($i->id == $o->id_ankete):?>
                                        <p>
                                            <input type="radio" name="radio<?=$i->id?>"  value="<?= $o->id ?>"/> <?= $o->odgovor ?>
                                        </p>
                                    <?php endif;?>
                                <?php endforeach; ?>
                        </div>
                        <div class="u-center-text ">
                            <input  type="submit" name="anketa" data-id="<?= $i->id ?>" value="submit" class="button-text button" >
                        </div>
                    </div>
                </div>
    </form>
    <?php endforeach; ?>

            </section>
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/anketa.js" type="text/javascript"></script>