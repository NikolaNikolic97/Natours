
<div class="navigation">
            <input type="checkbox" name="navi__toggle" id="navi-toggle" class="navigation__checkbox">
            <label for="navi-toggle" class="navigation__button">
                <span class="navigation__icon">

                </span>
            </label>
            <div class="navigation__background">
            <?php
                require_once "PHP/konekcija.php";
                $upit = "SELECT * FROM meni";
                $rezultat =$conn->query($upit)->fetchAll();


            ?>
            </div>
            <nav class="navigation__nav">
                <ul class="navigation__list">

                    <?php for($i=3;$i<count($rezultat);$i++): ?>
                    <li class="navigation__item"><a href="<?= $rezultat[$i]->href ?>" class="navigation__link"> <?= $rezultat[$i]->sadrzaj ?> </a></li>
                    <?php endfor; ?>
                    <?php if(!isset($_SESSION['korisnik'])): ?>
                        <li class="navigation__item"><a href="<?= $rezultat[1]->href ?>" class="navigation__link"> <?= $rezultat[1]->sadrzaj ?> </a></li>
                    <?php endif; ?>
                    <?php if(isset($_SESSION['korisnik'])): ?>
                        <li class="navigation__item"><a href="<?= $rezultat[0]->href ?>" class="navigation__link"> <?= $rezultat[0]->sadrzaj ?> </a></li>
                        <li class="navigation__item"><a href="<?= $rezultat[2]->href ?>" class="navigation__link"> <?= $rezultat[2]->sadrzaj ?> </a></li>
                    <?php endif; ?>
                </ul>
            </nav>

        </div>
