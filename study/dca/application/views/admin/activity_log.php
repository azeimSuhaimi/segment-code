

<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>no</th>
            <th>date</th>
            <th>time</th>
            <th>log type</th>

        </tr>
    </thead>
    <tbody>

        <?php $i = 1; foreach($activity as $ac):?>
            <tr>
                <td><?= $i++;?></td>
                <td><?= $ac['date_log']?></td>
                <td><?= $ac['time_log']?></td>
                <td><?= $ac['type_log'];?></td>
            </tr>
        <?php endforeach; ?>
        
    </tbody>
    <tfoot>

    </tfoot>
</table>