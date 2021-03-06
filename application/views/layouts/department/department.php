<article class="content responsive-tables-page">
    <div class="title-block">
        <h1 class="title">Department</h1>
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

            </div>

            <div class="row">

                <?php echo form_open(base_url().'department/add', ''); ?>

                    <div class="col-md-8">

                        <div class="form-group row">
                            <?php echo form_label('Department Name', 'departmentname', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                            <div class="col-sm-8">
                                <?php
                                    $data = array(
                                        'type' => 'text',
                                        'class' => 'form-control',
                                        'id' => 'departmentname',
                                        'name' => 'departmentname'
                                    );
                                    echo form_input($data);
                                ?>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-4">
                        <?php echo form_submit('save', 'Add Department', array( 'class' => 'btn btn-block btn-success' )); ?>
                    </div>

                <?php echo form_close(); ?>

            </div>

            <?php if (count($departments) > 0): ?>
                <div class="row">
                    <div class="col-md-8">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-sm" id="table-department">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th>#</th>
                                        <th>Department Name</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php foreach( $departments as $department ): ?>

                                    <tr>
                                        <td> <?php echo $department->DepartmentID; ?> </td>
                                        <td> <?php echo $department->Description ?> </td>
                                        <td>
                                            <?php if ( $department->IsActive == 'Y' ): ?>
                                                <a href="<?php echo base_url(); ?>department/deactivate?id=<?php echo $department->DepartmentID; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you?')">Deactivate</a>
                                            <?php else: ?>
                                                <a href="<?php echo base_url(); ?>department/activate?id=<?php echo $department->DepartmentID; ?>" class="btn btn-success btn-sm">Activate</a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>

                                <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>                        
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </section>
</article>
