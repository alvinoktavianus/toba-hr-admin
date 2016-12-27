<article class="content responsive-tables-page">
    <div class="title-block">
        <h1 class="title">Manage Employee</h1>
    </div>
    <section class="section">

        <div class="card card-block">

            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Employee ID</th>
                            <th>Full Name</th>
                            <th>Address</th>
                            <th>Personal Leave Balance</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

<?php foreach( $employees as $employee ): ?>

    <tr>
        <td> <?php echo $employee->EmployeeID; ?> </td>
        <td> <?php echo $employee->FullName ?> </td>
        <td> <?php echo $employee->Address ?> </td>
        <td> <?php echo $employee->PersonalLeaveBalance ?> </td>
        <td>
            <?php if ( $employee->IsActive == 'Y' ): ?>
                <a href="" class="btn btn-danger">Deactivated</a>
            <?php else: ?>
                <a href="" class="btn btn-success">Activaed</a>
            <?php endif; ?>
        </td>
    </tr>

<?php endforeach; ?>

                    </tbody>
                </table>
            </div>

        </div>
    </section>
</article>
