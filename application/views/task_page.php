<!-- Add this script block at the end of your HTML body -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $('.status').change(function () {
            var selectedStatus = $(this).val();
            var taskId = $(this).closest('tr').find('.task-id').text(); // Add a class 'task-id' to the <td> containing the task id

            // Send AJAX request to update the status
            $.ajax({
                url: '<?= base_url('admin/status_change/' . $title) ?>/' + taskId,
                type: 'post',
                data: { status: selectedStatus },
                success: function (response) {
                    // Handle the success response if needed
                    console.log(response);
                },
                error: function (error) {
                    // Handle the error if needed
                    console.log(error);
                }
            });
        });
    });
</script>

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
    <div class="container-fluid">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Task Name</th>
                    <th>Link</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($get_sub_tasks as $data) { ?>
                    <tr>
                        <td class="task-id"><?= $data->id ?></td>
                        <td>
                            <?= $data->Sub_Task_Name ?><br>
                            <hr>
                        </td>
                        <td><a href="<?= $data->Link ?>"><?= $data->Link ?></a></td>
                        <td>
                            <form>
                                <div class="form-group text-center">
                                    <form action="<?= base_url('admin/status_change/' . $title . '/' . $data->id) ?>" method="post">
                                        <select class="form-select form-control status" name="status" id="status">
                                            <?php
                                            $statuses = ['Open', 'Vimal Done', 'Muskan Done', 'Completed'];
                                            foreach ($statuses as $index => $status) {
                                                $selected = ($data->Status == $index) ? 'selected' : '';
                                                echo "<option value='$index' class='btn btn-info' $selected>$status</option>";
                                            }
                                            ?>
                                        </select>
                                    </form>
                                </div>
                            </form>
                        </td>
                        <td><a href="<?= base_url('task/' . $title . '/') . $data->id ?>" class="btn btn-primary">Edit</a></td>
                        <td><a href="<?= base_url('delete_sub_task/' . $title . '/' . $data->id) ?>" class="btn btn-danger">Delete</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include('inc/footer.php'); ?>
