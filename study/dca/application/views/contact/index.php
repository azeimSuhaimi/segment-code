
<?= $this->session->flashdata('messege');?>

<table class="table table-hover">
    <thead>
        <tr>
            <th>no</th>
            <th>subject</th>
            <th>name</th>
            <th>date</th>
            <th>status</th>
            <th>#</th>
        </tr>
    </thead>
    <tbody>

        <?php if($message):?>
            <?php $i= 1; foreach($message as $m):?>
                <tr>
                    <td><?= $i++;?></td>
                    <td><?= $m['subject'];?></td>
                    <td><?= $m['name'];?></td>
                    <td><?=  date('d F Y', $m['time'])?></td>
                    <td><?= ($m['status'] == 2 ? 'read' : 'unread') ;?></td>
                    <td><a href="<?= base_url('contact/details/'.$m['id']);?>" class="btn btn-success">view</a></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>
