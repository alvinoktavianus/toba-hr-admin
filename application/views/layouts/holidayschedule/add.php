<article class="content responsive-tables-page">
    <div class="title-block">
        <h1 class="title">Add Holiday Schedule</h1>
    </div>
    <section class="section">

        <div class="card card-block">

            <div class="row">
                <div class="col-md-8" id="holiday-detail">
                    
                    <?php echo form_open(base_url().'holidayschedule/doadd'); ?>

                        <div class="form-group row">
                            <?php echo form_label('Name', 'holidayschedulename', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                            <div class="col-sm-8">
                                <?php
                                    $data = array(
                                        'type' => 'text',
                                        'class' => 'form-control',
                                        'id' => 'holidayschedulename',
                                        'name' => 'holidayschedulename',
                                        'required' => true
                                    );
                                    echo form_input($data);
                                ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <?php echo form_label('Schedule', 'schedule', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        </div>                        

                        <div class="form-group row">

                            <div class="table-responsive">
                                <table class="table" border="0" id="dtl-schedule">

                                        <tr>
                                            <td style="border-top-width: 0">
                                                <?php
                                                    $data = array(
                                                        'class' => 'form-control',
                                                        'type' => 'text',
                                                        'required' => true
                                                    );
                                                    echo form_dropdown('schedule[]', $options, '', $data);
                                                ?>
                                            </td>
                                            <td style="border-top-width: 0">
                                                <?php
                                                    $data = array(
                                                        'class' => 'btn btn-success add-schedule',
                                                        'type' => 'button',
                                                        'value' => 'Add',
                                                    );
                                                    echo form_input($data);
                                                ?>
                                                <?php
                                                    $data = array(
                                                        'class' => 'btn btn-danger delete-schedule',
                                                        'type' => 'button',
                                                        'value' => 'Remove',
                                                    );
                                                    echo form_input($data);
                                                ?>
                                            </td>
                                        </tr>

                                </table>
                            </div>

                        </div>

                        <div class="form-group row">
                            
                            <div class="col-md-12">
                                <?php echo form_submit('save', 'Save', array( 'class' => 'btn btn-block btn-success' )); ?>
                            </div>

                        </div>

                    <?php echo form_close(); ?>

                </div>
            </div>

        </div>
    </section>
</article>
