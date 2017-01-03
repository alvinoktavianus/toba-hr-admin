<article class="content responsive-tables-page">
    <div class="title-block">
        <h1 class="title">Manage Employee</h1>
    </div>
    <section class="section">

        <div class="card card-block">

            <div class="table-responsive">
                <table class="table table-striped table-bordered table-sm">
                    <thead class="thead-inverse">
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
                                <a href="<?php echo base_url(); ?>manageemployee/update?id=<?php echo $employee->EmployeeID; ?>" class="btn btn-info btn-sm">Update</a>
                                <br>
                                <?php if ( $employee->IsActive == 'Y' ): ?>
                                    <a href="<?php echo base_url(); ?>manageemployee/deactivate?id=<?php echo $employee->EmployeeID; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you?')">Deactivate</a>
                                <?php else: ?>
                                    <a href="<?php echo base_url(); ?>manageemployee/activate?id=<?php echo $employee->EmployeeID; ?>" class="btn btn-success btn-sm">Activate</a>
                                <?php endif; ?>
                                <br>
                                <?php if ( $employee->IsEmployee == 'Y' ): ?>
                                    <a href="<?php echo base_url(); ?>manageemployee/remove?id=<?php echo $employee->EmployeeID; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you?')">Remove</a>
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
