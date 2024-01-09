

<div class="page-wrapper">
<div class="container-fluid">
<div class="card">
    <div class="card-header">
        <h3>Edit Sub Task</h3>
    </div>
    <div class="card-body">
        <form action="<?=base_url('task/'.$task_name.'/'.$get_sub_task->id)?>" method="post">
            <div class="form-group">
                <input type="text" name="sub_task_name" id="sub_task_name" value="<?= set_value('sub_task_name',$get_sub_task->Sub_Task_Name)?>" class="form-control" placeholder="Enter Sub Task Name " >
            </div>
            <div class="form-group">
                <input type="text" name="sub_task_description" id="sub_task_description" value="<?= set_value('sub_task_discription',$get_sub_task->Description)?>" class="form-control" placeholder="Enter Sub Task Discription " >
            </div>
            <div class="form-group">
                <input type="text" name="sub_task_link" id="sub_task_link" value="<?= set_value('sub_task_link',$get_sub_task->Link)?>" class="form-control" placeholder="Enter Sub Task Link " >
            </div>
            <div class="card-footer">
                <div class="form-group text-center">
                    <button type="submit"  class="btn btn-primary">Update</button>
               
                    <button type="reset"  class="btn btn-danger">Reset</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>

<?php
include('inc/footer.php');
?>