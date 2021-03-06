                
                <div class="pcoded-main-container">
                    <div class="pcoded-wrapper">

                        <nav class="pcoded-navbar">
                            <div class="nav-list">
                                <div class="pcoded-inner-navbar main-menu">
                                    <div class="pcoded-navigation-label">Navigation</div>
                                    <ul class="pcoded-item pcoded-left-item">
                                        <li class="<?= activate_menu('home'); ?>">
                                            <a href="<?=  admin_url(); ?>" class="waves-effect waves-dark">
                                                <span class="pcoded-micon">
                                                    <i class="feather icon-home"></i>
                                                </span>
                                                <span class="pcoded-mtext">Home</span>
                                            </a>
                                        </li>
                                        <li class="pcoded-hasmenu <?= activate_dropdown('members'); ?>">
                                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="fas fa-users"></i></span>
                                                <span class="pcoded-mtext">Members</span>
                                            </a>
                                            <ul class="pcoded-submenu">
                                                <li class="<?= activate_menu('members'); ?>">
                                                    <a href="<?=  admin_url('members/'); ?>" class="waves-effect waves-dark">
                                                        <span class="pcoded-mtext">HCA List</span>
                                                    </a>
                                                </li>
                                                <li class="<?= activate_menu('members/addhca'); ?>">
                                                    <a href="<?=  admin_url('members/addhca/'); ?>" class="waves-effect waves-dark">
                                                        <span class="pcoded-mtext">Add HCA</span>
                                                    </a>
                                                </li>
                                                <li class="<?= activate_menu('members/memberlist'); ?>">
                                                    <a href="<?=  admin_url('members/memberlist/'); ?>" class="waves-effect waves-dark">
                                                        <span class="pcoded-mtext">Member List</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="pcoded-hasmenu <?= activate_dropdown('nurses'); ?>">
                                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="fa fa-user-nurse"></i></span>
                                                <span class="pcoded-mtext">Nurses</span>
                                            </a>
                                            <ul class="pcoded-submenu">
                                                <li class="<?= activate_menu('nurses'); ?>">
                                                    <a href="<?=  admin_url('nurses/'); ?>" class="waves-effect waves-dark">
                                                        <span class="pcoded-mtext">Nurse List</span>
                                                    </a>
                                                </li>
                                                <li class="<?= activate_menu('nurses/addnurse'); ?>">
                                                    <a href="<?=  admin_url('nurses/addnurse/'); ?>" class="waves-effect waves-dark">
                                                        <span class="pcoded-mtext">Add Nurse</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="<?= activate_menu('reports'); ?>">
                                            <a href="<?=  admin_url('reports/'); ?>" class="waves-effect waves-dark">
                                                <span class="pcoded-micon">
                                                    <i class="fa fa-list"></i>
                                                </span>
                                                <span class="pcoded-mtext">Reports</span>
                                            </a>
                                        </li>
                                        <li class="pcoded-hasmenu active pcoded-trigger d-none">
                                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                                <span class="pcoded-mtext">Dashboard</span>
                                            </a>
                                            <ul class="pcoded-submenu">
                                                <li class="active">
                                                    <a href="index.html" class="waves-effect waves-dark">
                                                        <span class="pcoded-mtext">Default</span>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="dashboard-crm.html" class="waves-effect waves-dark">
                                                        <span class="pcoded-mtext">CRM</span>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="dashboard-analytics.html" class="waves-effect waves-dark">
                                                        <span class="pcoded-mtext">Analytics</span>
                                                        <span class="pcoded-badge label label-info ">NEW</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="d-none">
                                            <a href="navbar-light.html" class="waves-effect waves-dark">
                                                <span class="pcoded-micon">
                                                    <i class="feather icon-menu"></i>
                                                </span>
                                                <span class="pcoded-mtext">Navigation</span>
                                            </a>
                                        </li>
                                    </ul>    
                                </div>
                            </div>
                        </nav>
                        <div class="pcoded-content">
                            
