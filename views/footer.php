<footer class="footer">
            <div class="footer__logo-box">
                <img src="img/logo-green-2x.png" alt="Full logo" class="footer__logo">
            </div>
            <div class="row">
                    <div class="footer__navigation">
                        <ul class="footer__list">
                            <?php
                            require_once "PHP/konekcija.php";
                            $upit = "SELECT * FROM meni";
                            $rezultat =$conn->query($upit)->fetchAll();
                            ?>
                            <?php for($i=3;$i<count($rezultat);$i++): ?>
                                <li class="footer__item"><a href="<?= $rezultat[$i]->href ?>" class="footer__link"> <?= $rezultat[$i]->sadrzaj ?> </a></li>
                            <?php endfor; ?>
                            <?php if(!isset($_SESSION['korisnik'])): ?>
                                <li class="footer__item"><a href="<?= $rezultat[1]->href ?>" class="footer__link"> <?= $rezultat[1]->sadrzaj ?> </a></li>
                            <?php endif; ?>
                            <?php if(isset($_SESSION['korisnik'])): ?>
                                <li class="footer__item"><a href="<?= $rezultat[0]->href ?>" class="footer__link"> <?= $rezultat[0]->sadrzaj ?> </a></li>
                                <li class="footer__item"><a href="<?= $rezultat[2]->href ?>" class="footer__link"> <?= $rezultat[2]->sadrzaj ?> </a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
            </div>
        </footer>
    </body>
</html>