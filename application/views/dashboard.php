
   
      
        <div class="page-wrapper">
           
            <div class="container-fluid">
             
                <div class="row">
                   
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Muskan</h4>
                                <div class="text-end">
                                    
                                </div>
                                <span class="text-success">1%</span>
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar"
                                        style="width: 1%; height: 6px;" aria-valuenow="1" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Vimal</h4>
                               
                                <span class="text-info">1%</span>
                                <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar"
                                        style="width: 1%; height: 6px;" aria-valuenow="1" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <div class="row">
                    <!-- Column -->
                    <?php foreach($get_task as $data){ ?>
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><?= $data->task_name?></h4>
                                <div class="text-end">
                                    
                                </div>
                                <span class="text-success">1%</span>
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar"
                                        style="width: 1%; height: 6px;" aria-valuenow="1" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>

                                <br>

                                <span class="text-success">1%</span>
                                <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar"
                                        style="width: 1%; height: 6px;" aria-valuenow="1" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <!-- Column -->
                    <!-- Column -->
                    
                    <!-- Column -->
                </div>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
               
                <!-- ============================================================== -->
                <!-- Table -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-md-flex">
                                    <h4 class="card-title col-md-10 mb-md-0 mb-3 align-self-center">Team Details</h4>
                                    
                                </div>
                                <div class="table-responsive mt-5">
                                    <table class="table stylish-table no-wrap">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0" colspan="2">Team</th>
                                                <th class="border-top-0">Name</th>
                                                <th class="border-top-0">About</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="width:50px;"><span class="round"><img src="<?=base_url('assets/images/muskan.jpeg')?>"
                                                            alt="user" class="round" width="50"></span></td>
                                                <td class="align-middle">
                                                    <h6>Muskan Panwar</h6><small class="text-muted">Teacher</small>
                                                </td>
                                                <td class="align-middle">Muskan Panwar</td>
                                                <td class="align-middle">Atyachari</td>
                                            </tr>
                                            <tr class="active">
                                                <td><span class="round"><img src="<?=base_url('assets/images/vimal.jpeg')?>"
                                                            alt="user" width="50"></span></td>
                                                <td class="align-middle">
                                                    <h6>Vimal Pandey</h6><small class="text-muted">Student</small>
                                                </td>
                                                <td class="align-middle">Vimal Pandey</td>
                                                <td class="align-middle">Lachar</td>
                                            </tr>
                                          
                                          
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
          
            <?php
include('inc/footer.php');
?>    