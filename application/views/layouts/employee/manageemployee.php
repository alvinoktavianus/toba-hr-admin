<article class="content responsive-tables-page">
    <div class="title-block">
        <h1 class="title">Manage Employee</h1>
    </div>
    <section class="section">

        <div class="card card-block">

            <div class="row">
                
                <div class="col-md-8">
                    <?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-success" role="alert">
                            <strong><?php echo $this->session->flashdata('success'); ?></strong>
                        </div>
                    <?php endif; ?>                    
                </div>

                <div class="col-md-4">
                    <a href="<?php echo base_url(); ?>manageemployee/add" class="btn btn-block btn-info">Add</a>
                </div>

            </div>
            
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-sm">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Employee ID</th>
                                <th>Full Name</th>
                                <th>Address</th>
                                <th>Personal Leave Balance</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php foreach( $employees as $employee ): ?>

                            <tr>
                                <td> <?php echo $employee->EmployeeID; ?> </td>
                                <td> <?php echo $employee->FullName ?> </td>
                                <td> <?php echo $employee->Address ?> </td>
                                <td> <?php echo $employee->PersonalLeaveBalance ?> </td>
                                <td>
                                    <a href="<?php echo base_url(); ?>manageemployee/update?id=<?php echo $employee->EmployeeID; ?>" class="btn btn-info btn-sm">Update</a>
                                    <br>
                                    <?php if ( $employee->IsActive == 'Y' ): ?>
                                        <a href="<?php echo base_url(); ?>manageemployee/deactivate?id=<?php echo $employee->EmployeeID; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you?')">Deactivate</a>
                                    <?php else: ?>
                                        <a href="<?php echo base_url(); ?>manageemployee/activate?id=<?php echo $employee->EmployeeID; ?>" class="btn btn-success btn-sm">Activate</a>
                                    <?php endif; ?>
                                    <br>
                                    <?php if ( $employee->IsEmployee == 'Y' ): ?>
                                        <a href="<?php echo base_url(); ?>manageemployee/remove?id=<?php echo $employee->EmployeeID; ?>" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal">Remove</a>
                                    <?php endif; ?>
                                </td>
                            </tr>

                        <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
</article>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #FF4444;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Danger!</h4>
      </div>
      <div class="modal-body">
        Remove employee?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>