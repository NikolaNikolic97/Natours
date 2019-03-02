<div class="row">
    <?php $br=1; ?>
    <?php if(count($tours)): ?>
        <table class="table table-hover table-bordered table-striped">
            <tr><th>br</th><th>Naziv</th><th>Opis</th><th>Cena</th><th>Slika</th><th>Izmeni</th><th>Obrisi</th></tr>
            <?php foreach($tours as $tour): ?>
                <tr>
                    <td><?= $br++ ?></td>
                    <td><?= $tour->naziv ?></td>
                    <td><?= $tour->opis ?></td>
                    <td><?= $tour->cena ?></td>
                    <td ><img src ="<?= $tour->slika ?>" alt="<?= $tour->naziv ?>" style="height: 150px;"></td>
                    <td><a href="admin.php?page=tours&tour=update&id=<?= $tour->id ?>" id="update" data-id="<?= $tour->korisnik_id; ?>" class="btn btn-primary btn-lg">Update</a></td>
                    <td><a href="PHP/deleteTours.php?id=<?= $tour->id ?>" id="delete" data-id="<?= $tour->korisnik_id; ?>" class="btn btn-danger btn-lg">Delete</a></td>
                </tr>
            <?php endforeach;?>
        </table>
        <a href="admin.php?tour=insert&page=tours" id="tours" name="tours" class="btn-success btn btn-lg">Add new tour</a>
    <?php else: ?>
        <h1>Nema zapisa</h1>
    <?php endif; ?>
</div>
</div>
<script src="js/jquery.min.js" type="application/javascript"></script>
<script src="js/deleteTours.js" type="application/javascript"></script>