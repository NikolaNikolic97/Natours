
    <div id="tabela" class="row">
        <?php $br=1; ?>
        <?php if(count($users)): ?>
            <table class="table table-hover table-bordered table-striped">
                <tr><th>br</th><th>Ime Prezime</th><th>Email</th><th>Uloga</th><th>Izmeni</th><th>Obrisi</th></tr>
                <?php foreach($users as $user): ?>
                    <tr>
                        <td><?= $br++ ?></td>
                        <td><?= $user->ime_prezime ?></td>
                        <td><?= $user->email ?></td>
                        <td><?= $user->naziv ?></td>
                        <td><a href="admin.php?edit=update&id=<?= $user->korisnik_id; ?>" id="update" data-id="<?= $user->korisnik_id; ?>" class="btn btn-primary ">Update</a></td>
                        <td><a href="PHP/deleteUser.php?id=<?= $user->korisnik_id; ?>"  id="delete" data-id="<?= $user->korisnik_id; ?>" class="btn btn-danger ">Delete</a></td>
                    </tr>
                <?php endforeach;?>
            </table>
            <a href="admin.php?edit=insert" id="submit" name="submit" class="btn-success btn btn-lg">Add new user</a>
        <?php else: ?>
            <h1>Nema zapisa</h1>
        <?php endif; ?>
    </div>
</div>
