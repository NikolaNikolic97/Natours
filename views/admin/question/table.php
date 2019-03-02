<div class="row">
    <?php $br=1; ?>
    <?php if(count($question)): ?>
        <table class="table table-hover table-bordered table-striped">
            <tr><th>br</th><th>Pitanje</th><th>Obrisi</th></tr>
            <?php foreach($question as $q): ?>
                <tr>
                    <td><?= $br++ ?></td>
                    <td><?= $q->pitanje ?></td>
                    <td><a href="PHP/deleteQuestion.php?id=<?= $q->id ?>" id="delete" class="btn btn-danger btn-lg">Delete</a></td>
                </tr>
            <?php endforeach;?>
        </table>
        <a href="admin.php?question=insert&page=question" id="question" name="question" class="btn-success btn btn-lg">Add new question</a>
    <?php else: ?>
        <h1>Nema zapisa</h1>
    <?php endif; ?>
</div>
</div>