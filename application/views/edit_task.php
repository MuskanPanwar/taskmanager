
<div class="page-wrapper">
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
<div class="container-fluid mt-5">
 <div class="card">
    <div class="card-header">

    </div>
    <div class="card-body">
    <form id="nameForm" action="<?php base_url('addtask')?>" method="post">
    <div class="form-group">
      <input type="text" class="form-control"  value="<?php echo set_value('task_name',$get_task_name->task_name)?>" id="task_name" name="task_name" placeholder="Enter Task Name" required>
    </div>
    
    </div>
    <div class="card-footer text-center">
    <button type="submit" class="btn btn-primary">Update</button>
    <button type="reset" class="btn btn-danger">Reset</button>
  </form>

    </div>
 </div>
  
</div>
</div>
<?php
include('inc/footer.php');
?>