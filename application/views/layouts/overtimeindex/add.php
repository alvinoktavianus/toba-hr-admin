<article class="content responsive-tables-page">
    <div class="title-block">
        <h1 class="title">Add Overtime Index</h1>
    </div>
    <section class="section">

        <div class="card card-block">

            <?php echo form_open(base_url().'overtimeindex/doadd'); ?>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group row">
                        <?php echo form_label('Name', 'overtimeindexname', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        <div class="col-sm-8">
                            <?php
                            $data = array(
                                'type' => 'text',
                                'class' => 'form-control',
                                'id' => 'overtimeindexname',
                                'name' => 'overtimeindexname',
                                'required' => true
                            );
                            echo form_input($data);
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">

                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>Overtime Index Detail</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>

                                        <div class="table-responsive">
                                            <table class="table dynamic" border="0">
                                                <thead class="thead-inverse">
                                                    <tr>
                                                        <th>From Hour</th>
                                                        <th>To Hour</th>
                                                        <th>Index</th>
                                                        <th>Accum Index</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <?php
                                                            $data = array(
                                                                'type' => 'number',
                                                                'class' => 'form-control',
                                                                'id' => 'fromhour',
                                                                'name' => 'fromhour[]',
                                                                'required' => true
                                                            );
                                                            echo form_input($data);
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $data = array(
                                                                'type' => 'number',
                                                                'class' => 'form-control',
                                                                'id' => 'tohour',
                                                                'name' => 'tohour[]',
                                                                'required' => true
                                                            );
                                                            echo form_input($data);
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $data = array(
                                                                'type' => 'number',
                                                                'class' => 'form-control',
                                                                'id' => 'index',
                                                                'name' => 'index[]',
                                                                'required' => true,
                                                                'step' => 0.001,
                                                                'min' => 0,
                                                            );
                                                            echo form_input($data);
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $data = array(
                                                                'type' => 'number',
                                                                'class' => 'form-control',
                                                                'id' => 'accumindex',
                                                                'name' => 'accumindex[]',
                                                                'required' => true,
                                                                'step' => 0.001,
                                                                'min' => 0,
                                                            );
                                                            echo form_input($data);
                                                            ?>
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

            <div class="row">
                <div class="form-group row">
                    <div class="col-md-6">
                        <?php echo form_submit('save', 'Save', array( 'class' => 'btn btn-block btn-success' )); ?>
                    </div>
                </div>
            </div>

        </div>
        <?php echo form_close(); ?>
    </section>
</article>
