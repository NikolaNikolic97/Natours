<div class="col-md-6 col-md-offset-3">
    <form action="PHP/menuInsert.php" method="post" class="form-horizontal">

        <fieldset>
            <div id="legend">
                <legend class="">Insert</legend>
            </div>
            <div class="control-group">
                <!-- Username -->
                <label class="control-label"  for="username">path of the link</label>
                <div class="form-group">
                    <input type="text" value="" name="href" id="href" placeholder="" class="form-control" autofocus />
                    <p class="help-block">First name must start uppercase, person can have multiple first names.</p>
                </div>
            </div>
            <div class="control-group">
                <!-- E-mail -->
                <label class="control-label" for="password">Content of the link</label>
                <div class="form-group">
                    <input type="text" value="" name="content" id="content"  placeholder="" class="form-control">
                    <p class="help-block">Please provide your E-mail</p>
                </div>
            </div>
            <div class="control-group">
                <!-- Button -->
                <div class="controls">
                    <input class="btn btn-success " type="submit" name="submit" id="submit"/>
                </div>
                <div id="feedback" class="text-danger">

                </div>
            </div>
        </fieldset>
    </form>
</div>

