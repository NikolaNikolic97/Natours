
<section class="section-book">
        <div class="row">
            <div class="book">
                <div class="book__form">
                    <form action="PHP/login.php" method="post" class="form">
                        <div class="u-margin-bottom-medium">
                            <h2 class="heading-secondary">
start booking now
</h2>
                        </div>
                        <div class="form__group">
                            <input name="email" id="email" type="email" class="form__input" placeholder="Email"  required/>
                            <label for="tbEmail" class="form__label">example@exm.com</label>
                        </div>
                        <div class="form__group">
                            <input name ="pass" id="pass" type="password" class="form__input" placeholder="Password"  required/>
                            <label for="tbPass" class="form__label">Please enter a password with at least six characters</label>
                        </div>
                        <div class="form_group">
                            <input type="submit" id="submit" name="submit" class="button button--green" value="Submit">


                        </div>
                    </form>
                    <a href="registration.php" class="button-text u-margin-top-big">Registrate here &rarr;</a>
                </div>
            </div>
        </div>
    </section>
<script src="js/alertifyjs/alertify.min.js" type="text/javascript"></script>
<script src="js/scriptLogin.js" type="text/javascript"></script>
</body>
</html>