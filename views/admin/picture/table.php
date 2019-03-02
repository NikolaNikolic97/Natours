<div class="row">
    <?php $br=1; ?>
    <?php if(count($picture)): ?>
        <table class="table table-hover table-bordered table-striped">
            <tr><th>br</th><th>Opis</th><th>id_tura</th><th>Slika</th><th>Obrisi</th></tr>
            <?php foreach($picture as $p): ?>
                <tr>
                    <td><?= $br++ ?></td>
                    <td><?= $p->alt ?></td>
                    <td><?= $p->id_tura ?></td>
                    <td style="height: 150px;"><img src ="<?= $p->src_mala ?>" alt="<?= $p->alt ?>"></td>
                    <td><a href="PHP/deletePicture.php?id=<?= $p->id ?>" id="picture"  class="btn btn-danger btn-lg">Delete</a></td>
                </tr>
            <?php endforeach;?>
        </table>
        <a href="admin.php?picture=insert&page=picture" id="picture" name="picture" class="btn-success btn btn-lg">Add new picture</a>
    <?php else: ?>
        <h1>Nema zapisa</h1>
    <?php endif; ?>
</div>
</div>
