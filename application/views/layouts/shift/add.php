<article class="content responsive-tables-page">
    <div class="title-block">
        <h1 class="title">Add Shift</h1>
    </div>
    <section class="section">

        <div class="card card-block">

        <?php echo form_open(base_url().'shift/doadd', ''); ?>

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
                        <?php echo form_label('Effective Date', 'effectivedate', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        <div class="col-sm-8">
                            <?php
                                $data = array(
                                    'type' => 'date',
                                    'class' => 'form-control',
                                    'id' => 'effectivedate',
                                    'name' => 'effectivedate',
                                    'required' => true,
                                );
                                echo form_input($data);
                            ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <?php echo form_label('Shift Type', 'shifttype', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        <div class="col-sm-8">
                            <?php
                                $data = array(
                                    'class' => 'form-control',
                                    'id' => 'shifttype',
                                    'required' => true,
                                );
                                $options = array(
                                    '' => '',
                                    'E' => 'Elapsed',
                                    'F' => 'Flexible',
                                    'P' => 'Punch',
                                );
                                echo form_dropdown('shifttype', $options, '', $data);
                            ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <?php echo form_label('Start Time', 'startime', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        <div class="col-sm-8">
                            <?php
                                $data = array(
                                    'type' => 'time',
                                    'class' => 'form-control',
                                    'id' => 'startime',
                                    'name' => 'startime',
                                    'required' => true,
                                );
                                echo form_input($data);
                            ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <?php echo form_label('Start Time Min', 'starttimemin', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        <div class="col-sm-8">
                            <?php
                                $data = array(
                                    'type' => 'time',
                                    'class' => 'form-control',
                                    'id' => 'starttimemin',
                                    'name' => 'starttimemin',
                                    'required' => true,
                                );
                                echo form_input($data);
                            ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <?php echo form_label('Start Time Max', 'starttimemax', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        <div class="col-sm-8">
                            <?php
                                $data = array(
                                    'type' => 'time',
                                    'class' => 'form-control',
                                    'id' => 'starttimemax',
                                    'name' => 'starttimemax',
                                    'required' => true,
                                );
                                echo form_input($data);
                            ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <?php echo form_label('End Time', 'endtime', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        <div class="col-sm-8">
                            <?php
                                $data = array(
                                    'type' => 'time',
                                    'class' => 'form-control',
                                    'id' => 'endtime',
                                    'name' => 'endtime',
                                    'required' => true,
                                );
                                echo form_input($data);
                            ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <?php echo form_label('End Time Min', 'endtimemin', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        <div class="col-sm-8">
                            <?php
                                $data = array(
                                    'type' => 'time',
                                    'class' => 'form-control',
                                    'id' => 'endtimemin',
                                    'name' => 'endtimemin',
                                    'required' => true,
                                );
                                echo form_input($data);
                            ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <?php echo form_label('End Time Max', 'endtimemax', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        <div class="col-sm-8">
                            <?php
                                $data = array(
                                    'type' => 'time',
                                    'class' => 'form-control',
                                    'id' => 'endtimemax',
                                    'name' => 'endtimemax',
                                    'required' => true,
                                );
                                echo form_input($data);
                            ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <?php echo form_label('Schedule Hours', 'schedulehours', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        <div class="col-sm-8">
                            <?php
                                $data = array(
                                    'type' => 'number',
                                    'class' => 'form-control',
                                    'id' => 'schedulehours',
                                    'name' => 'schedulehours',
                                    'required' => true,
                                    'min' => 0,
                                    'max' => 24,
                                );
                                echo form_input($data);
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
