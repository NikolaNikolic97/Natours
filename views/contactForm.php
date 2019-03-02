<div class="col-md-6 col-md-offset-3">
    <form action="PHP/contact.php" method="post" class="form-horizontal" ">

        <fieldset>
            <div id="legend">
                <legend class="">Contact us</legend>
            </div>
            <div class="control-group">
                <label class="control-label"  for="email">First Name</label>
                <div class="form-group">
                    <input type="text" value="" name="firstName" id="firstName" placeholder="Paja" class="form-control" autofocus>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"  for="email">Last Name</label>
                <div class="form-group">
                    <input type="text" value="" name="lastName" id="lastName" placeholder="Patak" class="form-control" autofocus>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"  for="email">Phone number</label>
                <div class="form-group">
                    <input type="text" value="" name="phone" id="phone" placeholder="064-1234567" class="form-control" autofocus>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"  for="email">Email</label>
                <div class="form-group">
                    <input type="text" value="" name="email" id="email" placeholder="example@exm.com" class="form-control" autofocus>
                </div>
            </div>
            <div class="control-group">
                <div class="form-group">
                    <label for="comment">Comment</label>
                    <textarea name="comment" id="comment" class="form-control" placeholder="Your comment..." rows="7"></textarea>
                </div>
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
<script src="js/jquery.min.js" type="application/javascript"></script>
<script src="js/contact.js" type="application/javascript"></script>
</body>
</html>
