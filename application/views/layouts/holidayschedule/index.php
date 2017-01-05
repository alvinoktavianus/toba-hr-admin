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



        </div>
    </section>
</article>
