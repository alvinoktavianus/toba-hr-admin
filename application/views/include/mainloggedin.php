
<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> <?php echo $page_title; ?> </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vendor.css">
        <!-- Theme initialization -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/app-blue.css">
    </head>

    <body>
        <div class="main-wrapper">
            <div class="app sidebar-fixed header-fixed" id="app">
                <header class="header">
                    <div class="header-block header-block-collapse hidden-lg-up"> <button class="collapse-btn" id="sidebar-collapse-btn">
                <i class="fa fa-bars"></i>
            </button> </div>
                    <div class="header-block header-block-nav">
                        <ul class="nav-profile">
                            <li class="profile dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    <div class="img" style="background-image: url('https://avatars3.githubusercontent.com/u/3959008?v=3&s=40')"> </div> <span class="name"> <?php echo $this->session->userdata('user_session')['email']; ?> </span>
                                </a>
                                <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <a class="dropdown-item" href="<?php echo base_url(); ?>dologout"> <i class="fa fa-power-off icon"></i> Logout </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </header>

                <aside class="sidebar">

<div class="sidebar-container">
    <div class="sidebar-header">
        <div class="brand">
            <div class="logo"> <span class="l l1"></span> <span class="l l2"></span> <span class="l l3"></span> <span class="l l4"></span> <span class="l l5"></span> </div> Toba HRM Admin </div>
    </div>
    <nav class="menu">
        <ul class="nav metismenu" id="sidebar-menu">
            <li class="<?php if ($page == 'home') { echo "active"; } ?>">
                <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Dashboard </a>
            </li>
            <li class="<?php if ($page == 'confirmpayment' || $page == 'transactionhistory' || $page == 'confirminvoice' || $page == 'invoicedetail') { echo "active open"; } ?>">
                <a href="#"> <i class="fa fa-credit-card" aria-hidden="true"></i> Manage Employee <i class="fa arrow"></i> </a>
                <ul>
                    <li class="<?php if ($page == 'confirmpayment' || $page == 'confirminvoice') { echo "active"; } ?>"> <a href="<?php echo base_url(); ?>manageemployee">View Employee</a> </li>
                    <li class="<?php if ($page == 'transactionhistory' || $page == 'invoicedetail') { echo "active"; } ?>"> <a href="<?php echo base_url(); ?>manageemployee/add">Add New Employee</a> </li>
                </ul>
            </li>
        </ul>
    </nav>
</div>

                </aside>

                <div class="sidebar-overlay" id="sidebar-overlay"></div>
                
                <?php
                    switch ($page) {
                        case 'home': {
                            $this->load->view('layouts/home');
                            break;
                        }
                        // case 'updatewebsite': {
                        //     $data['page'] = $page;
                        //     $this->load->view('layouts/superuser/updatewebsite', $data);
                        //     break;
                        // }
                        // case 'totalincome': {
                        //     $data['page'] = $page;
                        //     $this->load->view('layouts/superuser/totalincome', $data);
                        //     break;
                        // }
                        // case 'activationkey': {
                        //     $data['page'] = $page;
                        //     $this->load->view('layouts/superuser/activationkey', $data);
                        //     break;
                        // }
                        // case 'genealogy': {
                        //     $data['page'] = $page;
                        //     $this->load->view('layouts/superuser/genealogy', $data);
                        //     break;
                        // }
                    }
                ?>


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
