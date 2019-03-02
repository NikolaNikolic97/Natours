<div class="col-md-6 col-md-offset-3">
    <form action="PHP/toursUpdate.php" method="post" class="form-horizontal" enctype="multipart/form-data">

        <fieldset>
            <div id="legend">
                <legend class="">Update</legend>
            </div>
            <div class="control-group">
                <!-- Username -->
                <label class="control-label"  for="username">Name of tour</label>
                <div class="form-group">
                    <input type="text" value="<?= $nizTura->naziv?>" name="name" id="name" placeholder="" class="form-control" autofocus>
                </div>
            </div>
            <div class="control-group">
                <!-- E-mail -->
                <div class="form-group">
                    <label for="comment">Description</label>
                    <textarea   name="desc" id="desc" class="form-control" rows="5"><?= $nizTura->opis ?></textarea>
                </div>
            </div>
            <div class="control-group">
                <!-- E-mail -->
                <label class="control-label" for="price">Price</label>
                <div class="form-group">
                    <input type="text" value="<?= $nizTura->cena ?>" name="price" id="price"  placeholder="" class="form-control">

                </div>
            </div>
            <div class="control-group">
                <!-- E-mail -->
                <label class="control-label" for="kategorija">Category</label>
                <div class="form-group">
                    <select name="cat" id="cat" class="form-control">
                        <?php foreach($kategorija as $k): ?>
                            <option <?= $k->id == $nizTura->id ? "selected" : "" ?>  value="<?= $k->id ?>"> <?= $k->naziv ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label" for="lokacija">Location</label>
                    <select name="location" id="location" class="form-control">
                        <?php foreach($lokacija as $l): ?>
                            <option <?= $l->id == $nizTura->id ? "selected":"" ?>  value="<?= $l->id ?>"> <?= $l->naziv ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <input type="hidden" value="<?= $nizTura->id ?>" name="id" />
            </div>

            <div class="control-group">
                <!-- Button -->
                <div class="controls">
                    <input class="btn btn-success" type="submit" name="submit" id="submit"/>
                </div>
                <div id="feedback" class="text-danger">

                </div>
            </div>
        </fieldset>
    </form>
</div>
