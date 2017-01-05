
<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> <?php echo $page_title; ?> </title>
        <meta name="description" content="Toba HRM Admin Page">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vendor.css">
        <!-- Theme initialization -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/app-blue.css">
    </head>

    <body>
        <div class="auth">
            <div class="auth-container">
                <div class="card">
                    <header class="auth-header">
                        <h1 class="auth-title">
                            <div class="logo"> <span class="l l1"></span> <span class="l l2"></span> <span class="l l3"></span> <span class="l l4"></span> <span class="l l5"></span> </div> Toba HRM Admin </h1>
                    </header>
                    <div class="auth-content">
                        <p class="text-xs-center">LOGIN TO CONTINUE</p>

                        <?php if ($this->session->flashdata('errors')): ?>
                            <div class="alert alert-danger" role="alert">
                                <strong><?php echo $this->session->flashdata('errors'); ?></strong>
                            </div>
                        <?php endif; ?>
                        
                        <?php echo form_open(base_url().'dologin', array( 'id' => 'login-form', 'novalidate' => '' )); ?>
                        
                            <div class="form-group"> <label for="username">Username</label> <input type="email" class="form-control underlined" name="username" id="username" placeholder="Your email address" required> </div>
                            <div class="form-group"> <label for="password">Password</label> <input type="password" class="form-control underlined" name="password" id="password" placeholder="Your password" required> </div>
                            <div class="form-group"> <button type="submit" class="btn btn-block btn-primary">Login</button> </div>
                        
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Reference block for JS -->
        <div class="ref" id="ref">
            <div class="color-primary"></div>
            <div class="chart">
                <div class="color-primary"></div>
                <div class="color-secondary"></div>
            </div>
        </div>
        <script src="<?php echo base_url(); ?>assets/js/vendor.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/app.js"></script>
    </body>

</html>