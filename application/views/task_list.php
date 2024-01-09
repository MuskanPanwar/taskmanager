
<div class="page-wrapper">
<div class="container-fluid">
<div class="container">
    <div class="row">
<div class="col">
    <?php
    $success = $this->session->userdata('success');
    if($success != ""){?>
    <div class="alert alert-success"><?php echo $success?></div>
    <?php
    }
    ?>
</div>
    </div>
</div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th style="width:70%;">Task Name </th>
                
                <th>Edit </th>
                <th>Delete </th>
            </tr>
        </thead>
        <tbody>
           <?php foreach($get_task as $data) { ?>
            <tr>
                <td><?= $data->id ?></td>
                <td><a href="<?=base_url('task_page/').str_replace(' ', '_', $data->task_name)?>"><?= $data->task_name ?></a></td>
               
                <td><a href="<?= base_url('edit_task/').$data->id ?>" class="btn btn-warning">Edit</a></td>
                <td><a href="<?= base_url('delete_task/').$data->id ?>" class="btn btn-danger">Delete</a></td>
            </tr>
            <?php } ?>
        </tbody>
        <tfoot>

        </tfoot>
    </table>
</div>
</div>
<?php
include('inc/footer.php');
?>