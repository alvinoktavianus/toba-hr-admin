<article class="content responsive-tables-page">
    <div class="title-block">
        <h1 class="title">Job Position</h1>
    </div>
    <section class="section">

        <div class="card card-block">

            <div class="row">
                <div class="col-md-6">

                    <?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-success" role="alert">
                            <strong><?php echo $this->session->flashdata('success'); ?></strong>
                        </div>
                    <?php endif; ?>

                    <?php echo form_open(base_url().'jobposition/add', ''); ?>

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

                        <div class="form-group row">
                            <?php echo form_submit('save', 'Add Job Position', array( 'class' => 'btn btn-block btn-success' )); ?>
                        </div>

                    <?php echo form_close(); ?>

                </div>
            </div>

            <?php if (count($jobpositions) > 0): ?>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Department Name</th>
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
                                        <a href="" class="btn btn-danger">Deactivated</a>
                                    <?php else: ?>
                                        <a href="" class="btn btn-success">Activaed</a>
                                    <?php endif; ?>
                                </td>
                            </tr>

                        <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            <?php endif; ?>

        </div>
    </section>
</article>
