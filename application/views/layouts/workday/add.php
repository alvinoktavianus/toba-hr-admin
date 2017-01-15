<article class="content responsive-tables-page">
    <div class="title-block">
        <h1 class="title">Add Workday</h1>
    </div>
    <section class="section">

        <div class="card card-block">

        <?php echo form_open(base_url().'workday/doadd', ''); ?>

            <div class="row">
                <div class="col-md-6">

                    <div class="form-group row">
                        <?php echo form_label('Description', 'description', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        <div class="col-sm-8">
                            <?php
                                $data = array(
                                    'type' => 'text',
                                    'class' => 'form-control',
                                    'id' => 'description',
                                    'name' => 'description',
                                    'required' => true,
                                );
                                echo form_input($data);
                            ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <?php echo form_label('Time Rule', 'timerule', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        <div class="col-sm-8">
                            <?php
                                $data = array(
                                    'class' => 'form-control',
                                    'id' => 'timerule',
                                    'required' => true,
                                );
                                echo form_dropdown('timerule', $options, '', $data);
                            ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <?php echo form_submit('save', 'Save', array( 'class' => 'btn btn-block btn-primary' )); ?>
                    </div>

                </div>
            </div>


        <?php echo form_close(); ?>

        </div>
    </section>
</article>
