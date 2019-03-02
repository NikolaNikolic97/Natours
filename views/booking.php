<div class="ponuda-div">
    <img src="img/favicon.png" alt="natours" class="ponuda-logo" style="width: 10rem"/>
</div>
<div class="booking-div">
    <form action="PHP/booking.php" method="post">
        <label for="fname">First Name</label>
        <input type="text" class="booking-text" id="firstName" name="firstName" placeholder="Paja"/>

        <label for="lname">Last Name</label>
        <input type="text" class="booking-text" id="lastName" name="lastName" placeholder="Patak"/>


        <label for="lname">Phone number</label>
        <input type="text" class="booking-text" id="phone" name="phone" placeholder="064-1234567"/>

        <input type="hidden"  id="id" name="id_tour" value="<?= $id ?>"/>

        <label for="lname">Tours</label>
        <input type="text" value="<?=$tour->naziv?>" class="booking-text" id="tour"  readonly="true" />

        <label for="lname">Price</label>
        <input type="text" value="<?=$tour->cena?>&dollar;" class="booking-text" id="price"  readonly="true" />

        <label for="country">Method of payment</label>
        <select id="payment" class="booking-select" name="payment">
            <?php foreach ($payment as $p): ?>
                <option value="<?=$p->id?>"><?=$p->naziv?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" id="book" name="book" class="booking-submit" value="Submit">
    </form>
</div>
