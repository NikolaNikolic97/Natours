<div class="col-md-6 col-md-offset-3">
    <form action="PHP/questionInsert.php" method="post" class="form-horizontal" ">

        <fieldset>
            <div id="legend">
                <legend class="">Insert</legend>
            </div>
            <div class="control-group">
                <label class="control-label"  for="odgovor">Question</label>
                <div class="form-group">
                    <input type="text" value="" name="pitanje" id="pitanje" placeholder="" class="form-control" autofocus>
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