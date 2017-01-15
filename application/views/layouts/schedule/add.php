<article class="content responsive-tables-page">
    <div class="title-block">
        <h1 class="title">Add Schedule</h1>
    </div>
    <section class="section">

        <div class="card card-block">

        <?php echo form_open(base_url().'schedule/doadd', ''); ?>

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
                        <?php echo form_label('Days in Schedule', 'daysinschedule', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        <div class="col-sm-8">
                            <?php
                                $data = array(
                                    'type' => 'number',
                                    'class' => 'form-control',
                                    'id' => 'daysinschedule',
                                    'name' => 'daysinschedule',
                                    'required' => true,
                                );
                                echo form_input($data);
                            ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group row">
                                <label style="padding-left: 15px;">
                                    <input type="checkbox" id="norotation" name="norotation" class="checkbox" value="N"/><span>No Rotation</span>
                                </label>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row" id="dtl-rotation">
                <div class="col-md-8">

                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>Rotation Detail</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>

                                        <div class="table-responsive">
                                            <table class="table" border="0" id="dtl-rotation">
                                                <thead class="thead-inverse">
                                                    <tr>
                                                        <th>Rotation Name</th>
                                                        <th>Relative Date</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <?php
                                                            $data = array(
                                                                'type' => 'text',
                                                                'class' => 'form-control',
                                                                'id' => 'rotationname',
                                                                'name' => 'rotationname[]',
                                                            );
                                                            echo form_input($data);
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $data = array(
                                                                'type' => 'number',
                                                                'class' => 'form-control',
                                                                'id' => 'relativeday',
                                                                'name' => 'relativeday[]',
                                                            );
                                                            echo form_input($data);
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $data = array(
                                                                'class' => 'btn btn-success',
                                                                'type' => 'button',
                                                                'value' => 'Add',
                                                                'id' => 'add-rotation',
                                                            );
                                                            echo form_input($data);
                                                            ?>
                                                            <?php
                                                            $data = array(
                                                                'class' => 'btn btn-danger',
                                                                'type' => 'button',
                                                                'value' => 'Remove',
                                                                'id' => 'delete-rotation',
                                                            );
                                                            echo form_input($data);
                                                            ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

            <div class="row" id="dtl-rotation">
                <div class="col-md-8">

                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>Shift Detail</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>

                                        <div class="table-responsive">
                                            <table class="table dynamic" border="0">
                                                <thead class="thead-inverse">
                                                    <tr>
                                                        <th>Workday</th>
                                                        <th>Shift</th>
                                                        <th></th>
                                                        <th></th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <?php
                                                            $data = array(
                                                                'class' => 'form-control',
                                                                'id' => 'workday',
                                                                'required' => true,
                                                            );
                                                            echo form_dropdown('workday[]', $workdays, '', $data);
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $data = array(
                                                                'class' => 'form-control',
                                                                'id' => 'shift',
                                                                'required' => true,
                                                            );
                                                            echo form_dropdown('shift[]', $shifts, '', $data);
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <label>
                                                                <input type="checkbox" id="offshift" name="offshift[]" class="checkbox" value="N"/><span>Off Shift</span>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $data = array(
                                                                'class' => 'btn btn-success add',
                                                                'type' => 'button',
                                                                'value' => 'Add',
                                                            );
                                                            echo form_input($data);
                                                            ?>
                                                            <?php
                                                            $data = array(
                                                                'class' => 'btn btn-danger delete',
                                                                'type' => 'button',
                                                                'value' => 'Remove',
                                                            );
                                                            echo form_input($data);
                                                            ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

            <div class="form-group row">
                <?php echo form_submit('save', 'Save', array( 'class' => 'btn btn-block btn-primary' )); ?>
            </div>

        <?php echo form_close(); ?>

        </div>
    </section>
</article>
