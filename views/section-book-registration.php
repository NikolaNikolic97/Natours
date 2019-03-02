
    <section class="section-book">
            <div class="row">
                <div class="book">
                    <div class="book__form">
                        <form action="<?php ?>" method="post" class="form">
                            <div class="u-margin-bottom-medium">
                                <h2 class="heading-secondary">
                                    join natours
                                </h2>
                            </div>
                            <div class="form__group">
                                <input type="text" class="form__input" placeholder="Full name" name="name" id="fullname" required/>
                                <label for="tbName" class="form__label">Paja Patak</label>
                            </div>
                            <div class="form__group">
                                <input type="email" class="form__input" placeholder="Email" name="email" id="email" required/>
                                <label for="tbEmail" class="form__label">example@exm.com</label>
                            </div>
                            <div class="form__group">
                                    <input type="password" class="form__input" placeholder="Password" name ="pass" id="pass" required/>
                                    <label for="tbPass" class="form__label">Please enter a password with at least six characters</label>
                                </div>
                                <div class="form__group">
                                        <input type="password" class="form__input" placeholder="Verify Password" name="vPass" id="vPass" required/>

                                    </div>
                            <div class="form_group">
                                <input type="submit" id="submit" name="submit" class="button button--green" value="Submit">

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <script src="js/scriptRegistration.js" type="text/javascript"></script>
    </body>
    </html>