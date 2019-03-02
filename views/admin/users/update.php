<div class="col-md-6 col-md-offset-3">
    <form action="PHP/adminUpdate.php" method="post" class="form-horizontal">

        <fieldset>
            <input type="hidden" name="id" value="<?= $user->id ?>">
            <div id="legend">
                <legend class="">Update</legend>
            </div>
            <div class="control-group">
                <!-- Username -->
                <label class="control-label"  for="username">Full name</label>
                <div class="form-group">
                    <input type="text" value="<?= $user->ime_prezime ?>" name="fullname" id="fullname" placeholder="" class="form-control" autofocus>
                    <p class="help-block">First name must start uppercase, person can have multiple first names.</p>
                </div>
            </div>
            <div class="control-group">
                <!-- E-mail -->
                <label class="control-label" for="password">E-mail</label>
                <div class="form-group">
                    <input type="text" value="<?= $user->email ?>" name="email" id="email"  placeholder="" class="form-control">
                    <p class="help-block">Please provide your E-mail</p>
                </div>
            </div>
            <div class="control-group">
                <div class="form-group">
                    <div class="form-check has-success">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="ch" name="ch" value="aktivan" <?= ($user->aktivan == 1) ? "checked":"" ?>/>
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
                            <option <?= $u->id == $user->uloga_id ? "selected" : "" ?>  value="<?= $u->id ?>"> <?= $u->naziv ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <input type="hidden" id="idKorisnika" name="idKorisnika" value="<?= $user->id_korisnika?>" />
            <div class="control-group">
                <!-- Button -->
                <div class="controls">
                    <input class="btn btn-success " type="submit" name="update" id="update"/>
                </div>
                <div id="feedback" class="text-danger">

                </div>
            </div>
        </fieldset>
    </form>
</div>