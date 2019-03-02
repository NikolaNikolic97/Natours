<div class="col-md-6 col-md-offset-3">
    <form action="PHP/answerInsert.php" method="post" class="form-horizontal" ">

        <fieldset>
            <div id="legend">
                <legend class="">Insert</legend>
            </div>
            <div class="control-group">
                <label class="control-label"  for="pitanje">Answer</label>
                <div class="form-group">
                    <input type="text" value="" name="odgovor" id="odgovor" placeholder="" class="form-control" autofocus>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="kategorija">Question</label>
                <div class="form-group">
                    <select name="pitanje" id="pitanje" class="form-control">
                        <?php foreach($pitanja as $p): ?>
                            <option  value="<?= $p->id ?>"> <?= $p->pitanje ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <!-- Button -->
                <div class="controls">
                    <input class="btn btn-success" type="submit" name="insert" id="insert"/>
                </div>
                <div id="feedback" class="text-danger">

                </div>
            </div>
        </fieldset>
    </form>
</div>