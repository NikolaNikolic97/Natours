<div class="row">
    <?php $br=1; ?>
    <?php if(count($answer)): ?>
        <table class="table table-hover table-bordered table-striped">
            <tr><th>br</th><th>Odgovor</th><th>id_ankete</th><th>Obrisi</th></tr>
            <?php foreach($answer as $a): ?>
                <tr>
                    <td><?= $br++ ?></td>
                    <td><?= $a->odgovor ?></td>
                    <td><?= $a->id_ankete ?></td>
                    <td><a href="PHP/deleteAnswer.php?id=<?= $a->id ?>" id="answer" class="btn btn-danger btn-lg">Delete</a></td>
                </tr>
            <?php endforeach;?>
        </table>
        <a href="admin.php?answer=insert&page=answer" id="answer" name="answer" class="btn-success btn btn-lg">Add new answer</a>
    <?php else: ?>
        <h1>Nema zapisa</h1>
    <?php endif; ?>
</div>
</div>
