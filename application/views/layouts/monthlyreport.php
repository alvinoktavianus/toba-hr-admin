<article class="content responsive-tables-page">
    <div class="title-block">
        <h1 class="title">Monthly Report</h1>
    </div>
    <section class="section">

        <div class="card card-block">

            <div class="row">
                <div class="col-md-6">

                    <div class="form-group row">
                        <?php echo form_label('Select month', 'month', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        <div class="col-sm-8">
                            <?php
                                $data = array(
                                    'class' => 'form-control',
                                    'id' => 'month',
                                    'name' => 'month',
                                    'required' => true,
                                );
                                echo form_dropdown('month', '', '', $data);
                            ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <?php echo form_label('Select year', 'year', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        <div class="col-sm-8">
                            <?php
                                $data = array(
                                    'class' => 'form-control',
                                    'id' => 'year',
                                    'name' => 'year',
                                    'required' => true,
                                );
                                echo form_dropdown('month', '', '', $data);
                            ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <?php echo form_submit('save', 'Select', array( 'class' => 'btn btn-block btn-primary' )); ?>
                    </div>

                </div>
            </div>

<div class="row">
    <div class="col-sm-8">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-sm">
                <thead class="thead-inverse">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Present</th>
                        <th>Leave</th>
                        <th>Overtime</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <tr>
                        <td>1</td>
                        <td>Alvin Oktavianus</td>
                        <td>20 days</td>
                        <td>0 day</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Albert Kurniadinata</td>
                        <td>20 days</td>
                        <td>0 day</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Anindia Rifara</td>
                        <td>20 days</td>
                        <td>0 day</td>
                        <td>28</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Stephan Christianus</td>
                        <td>19 days</td>
                        <td>1 day</td>
                        <td>40</td>
                    </tr>

                </tbody>
            </table>
        </div>        
    </div>
</div>  


        </div>
    </section>
</article>
