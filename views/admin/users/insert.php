<div class="col-md-6 col-md-offset-3">
    <form action="" method="post" class="form-horizontal">

        <fieldset>
            <input type="hidden" name="id" value="">
            <div id="legend">
                <legend class="">Insert</legend>
            </div>
            <div class="control-group">
                <!-- Username -->
                <label class="control-label"  for="username">Full name</label>
                <div class="form-group">
                    <input type="text" value="" name="fullname" id="fullname" placeholder="" class="form-control" autofocus>
                    <p class="help-block">First name must start uppercase, person can have multiple first names.</p>
                </div>
            </div>
            <div class="control-group">
                <!-- E-mail -->
                <label class="control-label" for="password">E-mail</label>
                <div class="form-group">
                    <input type="text" value="" name="email" id="email"  placeholder="" class="form-control">
                    <p class="help-block">Please provide your E-mail</p>
                </div>
            </div>
            <div class="control-group">
                <!-- E-mail -->
                <label class="control-label" for="password">Password</label>
                <div class="form-group">
                    <input type="password" value="" name="pass" id="pass"  placeholder="" class="form-control">
                    <p class="help-block">Please provide your Password</p>
                </div>
            </div>
            <div class="control-group">
                <!-- E-mail -->
                <label class="control-label" for="password">Password</label>
                <div class="form-group">
                    <input type="password" value="" name="vPass" id="vPass"  placeholder="" class="form-control">
                    <p class="help-block">Confirm your password</p>
                </div>
            </div>

            <div class="control-group">
                <div class="form-group">
                    <div class="form-check has-success">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="ch" name="ch" value="aktivan" />
                            Aktivan
                        </label>
                    </div>
                </div>
            </div>


            <div class="control-group">
                <!-- E-mail -->
                <label class="control-label" for="password">Uloga</label>
                <div class="form-group">
                    <select name="uloga" id="uloga" class="form-control">
                        <?php foreach($uloge as $u): ?>
                            <option  value="<?= $u->id ?>"> <?= $u->naziv ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <!-- Button -->
                <div class="controls">
                    <input class="btn btn-success " type="submit" name="submit" id="posalji"/>
                </div>
                <div id="feedback" class="text-danger">

                </div>
            </div>
        </fieldset>
    </form>
</div>
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/adminInsert.js" type="text/javascript"></script>