<article class="content responsive-tables-page">
    <div class="title-block">
        <h1 class="title">Add Employee</h1>
    </div>
    <section class="section">

        <div class="card card-block">

        <?php echo form_open(base_url().'manageemployee/doadd', ''); ?>

            <div class="row">
                <div class="col-md-6">

                    <?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-success" role="alert">
                            <strong><?php echo $this->session->flashdata('success'); ?></strong>
                        </div>
                    <?php endif; ?>

                    <div class="form-group row">
                        <?php echo form_label('ID Card No.', 'idcardno', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        <div class="col-sm-8">
                            <?php
                                $data = array(
                                    'type' => 'number',
                                    'class' => 'form-control',
                                    'id' => 'idcardno',
                                    'name' => 'idcardno',
                                    'required' => true,
                                );
                                echo form_input($data);
                            ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <?php echo form_label('Full Name', 'fullname', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        <div class="col-sm-8">
                            <?php
                                $data = array(
                                    'type' => 'text',
                                    'class' => 'form-control',
                                    'id' => 'fullname',
                                    'name' => 'fullname',
                                    'required' => true,
                                );
                                echo form_input($data);
                            ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <?php echo form_label('Birth Location', 'birthlocation', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        <div class="col-sm-8">
                            <?php
                                $data = array(
                                    'type' => 'text',
                                    'class' => 'form-control',
                                    'id' => 'birthlocation',
                                    'name' => 'birthlocation',
                                    'required' => true,
                                );
                                echo form_input($data);
                            ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <?php echo form_label('Birth Date', 'birthdate', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        <div class="col-sm-8">
                            <?php
                                $data = array(
                                    'type' => 'date',
                                    'class' => 'form-control',
                                    'id' => 'birthdate',
                                    'name' => 'birthdate',
                                    'required' => true,
                                );
                                echo form_input($data);
                            ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <?php echo form_label('Address', 'address', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        <div class="col-sm-8">
                            <?php
                                $data = array(
                                    'class' => 'form-control',
                                    'id' => 'address',
                                    'style' => 'resize:none',
                                    'required' => true,
                                );
                                echo form_textarea(array( 'name' => 'address', 'rows' => 3 ), '', $data);
                            ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <?php echo form_label('Postal Code', 'postalcode', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        <div class="col-sm-8">
                            <?php
                                $data = array(
                                    'type' => 'number',
                                    'class' => 'form-control',
                                    'id' => 'postalcode',
                                    'name' => 'postalcode',
                                    'required' => true,
                                );
                                echo form_input($data);
                            ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <?php echo form_label('Blood Type', 'bloodtype', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        <div class="col-sm-8">
                            <?php
                                $data = array(
                                    'type' => 'number',
                                    'class' => 'form-control',
                                    'id' => 'bloodtype',
                                    'required' => true,
                                );
                                $options = array(
                                    '' => '',
                                    'O' => 'O',
                                    'A' => 'A',
                                    'B' => 'B',
                                    'AB' => 'AB'
                                );
                                echo form_dropdown('bloodtype', $options, '', $data);
                            ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <?php echo form_label('Email', 'email', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        <div class="col-sm-8">
                            <?php
                                $data = array(
                                    'type' => 'email',
                                    'class' => 'form-control',
                                    'id' => 'email',
                                    'name' => 'email',
                                    'required' => true,
                                );
                                echo form_input($data);
                            ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <?php echo form_label('Password', 'password', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        <div class="col-sm-8">
                            <?php
                                $data = array(
                                    'type' => 'password',
                                    'class' => 'form-control',
                                    'id' => 'password',
                                    'name' => 'password',
                                    'required' => true,
                                );
                                echo form_input($data);
                            ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <?php echo form_label('Phone No.', 'phoneno', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        <div class="col-sm-8">
                            <?php
                                $data = array(
                                    'type' => 'number',
                                    'class' => 'form-control',
                                    'id' => 'phoneno',
                                    'name' => 'phoneno',
                                    'required' => true,
                                );
                                echo form_input($data);
                            ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <?php echo form_label('Role', 'role', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        <div class="col-sm-8">
                            <?php
                                $data = array(
                                    'type' => 'number',
                                    'class' => 'form-control',
                                    'id' => 'role',
                                    'name' => 'role',
                                    'required' => true,
                                );
                                $options = array(
                                    '' => '',
                                    'emp' => 'Employee',
                                    'adm' => 'Administrator'
                                );
                                echo form_dropdown('role', $options, '', $data);
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
