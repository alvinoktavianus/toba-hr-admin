<article class="content responsive-tables-page">
    <div class="title-block">
        <h1 class="title">Add Time Rule</h1>
    </div>
    <section class="section">

        <div class="card card-block">

        <?php echo form_open(base_url().'timerule/doadd', ''); ?>

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
                        <?php echo form_label('Overtime Index', 'overtimeindex', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        <div class="col-sm-8">
                            <?php
                                $data = array(
                                    'class' => 'form-control',
                                    'id' => 'overtimeindex',
                                    'required' => true,
                                );
                                echo form_dropdown('overtimeindex', $overtimes, '', $data);
                            ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <?php echo form_label('Rounding', 'rounding', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        <div class="col-sm-8">
                            <?php
                                $data = array(
                                    'class' => 'form-control',
                                    'id' => 'rounding',
                                    'required' => true,
                                );
                                echo form_dropdown('rounding', $roundings, '', $data);
                            ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <?php echo form_label('Overtime Based On', 'basedon', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        <div class="col-sm-8">
                            <?php
                                $options = array('' => '', 'R' => 'Request', 'N' => "No Request");
                                $data = array(
                                    'class' => 'form-control',
                                    'id' => 'basedon',
                                    'required' => true,
                                );
                                echo form_dropdown('basedon', $options, '', $data);
                            ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <?php echo form_label('Overtime Type', 'overtimetype', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        <div class="col-sm-8">
                            <?php
                                $options = array('' => '', 'M' => 'Merge', 'N' => "No Merge");
                                $data = array(
                                    'class' => 'form-control',
                                    'id' => 'overtimetype',
                                    'required' => true,
                                );
                                echo form_dropdown('overtimetype', $options, '', $data);
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
