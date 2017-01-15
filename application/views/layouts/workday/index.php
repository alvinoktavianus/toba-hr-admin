<article class="content responsive-tables-page">
    <div class="title-block">
        <h1 class="title">Workday</h1>
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
                    <a href="<?php echo base_url(); ?>workday/add" class="btn btn-block btn-info">Add</a>
                </div>

            </div>

<?php if ( count($results) > 0 ): ?>

<div class="row">
    <div class="col-sm-8">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-sm">
                <thead class="thead-inverse">
                    <tr>
                        <th>#</th>
                        <th>Description</th>
                        <th>Time Rule</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach($results as $result): ?>

                    <tr>
                        <td><?php echo $result['line'] ?></td>
                        <td><?php echo $result['description'] ?></td>
                        <td><?php echo $result['timerule'] ?></td>
                        <td>
                            <?php if ( $result['isactive'] == 'Y' ): ?>
                                <a href="<?php echo base_url(); ?>workday/deactivate?id=<?php echo $result['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you?')">Deactivate</a>
                            <?php else: ?>
                                <a href="<?php echo base_url(); ?>workday/activate?id=<?php echo $result['id']; ?>" class="btn btn-success btn-sm">Activate</a>
                            <?php endif; ?>
                        </td>
                    </tr>

                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>        
    </div>
</div>  

<?php endif; ?>

        </div>
    </section>
</article>
