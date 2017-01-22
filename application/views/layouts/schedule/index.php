<article class="content responsive-tables-page">
    <div class="title-block">
        <h1 class="title">Schedule</h1>
    </div>
    <section class="section">

        <div class="card card-block">

            <div class="row">

                <div class="col-md-8">
                    <?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-success" role="alert">
                            <strong><?php echo $this->session->flashdata('success'); ?></strong>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="col-md-4">
                    <a href="<?php echo base_url(); ?>schedule/add" class="btn btn-block btn-info">Add</a>
                </div>

            </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-sm">
            <thead class="thead-inverse">
                <tr>
                    <th>#</th>
                    <th>Description</th>
                    <th>Day in Schedule</th>
                    <th>Shift Detail</th>
                    <th>Rotation Detail</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                
<tr>
    <td>1</td>
    <td>Employee Schedule</td>
    <td>7</td>
    <td>
        <table class="table table-striped table-bordered table-sm">
            <thead class="thead-inverse">
                <tr>
                    <th>#</th>
                    <th>Workday</th>
                    <th>Shift</th>
                    <th>Off Shift</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Test Workday</td>
                    <td>Regular Shift</td>
                    <td>No</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Test Workday</td>
                    <td>Regular Shift</td>
                    <td>No</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Test Workday</td>
                    <td>Regular Shift</td>
                    <td>No</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Test Workday</td>
                    <td>Regular Shift</td>
                    <td>No</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Test Workday</td>
                    <td>Regular Shift</td>
                    <td>No</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Test Workday</td>
                    <td>Regular Shift</td>
                    <td>Yes</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Test Workday</td>
                    <td>Regular Shift</td>
                    <td>Yes</td>
                </tr>
            </tbody>
        </table>
    </td>
    <td>-</td>
    <td>
<a href="<?php echo base_url(); ?>schedule/deactivate?id=1" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you?')">Deactivate</a>
    </td>
</tr>

            </tbody>
        </table>
    </div>

<!-- <?php if ( count($results) > 0 ): ?>

<div class="row">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-sm">
            <thead class="thead-inverse">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Effective Date</th>
                    <th>Start Time Date</th>
                    <th>Start Time Min</th>
                    <th>Start Time Max</th>
                    <th>End Time Date</th>
                    <th>End Time Min</th>
                    <th>End Time Max</th>
                    <th>Schedule Hours</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                
<?php for ($i=0; $i < count($results); $i++): ?>

<tr>
    <td><?php echo $i+1; ?></td>
    <td><?php echo $results[$i]->Description ?></td>
    <td><?php echo date("d M Y", strtotime($results[$i]->EffectiveDate)) ?></td>
    <td><?php echo date("H : i", strtotime($results[$i]->StartTime)) ?></td>
    <td><?php echo date("H : i", strtotime($results[$i]->StartTimeMin)) ?></td>
    <td><?php echo date("H : i", strtotime($results[$i]->StartTimeMax)) ?></td>
    <td><?php echo date("H : i", strtotime($results[$i]->EndTime)) ?></td>
    <td><?php echo date("H : i", strtotime($results[$i]->EndTimeMin)) ?></td>
    <td><?php echo date("H : i", strtotime($results[$i]->EndTimeMax)) ?></td>
    <td><?php echo $results[$i]->ScheduleHours ?></td>
    <td>
        <?php if ( $results[$i]->IsActive == 'Y' ): ?>
            <a href="<?php echo base_url(); ?>shift/deactivate?id=<?php echo $results[$i]->ShiftId; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you?')">Deactivate</a>
        <?php else: ?>
            <a href="<?php echo base_url(); ?>shift/activate?id=<?php echo $results[$i]->ShiftId; ?>" class="btn btn-success btn-sm">Activate</a>
        <?php endif; ?>
    </td>
</tr>

<?php endfor; ?>

            </tbody>
        </table>
    </div>
</div>  

<?php endif; ?> -->


        </div>
    </section>
</article>
