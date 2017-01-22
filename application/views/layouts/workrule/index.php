<article class="content responsive-tables-page">
    <div class="title-block">
        <h1 class="title">Work Rule</h1>
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
                    <a href="<?php echo base_url(); ?>workrule/add" class="btn btn-block btn-info">Add</a>
                </div>

            </div>


<div class="row">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-sm">
            <thead class="thead-inverse">
                <tr>
                    <th>#</th>
                    <th>Description</th>
                    <th>Schedule</th>
                    <th>Holiday Schedule</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td>1</td>
                    <td>Test work schedule</td>
                    <td>Test No Rotation 1</td>
                    <td>Test Holiday 7</td>
                    <td>
                        <a href="<?php echo base_url(); ?>workrule/deactivate?id=1" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you?')">Deactivate</a>
                    </td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>Toba Work Rule</td>
                    <td>Test No Rotation 1</td>
                    <td>Test Holiday 7</td>
                    <td>
                        <a href="<?php echo base_url(); ?>workrule/deactivate?id=1" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you?')">Deactivate</a>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>  


        </div>
    </section>
</article>
