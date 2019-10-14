<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Xenon Boostrap Admin Panel" />
    <meta name="author" content="" />

    <title>Brac QC - Dashboard</title>

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Arimo:400,700,400italic">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fonts/linecons/css/linecons.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/xenon-core.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/xenon-forms.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/xenon-components.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/xenon-skins.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">

    <script src="<?php echo base_url(); ?>assets/js/jquery-1.11.1.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="page-body">
    <div class="settings-pane">

        <a href="#" data-toggle="settings-pane" data-animate="true">
            &times;
        </a>

        <div class="settings-pane-inner">

            <div class="row">

                <div class="col-md-4">

                    <div class="user-info">

                        <div class="user-image">
                            <a href="extra-profile.html">
                                <img src="<?php echo base_url(); ?>assets/images/user-2.png" class="img-responsive img-circle" />
                            </a>
                        </div>

                        <div class="user-details">

                            <h3>
                                <a href="extra-profile.html">John Smith</a>

                                <!-- Available statuses: is-online, is-idle, is-busy and is-offline -->
                                <span class="user-status is-online"></span>
                            </h3>

                            <p class="user-title">Web Developer</p>

                            <div class="user-links">
                                <a href="extra-profile.html" class="btn btn-primary">Edit Profile</a>
                                <a href="extra-profile.html" class="btn btn-success">Upgrade</a>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-8 link-blocks-env">

                    <div class="links-block left-sep">
                        <h4>
                            <span>Notifications</span>
                        </h4>

                        <ul class="list-unstyled">
                            <li>
                                <input type="checkbox" class="cbr cbr-primary" checked="checked" id="sp-chk1" />
                                <label for="sp-chk1">Messages</label>
                            </li>
                            <li>
                                <input type="checkbox" class="cbr cbr-primary" checked="checked" id="sp-chk2" />
                                <label for="sp-chk2">Events</label>
                            </li>
                            <li>
                                <input type="checkbox" class="cbr cbr-primary" checked="checked" id="sp-chk3" />
                                <label for="sp-chk3">Updates</label>
                            </li>
                            <li>
                                <input type="checkbox" class="cbr cbr-primary" checked="checked" id="sp-chk4" />
                                <label for="sp-chk4">Server Uptime</label>
                            </li>
                        </ul>
                    </div>

                    <div class="links-block left-sep">
                        <h4>
                            <a href="#">
                                <span>Help Desk</span>
                            </a>
                        </h4>

                        <ul class="list-unstyled">
                            <li>
                                <a href="#">
                                    <i class="fa-angle-right"></i>
                                    Support Center
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa-angle-right"></i>
                                    Submit a Ticket
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa-angle-right"></i>
                                    Domains Protocol
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa-angle-right"></i>
                                    Terms of Service
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="page-container">
        <div class="sidebar-menu toggle-others fixed">

            <div class="sidebar-menu-inner">
                <header class="logo-env">

                    <!-- logo -->
                    <div class="logo">
                        <a href="dashboard-1.html" class="logo-expanded">
                            <img src="<?php echo base_url(); ?>assets/images/logo@2x.png" width="80" alt="" />
                        </a>

                        <a href="dashboard-1.html" class="logo-collapsed">
                            <img src="<?php echo base_url(); ?>assets/images/logo-collapsed@2x.png" width="40" alt="" />
                        </a>
                    </div>

                    <!-- This will toggle the mobile menu and will be visible only on mobile devices -->
                    <div class="mobile-menu-toggle visible-xs">
                        <a href="#" data-toggle="user-info-menu">
                            <i class="fa-bell-o"></i>
                            <span class="badge badge-success">7</span>
                        </a>

                        <a href="#" data-toggle="mobile-menu">
                            <i class="fa-bars"></i>
                        </a>
                    </div>

                    <!-- This will open the popup with user profile settings, you can use for any purpose, just be creative -->
                    <div class="settings-icon">
                        <a href="#" data-toggle="settings-pane" data-animate="true">
                            <i class="linecons-cog"></i>
                        </a>
                    </div>

                </header>

                <?php echo $this->aauth->get_menu(); ?>

            </div>

        </div>

        <div class="main-content">

            <nav class="navbar user-info-navbar"  role="navigation"><!-- User Info, Notifications and Menu Bar -->

                <!-- Left links for user info navbar -->
                <ul class="user-info-menu left-links list-inline list-unstyled">

                    <li class="hidden-sm hidden-xs">
                        <a href="#" data-toggle="sidebar">
                            <i class="fa-bars"></i>
                        </a>
                    </li>

                </ul>


                <!-- Right links for user info navbar -->
                <ul class="user-info-menu right-links list-inline list-unstyled">
                    <li class="dropdown user-profile">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo base_url(); ?>assets/images/user-4.png" alt="user-image" class="img-circle img-inline userpic-32" width="28" />
							<span>
								John Smith
								<i class="fa-angle-down"></i>
							</span>
                        </a>

                        <ul class="dropdown-menu user-profile-menu list-unstyled">
                            <li>
                                <a href="#settings">
                                    <i class="fa-wrench"></i>
                                    Settings
                                </a>
                            </li>
                            <li>
                                <a href="#profile">
                                    <i class="fa-user"></i>
                                    Profile
                                </a>
                            </li>
                            <li>
                                <a href="#help">
                                    <i class="fa-info"></i>
                                    Help
                                </a>
                            </li>
                            <li class="last">
                                <a href="extra-lockscreen.html">
                                    <i class="fa-lock"></i>
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>



            <?php if(isset($main_content)) { $this->load->view($main_content); } ?>




            <!-- Main Footer -->
            <!-- Choose between footer styles: "footer-type-1" or "footer-type-2" -->
            <!-- Add class "sticky" to  always stick the footer to the end of page (if page contents is small) -->
            <!-- Or class "fixed" to  always fix the footer to the end of page -->
            <footer class="main-footer sticky footer-type-1">

                <div class="footer-inner">

                    <!-- Add your copyright text here -->
                    <div class="footer-text">
                        <a href="">© 2018 All Rights Reserved. Designed and Developed by Appinion BD Limited.</a>
                    </div>


                    <!-- Go to Top Link, just add rel="go-top" to any link to add this functionality -->
                    <div class="go-up">

                        <a href="#" rel="go-top">
                            <i class="fa-angle-up"></i>
                        </a>

                    </div>

                </div>

            </footer>
        </div>

    </div>





    <!-- Page Loading Overlay -->
    <div class="page-loading-overlay">
        <div class="loader-2"></div>
    </div>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/select2/select2.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/select2/select2-bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/multiselect/css/multi-select.css">

    <!-- Bottom Scripts -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/TweenMax.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/resizeable.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/joinable.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/xenon-api.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/xenon-toggles.js"></script>

    <!-- Imported scripts on this page -->
    <script src="<?php echo base_url(); ?>assets/js/select2/select2.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-ui/jquery-ui.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/selectboxit/jquery.selectBoxIt.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/xenon-widgets.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/devexpress-web-14.1/js/globalize.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/devexpress-web-14.1/js/dx.chartjs.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/toastr/toastr.min.js"></script>

    <!-- JavaScripts initializations and stuff -->
    <script src="<?php echo base_url(); ?>assets/js/xenon-custom.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/multiselect/js/jquery.multi-select.js"></script>


    <!-- Imported scripts on this page -->
    <script src="<?php echo base_url(); ?>assets/js/inputmask/jquery.inputmask.bundle.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-validate/jquery.validate.min.js"></script>
</body>
</html>