<article class="content responsive-tables-page">
    <div class="title-block">
        <h1 class="title">Rounding</h1>
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
                    <a href="<?php echo base_url(); ?>rounding/add" class="btn btn-block btn-info">Add</a>
                </div>

            </div>

<?php if ( count($results) > 0 ): ?>

<div class="row">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-sm">
            <thead class="thead-inverse">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Details</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                
<?php foreach( $results as $result ): ?>

<tr>
    <td><?php echo $result['line']; ?></td>
    <td><?php echo $result['description']; ?></td>
    <td>
        <?php if ( $result['isrounding'] == 'Y' ): ?>
        <table class="table-sm table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>#</th>
                    <th>Minutes From</th>
                    <th>Minutes To</th>
                    <th>Rounding Value</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($result['details'] as $detail): ?>
                    <tr>
                        <td><?php echo $detail['line']; ?></td>
                        <td><?php echo $detail['minutesfrom']; ?></td>
                        <td><?php echo $detail['minutesto']; ?></td>
                        <td><?php echo $detail['value']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
            -
        <?php endif; ?>
    </td>
    <td>
        <?php if ( $result['isactive'] == 'Y' ): ?>
            <a href="<?php echo base_url(); ?>rounding/deactivate?id=<?php echo $result['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you?')">Deactivate</a>
        <?php else: ?>
            <a href="<?php echo base_url(); ?>rounding/activate?id=<?php echo $result['id']; ?>" class="btn btn-success btn-sm">Activate</a>
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
