<article class="content responsive-tables-page">
    <div class="title-block">
        <h1 class="title">Home</h1>
    </div>
    <section class="section">

        <div class="row">
            <div class="col-sm-6">
                <div class="card card-block">
                    <h5>Employee Absence</h5>

<?php if (count($presents) > 0): ?>

        <div class="table-responsive">
            <table class="table table-striped table-bordered table-sm">
                <thead class="thead-inverse">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Location</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($presents as $present): ?>
                        <tr>
                            <td><?php echo $present['line']; ?></td>
                            <td><?php echo $present['name']; ?></td>
                            <td><?php echo $present['checkin']; ?></td>
                            <td><?php echo $present['checkout']; ?></td>
                            <td><?php echo $present['location']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

<?php else: ?>
    No data
<?php endif; ?>

                </div>
                
            </div>
            <div class="col-sm-6">
                <div class="card card-block">
                    <h5>Employee Leave</h5>

<?php if (count($absences) > 0): ?>

        <div class="table-responsive">
            <table class="table table-striped table-bordered table-sm">
                <thead class="thead-inverse">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Reason</th>
                        <th>Leave day</th>
                        <th>Leave duration</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($absences as $absence): ?>
                        <tr>
                            <td><?php echo $absence['line']; ?></td>
                            <td><?php echo $absence['name']; ?></td>
                            <td><?php echo $absence['reason']; ?></td>
                            <td>
<?php
    if ($absence['duration'] > 1) {
        echo $absence['leavestart']." - ".$absence['leaveend'];
    } else {
        echo $absence['leaveend'];
    }
?>
                            </td>
                            <td><?php echo $absence['duration']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

<?php else: ?>
    No data
<?php endif; ?>

                </div>
            </div>
        </div>
    </section>
</article>
