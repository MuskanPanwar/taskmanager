
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
    <h2>Add Sub Task Name </h2>
    </div>
    <div class="card-body">
    <form id="nameForm" action="<?php base_url('addsubtask')?>" method="post">
    <div class="form-group">
    <select name="task_name" class="form-control " id="">
					<option  value="Select Task Name">Select Task</option>
					<?php
					
					foreach($get_task as $data) { 
                        $newtask_name = str_replace(' ', '_', $data->task_name);
						?>
					
						
						<option  value="<?= $newtask_name ?>"><?= ucwords($data->task_name) ?></option>
					<?php } ?>
				   </select>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="sub_task_name" name="sub_task_name" placeholder="Enter Sub Task Name" required>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="sub_task_description" name="sub_task_description" placeholder="Enter Sub Task Description" >
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="sub_task_link" name="sub_task_link" placeholder="Enter Sub Task Link" >
    </div>
    
    </div>
    <div class="card-footer text-center">
    <button type="submit" class="btn btn-primary">Submit</button>
    <button type="reset" class="btn btn-danger">Reset</button>
  </form>
    </div>
 </div>
  
</div>
</div>
<?php
include('inc/footer.php');
?>