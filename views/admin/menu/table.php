<div class="row">
    <?php $br=1; ?>
    <?php if(count($meni)): ?>
        <table class="table table-hover table-bordered table-striped">
            <tr><th>br</th><th>Putanja</th><th>Tekst</th><th>Izmeni</th><th>Obrisi</th></tr>
            <?php foreach($meni as $m): ?>
                <tr>
                    <td><?= $br++ ?></td>
                    <td><?= $m->href ?></td>
                    <td><?= $m->sadrzaj ?></td>
                    <td><a href="admin.php?page=menu&menu=update&id=<?= $m->id; ?>" data-id="<?= $m->id; ?>"  name="menu" class="btn btn-primary ">Update</a></td>
                    <td><a href="PHP/deleteMenu.php?id=<?= $m->id; ?>" id="obrisi" name="obrisi"  class="btn btn-danger">Delete</a></td>
                </tr>
            <?php endforeach;?>
        </table>
        <a href="admin.php?menu=insert&page=menu" id="submit" name="menu" class="btn-success btn btn-lg">Add new link</a>
    <?php else: ?>
        <h1>Nema zapisa</h1>
    <?php endif; ?>
</div>
</div>
<script src="js/jquery.min.js" type="application/javascript"></script>
<script src="js/deleteMenu.js" type="application/javascript"></script>