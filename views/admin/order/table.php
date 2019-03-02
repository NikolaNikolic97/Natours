<div class="row">
    <?php $br=1; ?>
    <?php if(count($order)): ?>
        <table class="table table-hover table-bordered table-striped">
            <tr><th>br</th><th>Ime</th><th>Prezime</th><th>Telefon</th><th>Tura</th><th>Nacin placanja</th></tr>
            <?php foreach($order as $o): ?>
                <tr>
                    <td><?= $br++ ?></td>
                    <td><?= $o->ime ?></td>
                    <td><?= $o->prezime ?></td>
                    <td><?= $o->telefon ?></td>
                    <td><?= $o->naziv_ture ?></td>
                    <td><?= $o->nacin_placanja ?></td>
                </tr>
            <?php endforeach;?>
        </table>
    <?php else: ?>
        <h1>Nema zapisa</h1>
    <?php endif; ?>
</div>
</div>