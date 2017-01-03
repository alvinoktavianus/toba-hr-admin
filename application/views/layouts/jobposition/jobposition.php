<article class="content responsive-tables-page">
    <div class="title-block">
        <h1 class="title">Job Position</h1>
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

                <?php echo form_open(base_url().'jobposition/add', ''); ?>

                    <div class="col-md-8">

                        <div class="form-group row">
                            <?php echo form_label('Job Name', 'jobname', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                            <div class="col-sm-8">
                                <?php
                                    $data = array(
                                        'type' => 'text',
                                        'class' => 'form-control',
                                        'id' => 'jobname',
                                        'name' => 'jobname'
                                    );
                                    echo form_input($data);
                                ?>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-4">
                        <?php echo form_submit('save', 'Add Job Position', array( 'class' => 'btn btn-block btn-success' )); ?>
                    </div>

                <?php echo form_close(); ?>

            </div>

            <?php if (count($jobpositions) > 0): ?>
                <div class="row">
                    <div class="col-md-8">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-sm">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th>#</th>
                                        <th>Job Position Name</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach( $jobpositions as $jobposition ): ?>

                                        <tr>
                                            <td> <?php echo $jobposition->JobPositionID; ?> </td>
                                            <td> <?php echo $jobposition->Description ?> </td>
                                            <td>
                                                <?php if ( $jobposition->IsActive == 'Y' ): ?>
                                                    <a href="<?php echo base_url(); ?>jobposition/deactivate?id=<?php echo $jobposition->JobPositionID; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you?')">Deactivate</a>
                                                <?php else: ?>
                                                    <a href="<?php echo base_url(); ?>jobposition/activate?id=<?php echo $jobposition->JobPositionID; ?>" class="btn btn-success btn-sm">Activate</a>
                                                <?php endif; ?>
                                                <br>
                                                <a href="<?php echo base_url(); ?>jobposition/update?id=<?php echo $jobposition->JobPositionID; ?>" class="btn btn-info btn-sm">Update</a>
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
