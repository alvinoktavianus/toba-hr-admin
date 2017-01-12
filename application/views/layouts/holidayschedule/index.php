<article class="content responsive-tables-page">
    <div class="title-block">
        <h1 class="title">Holiday Schedule</h1>
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
                    <a href="<?php echo base_url(); ?>holidayschedule/add" class="btn btn-block btn-info">Add</a>
                </div>

            </div>

            <?php if (count($schedules) > 0): ?>
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-sm">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>Name</th>
                                    <th>Details</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

<?php foreach( $schedules as $schedule ): ?>
    
    <tr>
        <td><?php echo $schedule['description'] ?></td>
        <td>
            <div class="table-responsive">
                <table class="table">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Name</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Holiday Type</th>
                        </tr>
                    </thead>
                    <?php foreach($schedule['details'] as $detail): ?>
                        <tr>
                            <td><?php echo $detail['name']; ?></td>
                            <td><?php echo $detail['startdate']; ?></td>
                            <td><?php echo $detail['enddate']; ?></td>
                            <td>
                                <?php if ( $detail['holidaytype'] == 'N' ) { echo "Libur Nasional"; } else { echo "Cuti Bersama"; } ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </td>
        <td>
            <?php if ( $schedule['isactive'] == 'Y' ): ?>
                <a href="<?php echo base_url(); ?>holidayschedule/deactivate?id=<?php echo $schedule['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you?')">Deactivate</a>
            <?php else: ?>
                <a href="<?php echo base_url(); ?>holidayschedule/activate?id=<?php echo $schedule['id']; ?>" class="btn btn-success btn-sm">Activate</a>
            <?php endif; ?>
        </td>
    </tr>

<?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>                        
                </div>
            <?php endif; ?>


        </div>
    </section>
</article>
