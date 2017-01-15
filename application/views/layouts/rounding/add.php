<article class="content responsive-tables-page">
    <div class="title-block">
        <h1 class="title">Add Rounding</h1>
    </div>
    <section class="section">

        <div class="card card-block">

            <?php echo form_open(base_url().'rounding/doadd'); ?>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group row">
                        <?php echo form_label('Name', 'roundingname', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        <div class="col-sm-8">
                            <?php
                            $data = array(
                                'type' => 'text',
                                'class' => 'form-control',
                                'id' => 'roundingname',
                                'name' => 'roundingname',
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
                                    <th>Rounding Detail</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>

                                        <div class="table-responsive">
                                            <table class="table dynamic" border="0">
                                                <thead class="thead-inverse">
                                                    <tr>
                                                        <th>Minutes From</th>
                                                        <th>Minutes To</th>
                                                        <th>Rounding Value</th>
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
                                                                'id' => 'minutesfrom',
                                                                'name' => 'minutesfrom[]',
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
                                                                'id' => 'minutesto',
                                                                'name' => 'minutesto[]',
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
                                                                'id' => 'rounding',
                                                                'name' => 'rounding[]',
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
