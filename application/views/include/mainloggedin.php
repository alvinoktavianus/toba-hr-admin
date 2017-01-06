
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
                            <li class="<?php if ($page == 'manageemployee' || $page == 'addemployee') { echo "active"; } ?>">
                                <a href="<?php echo base_url(); ?>manageemployee"> <i class="fa fa-users" aria-hidden="true"></i> Manage Employee </a>
                            </li>
                            <li class="<?php if ($page == 'holidayschedule' || $page == 'addholidayschedule') { echo "active open"; } ?>">
                                <a href="#"> <i class="fa fa-credit-card" aria-hidden="true"></i> Schedule <i class="fa arrow"></i> </a>
                                <ul>
                                    <li class="<?php if ($page == 'holidayschedule' || $page == 'addholidayschedule') { echo "active"; } ?>"> <a href="<?php echo base_url(); ?>holidayschedule">Holiday Schedule</a> </li>
                                </ul>
                            </li>
                            <li class="<?php if ($page == 'department' || $page == 'jobposition' || $page == 'holiday') { echo "active open"; } ?>">
                                <a href="#"> <i class="fa fa-credit-card" aria-hidden="true"></i> Master Data <i class="fa arrow"></i> </a>
                                <ul>
                                    <li class="<?php if ($page == 'department') { echo "active"; } ?>"> <a href="<?php echo base_url(); ?>department">Department</a> </li>
                                    <li class="<?php if ($page == 'jobposition') { echo "active"; } ?>"> <a href="<?php echo base_url(); ?>jobposition">Job Position</a> </li>
                                    <li class="<?php if ($page == 'holiday') { echo "active"; } ?>"> <a href="<?php echo base_url(); ?>holiday">Holiday</a> </li>
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
                        case 'manageemployee': {
                            $this->load->view('layouts/employee/manageemployee');
                            break;
                        }
                        case 'addemployee': {
                            $this->load->view('layouts/employee/addemployee');
                            break;
                        }
                        case 'department': {
                            $data['page'] = $page;
                            $this->load->view('layouts/department/department', $data);
                            break;
                        }
                        case 'jobposition': {
                            $data['page'] = $page;
                            $this->load->view('layouts/jobposition/jobposition', $data);
                            break;
                        }
                        case 'holiday': {
                            $data['page'] = $page;
                            $this->load->view('layouts/holiday/holiday', $data);
                            break;
                        }
                        case 'holidayschedule': {
                            $data['page'] = $page;
                            $this->load->view('layouts/holidayschedule/index', $data);
                            break;
                        }
                        case 'addholidayschedule': {
                            $data['page'] = $page;
                            $this->load->view('layouts/holidayschedule/add', $data);
                            break;
                        }
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
        <script src="<?php echo base_url(); ?>assets/js/jquery.tabledit.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/app.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/duplicateFields.min.js"></script>

        <script type="text/javascript">

            $('.add-schedule').click(function(){
                console.log('clicked!');
                $('table#dtl-schedule').append( $('table#dtl-schedule tr:last').clone(true, true) );
            });

        </script>
    </body>

</html>

 <!-- <?php $data = array('type' => 'text','class' => 'form-control','id' => 'holidayschedulename','name' => 'holidayschedulename','required' => true);echo form_input($data); ?> -->