<article class="content responsive-tables-page">
    <div class="title-block">
        <h1 class="title">Update Employee</h1>
    </div>
    <section class="section">

        <div class="card card-block">

        <?php echo form_open(base_url().'manageemployee/doupdate?id=', ''); ?>

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
                                    'value' => $current->IdCardNo
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
                                    'value' => $current->FullName,
                                );
                                echo form_input($data);
                            ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <?php echo form_label('Location of Birth', 'birthlocation', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        <div class="col-sm-8">
                            <?php
                                $data = array(
                                    'type' => 'text',
                                    'class' => 'form-control',
                                    'id' => 'birthlocation',
                                    'name' => 'birthlocation',
                                    'required' => true,
                                    'value' => $current->BirthLocation,
                                );
                                echo form_input($data);
                            ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <?php echo form_label('Date of Birth', 'birthdate', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        <div class="col-sm-8">
                            <?php
                                $data = array(
                                    'type' => 'date',
                                    'class' => 'form-control',
                                    'id' => 'birthdate',
                                    'name' => 'birthdate',
                                    'required' => true,
                                    'value' => $current->BirthDate,
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
                                echo form_textarea(array( 'name' => 'address', 'rows' => 3 ), $current->Address, $data);
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
                                    'value' => $current->PostalCode,
                                );
                                echo form_input($data);
                            ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <?php echo form_label('Gender', 'gender', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        <div class="col-sm-8">
                            <?php
                                $data = array(
                                    'class' => 'form-control',
                                    'id' => 'gender',
                                    'required' => true,
                                );
                                $options = array(
                                    '' => '',
                                    'M' => 'Male',
                                    'F' => 'Female',
                                );
                                echo form_dropdown('gender', $options, $current->Gender, $data);
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
                                echo form_dropdown('bloodtype', $options, $current->BloodType, $data);
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
                                    'value' => $current->Email,
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
                                    'value' => $current->PhoneNo,
                                );
                                echo form_input($data);
                            ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <?php echo form_label('Profile picture', 'imgurl', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        <div class="col-sm-8">
                            <?php
                                $data = array(
                                    'type' => 'url',
                                    'class' => 'form-control',
                                    'id' => 'imgurl',
                                    'name' => 'imgurl',
                                    'required' => true,
                                    'value' => $current->ImgUrl,
                                );
                                echo form_input($data);
                            ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <?php echo form_label('Department', 'department', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        <div class="col-sm-8">
                            <?php
                                $data = array(
                                    'type' => 'number',
                                    'class' => 'form-control',
                                    'id' => 'department',
                                    'name' => 'department',
                                    'required' => true,
                                );
                                echo form_dropdown('department', $departments, $current->DepartmentID, $data);
                            ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <?php echo form_label('Job Position', 'jobposition', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        <div class="col-sm-8">
                            <?php
                                $data = array(
                                    'type' => 'number',
                                    'class' => 'form-control',
                                    'id' => 'jobposition',
                                    'name' => 'jobposition',
                                    'required' => true,
                                );
                                $options = array(
                                    '' => '',
                                    'emp' => 'Employee',
                                    'adm' => 'Administrator'
                                );
                                echo form_dropdown('jobposition', $jobpositions, $current->JobPositionID, $data);
                            ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <?php echo form_label('Work Rule', 'workrule', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        <div class="col-sm-8">
                            <?php
                                $data = array(
                                    'type' => 'number',
                                    'class' => 'form-control',
                                    'id' => 'workrule',
                                    'name' => 'workrule',
                                    'required' => true,
                                );
                                $options = array(
                                    '' => '',
                                    'emp' => 'Employee',
                                    'adm' => 'Administrator'
                                );
                                echo form_dropdown('workrule', $options, '', $data);
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
